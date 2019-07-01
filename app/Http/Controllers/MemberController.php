<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
