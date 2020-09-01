<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BannerWifi extends Model
{
    protected $table = 'banner_wifi';

    const STATUS_PUBLISHED = 1;

    public static function newRecord($request)
    {
        $data = new BannerWifi();
        $data->title = $request->get('title');
        $data->image = $request->get('image');
        $data->mobile_image = $request->get('mobile_image');
        $data->cta = $request->get('cta');
        $data->publish = $request->get('publish');

        $data->save();

        return $data;
    }

    public static function updateRecord($request, $id)
    {
        $data = BannerWifi::findOrFail($id);
        $data->title = $request->get('title');
        $data->image = $request->get('image');
        $data->mobile_image = $request->get('mobile_image');
        $data->cta = $request->get('cta');
        $data->publish = $request->get('publish');

        $data->save();

        return $data;
    }

    public function getImage($field = 'image')
    {
        if (empty($this->$field)) {

            /* if this album doesnt have photos, return empty string */
            return imageview('');
        }

        return imageview($this->$field);
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
