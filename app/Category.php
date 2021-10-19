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
    const STATUS_PUBLISHED = 1;
    const LENSA = 'lensacommunity';
    const SNEAKERLAND = 'sneakerland';
    const RELATIONSHIP = 'relationship';

    const NETWORKS_CATEGORY = ['LA Streetball', 'Scooterland'];

    public static function newRecord($request)
    {
        $data = new Category;
        $data->name        = $request->get('name');
        $data->parent_id   = $request->get('parent_id');
        $data->image       = $request->get('image');
        $data->description = $request->get('description');
        $data->publish     = $request->get('publish');
        $data->slug        = str_slug($request->get('name'));
        if (self::whereSlug($data->slug)->exists()) {
            $data->slug  = $data->slug.rand(1, 100);
        }

        $data->meta_title = $request->get('meta_title');
        $data->meta_description = $request->get('meta_description');
        $data->meta_keyword = $request->get('meta_keyword');

        $data->save();
        Cache::forget('menu-category');
        Cache::forget('get-interest');

        return $data;
    }

    public static function updateRecord($request, $id)
    {
        $data = Category::findOrFail($id);
        $data->name        = $request->get('name');
        $data->parent_id   = $request->get('parent_id');
        $data->image       = $request->get('image');
        $data->description = $request->get('description');
        $data->publish     = $request->get('publish');

        $data->meta_title = $request->get('meta_title');
        $data->meta_description = $request->get('meta_description');
        $data->meta_keyword = $request->get('meta_keyword');

        $data->save();

        Cache::forget('menu-category');
        Cache::forget('get-interest');
        Cache::forget('category'.$data->slug);

        return $data;
    }

    public static function detail($slug)
    {
        if (!Cache::has('category'.$slug)) {
            $data = self::where('slug', $slug)->where('publish', Category::STATUS_PUBLISHED)->first();
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

    public function subcategory() {
        return $this->hasMany(self::class, 'parent_id', 'id');
    }

    public function children() {
        return $this->hasMany(self::class, 'parent_id', 'id')->where('publish', self::STATUS_PUBLISHED);
    }

    public function menu() {
        return $this->hasMany(self::class, 'parent_id', 'id')->where('publish', self::STATUS_PUBLISHED)->whereNotIn('slug', [self::LENSA,self::SNEAKERLAND]);
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

            return self::select('name','slug','parent_id')->where('parent_id', $parent_id)->whereNotIn('name', self::NETWORKS_CATEGORY)->get();
        });

        return $value;
    }

    public static function getMenuNetworks($parent_id = 0)
    {
        $value = Cache::rememberForever('menu-category-networks', function () use ($parent_id) {

            return self::select('name','slug','parent_id')->where('parent_id', $parent_id)->whereIn('name', self::NETWORKS_CATEGORY)->get();
        });

        return $value;
    }

    public static function getInterest()
    {
        $value = Cache::rememberForever('get-interest', function () {
            return self::where('parent_id', '!=', self::TOP_PARENT)->where('publish', self::STATUS_PUBLISHED)->get();
        });

        return $value;
    }

    public static function getSitemap()
    {
        return self::where('parent_id', '!=', self::TOP_PARENT)->get();
    }

    public static function getMasterSitemap()
    {
        return self::where('parent_id', '!=', self::TOP_PARENT)->whereNotIn('slug', ['lensaphoto','sneakerland'])->get();
    }

    public function getUrlAttribute()
    {
        return ($this->parent_id == 0) ? url('/'.$this->slug) : self::getSubUrlAttribute();
    }

    public function getParentUrlAttribute()
    {
        if ($this->slug == self::LENSA) {
            return url(self::LENSA);
        }

        if ($this->slug == self::SNEAKERLAND) {
            return url(self::SNEAKERLAND);
        }

        if ($this->parent) {
            return $this->parent->url;
        } else {
            return $this->url;
        }
    }

    public function getSubUrlAttribute()
    {
        if ($this->slug == self::LENSA) {
            return url(self::LENSA);
        }

        if ($this->slug == self::SNEAKERLAND) {
            return url(self::SNEAKERLAND);
        }

        return url('/'.$this->parent->slug.'/'.$this->slug);
    }

    public function getImgAttribute()
    {
        return imageview($this->image);
    }

    /**
     * Get posts by publish
     *
     * @param $type
     * @return mixed
     */

    public function scopeByPublish($query)
    {
        return $query->where('publish', self::STATUS_PUBLISHED);
    }
}
