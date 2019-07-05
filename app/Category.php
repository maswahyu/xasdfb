<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cache;
use Auth;

class Category extends Model
{
	 /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'categories';

    const TOP_PARENT = 0;

    public static function newRecord($request)
    {
        $data = new Category;
        $data->name        = $request->get('name');
        $data->parent_id   = $request->get('parent_id');
        $data->image       = $request->get('image');
        $data->description = $request->get('description');
        $data->slug        = str_slug($request->get('name'));
        if (self::whereSlug($data->slug)->exists()) {
            $data->slug  = $data->slug.rand(1, 100);
        }

        $data->save();

        return $data;
    }

    public static function updateRecord($request, $id)
    {
        $data = Category::findOrFail($id);
        $data->name        = $request->get('name');
        $data->parent_id   = $request->get('parent_id');
        $data->image       = $request->get('image');
        $data->description = $request->get('description');

        $data->save();

        return $data;
    }

    public static function detail($slug)
    {
        if (!Cache::has('category'.$slug)) {
            $data = self::where('slug', $slug)->first();
            Cache::forever('category'.$slug, $data);
        }

        return Cache::get('category'.$slug);
    }

    public function parent() {
        return $this->belongsTo(self::class, 'parent_id');
    }

    public function postOne() {
        return $this->hasOne('App\News', 'category_id')
                ->where('publish', 1)
                ->where('is_featured', 1)
                ->orderBy('featured_at', 'desc');
    }

    public function children() {
        return $this->hasMany(self::class, 'parent_id', 'id');
    }

    public function menu() {
        return $this->hasMany(self::class, 'parent_id', 'id')->whereNotIn('slug', ['lensaphoto','sneakerland']);
    }

    public function subscribe() {
        return $this->hasMany('App\Subscribe', 'category_id', 'id')->where('user_id', Auth::id());
    }

    public function isChecked(){

        $ids = self::subscribe()->pluck('category_id');

        return collect($ids)
            ->contains($this->id) ? 'checked' : '';
    }

    public static function getMenu($parent_id = 0)
    {
        $value = Cache::rememberForever('menu-category', function () use ($parent_id) {

            return self::select('name','slug','parent_id')->where('parent_id', $parent_id)->get();
        });

        return $value;
    }

    public static function getInterest()
    {
        return self::where('parent_id', '!=', self::TOP_PARENT)->get();
    }

    public function getUrlAttribute()
    {
        return url('/'.$this->slug);
    }

    public function getSubUrlAttribute()
    {
        return url('/'.$this->parent->slug.'/'.$this->slug);
    }

    public function getImgAttribute()
    {
        return imageview($this->image);
    }
}