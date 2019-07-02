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
			'name'        => 'Travel',
			'slug'        => 'travel',
			'is_featured' => rand(0,1),
			'image'       => "/storage/news/236669.jpg",
			'created_at'  => Carbon\Carbon::now(),
		];

		$data[1] = [
			'name'        => 'Tour',
			'slug'        => 'tour',
			'is_featured' => rand(0,1),
			'image'       => "/storage/news/236669.jpg",
			'created_at'  => Carbon\Carbon::now(),
		];

		$data[2] = [
			'name'        => 'Bold',
			'slug'        => 'bold',
			'is_featured' => rand(0,1),
			'image'       => "/storage/news/236669.jpg",
			'created_at'  => Carbon\Carbon::now(),
		];

    	DB::table('albums')->insert($data);

		for($i=0;$i<20;$i++){
    		$data[$i] = [
				'name'        => $faker->text(10),
				'slug'        => $faker->slug(),
				'is_featured' => rand(0,1),
				'image'       => "/storage/news/236669.jpg",
				'created_at'  => Carbon\Carbon::now(),
    		];
    	}

    	DB::table('albums')->insert($data);
    }
}
