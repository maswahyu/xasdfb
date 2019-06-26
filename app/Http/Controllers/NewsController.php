<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setting;
use App\News;

class NewsController extends Controller
{
    public function index(Request $request)
    {	
    	if ($request->ajax()) {
    		$news = News::getPage(6, $request->get('page'));

    		$response = [
                'link' => $news->nextPageUrl(),
                'html' => view('front.news-list', compact('news'))->render()
            ];

            return response()->json($response);
    	}

    	$news = News::getNews(6);
    	return view('front.news', compact('news'));
    }

    public function detail($slug)
    {	

    	$news = News::detail($slug);
    	if (!$news) {
    		abort(404);
    	}
    	$number = rand(1, 3);
    	if ($number == 2) {
	    	$news->view = $news->view + 1;
	        $news->save();
    	}
    	$related = News::related($slug);

    	return view('front.news-detail', compact('news','related'));
    }  
}
