<?php

namespace App;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;

class EventStream extends Model
{
    protected $table = 'events_stream';

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
        $model->created_by = Auth::guard('admin')->user()->id;

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

    /******************
     * Relations
     *******************/

    /**
     * Admin user who created this event
     */
    public function admin()
    {
        return $this->hasOne(\App\Admin::class, 'id');
    }

    public function audience()
    {
        return $this->hasMany(\App\LogAudienceEventStream::class, 'event_stream_id');
    }

    /**
     * Get number of audience in one event
     */
    public function audienceCount()
    {
        return $this->hasMany(\App\LogAudienceEventStream::class, 'event_stream_id')->distinct('audience_id')->count('audience_id');
    }

    /***************
     * Bussiness Logic
     ***************/

    public function getYoutubeVideoId()
    {
        preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $this->yt_link, $match);
        return $match[1];
    }
}
