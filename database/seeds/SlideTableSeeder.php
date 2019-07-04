<?php

use Illuminate\Database\Seeder;

class SlideTableSeeder extends Seeder
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
				'title'       => $faker->text(10),
				'is_featured' => rand(0,1),
				'publish'     => 1,
				'image'       => '/storage/gallery/slider.jpg',
				'url'         => 'http://lazone.local/',
				'created_at'  => Carbon\Carbon::now(),
    		];
    	}

    	DB::table('slides')->insert($data);
    }
}
