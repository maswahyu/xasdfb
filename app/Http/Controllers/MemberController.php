<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Hash;
use Auth;
use App\Category;
use GuzzleHttp;

class MemberController extends Controller
{
    public function interest(Request $request)
    {
        $interest = Category::getInterest();

	    return view('frontend.pages.interest', ['interests' => $interest]);
    }

    public function addInterest(Request $request)
    {
        if (!Auth::check()) {

            $response = [
                'info' => 'login',
                'message' => ''
            ];

            return response()->json($response);
        }

        $input = $request->all();

        if (isset($input['interest'])) {

             $interest = $input['interest'];
             $model = User::insertInterest(Auth::id(), $interest);

            if ($model) {

                $response = [
                        'info' => 'success',
                        'message' => 'Pilihan topik kamu telah berhasil disimpan'
                    ];

            }
        } else {

            $response = [
                'info' => 'error',
                'message' => 'Kamu belum memilih salah satu topik.'
            ];
        }

        return response()->json($response);
    }

    public function getPoint()
    {
        if (Auth::check()) {
            try {

                $client = new GuzzleHttp\Client([
                    'headers' => [
                        'Authorization' => "Bearer ".User::access_token,
                        'Content-Type' => 'application/json'
                    ]
                ]);

                $response = $client->request('GET', 'https://'.config('cas.cas_hostname').'/lazone/point?email='.Auth::user()->email, ['verify' => (env("APP_ENV", "local") !== "local")]);
                if ($response->getStatusCode() == 200) {

                    return json_decode($response->getBody()->getContents(), true);
                } else {

                    return false;

                }
            } catch (Exception $e) {

                return false;

            }

        } else {

            $response = [
                'info' => 'error',
                'message' => ''
            ];

            return response()->json($response);
        }
    }

    public function getSsoDetail()
    {
        if (Auth::check()) {
            try {

                $client = new GuzzleHttp\Client([
                    'headers' => [
                        'Authorization' => "Bearer ".User::access_token,
                        'Content-Type' => 'application/json'
                    ]
                ]);

                $response = $client->request('GET', 'https://'.config('cas.cas_hostname').'/lazone/profile?email='.Auth::user()->email, ['verify' => (env("APP_ENV", "local") !== "local")]);
                if ($response->getStatusCode() == 200) {

                    return json_decode($response->getBody()->getContents(), true);
                } else {

                    return false;

                }
            } catch (Exception $e) {

                return false;

            }

        } else {

            $response = [
                'info' => 'error',
                'message' => ''
            ];

            return response()->json($response);
        }
    }

    public function memberLogin()
    {
    	if (cas()->isAuthenticated()) {
            $email = cas()->user();
            $attribute = cas()->getAttributes();
            $user = User::where('email', $email)->first();
            if (! $user) {
                $user = new User();
                $user->email = $email;
                $user->password = Hash::make($email . now());
                if ($attribute) {
                    if (array_key_exists('FIRST_NAME', $attribute)) {
                        $user->name = $attribute['FIRST_NAME'];
                    }
                    if (array_key_exists('ID', $attribute)) {
                        $user->sso_id = $attribute['ID'];
                    }
                    if (array_key_exists('NO_KTP', $attribute)) {
                        $user->no_ktp = $attribute['NO_KTP'];
                    }
                    if (array_key_exists('TOTAL_POINT', $attribute)) {
                        $user->total_point = $attribute['TOTAL_POINT'];
                    }
                }
                $user->save();
            } else {
                if (array_key_exists('FIRST_NAME', $attribute)) {
                    $user->name = $attribute['FIRST_NAME'];
                }
                if (array_key_exists('TOTAL_POINT', $attribute)) {
                    $user->total_point = $attribute['TOTAL_POINT'];
                }
                $user->save();
            }

            Auth::loginUsingId($user->id);

            if (isset($attribute['from_wifi']) && $attribute['from_wifi'] !== true) {
                return redirect()->to(config('cas.url_mypoint') . '?wifi=' . $attribute['from_wifi']);
            }

            return redirect()->to(config('cas.url_mypoint'));
        } else {
        	return redirect('/');
        }
    }

    public function casLogin()
    {
        if (cas()->isAuthenticated()) {
            return redirect('login');
        }
        cas()->authenticate();
    }

    public function memberLogout()
    {
        if (Auth::check()) {
            cas()->logout();
        }

        return redirect('/');
    }
}
