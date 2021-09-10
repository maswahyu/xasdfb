<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;

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

    public function scopeByPublish($query)
    {
        return $query->where('publish', self::STATUS_PUBLISHED);
    }

    public function questions() {
        return $this->hasMany('App\PollingQuestion', 'polling_id', 'id');
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

        foreach($request->question as $question){
            $poll = new PollingQuestion;
            $poll->polling_id = $data->id;
            $poll->question = $question;
            $poll->save();
        }

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

        foreach($request->question as $key => $question){
            if(isset($request->question_id[$key]))
            {
                $poll = PollingQuestion::find($request->question_id[$key]);
            } 
            else 
            {
                $poll = new PollingQuestion;
                $poll->polling_id = $id;
            }

            $poll->question = $question;
            $poll->save();
        }

        if(!empty($request->question_deleted)){
            PollingQuestion::destroy($request->question_deleted);
        }

        return $data;
    }
}