<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cache;

class Slide extends Model
{
	 /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'slides';

    public static function getFeatured($take = 5)
    {   
        $model = Cache::rememberForever('getFeatured', function () use ($take) {
            return self::where('publish', 1)->where('is_featured', 1)->orderBy('updated_at', 'DESC')->take($take)->get();
        });

        return $model;
    }

    public static function newRecord($request)
    {
        $data= new Slide;
        $data->is_featured = $request->get('is_featured');
        $data->publish     = $request->get('publish');
        $data->image       = $request->get('image');
        $data->url         = $request->get('url');
        $data->title       = $request->get('title');

        $data->save();
        Cache::forget('getFeatured');

        return $data;
    }

    public static function updateRecord($request, $id)
    {
        $data = Slide::findOrFail($id);
        $data->is_featured = $request->get('is_featured');
        $data->publish     = $request->get('publish');
        $data->image       = $request->get('image');
        $data->url         = $request->get('url');
        $data->title       = $request->get('title');

        $data->save();

        Cache::forget('getFeatured');

        return $data;
    }
}