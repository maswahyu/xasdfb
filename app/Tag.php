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

    public function news()
    {
        return $this->hasMany('App\News_tag', 'tag_id', 'id');
    }

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

    public static function newTag($name)
    {
        $data= new Tag;
        $data->name = $name;
        $data->slug  = str_slug($name);
        if (self::whereSlug($data->slug)->exists()) {
            $data->slug  = $data->slug.rand(1, 20);
        }

        $data->save();

        return $data;
    }
}