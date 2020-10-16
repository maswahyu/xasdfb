<?php

use App\AudienceEventStream;
use App\EventStream;
use Illuminate\Database\Seeder;

class LogAudienceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        for($i=0; $i < 1000; $i++) {
            $Audience = AudienceEventStream::find(rand(551, 1550));
            $Event = EventStream::find(1);
            $data[$i] = [
                'event_stream_id' => rand(1,2),
                'audience_id' => $Audience->id,
                'audience_as' => $Audience->name,
                'event_name' => $Event->name,
            ];
        }

        DB::table('log_audience_event')->insert($data);
    }
}
