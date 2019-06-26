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
}
