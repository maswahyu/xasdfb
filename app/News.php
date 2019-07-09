<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Auth;
use App\Tag;
use App\News_tag;
use Carbon\Carbon;
use App\Model\Stats;
use Cache;
use Nicolaslopezj\Searchable\SearchableTrait;

class News extends Model
{
    use SoftDeletes, SearchableTrait;

    const STATUS_UNPUBLISHED = 0;
    const STATUS_PUBLISHED = 1;
    const STATUS_SCHEDULED = 2;

    const NEWS = 'news';
    const TAKE_RECOMENDED = 5;

    protected $dates = ['published_at'];

    protected $searchable = [
        'columns' => [
            'news.title' => 10,
            'news.slug' => 5,
        ]
    ];

    public static function getFeed($paginate = 10)
    {
        return self::where('publish', self::STATUS_PUBLISHED)->latest('published_at')->paginate($paginate);
    }

    public static function getPage($pageNumber = 1, $paginate = 10)
    {
        return self::where('publish', self::STATUS_PUBLISHED)->latest('published_at')->paginate($paginate, ['*'], 'page', $pageNumber);
    }

    public static function getNewsTags($pageNumber = 1, $hashtag, $paginate = 10)
    {
        $tags  = Tag::where('slug', $hashtag)->first();

        return self::where('publish', self::STATUS_PUBLISHED)->whereIn('id', $tags->news->pluck('news_id'))->latest('published_at')->paginate($paginate, ['*'], 'page', $pageNumber);
    }

    public static function getSearch($pageNumber = 1, $query, $paginate = 10)
    {
        return self::where('publish', self::STATUS_PUBLISHED)->search($query)->paginate($paginate, ['*'], 'page', $pageNumber);
    }

    public static function detail($slug)
    {
        if (!Cache::has('post'.$slug)) {
            $data = self::where('publish', self::STATUS_PUBLISHED)->where('slug', $slug)->first();
            Cache::forever('post'.$slug, $data);
        }

        return Cache::get('post'.$slug);
    }

    public static function related($slug, $category_id)
    {
        return self::where('publish', self::STATUS_PUBLISHED)->where('category_id', $category_id)->where('slug', '!=', $slug)->take(3)->get();
    }

    public function user()
    {
        return $this->belongsTo('App\Admin', 'user_id');
    }

    public function category()
    {
        return $this->belongsTo('App\Category', 'category_id');
    }

    public function tags() {
        return $this->hasMany('App\News_tag', 'news_id', 'id');
    }

    public function isSelected($id){

        if(!($ids = old('tags'))) {
            $ids = self::tags()->pluck('tag_id');
        }

        return collect($ids)
            ->contains($id) ? 'selected' : '';
    }

    public static function forgotCache()
    {
        Cache::forget('getHighlight');
        Cache::forget('getMustReads');
        Cache::forget('getRecommended');
    }

    public static function getHighlight()
    {
        $model = Cache::rememberForever('getHighlight', function () {
            return self::where('publish', self::STATUS_PUBLISHED)->where('is_highlight', 1)->orderBy('highlight_at', 'desc')->first();
        });

        return $model;
    }

    public static function getMustReads($take = 2)
    {
        $model = Cache::rememberForever('getMustReads', function () use ($take) {

            return self::where('publish', self::STATUS_PUBLISHED)->where('is_mustread', 1)->orderBy('mustread_at', 'desc')->take($take)->get();
        });

        return $model;
    }

    public static function getRecommended($take = self::TAKE_RECOMENDED)
    {
        $model = Cache::rememberForever('getRecommended', function () use ($take) {
            return self::where('publish', self::STATUS_PUBLISHED)->latest('published_at')->groupBy('category_id')->take($take)->get();
        });

        if (Auth::check()) {
            $interest = Auth::user()->subscribe()->pluck('category_id');
            if(count($interest) > 0) {

                if (count($interest) < self::TAKE_RECOMENDED) {

                    $model = Cache::rememberForever('getRecommended-'.Auth::id(), function () use ($take, $interest) {
                        return self::where('publish', self::STATUS_PUBLISHED)->whereIn('category_id', $interest)->latest('published_at')->take($take)->get();
                    });

                } else {

                    $model = Cache::rememberForever('getRecommended5-'.Auth::id(), function () use ($take, $interest) {
                        return self::where('publish', self::STATUS_PUBLISHED)->whereIn('category_id', $interest)->latest('published_at')->groupBy('category_id')->take($take)->get();
                    });
                }
            }
        }

        return $model;
    }

    public static function getTrending($take = 4)
    {
        $expiresAt = Carbon::now()->endOfDay()->addSecond();
        $from      = Carbon::now()->subDays(7)->toDateString();
        $to        = Carbon::now()->toDateString();

        $model = Cache::remember('getTrendings', $expiresAt, function () use ($take, $from, $to) {
            return self::where('news.publish', 1)->whereBetween('news.published_at', [$from, $to])->groupBy('category_id')->getStats('all_time_stats', 'DESC', $take)->get();
        });

        return $model;
    }

    public static function getLatest($take = 4, $category)
    {
        $model = Cache::remember('getLatest'.$category->id, 180, function () use ($take, $category) {

            if ($category->parent_id == 0) {

                return self::where('publish', self::STATUS_PUBLISHED)
                        ->whereIn('category_id', $category->children()->pluck('id'))
                        ->latest('published_at')
                        ->take($take)->get();

            }else {

                return self::where('publish', self::STATUS_PUBLISHED)
                        ->where('category_id', $category->id)
                        ->latest('published_at')
                        ->take($take)->get();
            }


        });

        return $model;
    }

    public static function getSticky($take = 4, $category)
    {
        $model = Cache::remember('getSticky'.$category->id, 3600, function () use ($take, $category) {
            if ($category->parent_id == 0) {
                return self::where('publish', self::STATUS_PUBLISHED)
                        ->whereIn('category_id',  $category->children()->pluck('id'))
                        ->where('is_featured', 1)
                        ->orderBy('featured_at', 'desc')
                        ->take($take)->get();
            } else {
                return self::where('publish', self::STATUS_PUBLISHED)
                        ->where('category_id', $category->id)
                        ->where('is_featured', 1)
                        ->orderBy('featured_at', 'desc')
                        ->take($take)->get();
            }
        });

        return $model;
    }

    public static function getCatRecomended($take = 5, $category)
    {
        $model = Cache::remember('getCatRecomended'.$category->id, 3600, function () use ($take, $category) {

            if ($category->parent_id == 0) {

                return self::where('publish', self::STATUS_PUBLISHED)
                        ->whereIn('category_id', $category->children()->pluck('id'))
                        ->oldest()
                        ->take($take)->get();
            } else {

                return self::where('publish', self::STATUS_PUBLISHED)
                        ->where('category_id', $category->id)
                        ->oldest()
                        ->take($take)->get();
            }


        });

        return $model;
    }

    public function getUrlAttribute()
    {
        return isset($this->category->parent) ?
            url($this->category->parent->slug.'/'.$this->getCategorySlugAttribute().'/'.$this->slug) :
            url('lifestyle/style/'.$this->slug);
    }

    public function getThumbnailAttribute()
    {
        return imageview($this->image);
    }

    public function getPublishedDateAttribute()
    {
        return optional($this->published_at)->format('j M Y');
    }

    public function getParentNameAttribute()
    {
        return isset($this->category) && isset($this->category->parent) ?
                optional($this->category->parent)->name :
                'Lifestyle';
    }

    public function getCategoryNameAttribute()
    {
        return (isset($this->category) && $this->category->name) ? $this->category->name : 'style';
    }

    public function getCategorySlugAttribute()
    {
        return (isset($this->category) && $this->category->slug) ? $this->category->slug : 'style';
    }

    public function getTitleLimitAttribute()
    {
        return str_limit($this->title, 40);
    }

    public function getViewCountAttribute()
    {
        return isset($this->popularityStats->all_time_stats) ? number_format_short($this->popularityStats->all_time_stats + $this->view) : number_format_short($this->view);
    }

    public function getPublishBadgeAttribute()
    {
        switch ($this->publish) {
            case self::STATUS_PUBLISHED:
                $level = 'success';
                $status = 'Yes';
                break;

            case self::STATUS_SCHEDULED:
                $level = 'warning';
                $status = 'Scheduled';
                break;

            case self::STATUS_UNPUBLISHED:
            default:
                $level = 'danger';
                $status = 'No';
                break;
        }

        return sprintf('<span class="badge badge-%s">%s</span>', $level, $status);
    }

    /**
     * Get post stats
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphOne
     */
    public function popularityStats()
    {
        return $this->morphOne('App\Model\Stats', 'trackable');
    }

    public function hit()
    {
        //check if a polymorphic relation can be set
        if($this->exists){
            $stats = $this->popularityStats()->first();

            if( empty( $stats ) ){
                //associates a new Stats instance for this instance
                $stats = new Stats();
                $this->popularityStats()->save($stats);
            }

            return $stats->updateStats();
        }
        return false;
    }

    /**
     * Get posts by stats
     *
     */

    public function scopeGetStats($query, $days = 'one_day_stats', $orderType = 'DESC', $limit = 10)
    {
          $query->select('news.*');

         $query->leftJoin('popularity_stats', 'popularity_stats.trackable_id', '=', 'news.id');

         $query->where( $days, '!=', 0 );

         $query->take($limit);

         $query->orderBy( $days, $orderType );

         return $query;
    }

    public static function newRecord($request)
    {
        $published_at = $request->get('published_at');
        $published_at = date('Y-m-d H:i:s', strtotime($published_at));

        $data = new self;
        $data->title        = $request->get('title');
        $data->image        = $request->get('image');
        $data->summary      = $request->get('summary');
        $data->content      = $request->get('content');
        $data->publish      = $request->get('publish');

        $data->published_at  = Carbon::createFromFormat('Y-m-d H:i:s', $published_at);

        $data->is_featured  = 0;
        if ($data->is_featured)
            $data->featured_at  = Carbon::now();

        $data->is_highlight = $request->get('is_highlight');
        if ($data->is_highlight)
            $data->highlight_at = Carbon::now();

        $data->is_mustread  = $request->get('is_mustread');
        if ($data->is_mustread)
            $data->mustread_at  = Carbon::now();

        $data->category_id  = $request->get('category_id');
        $data->user_id      = Auth::guard('admin')->id();
        $data->slug         = str_slug($request->get('title')).'-'.self::generateRandomString();
        $data->save();

        $tags = $request->get('tags');
        if ($tags) {
            self::insertNewsTag($data->id, $tags);
        }

        self::forgotCache();

        return $data;
    }

    public static function updateRecord($request, $id)
    {
        $data = self::findOrFail($id);
        $data->title        = $request->get('title');
        $data->image        = $request->get('image');
        $data->summary      = $request->get('summary');
        $data->content      = $request->get('content');
        $data->publish      = $request->get('publish');

        if ($data->publish == self::STATUS_SCHEDULED)
            $data->published_at = Carbon::parse($request->get('published_at'));

        $data->is_featured  = 0;
        if ($data->is_featured)
            $data->featured_at  = Carbon::now();

        $data->is_highlight = $request->get('is_highlight');
        if ($data->is_highlight)
            $data->highlight_at = Carbon::now();

        $data->is_mustread  = $request->get('is_mustread');
        if ($data->is_mustread)
            $data->mustread_at  = Carbon::now();

        $data->category_id  = $request->get('category_id');
        $data->user_id      = Auth::guard('admin')->id();
        $data->save();

        $tags = $request->get('tags');
        if ($tags) {
            self::updateNewsTag($data->id, $tags);
        }

        self::forgotCache();

        return $data;
    }

    public static function insertNewsTag($news_id, $tags)
    {
        if ($tags) {
            foreach ($tags as $tag_id) {
                if (Tag::find($tag_id)) {
                    $tag = News_tag::newNewsTag($news_id, $tag_id);
                } else {
                    $tag = Tag::newTag($tag_id);
                    News_tag::newNewsTag($news_id, $tag->id);
                }
            }
        }
    }

    public static function updateNewsTag($news_id, $tags)
    {
        // delete news tags
        News_tag::where('news_id', $news_id)->delete();

        // insert ulang
        self::insertNewsTag($news_id, $tags);
    }

    public static function generateRandomString($length = 5) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    /**
     *
     * Get post by category
     * @param $query
     * @param $categoryid
     * @return mixed
     */
    public function scopeByCategory($query, $categoryid)
    {
        return $query->where("category_id", $categoryid);
    }

    /**
     * Get posts by featured
     *
     * @param $type
     * @return mixed
     */

    public function scopeByFeatured($query)
    {
        return $query->where('is_featured', 1);
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

    /**
     * Get posts by highlight
     *
     * @param $type
     * @return mixed
     */

    public function scopeByHighlight($query)
    {
        return $query->where('is_highlight', 1);
    }

    /**
     * Get posts by mustread
     *
     * @param $type
     * @return mixed
     */

    public function scopeByMustread($query)
    {
        return $query->where('is_mustread', 1);
    }

}