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
        $data->name  = $request->get('name');
        $data->image = $request->get('image');
        $data->status = $request->get('status');
        $data->pub_day  = $request->get('pub_day');
        $data->page = $request->get('page');
        $data->cta  = $request->get('cta');
        $data->periode_start  = $request->get('periode_start');
        $data->periode_end  = $request->get('periode_end');

        $data->save();
        return $data;
    }

    public static function updateRecord($request, $id)
    {
        $data = StickyBanner::findOrFail($id);
        $data->name  = $request->get('name');
        $data->image = $request->get('image');
        $data->status = $request->get('status');
        $data->pub_day  = $request->get('pub_day');
        $data->page = $request->get('page');
        $data->cta  = $request->get('cta');
        $data->periode_start  = $request->get('periode_start');
        $data->periode_end  = $request->get('periode_end');


        $data->save();


        return $data;
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
