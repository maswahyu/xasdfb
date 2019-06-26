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