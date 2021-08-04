<?php
namespace App\Component;

use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Session;

class MyPoint
{
    const ENDPOINT_TOKEN = 'oauth/token/';
    const ENDPOINT_LOGIN = 'users/auth/login/';
    const ENDPOINT_LOGOUT = 'users/auth/logout/';
    const ENDPOINT_SHARE_ARTICLE = 'share-article';
    const ENDPOINT_POINT_HISTORY = 'users/profile/point-history-monthly';


    const ACCESS_TOKEN_VAR = "myPointToken";
    const REFRESH_TOKEN_VAR = "myPointRefresh";

    /**
     * Request Token
     * @return Array $response
     */
    public function getToken()
    {
        $ENDPOINT = config('mypoint.base_url') . self::ENDPOINT_TOKEN;

        $client = new Client();

        $response = $client->post($ENDPOINT, [
            'http_errors' => false,
            RequestOptions::JSON => [
                'grant_type' => 'password',
                'username' => config('mypoint.username'),
                'password' => config('mypoint.password')
            ]
        ]);
        $response = \GuzzleHttp\json_decode($response->getBody(), true);
        Session::put(self::ACCESS_TOKEN_VAR, $response["data"]["access_token"]);
        Session::put(self::REFRESH_TOKEN_VAR, $response["data"]["refresh_token"]);
        Session::save();
        return true;
    }

    /**
     * Get refreshed token
     *
     * @return void
     */
    private function refreshToken()
    {
        $ENDPOINT = config('mypoint.base_url') . self::ENDPOINT_TOKEN;

        $client = new Client();

        $response = $client->post($ENDPOINT, [
            'http_errors' => false,
            RequestOptions::JSON => [
                'grant_type' => 'refresh_token',
                'username' => config('mypoint.username'),
                'password' => config('mypoint.password'),
                'refresh_token' => Session::get(self::REFRESH_TOKEN_VAR)
            ]
        ]);

        // if refresh token is invalid then generate new token
        if($response->getStatusCode() == 500) {
            $this->getToken();
            return;
        }
        $response = \GuzzleHttp\json_decode($response->getBody(), true);
        Session::put(self::ACCESS_TOKEN_VAR, $response["data"]["access_token"]);
        Session::put(self::REFRESH_TOKEN_VAR, $response["data"]["refresh_token"]);
        Session::save();
    }


    public function ShareArticle($type, $link)
    {
        try {

            $ENDPOINT = config('mypoint.base_url') . self::ENDPOINT_SHARE_ARTICLE .'/';

            $this->loginUser(Auth::user()->email, 'lazone.id');

            $client = new Client($this->getClientHeaders());

            $response = $client->post($ENDPOINT, [
                'http_errors' => false,
                RequestOptions::JSON => [
                    'type' => \strtoupper($type),
                    'link' => $link
                ]
            ]);

            if($this->checkResponse($response)) {
                return $this->ShareArticle($type, $link);
            }
            $response = \GuzzleHttp\json_decode($response->getBody(), true);
            return $response;
        } catch(Exception $e) {
            return array(
                'code' => 500,
                'message' => $e->getMessage()
            );
        }
    }

    public function getShareArticle($link)
    {
        try {
            if(Auth::check()) {
                $ENDPOINT = config('mypoint.base_url') . self::ENDPOINT_SHARE_ARTICLE;

                $this->loginUser(Auth::user()->email, 'lazone.id');

                $client = new Client($this->getClientHeaders());

                $response = $client->get($ENDPOINT, [
                    'http_errors' => false,
                    'query' => [
                        'link' => $link
                    ]
                ]);

                if($this->checkResponse($response)) {
                    return $this->getShareArticle($link);
                }
                $response = \GuzzleHttp\json_decode($response->getBody(), true);
                return $response['data'];
            }
            return;
        } catch(Exception $e) {
            return array(
                'code' => 500,
                'message' => $e->getMessage()
            );
        }
    }

    public function getLastGamePoint()
    {
        try {
            $ENDPOINT = config('mypoint.base_url') . self::ENDPOINT_POINT_HISTORY;

            $client = new Client($this->getClientHeaders());

            $response = $client->get($ENDPOINT, [
                'http_errors' => false,
                'query' => [
                    'month' => 0,
                    "year" => 0,
                    "page" => 1,
                    "activity" => 'GAME-POINT',
                    "limit" => 1,
                    "latest" => true
                ]
            ]);
            if($this->checkResponse($response)) {
                return $this->getLastGamePoint();
            }
            $response = \GuzzleHttp\json_decode($response->getBody(), true);
            if(isset($response['data']['list']) && count($response['data']['list']) > 0) {
                return $response['data']['list'][0];
            }
            return $response;
        }catch(Exception $e) {
            return array(
                'code' => 500,
                'message' => $e->getMessage()
            );
        }
    }


    /**
     * Login user to myPoint Api
     * @param string $email
     * @param string $source the source this api hit from
     * @param array $dataUser user payload when user not exists in my point then register
     * @return array
     */
    public function loginUser($email, $source, Array $dataUser = [])
    {
        $ENDPOINT = config('mypoint.base_url') . self::ENDPOINT_LOGIN;

        $client = new Client($this->getClientHeaders());
        $response = $client->post($ENDPOINT, [
            'http_errors' => false,
            RequestOptions::JSON => [
                'email' => $email,
                'source' => $source
            ]
        ]);
        $responseDecode = \GuzzleHttp\json_decode($response->getBody(), true);
        if($response->getStatusCode() == 403) { //invalid access token
            $this->refreshToken(); //refresh token
            return $this->loginUser($email, $source, $dataUser); //login again

        } else if($response->getStatusCode() == 500) { //users already login so logout first
            if($responseDecode['meta']['message'] === 'User does not exist.') {
                if(empty($dataUser)) {
                    return $responseDecode;
                }
                $response = $this->CreateUser($dataUser);
            } else {
                $this->logoutUser();
            }
            return $this->loginUser($email, $source, $dataUser);

        } else if($response->getStatusCode() != 200) {
            throw new Exception($response->getBody()->getContents());

        }

        return $responseDecode;
    }

    public function logoutUser()
    {
        $ENDPOINT = config('mypoint.base_url') . self::ENDPOINT_LOGOUT;

        $client = new Client($this->getClientHeaders());

        $response = $client->get($ENDPOINT, ['http_errors' => false]);

        if($response->getStatusCode() == 403) {
            $this->refreshToken();
            $this->logoutUser();
        } else if($response->getStatusCode() != 200) {
            throw new Exception($response->getBody()->getContents());
        }
        return true;
    }

    /**
     * Check response
     * @param $response
     */
    private function checkResponse($response)
    {
        if($response->getStatusCode() == 500) {
            if(Auth::check()) {
                $this->loginUser(Auth::user()->email, 'lazone.id');
                return true;
            } else {
                throw new Exception('User not login');
            }
        }
        else if($response->getStatusCode() == 403)
        {
            $this->refreshToken();
            return true;
        }
        return false;
    }

    /**
     * get client headers
     * @return Array
     */
    private function getClientHeaders()
    {
        //check if not have access token then get one
        if(! Session::get(self::ACCESS_TOKEN_VAR)) {
            // get one access token
            $this->getToken();
        }
        return [
            'headers' => [
                'Authorization' => sprintf("%s %s", "Bearer", Session::get(self::ACCESS_TOKEN_VAR)),
                'Content-Type' => 'application/json'
            ]
        ];
    }

}
