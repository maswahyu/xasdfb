<?php

namespace App;

use Cache;
use Illuminate\Database\Eloquent\Model;

class NewsBanner extends Model
{
    protected $table = 'news_banner';

    protected $fillable = ['news_id', 'type', 'image', 'title', 'summary', 'url'];

    const TYPE = [
        1 => 'MyPoint',
        2 => 'Regular',
    ];

    public function post()
    {
        return $this->belongsTo('App\News', 'news_id');
    }

    public static function updateOrCreateBanner($news_id, $request)
    {
        $type = $request->get('banner_type');
        $title = $request->get('banner_title');
        $summary = $request->get('banner_summary');
        $image = $request->get('banner_image');
        $url = $request->get('banner_url');

        $banner = NewsBanner::updateOrCreate([
            "news_id" => $news_id
        ],[
            "type" => $type,
            "image" => $image,
            "title" => $title,
            "summary" => $summary,
            "url" => $url,
        ]);

        return $banner;
    }

    public static function detail($news_id)
    {
        if (!Cache::has('news_banner'.$news_id)) {
            $data = self::where('news_id', $news_id)->first();
            $data = $data ? $data : null;
            Cache::forever('news_banner'.$news_id, $data);
        }

        return Cache::get('news_banner'.$news_id);
    }
}
