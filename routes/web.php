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


function randomCategory()
{
    $category = ['Lifestyle', 'Entertaiment', 'Inspiration', 'Lensa', 'Sneakerland', 'Music', 'Movie'];
    return $category[rand(0, count($category) - 1)];
}

Route::get('/', 'IndexController@index')->name('index');
Route::get('/feed', 'IndexController@feed');
Route::get('/feed-photo', 'IndexController@feedPhoto');
Route::get('/feed-video', 'IndexController@feedVideo');
Route::get('/feed-event', 'PageController@feedEvent');

Route::get('search', 'PageController@search');
Route::get('points', 'PageController@points');
Route::get('contact-us', 'PageController@contact')->name('contact');
Route::post('contact-us', 'PageController@addContact');
Route::get('events', 'PageController@events');
Route::get('interest', 'MemberController@interest');

Route::get('gallery', 'GalleryController@video');
Route::get('gallery/photo', 'GalleryController@photo');
Route::get('gallery/video', 'GalleryController@video');
Route::get('photo/detail/{slug}', 'GalleryController@photoDetail');
Route::get('video/detail/{slug}', 'GalleryController@videoDetail');

Route::get('tags/{slug}', 'PostController@tags');

Route::get('{category}', 'PostController@category');
Route::get('{category}/{subcategory}', 'PostController@subcategory');
Route::get('{category}/{subcategory}/{slug}', 'PostController@detailPost');