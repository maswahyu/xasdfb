<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RemainderEventStream extends Model
{
    protected $table = 'remainder_audience_event';

    public static function newRecord($request)
    {
        $model = new RemainderEventStream();
        $model->email = $request->post('email');
        $model->event_stream_id = $request->post('event_stream_id');

        if(! $model->save()) {
            return false;
        }

        return $model;
    }
}
