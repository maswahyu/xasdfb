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
Route::get('/feed', 'IndexController@feed');
Route::get('/feed-photo', 'GalleryController@feedPhoto');
Route::get('/feed-video', 'GalleryController@feedVideo');
Route::get('/feed-event', 'PageController@feedEvent');

Route::get('search', 'PageController@search');
Route::get('points', 'PageController@points');
Route::get('contact-us', 'PageController@contact')->name('contact');
Route::post('contact-us', 'PageController@addContact');
Route::get('events', 'PageController@events');

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

Route::get('tags/{slug}', 'PostController@tags');

/* handle images from old storage */
// image dari news content dan news thumbnail
Route::get('/website/var/tmp/{path}', 'StorageController@oldImage')->where('path', '.+');
// image dari news cover
Route::get('/news/{year}/{path}', 'StorageController@oldImageNewsCover')->where('path', '.+');
// image dari news cover yg langsung file name
Route::get('/{filename}.{extension}', 'StorageController@oldImageNewsCoverDirectFile');

Route::get('{category}', 'PostController@category');
Route::get('{category}/{subcategory}', 'PostController@subcategory');
Route::get('{category}/{subcategory}/{slug}', 'PostController@detailPost');