<?php

namespace App\Http\Controllers;
use App\News;
use App\Gallery;
use Faker\Factory as Faker;
use App\Http\Resources\NewsCollection;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
		$mustReads   = News::getMustReads();
		$highlight   = News::getHighlight();
		$recommended = News::getRecommended();
		$trending    = News::getTrending();
		$videos      = Gallery::getGallery();

	    return view('frontend.pages.home', [
	        'mustReads' => $mustReads,
	        'highlight' => $highlight,
	        'recommended' => $recommended,
	        'trending' => $trending,
	        'videos' => $videos,
	    ]);
    }

    public function feed(Request $request)
    {	
	    $page = $request->get('page');
	    $posts = News::getPage($page);
	    return response()->json(new NewsCollection($posts));
    }

    function randomCategory()
	{
	    $category = ['Lifestyle', 'Entertaiment', 'Inspiration', 'Lensa', 'Sneakerland', 'Music', 'Movie'];
	    return $category[rand(0, count($category) - 1)];
	}
}
