<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gallery;
use App\Http\Resources\GalleryCollection;
use App\Http\Resources\AlbumCollection;
use App\Album;

class GalleryController extends Controller
{
    public function index()
    {
        return redirect('gallery/video');
    }

    public function photo()
    {
        $sticky = Album::getSticky();
        $latest = Album::getLatest();

        return view('frontend.pages.photo', [
            'stickyPosts' => $sticky,
            'latestPosts' => $latest,
        ]);
    }

    public function video()
    {
        $videos      = Gallery::getGallery(Gallery::VIDEO, 3);
        $stickyVideo = Gallery::getSticky(Gallery::VIDEO);

        return view('frontend.pages.video', [
            'latestVideos' => $videos,
            'stickyVideo'  => $stickyVideo,
        ]);
    }

    public function photoDetail($slug)
    {
        $album = Album::detail($slug);

        return view('frontend.pages.photo-detail', [
            'album' => $album,
        ]);
    }

    public function videoDetail($slug)
    {
        $gallery = Gallery::detail(Gallery::VIDEO, $slug);

        if (!$gallery) {
            abort(404);
        }

        return view('frontend.pages.video-detail', compact('gallery'));
    }

    public function feedPhoto(Request $request)
    {
        $page = $request->get('page');
        $posts = Album::getPage($page);
        return response()->json(new AlbumCollection($posts));
    }

    public function feedVideo(Request $request)
    {
        $page = $request->get('page');
        $posts = Gallery::getPage($page, Gallery::VIDEO);
        return response()->json(new GalleryCollection($posts));
    }
}
