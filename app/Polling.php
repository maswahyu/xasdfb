<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;
use Cache;

class Polling extends Model
{
    use SearchableTrait;

    const STATUS_PUBLISHED = 1;
	 /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'pollings';

    protected $searchable = [
        'columns' => [
            'polling.name' => 10,
        ]
    ];

    public function scopePublish($query)
    {
        return $query->where('publish', self::STATUS_PUBLISHED);
    }

    public function options() {
        return $this->hasMany('App\PollingOption', 'polling_id', 'id');
    }

    // admin crud record
    public static function newRecord($request)
    {
        $data = new self;
        $data->name  = $request->get('name');
        $data->publish = $request->get('publish');
        $data->slug  = str_slug($request->get('name'));
        if (self::whereSlug($data->slug)->exists()) {
            $data->slug  = $data->slug.rand(1, 100);
        }

        if($request->publish === '1')
        {
            self::query()->update(['publish'=> 0]);
        }

        $data->save();

        foreach($request->option as $option){
            $poll = new PollingOption;
            $poll->polling_id = $data->id;
            $poll->option = $option;
            $poll->save();
        }

        Cache::tags('polling')->flush();

        return $data;
    }

    public static function updateRecord($request, $id)
    {
        $data = self::findOrFail($id);
        $data->name = $request->get('name');
        $data->publish = $request->get('publish');

        if($request->publish === '1')
        {
            self::query()->update(['publish'=> 0]);
        }

        $data->save();

        foreach($request->option as $key => $option){
            if(isset($request->option_id[$key]))
            {
                $poll = PollingOption::find($request->option_id[$key]);
            } 
            else 
            {
                $poll = new PollingOption;
                $poll->polling_id = $id;
            }

            $poll->option = $option;
            $poll->save();
        }

        if(!empty($request->option_deleted)){
            PollingOption::destroy($request->option_deleted);
        }

        Cache::tags('polling')->flush();

        return $data;
    }

    public static function getCurrentActivePolling()
    {
        $model = Cache::tags('polling')->rememberForever('currentActivePolling', function () {
            return self::publish()->first();
        });

        return $model;
    }
}