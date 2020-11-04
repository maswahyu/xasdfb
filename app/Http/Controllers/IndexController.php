<?php

namespace App\Http\Controllers;
use Auth;
use App\News;
use App\Slide;
use App\Gallery;
use App\Setting;
use App\Category;
use Carbon\Carbon;
use App\BannerWifi;

use App\StickyBanner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\NewsCollection;
use App\Http\Resources\News as NewsItem;

class IndexController extends Controller
{
	function __construct()
    {
        $this->middleware('auth.sso.clear');
    }

    public function index()
    {
        $ads = [
            'url' => Setting::getConfig('banner_home_url'),
            'image' => Setting::getConfig('banner_home'),
        ];
        $bannerWifi = null;
        if(request()->get('wifi')) {
            $bannerWifi = BannerWifi::byPublish()->first();
        }
        $stickyBanner = StickyBanner::where([
            ['status', '=', 1],
            ['pub_day', '=', Carbon::now()->dayOfWeekIso],
            ['page', '=', StickyBanner::PAGE_HOME]
        ])->first();
	    return view('frontend.pages.home', compact('ads', 'bannerWifi', 'stickyBanner'));
    }

    public function feed(Request $request)
    {
        $page     = $request->get('page');
        $category = $request->get('category');

        if ($category) {

            $category = Category::detail($category);
            $posts = News::getLatestCategory($category, $page);

        } else {
           $posts = News::getPage($page);
           if($page == 1) {
               $posts->getCollection()->transform(function($value) use($page) {
                   $value->slug = $value->slug . '?utm_source=Latest&utm_medium=Content&utm_campaign=LazoneDetail';
                   return $value;
               });
           }
        }

	    return response()->json(new NewsCollection($posts));
    }

    public function feedTrending(Request $request)
    {
        $posts = News::getTrending();

        $data = [];

        foreach ($posts as $key => $item) {
            $data[] = new NewsItem($item);
        }

        return response()->json([
            'data' => $data,
            'total_page' => 1,
        ]);
    }

    public function feedMustread(Request $request)
    {
        $posts = News::getMustReads();

        $data = [];

        foreach ($posts as $key => $item) {
            $data[] = new NewsItem($item);
        }

        return response()->json([
            'data' => $data,
            'total_page' => 1,
        ]);
    }

    public function feedRecomended(Request $request)
    {
        $posts = News::getRecommended();

        $data = [];

        foreach ($posts as $key => $item) {
            $data[] = new NewsItem($item);
        }

        return response()->json([
            'data' => $data,
            'total_page' => 1,
            'auth' => Auth::check(),
        ]);
    }

    public function feedHighlight()
    {
        return new NewsItem(News::getHighlight());
    }

    public function feedSlider(Request $request)
    {
        $data = Slide::getFeatured(10);

        return response()->json([
            'data' => $data,
            'total_page' => 1,
        ]);
    }
}
