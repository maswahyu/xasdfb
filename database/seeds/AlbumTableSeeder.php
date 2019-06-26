<?php

use Illuminate\Database\Seeder;

class AlbumTableSeeder extends Seeder
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
			'name'      => 'Travel',
			'created_at' => Carbon\Carbon::now(),
		];

		$data[1] = [
			'name'      => 'Tour',
			'created_at' => Carbon\Carbon::now(),
		];

		$data[2] = [
			'name'      => 'Bold',
			'created_at' => Carbon\Carbon::now(),
		];

    	DB::table('albums')->insert($data);
    }
}
