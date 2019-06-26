<?php

use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data[0] = [
			'name'      => 'Travel',
			'slug'      => 'travel',
			'created_at' => Carbon\Carbon::now(),
		];

		$data[1] = [
			'name'      => 'Tour',
			'slug'      => 'tour',
			'created_at' => Carbon\Carbon::now(),
		];

		$data[2] = [
			'name'      => 'Bold',
			'slug'      => 'bold',
			'created_at' => Carbon\Carbon::now(),
		];

		$data[3] = [
			'name'      => 'News',
			'slug'      => 'news',
			'created_at' => Carbon\Carbon::now(),
		];

		$data[4] = [
			'name'      => 'lifestyle',
			'slug'      => 'lifestyle',
			'created_at' => Carbon\Carbon::now(),
		];

    	DB::table('tags')->insert($data);
    }
}
