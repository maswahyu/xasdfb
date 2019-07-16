<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cache;

class Slide extends Model
{
    const STATUS_UNPUBLISHED = 0;
    const STATUS_PUBLISHED = 1;
	 /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'slides';

    public static function getFeatured($take = 5)
    {
        $model = Cache::rememberForever('getFeatured', function () use ($take) {
            return self::where('publish', self::STATUS_PUBLISHED)->where('is_featured', self::STATUS_PUBLISHED)->orderBy('updated_at', 'DESC')->take($take)->get();
        });

        return $model;
    }

    public static function getPage($page_number, $paging_limit, $orderby, $order)
    {
        return self::latest()->orderBy($orderby, $order)->paginate($paging_limit, ['*'], 'page', $page_number);
    }

    public function getPublishBadgeAttribute()
    {
        switch ($this->publish) {
            case self::STATUS_PUBLISHED:
                $level = 'success';
                $status = 'Yes';
                break;

            case self::STATUS_UNPUBLISHED:
            default:
                $level = 'danger';
                $status = 'No';
                break;
        }

        return sprintf('<span class="badge badge-%s">%s</span>', $level, $status);
    }

    public function getFeaturedBadgeAttribute()
    {
        switch ($this->is_featured) {
            case self::STATUS_PUBLISHED:
                $level = 'success';
                $status = 'Yes';
                break;

            case self::STATUS_UNPUBLISHED:
            default:
                $level = 'danger';
                $status = 'No';
                break;
        }

        return sprintf('<span class="badge badge-%s">%s</span>', $level, $status);
    }

    public static function newRecord($request)
    {
        $data= new Slide;
        $data->is_featured = $request->get('is_featured');
        $data->publish     = $request->get('publish');
        $data->image       = $request->get('image');
        $data->url         = $request->get('url');
        $data->title       = $request->get('title');

        $data->save();
        Cache::forget('getFeatured');

        return $data;
    }

    public static function updateRecord($request, $id)
    {
        $data = Slide::findOrFail($id);
        $data->is_featured = $request->get('is_featured');
        $data->publish     = $request->get('publish');
        $data->image       = $request->get('image');
        $data->url         = $request->get('url');
        $data->title       = $request->get('title');

        $data->save();

        Cache::forget('getFeatured');

        return $data;
    }
}