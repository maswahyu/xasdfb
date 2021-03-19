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
}
