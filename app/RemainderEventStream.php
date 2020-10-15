<?php

namespace App;

use Cache;
use App\EventStream;
use Illuminate\Database\Eloquent\Model;

class RemainderEventStream extends Model
{
    protected $table = 'remainder_audience_event';

    public static function newRecord($request)
    {
        $slug = $request->post('stream_id');
        $stream = Cache::remember('live_stream_' . $slug, 600, function () use ($slug) {
            return EventStream::where('slug', $slug)->first();
        });

        $model = new RemainderEventStream();
        $model->email = $request->post('email');
        $model->event_stream_id = $stream->id;

        if(! $model->save()) {
            return false;
        }

        return $model;
    }
}
