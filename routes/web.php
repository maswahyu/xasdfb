<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Faker\Factory as Faker;

function randomCategory()
{
    $category = ['Lifestyle', 'Entertaiment', 'Inspiration', 'Lensa', 'Sneakerland', 'Music', 'Movie'];
    return $category[rand(0, count($category) - 1)];
}

Route::get('/', 'IndexController@index')->name('index');
Route::get('/feed', 'IndexController@feed');
Route::get('/feed-photo', 'IndexController@feedPhoto');
Route::get('/feed-video', 'IndexController@feedVideo');

Route::get('/category', function () {
    $faker = Faker::create();

    for ($i = 0; $i < 2; $i++) {
        $sticky[] = (object)[
            'url' => '#',
            'thumbnail' => 'holder.js/380x229?theme=sky&auto=yes',
            'category' => randomCategory(),
            'published_date' => $faker->date('j M Y'),
            'view_count' => rand(1, 999),
            'title' => ucfirst($faker->words(rand(6, 10), true)),
        ];
    }

    for ($i = 0; $i < 3; $i++) {
        $latest[] = (object)[
            'url' => '#',
            'thumbnail' => 'holder.js/380x229?theme=sky&auto=yes',
            'category' => randomCategory(),
            'published_date' => $faker->date('j M Y'),
            'view_count' => rand(1, 999),
            'title' => ucfirst($faker->words(rand(6, 10), true)),
        ];
    }

    for ($i = 0; $i < 4; $i++) {
        $recommended[] = (object)[
            'url' => '#',
            'thumbnail' => 'holder.js/380x229?theme=sky&auto=yes',
            'category' => randomCategory(),
            'published_date' => $faker->date('j M Y'),
            'view_count' => rand(1, 999),
            'title' => ucfirst($faker->words(rand(6, 10), true)),
        ];
    }

    return view('frontend.pages.category', [
        'stickyPosts' => $sticky,
        'latestPosts' => $latest,
        'recommendedPosts' => $recommended,
    ]);
});

Route::get('/photo', function () {
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
});

Route::get('/video', function () {
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
});

Route::get('/event', function () {
    $faker = Faker::create();

    for ($i = 0; $i < 4; $i++) {
        $date = $faker->dateTime();
        $stickyEvent[] = (object)[
            'url' => '#',
            'thumbnail' => 'holder.js/580x290?theme=sky&auto=yes',
            'category' => randomCategory(),
            'date'  => date_format($date, 'j'),
            'month_year' => date_format($date, 'M y'),
            'name' => ucfirst($faker->words(rand(3, 5), true)),
            'location' => $faker->words(rand(2, 3), true) . ' - ' . $faker->words(rand(1, 2), true) . ', ' . $faker->city(),
        ];
    }

    for ($i = 0; $i < 2; $i++) {
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

    for ($i = 0; $i < 2; $i++) {
        $photos[] = (object)[
            'url' => '#',
            'thumbnail' => 'holder.js/380x229?theme=sky&auto=yes',
            'category' => 'Photo',
            'published_date' => $faker->date('j M Y'),
            'photo_count' => rand(1, 5),
            'title' => ucfirst($faker->words(rand(6, 10), true)),
        ];
    }

    return view('frontend.pages.event', [
        'stickyEvents' => $stickyEvent,
        'videos' => $videos,
        'photos' => $photos,
    ]);
});

Route::get('/feed-event', function () {
    $faker = Faker::create();
    for ($i = 0; $i < 5; $i++) {
        $date = $faker->dateTime();
        $event[] = (object)[
            'url' => '#',
            'thumbnail' => 'holder.js/480x240?theme=sky&auto=yes',
            'date' => date_format($date, 'j M y'),
            'name' => ucfirst($faker->words(rand(3, 5), true)),
            'location' => $faker->words(rand(2, 3), true) . ' - ' . $faker->words(rand(1, 2), true) . ', ' . $faker->city(),
        ];
    }

    return response()->json([
        'data' => $event,
        'total_page' => 5,
    ]);
});

Route::get('/post', function () {
    $faker = Faker::create();
    for ($i = 0; $i < 3; $i++) {
        $related[] = (object)[
            'url' => '#',
            'thumbnail' => 'holder.js/380x229?theme=sky&auto=yes',
            'category' => randomCategory(),
            'published_date' => $faker->date('j M Y'),
            'view_count' => rand(1, 999),
            'title' => ucfirst($faker->words(rand(6, 10), true)),
        ];
    }
    return view('frontend.pages.post', [
        'relatedPosts' => $related,
    ]);
});

Route::get('/photo-detail', function () {
    for ($i = 0; $i < 10; $i++) {
        $images[] = (object)[
            'thumbnail' => 'holder.js/247x150?theme=sky&auto=yes&text=Nav ' . $i,
            'image' => 'holder.js/980x653?theme=sky&auto=yes&text=Original ' . $i,
        ];
    }
    return view('frontend.pages.photo-detail', [
        'images' => $images,
    ]);
});

Route::get('/video-detail', function () {
    return view('frontend.pages.video-detail');
});

Route::get('search', 'PageController@search');
Route::get('points', 'PageController@points');
Route::get('contact-us', 'PageController@contact')->name('contact');
Route::post('contact-us', 'PageController@addContact');
Route::get('interest', 'MemberController@interest');

Route::get('{category}', 'PostController@category');
Route::get('{category}/{subcategory}', 'PostController@subcategory');
Route::get('{category}/{subcategory}/{slug}', 'PostController@detailPost');

// Route::get('gallery', 'GalleryController@index')->name('gallery');
// Route::get('gallery/{id}', 'GalleryController@index');
// Route::get('news', 'NewsController@index')->name('news'); 
// Route::get('news/{slug}', 'NewsController@detail');