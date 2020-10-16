<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AudienceEventStream extends Model
{
    const TYPE_GUEST = 'guest';
    const TYPE_USER = 'user';

    protected $table = 'audience_event_stream';

    /************
     * RELATIONS
     */

     public function log()
     {
         return $this->hasMany(\App\LogAudienceEventStream::class, 'audience_id', 'id');
     }

     public function event()
     {
         return $this->hasOne(\App\EventStream::class, 'id', 'first_event');
     }
}
