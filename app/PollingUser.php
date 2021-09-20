<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PollingUser extends Model
{
    protected $table = 'polling_users';

    protected $fillable = [
        'polling_id',
        'option_id',
        'user_id'
    ];
}
