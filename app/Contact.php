<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contact extends Model
{	
	use SoftDeletes;

	protected $fillable = ['name', 'subject', 'email', 'message', 'phone'];

    protected $dates = [
        'created_at',
        'updated_at',
        'read_at',
        'deleted_at'
    ];
}
