<?php

namespace App\Http\Controllers;
use Faker\Factory as Faker;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $faker = Faker::create();

	    for ($i = 0; $i < 2; $i++) {
	        $mustReads[] = (object)[
	            'url' => '#',
	            'thumbnail' => 'holder.js/380x229?theme=sky&auto=yes',
	            'category' => randomCategory(),
	            'published_date' => $faker->date('j M Y'),
	            'view_count' => rand(1, 999),
	            'title' => ucfirst($faker->words(rand(6, 10), true)),
	        ];
	    }

	    for ($i = 0; $i < 5; $i++) {
	        $recommended[] = (object)[
	            'url' => '#',
	            'thumbnail' => 'holder.js/380x229?theme=sky&auto=yes',
	            'category' => randomCategory(),
	            'published_date' => $faker->date('j M Y'),
	            'view_count' => rand(1, 999),
	            'title' => ucfirst($faker->words(rand(6, 10), true)),
	        ];
	    }

	    for ($i = 0; $i < 4; $i++) {
	        $trending[] = (object)[
	            'url' => '#',
	            'thumbnail' => 'holder.js/380x229?theme=sky&auto=yes',
	            'category' => randomCategory(),
	            'published_date' => $faker->date('j M Y'),
	            'view_count' => rand(1, 999),
	            'title' => ucfirst($faker->words(rand(6, 10), true)),
	        ];
	    }

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

	    $highlight = (object)[
	        'url' => '#',
	        'thumbnail' => 'holder.js/619x348?theme=sky&auto=yes',
	        'category' =>  randomCategory(),
	        'published_date' => $faker->date('j M Y'),
	        'view_count' => rand(1, 999),
	        'title' => $faker->words(rand(6, 10), true),
	        'excerpt' => ucfirst($faker->words(rand(24, 36), true)),
	    ];

	    return view('frontend.pages.home', [
	        'mustReads' => $mustReads,
	        'highlight' => $highlight,
	        'recommended' => $recommended,
	        'trending' => $trending,
	        'videos' => $videos,
	    ]);
    }

    function randomCategory()
	{
	    $category = ['Lifestyle', 'Entertaiment', 'Inspiration', 'Lensa', 'Sneakerland', 'Music', 'Movie'];
	    return $category[rand(0, count($category) - 1)];
	}
}
