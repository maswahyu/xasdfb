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
			'slug'      => 'travel',
			'image'        => "/storage/news/236669.jpg",
			'created_at' => Carbon\Carbon::now(),
		];

		$data[1] = [
			'name'      => 'Tour',
			'slug'      => 'tour',
			'image'        => "/storage/news/236669.jpg",
			'created_at' => Carbon\Carbon::now(),
		];

		$data[2] = [
			'name'      => 'Bold',
			'slug'      => 'bold',
			'image'        => "/storage/news/236669.jpg",
			'created_at' => Carbon\Carbon::now(),
		];

    	DB::table('albums')->insert($data);
    }
}
