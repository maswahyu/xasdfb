<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gallery;
use App\Http\Resources\GalleryCollection;
use App\Http\Resources\Gallery as GalleryItem;
use App\Http\Resources\AlbumCollection;
use App\Album;
use App\Setting;

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

        $ads = [
            'url' => Setting::getConfig('banner_post_url'),
            'image' => Setting::getConfig('banner_post'),
        ];

        return view('frontend.pages.photo', [
            'stickyPosts' => $sticky,
            'latestPosts' => $latest,
            'ads' => $ads
        ]);
    }

    public function video()
    {
        $videos      = Gallery::getGallery(Gallery::VIDEO, 3);
        $stickyVideo = Gallery::getSticky(Gallery::VIDEO);

        $ads = [
            'url' => Setting::getConfig('banner_post_url'),
            'image' => Setting::getConfig('banner_post'),
        ];

        return view('frontend.pages.video', [
            'latestVideos' => $videos,
            'stickyVideo'  => $stickyVideo,
            'ads' => $ads
        ]);
    }

    public function photoDetail($slug)
    {
        $album = Album::detail($slug);

        $ads = [
            'url' => Setting::getConfig('banner_post_url'),
            'image' => Setting::getConfig('banner_post'),
        ];

        return view('frontend.pages.photo-detail', [
            'album' => $album,
            'ads' => $ads
        ]);
    }

    public function videoDetail($slug)
    {
        $gallery = Gallery::detail(Gallery::VIDEO, $slug);

        if (!$gallery) {
            abort(404);
        }

        $ads = [
            'url' => Setting::getConfig('banner_post_url'),
            'image' => Setting::getConfig('banner_post'),
        ];

        return view('frontend.pages.video-detail', compact('gallery','ads'));
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

    public function feedNewVideo(Request $request)
    {
        $posts = Gallery::getNewGallery();

        $data = [];

        foreach ($posts as $key => $item) {
            $data[] = new GalleryItem($item);
        }

        return response()->json([
            'data' => $data,
            'total_page' => 1,
        ]);
    }

}
