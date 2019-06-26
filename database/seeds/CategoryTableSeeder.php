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
			'name'      => 'Lifestyle',
			'slug' 		=> 'lifestyle',
			'parent_id' => 0,
			'created_at' => Carbon\Carbon::now(),
		];

		$data[1] = [
			'name'      => 'Entertainment',
			'slug'      => 'entertainment',
			'parent_id' => 0,
			'created_at' => Carbon\Carbon::now(),
		];

		$data[2] = [
			'name'      => 'Inspiration',
			'slug'      => 'inspiration',
			'parent_id' => 0,
			'created_at' => Carbon\Carbon::now(),
		];

		$data[3] = [
			'name'      => 'Lensaphoto',
			'slug'      => 'lensaphoto',
			'parent_id' => 0,
			'created_at' => Carbon\Carbon::now(),
		];

		$data[4] = [
			'name'      => 'Sneakerland',
			'slug'      => 'sneakerland',
			'parent_id' => 0,
			'created_at' => Carbon\Carbon::now(),
		];

		$data[5] = [
			'name'      => 'Community',
			'slug'      => 'community',
			'parent_id' => 0,
			'created_at' => Carbon\Carbon::now(),
		];

		$data[6] = [
			'name'      => 'Style',
			'slug'      => 'style',
			'parent_id' => 1,
			'created_at' => Carbon\Carbon::now(),
		];

    	DB::table('categories')->insert($data);
    }
}
