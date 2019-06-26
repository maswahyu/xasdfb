<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	 /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'categories';

    public static function newRecord($request)
    {
        $data= new Category;
        $data->name = $request->get('name');

        $data->save();

        return $data;
    }

    public static function updateRecord($request, $id)
    {
        $data = Category::findOrFail($id);
        $data->name = $request->get('name');

        $data->save();

        return $data;
    }
}