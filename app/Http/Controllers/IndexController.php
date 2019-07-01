<?php

namespace App\Http\Controllers;
use App\News;
use App\Gallery;
use App\Http\Resources\NewsCollection;
use App\Http\Resources\GalleryCollection;

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

    public function feedPhoto(Request $request)
    {
	    $page = $request->get('page');
	    $posts = Gallery::getPage($page, Gallery::PHOTO);
	    return response()->json(new GalleryCollection($posts));
    }

    public function feedVideo(Request $request)
    {	
	    $page = $request->get('page');
	    $posts = Gallery::getPage($page, Gallery::VIDEO);
	    return response()->json(new GalleryCollection($posts));
    }
}
