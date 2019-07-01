<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gallery;
use Faker\Factory as Faker;

class GalleryController extends Controller
{
    public function photo()
    {	
    	$faker = Faker::create();

        for ($i = 0; $i < 2; $i++) {
            $sticky[] = (object)[
                'url' => '#',
                'thumbnail' => 'holder.js/380x229?theme=sky&auto=yes',
                'category' => randomCategory(),
                'published_date' => $faker->date('j M Y'),
                'photo_count' => rand(1, 5),
                'title' => ucfirst($faker->words(rand(6, 10), true)),
            ];
        }

        for ($i = 0; $i < 3; $i++) {
            $latest[] = (object)[
                'url' => '#',
                'thumbnail' => 'holder.js/380x229?theme=sky&auto=yes',
                'category' => randomCategory(),
                'published_date' => $faker->date('j M Y'),
                'photo_count' => rand(1, 5),
                'title' => ucfirst($faker->words(rand(6, 10), true)),
            ];
        }

        return view('frontend.pages.photo', [
            'stickyPosts' => $sticky,
            'latestPosts' => $latest,
        ]);
    }

    public function video()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 3; $i++) {
            $duration = rand(300, 3600);
            $videos[] = (object)[
                'url' => '#',
                'category' => 'Video',
                'yt_id' => 'Mxmu6YVVbDI',
                'published_date' => $faker->date('j M Y'),
                'title' => ucfirst($faker->words(rand(6, 10), true)),
                'duration' => $duration < 3600 ? gmdate("i:s", $duration) : gmdate("H:i:s", $duration),
            ];
        }

        for ($i = 0; $i < 3; $i++) {
            $duration = rand(300, 3600);
            $stickyVideo = (object)[
                'url' => '#',
                'category' => 'Video',
                'yt_id' => 'Mxmu6YVVbDI',
                'published_date' => $faker->date('j M Y'),
                'title' => ucfirst($faker->words(rand(6, 10), true)),
                'duration' => $duration < 3600 ? gmdate("i:s", $duration) : gmdate("H:i:s", $duration),
            ];
        }
        return view('frontend.pages.video', [
            'latestVideos' => $videos,
            'stickyVideo' => $stickyVideo,
        ]);
    }

    public function photoDetail($slug)
    {
        for ($i = 0; $i < 10; $i++) {
            $images[] = (object)[
                'thumbnail' => 'holder.js/247x150?theme=sky&auto=yes&text=Nav ' . $i,
                'image' => 'holder.js/980x653?theme=sky&auto=yes&text=Original ' . $i,
            ];
        }
        return view('frontend.pages.photo-detail', [
            'images' => $images,
        ]);
    }

    public function videoDetail($slug)
    {
        return view('frontend.pages.video-detail');
    }
}
