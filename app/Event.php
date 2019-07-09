<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;
use Carbon\Carbon;

class Event extends Model
{
	 /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'events';

    public static function getSticky($take = 4)
    {
        $date = Carbon::today()->toDateString();
        return self::where('publish', 1)->where('start_at', '>=', $date)->orWhere('end_at', '>=', $date)->orderBy('start_at', 'ASC')->take($take)->get();
    }

    public static function getPage($pageNumber = 1, $paginate = 5)
    {
        $date = Carbon::today()->toDateString();
        return self::where('publish', 1)->where('start_at', '<', $date)->orderBy('start_at', 'DESC')->paginate($paginate, ['*'], 'page', $pageNumber);
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
        $data->is_featured = $request->get('is_featured');
        $data->image       = $request->get('image');
        $data->summary     = $request->get('summary');
        $data->content     = $request->get('content');

        $data->save();

        return $data;
    }

    public static function updateRecord($request, $id)
    {
        $data = Event::findOrFail($id);
        $data->created_by  = Auth::guard('admin')->id();
        $data->title       = $request->get('title');
        $data->publish     = $request->get('publish');
        $data->is_featured = $request->get('is_featured');
        $data->image       = $request->get('image');
        $data->summary     = $request->get('summary');
        $data->content     = $request->get('content');

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
}