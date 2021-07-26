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
        $mypoint = new MyPoint();
    	return view('frontend.pages.game-profile', [
            'lastPoint' => $mypoint->getLastGamePoint()
        ]);
    }

    public function run()
    {
        $mypoint = new MyPoint();
        $mypoint->loginUser(Auth::user()->email, 'lazone.id');
        $data = [
            'api_endpoint' => env('API_MYPOINT_HOST'),
            'api_token' => Session::get(MyPoint::ACCESS_TOKEN_VAR)
        ];
        return view('frontend.pages.game-running', $data);
    }
}
