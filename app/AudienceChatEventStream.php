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
        return gmdate("H:i:s", $this->timestamp_from_event);
    }
}
