<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class News extends Model
{   
    use SoftDeletes;

    const NEWS = 'news';

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