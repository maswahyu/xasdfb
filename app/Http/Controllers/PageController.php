<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setting;
use App\Contact;
use Auth;
use Validator;
use App\Gallery;
use App\Category;
use App\Event;
use App\News;
use App\Album;
use App\Http\Resources\EventCollection;
use App\Http\Resources\NewsCollection;
use App\Http\Resources\GalleryCollection;
use App\Http\Resources\AlbumCollection;
use Faker\Factory as Faker;

class PageController extends Controller
{   
    public function search()
    {
        return view('frontend.pages.search');
    }

    public function feedSearch(Request $request)
    {
        $page  = $request->get('page');
        $query = strip_tags($request->get('q'));
        $type  = $request->get('type');

        if($type == "photo") {

            $posts = Album::getSearch($page, $query);
            return response()->json(new AlbumCollection($posts));

        } else if($type == "video") {
            
            $posts = Gallery::getSearch($page, Gallery::VIDEO, $query);
            return response()->json(new GalleryCollection($posts));

        } else if ($type == 'news') {

            $posts = News::getSearch($page, $query);
            return response()->json(new NewsCollection($posts));

        }

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

            if (env('MAIL_PASSWORD')) {
                $data = [
                    'from' =>  $request->get('email'),
                    'to'  => env('MAIL_RECEIVER','contact@boldxperience.com'),
                    'subject' => "[".$request->get('name')."] ".$request->get('subject'),
                    'body' => $request->get('message')
                ];

                Mail::send(array(), array(), function ($message) use ($data) {
                    $message->to($data['to'])
                    ->subject($data['subject'])
                    ->from($data['from'])
                    ->setBody($data['body']);
                });
            }
        
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

    public function sitemap()
    {
        $category = Category::getSitemap();
        return response()
            ->view('frontend.sitemap.sitemap', ['category' => $category])
            ->header('Content-Type', 'text/xml');
    }

    public function sitemapMaster()
    {
        $category = Category::getMasterSitemap();
        return response()
            ->view('frontend.sitemap.master', compact('category'))
            ->header('Content-Type', 'text/xml');
    }

    public function sitemapCategory($category)
    {   
        $category = Category::detail($category);

        $posts = News::byPublish()->byCategory($category->id)->orderBy('created_at', 'DESC')->get();
        return response()
            ->view('frontend.sitemap.category', ['posts' => $posts])
            ->header('Content-Type', 'text/xml');
    }

    public function sitemapVideo()
    {   
        $posts = Gallery::byPublish()->byCategory(Gallery::VIDEO)->get();
        return response()
            ->view('frontend.sitemap.category', ['posts' => $posts])
            ->header('Content-Type', 'text/xml');
    }

    public function sitemapPhoto()
    {   
        $posts = Album::get();
        return response()
            ->view('frontend.sitemap.category', ['posts' => $posts])
            ->header('Content-Type', 'text/xml');
    }
}
