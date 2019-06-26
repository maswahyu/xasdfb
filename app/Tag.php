<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
	 /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tags';

    public static function newRecord($request)
    {
        $data= new Tag;
        $data->name = $request->get('name');
        $data->slug  = str_slug($request->get('name'));
        if (self::whereSlug($data->slug)->exists()) {
            $data->slug  = $data->slug.rand(1, 100);
        }

        $data->save();

        return $data;
    }

    public static function updateRecord($request, $id)
    {
        $data = Tag::findOrFail($id);
        $data->name = $request->get('name');

        $data->save();

        return $data;
    }
}