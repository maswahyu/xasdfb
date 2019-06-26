<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
    	$data[0] = [
			'name'      => 'News',
			'created_at' => Carbon\Carbon::now(),
		];

		$data[1] = [
			'name'      => 'Event',
			'created_at' => Carbon\Carbon::now(),
		];

		$data[2] = [
			'name'      => 'Info',
			'created_at' => Carbon\Carbon::now(),
		];

    	DB::table('categories')->insert($data);
    }
}
