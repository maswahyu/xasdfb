<?php

namespace App\Http\Controllers;

use App\Component\MyPoint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class GameController extends Controller
{
    public function game()
    {
    	return view('frontend.pages.game');
    }

    public function gameProfile()
    {
        if(Auth::check())
        {
            $mypoint = new MyPoint();
            $data['lastPoint'] = $mypoint->getLastGamePoint();
        }
        else if(request()->filled('score'))
        {
            request()->session()->put('game-point', request()->get('score', 0));
            return redirect(route('game-profile'));
        } else {
            $data['lastPoint']['point'] = request()->session()->get('game-point');
        }

    	return view('frontend.pages.game-profile', $data);
    }

    public function run()
    {
        $mypoint = new MyPoint();
        $access_token = '';
        if(Auth::check()) {
            $mypoint->loginUser(Auth::user()->email, 'lazone.id');
            $access_token = Session::get(MyPoint::ACCESS_TOKEN_VAR);
        }

        $data = [
            'api_endpoint' => env('API_MYPOINT_HOST'),
            'api_token' => $access_token
        ];
        return view('frontend.pages.game-running', $data);
    }
}
