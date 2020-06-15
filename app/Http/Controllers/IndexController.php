<?php

namespace App\Http\Controllers;
use App\News;
use App\Gallery;
use App\Http\Resources\NewsCollection;
use App\Http\Resources\News as NewsItem;
use Auth;
use App\Slide;
use App\Category;

use Illuminate\Http\Request;

class IndexController extends Controller
{
	function __construct()
    {
        $this->middleware('auth.sso.clear');
    }

    public function index()
    {
		$mustReads   = News::getMustReads();
		$highlight   = News::getHighlight();
		$recommended = News::getRecommended();
		$trending    = News::getTrending();
		$slides      = Slide::getFeatured(10);

	    return view('frontend.pages.home', [
	        'mustReads' => $mustReads,
	        'highlight' => $highlight,
	        'recommended' => $recommended,
	        'trending' => $trending,
	        'slides' => $slides,
	    ]);
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
}
