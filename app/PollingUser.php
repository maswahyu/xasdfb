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

    /************
     * Relations
     ************/
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function polling_option()
    {
        return $this->belongsTo(PollingOption::class, 'option_id');
    }
}
