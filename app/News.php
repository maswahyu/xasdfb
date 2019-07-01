<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Auth;
use App\Tag;
use App\News_tag;
use Carbon\Carbon;

class News extends Model
{   
    use SoftDeletes;

    const NEWS = 'news';

    protected $dates = ['published_at'];

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

        $tags = $request->get('tags');
        if ($tags) {
            self::insertNewsTag($data->id, $tags);
        }

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

        $tags = $request->get('tags');
        if ($tags) {
            self::updateNewsTag($data->id, $tags);   
        }

        return $data;
    }

    public static function insertNewsTag($news_id, $tags)
    {
        if ($tags) {
            foreach ($tags as $tag_id) {
                if (Tag::find($tag_id)) {
                    $tag = News_tag::newNewsTag($news_id, $tag_id);
                } else {
                    $tag = Tag::newTag($tag_id);
                    News_tag::newNewsTag($news_id, $tag->id);
                }
            }
        }
    }

    public static function updateNewsTag($news_id, $tags)
    {   
        // delete news tags
        News_tag::where('news_id', $news_id)->delete();

        // insert ulang
        self::insertNewsTag($news_id, $tags);
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

    public static function getFeed($paginate = 10)
    {
        return self::where('publish', 1)->orderBy('created_at', 'DESC')->paginate($paginate);  
    }

    public static function getPage($pageNumber = 1, $paginate = 10)
    {
        return self::where('publish', 1)->orderBy('created_at', 'DESC')->paginate($paginate, ['*'], 'page', $pageNumber);
    }

    public static function detail($slug)
    {   
        return self::where('publish', 1)->where('slug', $slug)->first();
    }    

    public static function related($slug)
    {
        return self::where('publish', 1)->where('slug', '!=', $slug)->take(3)->get();
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

    public function tags() {
        return $this->hasMany('App\News_tag', 'news_id', 'id');
    }

    public function isSelected($id){

        if(!($ids = old('tags'))) {
            $ids = self::tags()->pluck('tag_id');
        }

        return collect($ids)
            ->contains($id) ? 'selected' : '';
    }

    public static function getHighlight()
    {
        return self::where('publish', 1)->where('is_highlight', 1)->orderBy('updated_at', 'desc')->first();
    }

    public static function getMustReads($take = 2)
    {
        return self::where('publish', 1)->where('is_featured', 1)->orderBy('updated_at', 'desc')->take($take)->get();
    }

    public static function getRecommended($take = 5)
    {
        return self::where('publish', 1)->orderBy('updated_at', 'desc')->take($take)->get();
    }

    public static function getTrending($take = 4)
    {
        return self::where('publish', 1)->orderBy('updated_at', 'asc')->take($take)->get();
    }

    public static function getLatest($take = 4)
    {
        return self::where('publish', 1)->latest()->take($take)->get();
    }

    public static function getSticky($take = 4)
    {
        return self::where('publish', 1)->where('is_featured', 1)->latest()->take($take)->get();
    }

    public function getUrlAttribute()
    {
        return url($this->category->parent->slug.'/'.$this->getCategorySlugAttribute().'/'.$this->slug);
    }

    public function getThumbnailAttribute()
    {
        return imageview($this->image);
    }

    public function getPublishedDateAttribute()
    {
        return optional($this->published_at)->format('j M Y');
    }

    public function getCategoryNameAttribute()
    {
        return ($this->category->name) ? $this->category->name : 'lazone'; 
    }

    public function getCategorySlugAttribute()
    {
        return ($this->category->slug) ? $this->category->slug : 'lazone'; 
    }    

    public function getTitleLimitAttribute()
    {
        return str_limit($this->title, 40);
    }

    public function getViewCountAttribute()
    {
        return rand(1, 999);
    }

}