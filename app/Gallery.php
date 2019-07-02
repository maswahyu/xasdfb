<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Auth;
use Carbon\Carbon;

class Gallery extends Model
{   
    use SoftDeletes;

    const PHOTO = "photo";
    const VIDEO = "video";
	 /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'galleries';

    public static function getData($paginate = 10, $album_id, $type = self::VIDEO)
    {
        return self::where('publish', 1)->where('type', $type)->orderBy('created_at', 'DESC')->paginate($paginate);
    }

    public static function getPage($pageNumber = 1, $type = self::PHOTO, $paginate = 8)
    {
        return self::where('publish', 1)->where('type', $type)->orderBy('created_at', 'DESC')->paginate($paginate, ['*'], 'page', $pageNumber);
    }

    public static function getCount($album_id, $type)
    {
        return self::where('publish', 1)->where('album_id', $album_id)->where('type', $type)->count();
    }

    public static function getGallery($type = self::VIDEO, $take = 4)
    {
        return self::where('publish', 1)->where('type', $type)->orderBy('created_at', 'DESC')->take($take)->get();
    }

    public static function getSticky($type = self::VIDEO)
    {
        return self::where('publish', 1)->where('type', $type)->where('is_featured', 1)->orderBy('created_at', 'DESC')->first();
    }

    public static function detail($type = self::VIDEO, $slug)
    {   
        return self::where('publish', 1)->where('type', $type)->where('slug', $slug)->first();
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
        $youtubeID = $video_id[1];
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
        $duration = rand(300, 3600);
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

    public static function newRecord($request)
    {   
        $data = new Gallery;
        $data->value    = $request->get('value');
        $data->title    = $request->get('title');
        $data->album_id = $request->get('album_id');
        $data->type     = $request->get('type');
        $data->publish  = $request->get('publish');
        $data->user_id  = Auth::guard('admin')->id();
        $data->slug     = str_slug($request->get('title'));
        if (self::whereSlug($data->slug)->exists()) {
            $data->slug     = $data->slug.rand(1, 100);
        }

        $data->save();

        return $data;
    }

    public static function updateRecord($request, $id)
    {
        $data = Gallery::findOrFail($id);
        $data->value    = $request->get('value');
        $data->title    = $request->get('title');
        $data->album_id = $request->get('album_id');
        $data->type     = $request->get('type');
        $data->publish  = $request->get('publish');
        $data->user_id  = Auth::guard('admin')->id();

        $data->save();

        return $data;
    }
}