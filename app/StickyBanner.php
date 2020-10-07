<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use ReflectionClass;

class StickyBanner extends Model
{
    const PAGE_HOME = 'homepage';
    const PAGE_ARTICLE = 'article';
    protected $table = 'sticky_banner';

    public static function newRecord($request)
    {
        $data = new StickyBanner();
        $data->name  =
        $data->image =
        $data->status =
        $data->mobile_image =
        $data->pub_day  =
        $data->page =
        $data->cta  =
        $data->periode_start  =
        $data->periode_end  =

        $data->save();
        return $data;
    }

    public static function updateRecord($request, $id)
    {
        $data = StickyBanner::findOrFail($id);
        $data->name  =
        $data->image =
        $data->status =
        $data->mobile_image =
        $data->pub_day  =
        $data->page =
        $data->cta  =
        $data->periode_start  =
        $data->periode_end  =


        $data->save();


        return $data;
    }

    public function copyRecord()
    {
        $count = static::where('name', 'like', $this->name . '_copy')->count();
        $copy = new StickyBanner();
        $copy->name  = $this->name . '_copy' . ($count > 0 ? $count+1 : '');
        $copy->image = $this->image;
        $copy->status = 0;
        $copy->mobile_image = $this->mobile_image;
        $copy->pub_day  = $this->pub_day;
        $copy->page = $this->page;
        $copy->cta  = $this->cta;
        $copy->periode_start  = $this->periode_start;
        $copy->periode_end  = $this->periode_end;

        $copy->save();
        return $copy->save();
    }

    public function getImage($field = 'image')
    {
        if (empty($this->$field)) {

            /* if this album doesnt have photos, return empty string */
            return imageview('');
        }

        return imageview($this->$field);
    }

    public static function getConstanta($prefix)
    {
        $class = new ReflectionClass(new self);

        $constants = $class->getConstants();
        if(! $constants) {
            return false;
        }

        $returnData  = [];
        foreach($constants as $key => $constanta)
        {
            $explode = explode('_', $key, 2);
            if($explode[0] == $prefix) {
                $returnData[$explode[1]] = $constanta;
            }
        }
        return $returnData;
    }
}
