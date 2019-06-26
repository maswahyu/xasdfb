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
        $data->parent_id = $request->get('parent_id');
        $data->slug = str_slug($request->get('name'));

        $data->save();

        return $data;
    }

    public static function updateRecord($request, $id)
    {
        $data = Category::findOrFail($id);
        $data->name = $request->get('name');
        $data->parent_id = $request->get('parent_id');

        $data->save();

        return $data;
    }

    public function parent() {
        return $this->belongsTo(self::class, 'parent_id');
    }

    public function children() {
        return $this->hasMany(self::class, 'parent_id', 'id');
    }
}