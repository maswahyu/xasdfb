<?php

use Illuminate\Database\Seeder;

class ContactTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $data = [];
    	$faker = Faker\Factory::create('id_ID');
    	for($i=0;$i<15;$i++){
    		$data[$i] = [
				'name'       => $faker->name(),
                'phone'      => $faker->phoneNumber(),
				'email'      => $faker->email(),
                'subject'    => $faker->text(10),
				'message'    => $faker->text(100),
				'created_at' => Carbon\Carbon::now(),
    		];
    	}

    	DB::table('contacts')->insert($data);
    }
}
