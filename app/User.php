<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Category;
use App\Subscribe;
use Cache;

class User extends Authenticatable
{
    use Notifiable;

    const MEMBER = "member";
    const access_token = "$2y$10$6gQjIqINdK7fyo97.doNe.KDnzgeoyOOqyPGN5ZRtCa.ZWfnX8iFq";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','sso_id','no_ktp','total_point',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $dates = [
        'created_at', 'updated_at', 'email_verified_at', 'lastPlayed',
    ];

    public function hasRole($role)
    {
        if ($role == $this->usertype) {
            return true;
        }

        return false;
    }

    public function subscribe() {
        return $this->hasMany('App\Subscribe', 'user_id', 'id');
    }

    public static function insertInterest($user_id, $interest)
    {
        if ($interest) {

            Subscribe::delSubscribe($user_id);

            foreach ($interest as $category_id) {

                $category = Category::find($category_id);
                if ($category) {
                    Subscribe::addSubscribe($user_id, $category_id);
                }
            }

            Cache::forget('getRecommended');
            Cache::forget('getRecommended-'.$user_id);
            Cache::forget('getRecommended5-'.$user_id);

            return true;
        }

        return false;
    }

    public static function newRecord($request)
    {
        $data= new User;
        $data->name              = $request->get('name');
        $data->email             = $request->get('email');
        $data->usertype          = self::TEACHER;
        $data->password          = bcrypt($request->get('email'));
        $data->save();

        return $data;
    }

    public static function updateRecord($request, $id)
    {
        $data = User::findOrFail($id);
        $data->name              = $request->get('name');
        $data->email             = $request->get('email');
        $data->password          = bcrypt($request->get('email'));
        $data->save();

        return $data;
    }
}
