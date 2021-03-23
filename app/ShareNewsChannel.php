<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class ShareNewsChannel extends Model
{
    const SHARE_CHANNEL_FACEBOOK = 'facebook';
    const SHARE_CHANNEL_TWITTER = 'twitter';
    const SHARE_CHANNEL_WHATSAPP = 'whatsapp';
    const SHARE_CHANNEL_LINE = 'line';
    const SHARE_CHANNEL_CLIPBOARD = 'clipboard';

    protected $table = 'log_share_article';


    public static function newRecord($request) {
        $data = new self;
        if(Auth::check()) {
            $data->users_id = Auth::id();
        }
        $data->news_id = $request->get('post_id');
        $data->channel = $request->get('channel');

        $data->save();

        return $data;
    }
}
