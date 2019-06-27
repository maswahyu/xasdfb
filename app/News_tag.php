<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News_tag extends Model
{
    protected $table = 'news_tags';

    public function tag()
    {
        return $this->belongsTo('App\Tag', 'tag_id');
    }

    public static function newNewsTag($news_id, $tag_id)
    {
    	$tag = new self;
        $tag->news_id = $news_id;
        $tag->tag_id  = $tag_id;
        $tag->save();
    }
}
