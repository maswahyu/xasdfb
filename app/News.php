<?php

namespace App;

use DB;
use Auth;
use Cache;
use App\Tag;
use App\News_tag;
use App\NewsBanner;
use Carbon\Carbon;
use App\Model\Stats;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\SoftDeletes;
use Nicolaslopezj\Searchable\SearchableTrait;

class News extends Model
{
    use SoftDeletes, SearchableTrait;

    const STATUS_UNPUBLISHED = 0;
    const STATUS_PUBLISHED = 1;
    const STATUS_SCHEDULED = 2;

    const NEWS = 'news';
    const TAKE_RECOMENDED = 5;
    const LENSAPHOTO = 'lensacommunity';
    const SNEAKERLAND = 'sneakerland';
    const RELATIONSHIP = 'relationship';

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

    public static function getHomePage($pageNumber = 1, $paginate = 10)
    {
        return self::where('publish', self::STATUS_PUBLISHED)->latest('published_at')->paginate($paginate, ['*'], 'page', $pageNumber);
    }

    public static function getPage($pageNumber = 1, $paginate = 6)
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
        return self::where('publish', self::STATUS_PUBLISHED)->search($query)->latest('published_at')->paginate($paginate, ['*'], 'page', $pageNumber);
    }

    public static function detail($slug)
    {
        if (!Cache::has('post'.$slug)) {
            $data = self::where('publish', self::STATUS_PUBLISHED)->where('slug', $slug)->first();
            Cache::forever('post'.$slug, $data);
        }

        return Cache::get('post'.$slug);
    }

    public static function related($slug, $tags, $category_id)
    {
        // get related based on category and tags
        $related = self::where('publish', self::STATUS_PUBLISHED)
                    ->whereHas('tags', function($query)use($tags) {
                        return $query->with('tag')->whereIn('tag_id', $tags->map(function($model) {
                            return [
                                $model->tag_id
                            ];
                        }));
                    })
                    ->where('category_id', $category_id)
                    ->where('slug', '!=', $slug)
                    ->latest('published_at')
                    ->take(4)
                    ->get();
        if($related->count() === 0 || $related->count() < 4) {
            // get related based on category only
            $related_category = self::where('publish', self::STATUS_PUBLISHED)
            ->where('category_id', $category_id)
            ->where('slug', '!=', $slug)
            ->latest('published_at')
            ->take($related->count() < 4 ? 4 - $related->count() : 4)
            ->get();
            $related = $related->toBase()->merge($related_category);
        }
        return $related;
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

    public function readMore() {
        return $this->hasMany('App\ReadMore', 'news_id', 'id');
    }

    public function banner() {
        return $this->hasOne('App\NewsBanner', 'news_id', 'id');
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
        Cache::tags('cacheHomepage')->flush();
    }

    public static function getHighlight()
    {
        $model = Cache::tags('cacheHomepage')->rememberForever('getHighlight', function () {
            return self::where('publish', self::STATUS_PUBLISHED)->where('is_highlight', 1)->orderBy('highlight_at', 'desc')->first();
        });

        return $model;
    }

    public static function getMustReads($take = 4)
    {
        $model = Cache::tags('cacheHomepage')->rememberForever('getMustReads', function () use ($take) {

            return self::where('publish', self::STATUS_PUBLISHED)->where('is_mustread', 1)->orderBy('mustread_at', 'desc')->take($take)->get();
        });

        return $model;
    }

    /**
     * Get recomded article
     * @param int $take
     * @param boolean $inline wheter recomended article show in center of detail article
     * @param \App\News $news this param should present when param 2 is true
     */
    public static function getRecommended($take = self::TAKE_RECOMENDED, $inline = false, News $news = null)
    {
        if($inline) {
            $model = News::with('tags')->whereHas('tags', function($q) use($news) {
                $q->with('tag')->whereIn('tag_id', $news->tags->map(function($model) {
                    return [
                        $model->tag_id
                    ];
                } ));
            })->where('category_id', $news->category_id)->where([['id', '<>', $news->id]])->latest()->first();
            return $model;
        }

        $model = Cache::tags('cacheHomepage')->rememberForever('getRecommended', function () {
            return self::hydrate(DB::select('SELECT t1.* FROM news t1 JOIN (SELECT category_id, MAX(published_at) published_at FROM news GROUP BY category_id) t2 ON t1.category_id = t2.category_id AND t1.published_at = t2.published_at WHERE t1.publish = 1 and t1.deleted_at is null order by published_at DESC LIMIT 5'));
        });

        if (Auth::check()) {
            $interest = Auth::user()->subscribe()->pluck('category_id');
            if(count($interest) > 0) {

                if (count($interest) < self::TAKE_RECOMENDED) {

                    $model = Cache::tags('cacheHomepage')->rememberForever('getRecommended-'.Auth::id(), function () use ($take, $interest) {
                        return self::where('publish', self::STATUS_PUBLISHED)->whereIn('category_id', $interest)->latest('published_at')->take($take)->get();
                    });

                } else {
                    $model = Cache::tags('cacheHomepage')->rememberForever('getRecommended5-'.Auth::id(), function () use ($take, $interest) {
                        return self::hydrate(DB::select('SELECT t1.* FROM news t1 JOIN (SELECT post.category_id, MAX(post.published_at) published_at FROM news as post GROUP BY category_id) t2 ON t1.category_id = t2.category_id AND t1.published_at = t2.published_at WHERE t1.publish = 1 and t1.deleted_at is null and t1.category_id in ('.$interest->implode(', ').') order by published_at DESC LIMIT 5'));
                    });
                }
            }
        }

        return $model;
    }

    public static function getTrending($take = 50)
    {
        $expiresAt = 3600;
        $from      = Carbon::now()->subDays(14)->toDateString();
        $to        = Carbon::now()->toDateString();

        $model = Cache::remember('getTrendingWeeklys14', $expiresAt, function () use ($take, $from, $to) {
            $model = self::where('news.publish', 1)->whereBetween('news.published_at', [$from." 00:00:00", $to." 23:59:59"])->getStats('all_time_stats', 'DESC', $take)->get();

            return $model->unique('category_id')->take(4);
        });

        return $model;
    }

    public static function getLatest($take = 4, $category, $offset = 2)
    {
        $model = Cache::remember('getLatest'.$category->id, 180, function () use ($take, $category, $offset) {

            if ($category->parent_id == 0) {

                return self::where('publish', self::STATUS_PUBLISHED)
                        ->whereIn('category_id', $category->menu()->pluck('id'))
                        ->latest('published_at')
                        ->take($take)
                        ->skip($offset)
                        ->get();

            } elseif ($category->slug == self::LENSAPHOTO) {

                return self::where('publish', self::STATUS_PUBLISHED)
                        ->whereIn('category_id',  [3286684,4])
                        ->latest('published_at')
                        ->take($take)
                        ->skip($offset)
                        ->get();

            } else {

                return self::where('publish', self::STATUS_PUBLISHED)
                        ->where('category_id', $category->id)
                        ->latest('published_at')
                        ->take($take)
                        ->skip($offset)
                        ->get();
            }

        });

        return $model;
    }

    public static function getLatestCategory($category, $pageNumber, $offset = 5, $paginate = 10)
    {

        if ($category->parent_id == 0) {
            $post = self::where('publish', self::STATUS_PUBLISHED)
                    ->whereIn('category_id', $category->menu()->pluck('id'))
                    ->latest('published_at')
                    ->take($offset)
                    ->pluck('id');

            return self::where('publish', self::STATUS_PUBLISHED)
                    ->whereIn('category_id', $category->menu()->pluck('id'))
                    ->latest('published_at')
                    ->whereNotIn('id', $post)
                    ->paginate($paginate, ['*'], 'page', $pageNumber);

        } elseif ($category->slug == self::LENSAPHOTO) {

            $post = self::where('publish', self::STATUS_PUBLISHED)
                    ->whereIn('category_id',  [3286684,4])
                    ->latest('published_at')
                    ->take($offset)
                    ->pluck('id');

            return self::where('publish', self::STATUS_PUBLISHED)
                    ->whereIn('category_id',  [3286684,4])
                    ->latest('published_at')
                    ->whereNotIn('id', $post)
                    ->paginate($paginate, ['*'], 'page', $pageNumber);

        } else {

            $post = self::where('publish', self::STATUS_PUBLISHED)
                    ->where('category_id', $category->id)
                    ->latest('published_at')
                    ->take($offset)
                    ->pluck('id');

            return self::where('publish', self::STATUS_PUBLISHED)
                    ->where('category_id', $category->id)
                    ->latest('published_at')
                    ->whereNotIn('id', $post)
                    ->paginate($paginate, ['*'], 'page', $pageNumber);
        }
    }

    public static function getSticky($take = 4, $category)
    {
        $model = Cache::remember('getSticky'.$category->id, 3600, function () use ($take, $category) {
            if ($category->parent_id == 0) {
                return self::where('publish', self::STATUS_PUBLISHED)
                        ->whereIn('category_id',  $category->menu()->pluck('id'))
                        ->latest('published_at')
                        ->take($take)
                        ->get();
            } elseif ($category->slug == self::LENSAPHOTO) {
                return self::where('publish', self::STATUS_PUBLISHED)
                        ->whereIn('category_id',  [3286684,4])
                        ->latest('published_at')
                        ->take($take)
                        ->get();
            } else {
                return self::where('publish', self::STATUS_PUBLISHED)
                        ->where('category_id', $category->id)
                        ->latest('published_at')
                        ->take($take)
                        ->get();
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
        if (isset($this->category->parent)) {

            $slug = array(News::SNEAKERLAND, News::LENSAPHOTO, News::RELATIONSHIP);

            if (in_array($this->category->slug, $slug)) {
                return url($this->getCategorySlugAttribute().'/'.$this->slug);
            }

            return url($this->category->parent->slug.'/'.$this->getCategorySlugAttribute().'/'.$this->slug);

        } else {
            return url('lifestyle/style/'.$this->slug);
        }
    }

    public function getThumbnailAttribute()
    {
        // dont generate thumbnial for highlight feed
        if(request()->route()->getActionMethod() === 'feedHighlight') {
            return imageview($this->image);
        }
        // check if original image is exists
        if(! Str::contains($this->image, 'storage')  && ! Storage::disk('filemanager')->exists(Str::replaceFirst('/storage', '', $this->image))) {
            return imageview($this->image);
        }

        // add thumb_ prefix
        $tokenPath = explode('/', $this->image);
        $filename = $tokenPath[count($tokenPath) - 1];
        $thumb_path = Str::replaceFirst($filename, 'thumb_'.$filename, $this->image);
        // remove storage folder from paath
        $path = Str::replaceFirst('/storage', '', $thumb_path);
        if( ! Storage::disk('filemanager')->exists($path) ) {
            try {
                $image = Image::make(Storage::disk('filemanager')->get(Str::replaceFirst('/storage', '', $this->image)));
                $image->resize(400, null, function($constraint) {
                    $constraint->aspectRatio();
                })->save(storage_path('app/public') . $path);
            } catch(Exception | \Illuminate\Contracts\Filesystem\FileNotFoundException | \Intervention\Image\Exception\NotReadableException $e) {
                return imageview($this->image);
            }
        }
        return imageview($thumb_path);
    }

    public function getPublishedDateAttribute()
    {
        return optional($this->published_at)->format('j M Y');
    }

    public function getPublishedDate12Attribute()
    {
        return optional($this->published_at)->format('m/d/y g:i A');
    }

    public function getParentNameAttribute()
    {
        if (isset($this->category) && isset($this->category->parent)) {

            $slug = array(News::SNEAKERLAND, News::LENSAPHOTO);

            if (in_array($this->category->slug, $slug)) {
                return $this->getCategoryNameAttribute();
            }

            return optional($this->category->parent)->name;

        } else {

            return 'Lifestyle';
        }
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

    public function getBannerTitleAttribute()
    {
        return (isset($this->banner) && $this->banner->title) ? $this->banner->title : '';
    }

    public function getBannerSummaryAttribute()
    {
        return (isset($this->banner) && $this->banner->summary) ? $this->banner->summary : '';
    }

    public function getBannerTypeAttribute()
    {
        return (isset($this->banner) && $this->banner->type) ? $this->banner->type : '';
    }

    public function getBannerImageAttribute()
    {
        return (isset($this->banner) && $this->banner->image) ? $this->banner->image : '';
    }

    public function getBannerUrlAttribute()
    {
        return (isset($this->banner) && $this->banner->url) ? $this->banner->url : '';
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
        $data = new self;
        $data->title        = $request->get('title');
        $data->image        = $request->get('image');
        $data->summary      = $request->get('summary');
        $data->content      = $request->get('content');
        $data->publish      = $request->get('publish');

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
        $data->slug         = str_slug($request->get('title')).'-'.self::generateRandomString();

        $data->meta_title = $request->get('meta_title');
        $data->meta_description = $request->get('meta_description');
        $data->meta_keyword = $request->get('meta_keyword');

        $data->save();

        $tags = $request->get('tags');
        if ($tags) {
            self::insertNewsTag($data->id, $tags);
        }

        // insert read more
        if ($request->read_more) {
            self::insertReadMore($data->id, $request->read_more);
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

        $data->meta_title = $request->get('meta_title');
        $data->meta_description = $request->get('meta_description');
        $data->meta_keyword = $request->get('meta_keyword');

        $data->save();

        $tags = $request->get('tags');
        if ($tags) {
            self::updateNewsTag($data->id, $tags);
        }

        // update read more
        if ($request->read_more) {
            self::updateReadMore($data->id, $request->read_more);
        }

        self::forgotCache();
        Cache::forget('post'.$data->slug);

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

    public static function insertReadMore($news_id, $more)
    {
        if ($more) {
            foreach ($more as $more_id) {
                $tag = ReadMore::add($news_id, $more_id);
            }
        }
    }

    public static function updateReadMore($news_id, $more)
    {
        // delete news more
        ReadMore::where('news_id', $news_id)->delete();

        // insert ulang
        self::insertReadMore($news_id, $more);
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
