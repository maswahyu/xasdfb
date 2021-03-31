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
use App\EventStream;
use App\Http\Resources\EventCollection;
use App\Http\Resources\NewsCollection;
use App\Http\Resources\GalleryCollection;
use App\Http\Resources\AlbumCollection;
use Cache;
use Carbon\Carbon;
use App\Prize;

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
        $points = Prize::getData();
        // dd($points);
        return view('frontend.pages.points', compact('points'));
    }

    public function contact()
    {
    	return view('frontend.pages.contact');
    }

    public function about()
    {
        $ads = [
            'url' => Setting::getConfig('banner_ads_post_url'),
            'image' => Setting::getConfig('banner_ads_post_desktop'),
            'image_mobile' => Setting::getConfig('banner_ads_post_mobile')
        ];

        return view('frontend.pages.about', compact('ads'));
    }

    public function stream($slug)
    {
        return view('frontend.pages.stream', [
            'stream' => EventStream::where('slug', $slug)->firstOrFail(),
            'username' => null,
        ]);
    }

    public function term()
    {
        $ads = [
            'url' => Setting::getConfig('banner_ads_post_url'),
            'image' => Setting::getConfig('banner_ads_post_desktop'),
            'image_mobile' => Setting::getConfig('banner_ads_post_mobile')
        ];

        return view('frontend.pages.term', compact('ads'));
    }

    public function privacy()
    {
        $ads = [
            'url' => Setting::getConfig('banner_ads_post_url'),
            'image' => Setting::getConfig('banner_ads_post_desktop'),
            'image_mobile' => Setting::getConfig('banner_ads_post_mobile')
        ];

        return view('frontend.pages.privacy', compact('ads'));
    }

    public function addContact(Request $request)
    {
    	$validator = Validator::make($request->all(), [
            'email'   => 'required|email',
            'name'    => 'required|min:1|max:255',
            'phone'   => 'required',
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
        $recaptcha_secret = config('app.google_secret');
        $recaptcha_response = $request->get('recaptchaResponse');

        // Make and decode POST request:
        $recaptcha = file_get_contents($recaptcha_url . '?secret=' . $recaptcha_secret . '&response=' . $recaptcha_response);
        $recaptcha = json_decode($recaptcha);

        // Take action based on the score returned:
        if ($recaptcha->score >= 0.5) {
            $input = $request->all();
            Contact::create($input);

            if (config('mail.password')) {
                $data = [
                    'from' =>  $request->get('email'),
                    'to'  => config('mail.receiver','contact@boldxperience.com'),
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
        $videos = Gallery::getGallery(Gallery::VIDEO, 2);
        $photos = Album::getLatest(2);

        $ads = [
            'url' => Setting::getConfig('banner_ads_post_url'),
            'image' => Setting::getConfig('banner_ads_post_desktop'),
            'image_mobile' => Setting::getConfig('banner_ads_post_mobile')
        ];

        return view('frontend.pages.event', [
            'videos' => $videos,
            'photos' => $photos,
            'ads' => $ads
        ]);
    }

    public function feedEvent(Request $request)
    {
        $page = $request->get('page');
        $posts = Event::getPage($page);
        return response()->json(new EventCollection($posts));
    }

    public function newEvent(Request $request)
    {
        $page = $request->get('page');
        $posts = Event::getSticky($page);
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
        $expiresAt = Carbon::now()->endOfDay()->addSecond();

        $category = Cache::remember('sitemapMaster', $expiresAt, function () {
            return Category::getMasterSitemap();
        });

        return response()
            ->view('frontend.sitemap.master', compact('category'))
            ->header('Content-Type', 'text/xml');
    }

    public function sitemapCategory($category)
    {
        $category_id = optional(Category::detail($category))->id;
        $expiresAt   = Carbon::now()->endOfDay()->addSecond();

        $posts = Cache::remember('sitemapCategory-'.$category_id, $expiresAt, function () use ($category_id) {
            return News::byPublish()->byCategory($category_id)->orderBy('created_at', 'DESC')->get();
        });

        return response()
            ->view('frontend.sitemap.category', ['posts' => $posts])
            ->header('Content-Type', 'text/xml');
    }

    public function sitemapVideo()
    {
        $expiresAt = Carbon::now()->endOfDay()->addSecond();
        $posts = Cache::remember('sitemapVideo', $expiresAt, function () {
            return Gallery::byPublish()->byCategory(Gallery::VIDEO)->get();
        });

        return response()
            ->view('frontend.sitemap.category', ['posts' => $posts])
            ->header('Content-Type', 'text/xml');
    }

    public function sitemapPhoto()
    {
        $expiresAt = Carbon::now()->endOfDay()->addSecond();
        $posts = Cache::remember('sitemapPhoto', $expiresAt, function () {
            return Album::byPublish()->get();
        });

        return response()
            ->view('frontend.sitemap.category', ['posts' => $posts])
            ->header('Content-Type', 'text/xml');
    }

    public function tukarLangsung() {
        return view('frontend.pages.tukarlangsung');
    }
}
