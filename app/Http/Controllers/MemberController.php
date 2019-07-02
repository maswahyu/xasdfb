<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Hash;
use Auth;

class MemberController extends Controller
{
    public function interest(Request $request)
    {
    	$interest = [
	        (object)[
	            'img' => asset('static/images/mock/in-movie.jpg'),
	            'name' => 'movie',
	            'description' => 'Artikel seputar film terkini yang wajib kamu tau',
	        ],
	        (object)[
	            'img' => asset('static/images/mock/in-oto.jpg'),
	            'name' => 'otomotif',
	            'description' => 'Artikel seputar otomotif terbaru dan terupdate',
	        ],
	        (object)[
	            'img' => asset('static/images/mock/in-lensa.jpg'),
	            'name' => 'lensa',
	            'description' => 'Berita terbaru buat kamu yang suka dunia visual terbaru ',
	        ],
	        (object)[
	            'img' => asset('static/images/mock/in-sneakerland.jpg'),
	            'name' => 'sneakerland',
	            'description' => 'Lebih update tentang sneakers favorit kamu',
	        ],
	        (object)[
	            'img' => asset('static/images/mock/in-sepakbola.jpg'),
	            'name' => 'sepak bola',
	            'description' => 'Artikel seputar olahraga sepak bola terupdate yang kamu harus tahu ',
	        ],
	        (object)[
	            'img' => asset('static/images/mock/in-esports.jpg'),
	            'name' => 'e-sports',
	            'description' => 'Dapatkan info ter-update seputar dunia e-sport',
	        ],
	        (object)[
	            'img' => asset('static/images/mock/in-music.jpg'),
	            'name' => 'music',
	            'description' => 'info ter-update buat kamu yang suka dunia musik ',
	        ],
	        (object)[
	            'img' => asset('static/images/mock/in-lifestyle.jpg'),
	            'name' => 'lifestyle',
	            'description' => 'Lebih update seputar lifestyle',
	        ],
	    ];
	    return view('frontend.pages.interest', ['interests' => $interest]);
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
                }   
                $user->save();
            }

            Auth::loginUsingId($user->id);
            
            return redirect()->route('index');

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
