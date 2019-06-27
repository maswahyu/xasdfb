<?php

use Illuminate\Database\Seeder;

class LinkTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data[0] = [
			'name'      => 'LA Indie Movie',
			'url'      => 'https://laindiemovie.lazone.id/',
			'created_at' => Carbon\Carbon::now(),
		];

		$data[1] = [
			'name'      => 'LA Streetball',
			'url'      => 'https://www.la-streetball.com/',
			'created_at' => Carbon\Carbon::now(),
		];

		$data[2] = [
			'name'      => 'Iceperience',
			'url'       => 'https://iceperience.id/',
			'created_at' => Carbon\Carbon::now(),
		];

		$data[3] = [
			'name'      => 'Boldxperience',
			'url'       => 'https://www.boldxperience.com/',
			'created_at' => Carbon\Carbon::now(),
		];

    	DB::table('links')->insert($data);
    }
}
