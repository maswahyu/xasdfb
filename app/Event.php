<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;
use Carbon\Carbon;

class Event extends Model
{
    const STATUS_PUBLISHED = 1;
	 /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'events';

    public static function getSticky($pageNumber = 1, $paginate = 4)
    {
        $date = Carbon::today()->toDateString();
        return self::where('publish', self::STATUS_PUBLISHED)->where('start_at', '>=', $date)->orWhere('end_at', '>=', $date)->orderBy('start_at', 'ASC')->paginate($paginate, ['*'], 'page', $pageNumber);
    }

    public static function getPage($pageNumber = 1, $paginate = 5)
    {
        $date = Carbon::today()->toDateString();
        return self::where('publish', self::STATUS_PUBLISHED)->where('start_at', '<', $date)->orderBy('start_at', 'DESC')->paginate($paginate, ['*'], 'page', $pageNumber);
    }

    public function getStartAtJAttribute()
    {
        return Carbon::parse($this->start_at)->format('j');
    }

    public function getStartAtMAttribute()
    {
        return Carbon::parse($this->start_at)->format('M y');
    }

    public function getStartAtCAttribute()
    {
        return Carbon::parse($this->start_at)->format('j M Y');
    }

    public function getStartAtDateAttribute()
    {
        return Carbon::parse($this->start_at)->format('Y-m-d');
    }

    public function getEndAtDateAttribute()
    {
        return Carbon::parse($this->end_at)->format('Y-m-d');
    }

    public function user()
    {
        return $this->belongsTo('App\Admin', 'created_by');
    }

    public static function newRecord($request)
    {
        $data = new Event;
        $data->created_by  = Auth::guard('admin')->id();
        $data->slug        = str_slug($request->get('title')).'-'.self::generateRandomString();
        $data->title       = $request->get('title');
        $data->publish     = $request->get('publish');
        $data->is_featured = 0;
        $data->image       = $request->get('image');
        $data->summary     = $request->get('summary');
        $data->content     = $request->get('content');
        $data->start_at    = $request->get('start_at');
        $data->end_at      = $request->get('end_at');

        $data->save();

        return $data;
    }

    public static function updateRecord($request, $id)
    {
        $data = Event::findOrFail($id);
        $data->created_by  = Auth::guard('admin')->id();
        $data->title       = $request->get('title');
        $data->publish     = $request->get('publish');
        $data->is_featured = 0;
        $data->image       = $request->get('image');
        $data->summary     = $request->get('summary');
        $data->content     = $request->get('content');
        $data->start_at    = $request->get('start_at');
        $data->end_at      = $request->get('end_at');

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

    /**
     * Get event by publish
     *
     * @param $type
     * @return mixed
     */

    public function scopeByPublish($query)
    {
        return $query->where('publish', self::STATUS_PUBLISHED);
    }
}