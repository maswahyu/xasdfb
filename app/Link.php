<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cache;

class Link extends Model
{
	 /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'links';

    public static function newRecord($request)
    {
        $data= new Link;
        $data->name = $request->get('name');
        $data->url = $request->get('url');

        $data->save();

        return $data;
    }

    public static function updateRecord($request, $id)
    {
        $data = Link::findOrFail($id);
        $data->name = $request->get('name');
        $data->url = $request->get('url');

        $data->save();

        return $data;
    }

    public static function getMenu()
    {
        $value = Cache::rememberForever('menu-link', function () {

            return self::select('name','url')->get();
        });

        return $value;
    }
}