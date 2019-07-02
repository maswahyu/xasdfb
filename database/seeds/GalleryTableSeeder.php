<?php

use Illuminate\Database\Seeder;
use App\Gallery;

class GalleryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
    	for($i=0;$i<10;$i++){
    		$data[$i] = [
                'title'      => $faker->text(60),
                'slug'       => $faker->slug(),
                'value'      => "/storage/news/236669.jpg",
                'type'       => "photo",
                'publish'    => "1",
                'user_id'    => 1,
                'album_id'   => rand(1,5),
                'is_featured'  => rand(0,1),
                'created_at' => Carbon\Carbon::now(),
    		];
    	}

    	DB::table('galleries')->insert($data);

    	$faker = Faker\Factory::create();
    	for($i=0;$i<10;$i++){
    		$data[$i] = [
                'title'      => $faker->text(60),
                'slug'       => $faker->slug(),
                'value'      => "https://www.youtube.com/watch?v=pL4uESRCnv8",
                'type'       => "video",
                'publish'    => "1",
                'user_id'    => 1,
                'album_id'   => rand(5, 10),
                'is_featured'  => rand(0,1),
                'created_at' => Carbon\Carbon::now(),
    		];
    	}

    	DB::table('galleries')->insert($data);
    }
}
