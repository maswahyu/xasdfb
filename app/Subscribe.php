<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subscribe extends Model
{
    protected $table = 'user_subscribe';

    public static function addSubscribe($user_id, $category_id)
    {
    	$model = new self;
		$model->user_id     = $user_id;
		$model->category_id = $category_id;
    	$model->save();

    	return true;
    }

    public static function delSubscribe($user_id)
    {
    	$model = self::where('user_id', $user_id)->get();
    	if ($model)
    		Subscribe::where('user_id', $user_id)->delete();

    	return true;
    }
}
