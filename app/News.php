<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Auth;

class News extends Model
{   
    use SoftDeletes;

    const NEWS = 'news';

    public static function newRecord($request)
    {
        $data = new self;
        $data->title       = $request->get('title');
        $data->image       = $request->get('image');  
        $data->summary     = $request->get('summary');
        $data->content     = $request->get('content'); 
        $data->publish     = $request->get('publish');
        $data->category_id = $request->get('category_id');
        $data->user_id     = Auth::guard('admin')->id();
        $data->slug        = str_slug($request->get('title')).'-'.self::generateRandomString();  
        $data->save();

        return $data;
    }

    public static function updateRecord($request, $id)
    {
        $data = self::findOrFail($id);
        $data->title       = $request->get('title');
        $data->image       = $request->get('image');  
        $data->summary     = $request->get('summary');
        $data->content     = $request->get('content'); 
        $data->publish     = $request->get('publish');
        $data->category_id = $request->get('category_id');
        $data->user_id     = Auth::guard('admin')->id();
        $data->save();

        return $data;
    }

    public static function generateRandomString($length = 5) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    public static function getNews($paginate = 10)
    {
        return self::where('publish', '1')->orderBy('created_at', 'DESC')->paginate($paginate);  
    }

    public static function getPage($paginate = 10, $pageNumber = 1)
    {
        return self::where('publish', '1')->orderBy('created_at', 'DESC')->paginate($paginate, ['*'], 'page', $pageNumber);
    }

    public static function detail($slug)
    {   
        return self::where('publish', '1')->where('slug', $slug)->first();
    }    

    public static function related($slug)
    {
        return self::where('publish', '1')->where('slug', '!=', $slug)->take(3)->get();
    }
	/**
     * Post belongs to user
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\Admin', 'user_id');
    }

    public function category()
    {
        return $this->belongsTo('App\Category', 'category_id');
    }
}