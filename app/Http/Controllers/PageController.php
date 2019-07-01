<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setting;
use App\Contact;
use Auth;
use Validator;
use App\Gallery;
use App\Event;
use App\Http\Resources\EventCollection;
use Faker\Factory as Faker;

class PageController extends Controller
{
    public function search()
    {
        return view('frontend.pages.search');
    }

    public function points()
    {
    	$faker = Faker::create();
        for ($i = 0; $i < 10; $i++) {
            $faq[] = (object)[
                'title' => ucfirst($faker->words(rand(6, 10), true)),
                'description' => ucfirst($faker->sentences(rand(10, 30), true)),
            ];
        }
        return view('frontend.pages.points', ['faqs' => $faq]);
    }

    public function contact()
    {
    	return view('frontend.pages.contact');
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

    public function events()
    {
        $stickyEvent = Event::getSticky(4);
        $videos = Gallery::getGallery(Gallery::VIDEO, 2);
        $photos = Gallery::getGallery(Gallery::PHOTO, 2);

        return view('frontend.pages.event', [
            'stickyEvents' => $stickyEvent,
            'videos' => $videos,
            'photos' => $photos,
        ]);
    }

    public function feedEvent(Request $request)
    {
        $page = $request->get('page');
        $posts = Event::getPage($page);
        return response()->json(new EventCollection($posts));
    }
}
