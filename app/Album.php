<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;
use Cache;

class Album extends Model
{
    use SearchableTrait;

    const STATUS_PUBLISHED = 1;
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
        $model = Cache::tags('album')->rememberForever('getAlbumSticky', function () use ($take) {

            return self::where('publish', self::STATUS_PUBLISHED)
                    ->latest()
                    ->take($take)
                    ->get();

        });

        return $model;
    }

    public static function getLatest($take = 3, $offset = 2)
    {   
        $model = Cache::tags('album')->rememberForever('getAlbumLatest', function () use ($take, $offset) {

            return self::where('publish', self::STATUS_PUBLISHED)
                    ->latest()
                    ->take($take)
                    ->skip($offset)
                    ->get();
        });

        return $model;
    }

    public static function getPage($pageNumber = 1, $paginate = 8)
    {
        return self::where('publish', self::STATUS_PUBLISHED)->orderBy('created_at', 'DESC')->paginate($paginate, ['*'], 'page', $pageNumber);
    }

    public static function getSearch($pageNumber = 1, $query, $paginate = 8)
    {
        return self::where('publish', self::STATUS_PUBLISHED)->orderBy('created_at', 'DESC')->search($query)->paginate($paginate, ['*'], 'page', $pageNumber);
    }

    public static function detail($slug)
    {   
        return self::where('publish', self::STATUS_PUBLISHED)->where('slug', $slug)->first();
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
        $data->publish = $request->get('publish');
        $data->slug  = str_slug($request->get('name'));
        if (self::whereSlug($data->slug)->exists()) {
            $data->slug  = $data->slug.rand(1, 100);
        }

        $data->save();

        Cache::tags('album')->flush();

        return $data;
    }

    public static function updateRecord($request, $id)
    {
        $data = Album::findOrFail($id);
        $data->name = $request->get('name');
        $data->image = $request->get('image');
        $data->publish = $request->get('publish');

        $data->save();

        Cache::tags('album')->flush();

        return $data;
    }

    /**
     * Get gallery by publish
     *
     * @param $type
     * @return mixed
     */

    public function scopeByPublish($query)
    {
        return $query->where('publish', self::STATUS_PUBLISHED);
    }
}