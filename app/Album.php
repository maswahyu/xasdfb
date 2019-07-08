<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;

class Album extends Model
{
    use SearchableTrait;
	 /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'albums';

    protected $searchable = [
        'columns' => [
            'albums.name' => 10,
        ]
    ];

    // relationship
    public function photos() {
        return $this->hasMany('App\Gallery', 'album_id', 'id')->where('galleries.type', 'photo');
    }

    // repository
    public static function getSticky($take = 2)
    {
        return self::where('is_featured', 1)->orderBy('created_at', 'DESC')->take($take)->get();
    }

    public static function getLatest($take = 3)
    {
        return self::latest()->take($take)->get();
    }

    public static function getPage($pageNumber = 1, $paginate = 8)
    {
        return self::orderBy('created_at', 'DESC')->paginate($paginate, ['*'], 'page', $pageNumber);
    }

    public static function getSearch($pageNumber = 1, $query, $paginate = 8)
    {
        return self::orderBy('created_at', 'DESC')->search($query)->paginate($paginate, ['*'], 'page', $pageNumber);
    }

    public static function detail($slug)
    {
        return self::where('slug', $slug)->first();
    }

    // add attribure
    public function getUrlAttribute()
    {
        return url('photo/detail/'.$this->slug);
    }

    public function getThumbnailAttribute()
    {
        if (empty($this->image)) {
            if ($this->has('photos') && count($this->photos) > 0) {
                return $this->photos[0]->thumbnail;
            }

            /* if this album doesnt have photos, return empty string */
            return imageview('');
        }

        return imageview($this->image);
    }

    public function getCategoryAttribute()
    {
        return "photo";
    }

    public function getPublishedDateAttribute()
    {
        return optional($this->created_at)->format('j M Y');
    }

    public function getViewCountAttribute()
    {
        return rand(1, 999);
    }

    // admin crud record
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