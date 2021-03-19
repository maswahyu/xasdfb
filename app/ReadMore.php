<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReadMore extends Model
{
    protected $table = 'news_read_more';

    public function post()
    {
        return $this->belongsTo('App\News', 'news_id');
    }

    public static function add($news_id, $more_id)
    {
        $tag = new self;
        $tag->news_id = $news_id;
        $tag->news_more_id  = $more_id;
        $tag->save();

        return $tag;
    }
}
