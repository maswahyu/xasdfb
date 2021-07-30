<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cache;

class Prize extends Model
{
    const STATUS_PUBLISHED = 1;
	 /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'prizes';

    public static function newRecord($request)
    {
        $data= new Prize;
        $data->name    = $request->get('name');
        $data->category    = $request->get('category');
        $data->image   = $request->get('image');
        $data->poin    = $request->get('poin');
        $data->publish = $request->get('publish');

        $data->save();

        Cache::forget('all-prizes');

        return $data;
    }

    public static function updateRecord($request, $id)
    {
        $data = Prize::findOrFail($id);
        $data->name    = $request->get('name');
        $data->category    = $request->get('category');
        $data->image   = $request->get('image');
        $data->poin    = $request->get('poin');
        $data->publish = $request->get('publish');

        $data->save();

        Cache::forget('all-prizes');

        return $data;
    }

    public static function getData()
    {
        $value = Cache::rememberForever('all-prizes', function () {

            return self::select('name', 'category', 'image', 'poin')->where('publish', self::STATUS_PUBLISHED)->get();
        });

        return $value;
    }
}
