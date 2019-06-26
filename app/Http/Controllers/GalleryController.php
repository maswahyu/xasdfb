<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gallery;

class GalleryController extends Controller
{
    public function index(Request $request, $album_id = null)
    {	
    	if (!$album_id) {
    		$album_id = env('ALBUM_ID');
    	}

    	if ($request->ajax()) {
    		$type = $request->get('type');
    		$page = $request->get('page');
    		if (!$page) {
    			$page = 2;
    		}
    		$gallery = Gallery::getPage(6, $album_id, $page, $type);

    		$response = [
                'link' => $gallery->nextPageUrl(),
                'html' => view('front.gallery-list', compact('gallery','type'))->render()
            ];

            return response()->json($response);
    	}

    	$photo = Gallery::getData(5, $album_id, 'photo');
    	$video = Gallery::getData(6, $album_id, 'video');
    	$total_photo = Gallery::getCount($album_id, 'photo');
    	$total_video = Gallery::getCount($album_id, 'video');
    	return view('front.gallery', compact('photo','video','total_photo','total_video'));
    }
}
