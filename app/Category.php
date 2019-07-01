<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cache;

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
        $data->name      = $request->get('name');
        $data->parent_id = $request->get('parent_id');
        $data->slug      = str_slug($request->get('name'));
        if (self::whereSlug($data->slug)->exists()) {
            $data->slug  = $data->slug.rand(1, 100);
        }

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

    public static function getMenu($parent_id = 0)
    {
        $value = Cache::rememberForever('menu-category', function () use ($parent_id) {

            return self::select('name','slug','parent_id')->where('parent_id', $parent_id)->get();
        });

        return $value;
    }

    public function getUrlAttribute()
    {
        return url('/'.$this->slug);
    }

    public function getSubUrlAttribute()
    {
        return url('/'.$this->parent->slug.'/'.$this->slug);
    }
}