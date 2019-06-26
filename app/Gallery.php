<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Auth;

class Gallery extends Model
{   
    use SoftDeletes;
	 /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'galleries';

    public static function newRecord($request)
    {
        $data= new Gallery;
        $data->value    = $request->get('value');
        $data->title    = $request->get('title');
        $data->album_id = $request->get('album_id');
        $data->type     = $request->get('type');
        $data->publish  = $request->get('publish');
        $data->user_id  = Auth::guard('admin')->id();

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

    public static function getData($paginate = 10, $album_id, $type = 'photo')
    {
        return self::where('publish', '1')->where('album_id', $album_id)->where('type', $type)->orderBy('created_at', 'DESC')->paginate($paginate);
    }

    public static function getPage($paginate = 10, $album_id, $pageNumber = 1, $type)
    {
        return self::where('publish', '1')->where('album_id', $album_id)->where('type', $type)->orderBy('created_at', 'DESC')->paginate($paginate, ['*'], 'page', $pageNumber);
    }

    public static function getCount($album_id, $type)
    {
        return self::where('publish', '1')->where('album_id', $album_id)->where('type', $type)->count();
    }

    public function album()
    {
        return $this->belongsTo('App\Album', 'album_id');
    }
}