<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Auth;
use Carbon\Carbon;
use Cache;
use Nicolaslopezj\Searchable\SearchableTrait;

class Gallery extends Model
{
    use SoftDeletes, SearchableTrait;

    const PHOTO = "photo";
    const VIDEO = "video";
    const STATUS_PUBLISHED = 1;
	 /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'galleries';

    protected $searchable = [
        'columns' => [
            'galleries.title' => 10,
        ]
    ];

    public static function getData($paginate = 10, $album_id, $type = self::VIDEO)
    {
        return self::where('publish', self::STATUS_PUBLISHED)->where('type', $type)->orderBy('created_at', 'DESC')->paginate($paginate);
    }

    public static function getPage($pageNumber = 1, $type = self::PHOTO, $paginate = 8)
    {
        return self::where('publish', self::STATUS_PUBLISHED)->where('type', $type)->latest()->paginate($paginate, ['*'], 'page', $pageNumber);
    }

    public static function getSearch($pageNumber = 1, $type = self::PHOTO, $query, $paginate = 8)
    {
        return self::where('publish', self::STATUS_PUBLISHED)->latest()->where('type', $type)->search($query)->paginate($paginate, ['*'], 'page', $pageNumber);
    }

    public static function getCount($album_id, $type)
    {
        return self::where('publish', self::STATUS_PUBLISHED)->where('album_id', $album_id)->where('type', $type)->count();
    }

    public static function getNewGallery($type = self::VIDEO, $take = 4)
    {
        $model = Cache::rememberForever('getNewGallery'.$type, function () use ($type, $take) {
            return self::where('publish', self::STATUS_PUBLISHED)->where('type', $type)->latest()->take($take)->get();
        });

        return $model;
    }

    public static function getGallery($type = self::VIDEO, $take = 4, $offset = 1)
    {
        $model = Cache::rememberForever('getGallery'.$type, function () use ($type, $take, $offset) {
            return self::where('publish', self::STATUS_PUBLISHED)
                    ->where('type', $type)
                    ->latest()
                    ->take($take)
                    ->skip($offset)
                    ->get();
        });

        return $model;
    }

    public static function getSticky($type = self::VIDEO)
    {
        $model = Cache::rememberForever('getGallerySticky'.$type, function () use ($type) {
            return self::where('publish', self::STATUS_PUBLISHED)->where('type', $type)->latest()->first();
        });

        return $model;
    }

    public static function detail($type = self::VIDEO, $slug)
    {
        return self::where('publish', self::STATUS_PUBLISHED)->where('type', $type)->where('slug', $slug)->first();
    }

    public function album()
    {
        return $this->belongsTo('App\Album', 'album_id');
    }

    public function getYoutubeIdAttribute()
    {
        $link = $this->value;
        $video_id = explode("?v=", $link);
        if (!isset($video_id[1])) {
            $video_id = explode("youtu.be/", $link);
        }
        $youtubeID = isset($video_id[1]) ? $video_id[1] : null;
        if (empty($video_id[1])) $video_id = explode("/v/", $link);
        $video_id = explode("&", $video_id[1]);
        $youtubeVideoID = $video_id[0];
        if ($youtubeVideoID) {
            return $youtubeVideoID;
        } else {
            return false;
        }
    }

    public function getUrlAttribute()
    {
        return ($this->type == Gallery::VIDEO) ? url('video/detail/'.$this->slug) : url('photo/detail/'.$this->slug);
    }

    public function getPublishedDateAttribute()
    {
        return optional($this->created_at)->format('j M Y');
    }

    public function getTitleLimitAttribute()
    {
        return str_limit($this->title, 40);
    }

    public function getDurationAttribute()
    {
        $duration = rand(300, 3000);
        return $duration < 3600 ? gmdate("i:s", $duration) : gmdate("H:i:s", $duration);
    }

    public function getViewCountAttribute()
    {
        return rand(1, 999);
    }

    public function getThumbnailAttribute()
    {
        return imageview($this->value);
    }

    public static function forgotCache()
    {
        Cache::forget('getGallerySticky'.self::VIDEO);
        Cache::forget('getGallery'.self::VIDEO);
    }

    public static function newRecord($request)
    {
        $data = new Gallery;
        $data->value       = $request->get('value');
        $data->title       = $request->get('title');
        $data->album_id    = $request->get('album_id');
        $data->type        = $request->get('type');
        $data->publish     = $request->get('publish');
        $data->user_id     = Auth::guard('admin')->id();
        $data->is_featured = $request->get('is_featured');
        $data->slug     = str_slug($request->get('title'));
        if (self::whereSlug($data->slug)->exists()) {
            $data->slug     = $data->slug.rand(1, 100);
        }

        $data->save();

        self::forgotCache();

        return $data;
    }

    public static function updateRecord($request, $id)
    {
        $data = Gallery::findOrFail($id);
        $data->value       = $request->get('value');
        $data->title       = $request->get('title');
        $data->album_id    = $request->get('album_id');
        $data->type        = $request->get('type');
        $data->publish     = $request->get('publish');
        $data->user_id     = Auth::guard('admin')->id();
        $data->is_featured = $request->get('is_featured');
        $data->save();

        self::forgotCache();

        return $data;
    }

    /**
     * Get gallery by publish
     *
     * @param $type
     * @return mixed
     */

    public function scopeByPublish($query)
    {
        return $query->where('publish', self::STATUS_PUBLISHED);
    }

    /**
     *
     * Get gallery by type
     * @param $query
     * @param $type
     * @return mixed
     */
    public function scopeByCategory($query, $type)
    {
        return $query->where("type", $type);
    }
}