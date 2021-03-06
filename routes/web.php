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
Route::get('/', 'IndexController@index')->name('index');
Route::get('/feed-home', 'IndexController@feedHome');
Route::get('/feed', 'IndexController@feed');
Route::get('/feed-photo', 'GalleryController@feedPhoto');
Route::get('/feed-video', 'GalleryController@feedVideo');
Route::get('/feed-event', 'PageController@feedEvent');
Route::get('/new-event', 'PageController@newEvent');
Route::get('feed-new-video', 'GalleryController@feedNewVideo');
Route::get('feed-trending', 'IndexController@feedTrending');
Route::get('feed-slider', 'IndexController@feedSlider');
Route::get('feed-mustread', 'IndexController@feedMustread');
Route::get('feed-recomended', 'IndexController@feedRecomended');
Route::get('feed-highlight', 'IndexController@feedHighlight');

Route::get('search', 'PageController@search');
Route::get('feed-search', 'PageController@feedSearch');
Route::get('points', 'PageController@points');
Route::get('contact-us', 'PageController@contact')->name('contact');
Route::post('contact-us', 'PageController@addContact');
Route::get('events', 'PageController@events');
Route::get('about-us', 'PageController@about');
Route::get('terms-conditions', 'PageController@term');
Route::get('privacy-policy', 'PageController@privacy');
Route::get('live/{slug}', 'StreamController@stream');
Route::post('live/remind-me', 'StreamController@remindMe');
Route::post('live/views_counter', 'StreamController@addViews');
Route::get('tukarlangsung', function() {
    return redirect('/points', 302);
});


/* Game pages */
Route::get('games', 'GameController@game')->name('game-index');
Route::get('game-profile', 'GameController@gameProfile')->name('game-profile');
Route::get('game-running', 'GameController@run')->name('game-running');


Route::post('share-button-count', 'PostController@hitShareButton');


Route::get('email-verify', function () {
  return view('email.verification');
});
Route::get('email-success', function () {
  return view('email.success');
});
Route::get('email-complete', function () {
  return view('email.complete');
});

Route::get('interest', 'MemberController@interest');
Route::post('interest', 'MemberController@addInterest');
Route::get('member/login', 'MemberController@casLogin')->name('login');
Route::get('login', 'MemberController@memberLogin');
Route::get('member/logout', 'MemberController@memberLogout');

Route::get('gallery', 'GalleryController@index');
Route::get('gallery/photo', 'GalleryController@photo');
Route::get('gallery/video', 'GalleryController@video');
Route::get('photo/detail/{slug}', 'GalleryController@photoDetail');
Route::get('video/detail/{slug}', 'GalleryController@videoDetail');
Route::get('get-point-details', 'MemberController@getPoint');
Route::get('get-user-details', 'MemberController@getSsoDetail');

Route::get('tag/{hashtag}', 'PostController@tags');
Route::get('feed-tags', 'PostController@feedTags');
Route::post('p/collect/{id}', 'PostController@hitperform');

Route::get('sitemaps/sitemap.xml', 'PageController@sitemap');
Route::get('sitemaps/master.xml', 'PageController@sitemapMaster');
Route::get('sitemaps/photo.xml', 'PageController@sitemapPhoto');
Route::get('sitemaps/video.xml', 'PageController@sitemapVideo');
Route::get('sitemaps/{category}.xml', 'PageController@sitemapCategory');

Route::post('polling', 'PollingController@doVote');

/* image routes */
Route::get('/storage/{path}', 'StorageController@imageHandler')->where('path', '.+');
Route::get('/website/var/tmp/{path}', 'StorageController@oldImage')->where('path', '.+');
Route::get('/news/{year}/{path}', 'StorageController@oldImageNewsCover')->where('path', '.+');
Route::get('/news/{path}', 'StorageController@oldImageNewsCover')->where('path', '.+');
Route::get('/Community/{path}', 'StorageController@eventOldImage')->where('path', '.+');
Route::get('/gallery-photos/{path}', 'StorageController@galleryPhotoOldImage')->where('path', '.+');
Route::get('/{filename}.{extension}', 'StorageController@oldImageNewsCoverDirectFile');

Route::get('lensacommunity/{slug}', 'PostController@topPost');
Route::get('sneakerland/{slug}', 'PostController@topPost');
Route::get('relationship/{slug}', 'PostController@topPost');

Route::get('{category}', 'PostController@category');
Route::get('{category}/{subcategory}', 'PostController@subcategory')->name('subcategory');
Route::get('{category}/relationship85/{slug}', function($category, $slug) {
    return redirect(route('subcategory', [
        'category' => $category,
        'subcategory' => $slug
    ]), 301);
});
Route::get('{category}/{subcategory}/{slug}', 'PostController@detailPost');
//sementara
