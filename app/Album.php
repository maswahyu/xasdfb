<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
	 /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'albums';

    public static function newRecord($request)
    {
        $data = new Album;
        $data->name  = $request->get('name');
        $data->image = $request->get('image');
        $data->slug  = str_slug($request->get('name'));
        if (self::whereSlug($data->slug)->exists()) {
            $data->slug  = $data->slug.rand(1, 100);
        }

        $data->save();

        return $data;
    }

    public static function updateRecord($request, $id)
    {
        $data = Album::findOrFail($id);
        $data->name = $request->get('name');
        $data->image = $request->get('image');

        $data->save();

        return $data;
    }
}