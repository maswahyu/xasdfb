<?php

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Routes file for magic
|
*/

Route::get('magic/login', 'Auth\LoginController@showLoginForm')->name('admin-login');
Route::post('magic/login', 'Auth\LoginController@login')->name('admin-login');
Route::post('magic/logout', 'Auth\LoginController@logout')->name('admin-logout');

Route::group(['middleware' => 'has_any_role:admin','namespace' => 'Admin'], function() {

    Route::prefix('magic')->group(function () {
        Route::resource('users', 'UsersController');
        Route::get('userlist', 'UsersController@getdata');
        Route::get('useraction', 'UsersController@useraction');
    });

    Route::get('site/settings', 'SettingController@index')->name('site.settings');
    Route::post('site/settings', 'SettingController@update');
    Route::get('site/terms_policy', 'SettingController@termpolicy')->name('site.terms_policy');
    Route::post('site/terms_policy', 'SettingController@updatetp');

    Route::get('site/website', ['uses' => 'SettingController@all']);
    Route::post('site/save', ['uses' => 'SettingController@save']);
    Route::get('site/flush-cache', ['uses' => 'SettingController@flushCache']);
});

Route::group(['middleware' => 'has_any_role:admin,editor', 'namespace' => 'Admin'], function() {

    Route::prefix('magic')->group(function () {
        Route::get('home', 'DashboardController@versionone')->name('adminpage');
        Route::get('profile', 'UsersController@profile');
        Route::patch('profile/{id}', 'UsersController@updateProfile');

        Route::get('filemanager', 'SettingController@filemanager');
        Route::resource('news', 'NewsController');
        Route::get('newslist', 'NewsController@list');
        Route::get('collect', 'DashboardController@collect');
        Route::resource('gallery', 'GalleryController');
        Route::get('gallerylist', 'GalleryController@list');
        Route::resource('member', 'MemberController');
        Route::get('memberlist', 'MemberController@list');
        Route::resource('category', 'CategoryController');
        Route::get('categorylist', 'CategoryController@list');
        Route::resource('album', 'AlbumController');
        Route::get('albumlist', 'AlbumController@list');
        Route::resource('tag', 'TagController');
        Route::get('taglist', 'TagController@list');
        Route::resource('link', 'LinkController');
        Route::get('linklist', 'LinkController@list');
        Route::resource('event', 'EventController');
        Route::get('eventlist', 'EventController@list');
        Route::resource('slide', 'SlideController');
        // Route::get('slidelist', 'SlideController@list');
        Route::get('slidelist', 'SlideController@listAjax');
        Route::resource('bannerwifi', 'BannerWifiController');
        Route::get('bannerwifilist', 'BannerWifiController@list');

        Route::get('loadtags', 'NewsController@loadTagData');
        Route::get('loadalbum', 'GalleryController@loadAlbum');
        Route::get('loadtagsnews/{id}', 'NewsController@loadTagNews');

        Route::resource('prize', 'PrizeController');
        Route::get('prizelist', 'PrizeController@list');
    });

    Route::get('contact/list', 'ContactController@index');
    Route::get('contact/list/{id}', 'ContactController@show');
    Route::delete('contact/list/{id}', 'ContactController@destroy');
    Route::get('contact/get', 'ContactController@list');
    Route::post('contact/del', 'ContactController@forcetrash');
});
