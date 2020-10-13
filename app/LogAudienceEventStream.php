<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LogAudienceEventStream extends Model
{
    protected $table = 'log_audience_event';


    /************
     * RELATIONS
     *************/
    public function audience()
    {
        return $this->hasOne(\App\AudienceEventStream::class, 'id', 'audience_id');
    }
}
