<?php

namespace App\Http\Controllers;
use App\News;
use App\Gallery;
use App\Http\Resources\NewsCollection;
use App\Http\Resources\News as NewsItem;
use Auth;
use App\Slide;
use App\Category;
use App\Setting;

use Illuminate\Http\Request;

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
	    return view('frontend.pages.home', compact('ads'));
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
