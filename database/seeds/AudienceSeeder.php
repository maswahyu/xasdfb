<?php

use App\AudienceEventStream;
use Illuminate\Database\Seeder;

class AudienceSeeder extends Seeder
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
            $data[$i] = [
                'first_event' => 1,
                'name' => $faker->name,
                'phone' => $faker->unique()->phoneNumber,
                'type' => (rand(1,2) === 1 ? AudienceEventStream::TYPE_GUEST : AudienceEventStream::TYPE_USER)
            ];
        }

        DB::table('audience_event_stream')->insert($data);
    }
}
