<?php

namespace App;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class EventStream extends Model
{
    protected $table = 'event_stream';

    public static function newRecord($request)
    {
        $model = new EventStream();
        $model->name = $request->get('name');
        $model->slug = Str::slug($request->get('slug'));
        $model->yt_link = $request->get('yt_link');
        $model->thumbnail = $request->get('thumbnail');
        $model->live_chat = $request->get('live_chat');
        $model->publish = $request->get('publish');
        $model->event_date = $request->get('event_date');
        $model->periode_start = $request->get('periode_start');
        $model->periode_end = $request->get('periode_end');

        if(! $model->save()) {
            return false;
        }
        return $model;
    }

    public static function updateRecord($request, $id)
    {
        $model = EventStream::findOrFail($id);
        $model->name = $request->get('name');
        $model->slug = Str::slug($request->get('slug'));
        $model->yt_link = $request->get('yt_link');
        $model->thumbnail = $request->get('thumbnail');
        $model->live_chat = $request->get('live_chat');
        $model->publish = $request->get('publish');
        $model->event_date = $request->get('event_date');
        $model->periode_start = $request->get('periode_start');
        $model->periode_end = $request->get('periode_end');

        if(! $model->save()) {
            return false;
        }
        return $model;
    }
}
