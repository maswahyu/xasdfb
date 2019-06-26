<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setting;
use App\Contact;
use Auth;
use Validator;

class PageController extends Controller
{
    public function about()
    {
    	return view('front.about');
    }

    public function contact()
    {
    	return view('front.contact');
    }

    public function addContact(Request $request)
    {
    	$validator = Validator::make($request->all(), [
            'email'   => 'required|email',
            'name'    => 'required|min:1|max:255',
            'phone'   => 'required|integer',
            'subject' => 'required',
        ]);

        if ($validator->fails()) {
            $response = [
                'info' => 'error',
                'message' => 'Input is invalid! Check it again!'
            ];

            return response()->json($response);
        }

        $recaptcha_url = 'https://www.google.com/recaptcha/api/siteverify';
        $recaptcha_secret = env('GOOGLE_SECRET');
        $recaptcha_response = $request->get('recaptchaResponse');

        // Make and decode POST request:
        $recaptcha = file_get_contents($recaptcha_url . '?secret=' . $recaptcha_secret . '&response=' . $recaptcha_response);
        $recaptcha = json_decode($recaptcha);
        
        // Take action based on the score returned:
        if ($recaptcha->score >= 0.5) {
            $input = $request->all();
            Contact::create($input);
        
            $response = [
                'info' => 'success',
                'message' => 'Message delivered to receiver. We will contact you soon.'
            ];

            return response()->json($response);
        } else {
            $response = [
                'info' => 'error',
                'message' => 'reCaptcha error'
            ];

            return response()->json($response);
        }
    }
}
