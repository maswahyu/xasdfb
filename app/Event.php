<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;

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
        return self::where('publish', 1)->where('is_featured', 1)->orderBy('updated_at', 'desc')->take($take)->get();
    }

    public static function getPage($pageNumber = 1, $paginate = 5)
    {
        return self::where('publish', 1)->orderBy('created_at', 'DESC')->paginate($paginate, ['*'], 'page', $pageNumber);
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