<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AudienceChatEventStream extends Model
{
    protected $table = 'audience_chat_history';

    /**********
     * ACCESSOR
     **********/
    /**
     * convert timestamp into time format start from 00:00:00
     *
     * @return string
     */
    public function getChatTimeAttribute()
    {
        if($this->timestamp_from_event < 0) {
            return  '-' . gmdate("H:i:s", abs($this->timestamp_from_event));
        }
        return gmdate("H:i:s", abs($this->timestamp_from_event));
    }
}
