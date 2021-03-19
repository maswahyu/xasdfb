<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NewsBanner extends Model
{
    protected $table = 'news_banner';

    protected $fillable = ['news_id', 'type', 'image', 'title', 'summary', 'url'];

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
}
