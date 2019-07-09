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
			'name'        => 'Lifestyle',
			'slug'        => 'lifestyle',
			'parent_id'   => 0,
			'description' => 'Artikel seputar film terkini yang wajib kamu tau',
			'image'       => '/storage/news/236669.jpg',
			'created_at'  => Carbon\Carbon::now(),
		];

		$data[1] = [
			'name'        => 'Entertainment',
			'slug'        => 'entertainment',
			'parent_id'   => 0,
			'description' => 'Artikel seputar film terkini yang wajib kamu tau',
			'image'       => '/storage/news/236669.jpg',
			'created_at'  => Carbon\Carbon::now(),
		];

		$data[2] = [
			'name'        => 'Inspiration',
			'slug'        => 'inspiration',
			'parent_id'   => 0,
			'description' => 'Artikel seputar film terkini yang wajib kamu tau',
			'image'       => '/storage/news/236669.jpg',
			'created_at'  => Carbon\Carbon::now(),
		];

		$data[3] = [
			'name'        => 'Lensa',
			'slug'        => 'lensaphoto',
			'parent_id'   => 2,
			'description' => 'Artikel seputar film terkini yang wajib kamu tau',
			'image'       => '/storage/news/236669.jpg',
			'created_at'  => Carbon\Carbon::now(),
		];

		$data[4] = [
			'name'        => 'Sneakerland',
			'slug'        => 'sneakerland',
			'parent_id'   => 2,
			'description' => 'Artikel seputar film terkini yang wajib kamu tau',
			'image'       => '/storage/news/236669.jpg',
			'created_at' => Carbon\Carbon::now(),
		];

		$data[6] = [
			'name'        => 'Style',
			'slug'        => 'style',
			'parent_id'   => 1,
			'description' => 'Artikel seputar style terkini yang wajib kamu tau',
			'image'       => '/storage/news/236669.jpg',
			'created_at'  => Carbon\Carbon::now(),
		];

		$data[7] = [
			'name'        => 'Automotives',
			'slug'        => 'automotives',
			'parent_id'   => 1,
			'description' => 'Artikel seputar style terkini yang wajib kamu tau',
			'image'       => '/storage/news/236669.jpg',
			'created_at'  => Carbon\Carbon::now(),
		];

		$data[8] = [
			'name'        => 'Gadget',
			'slug'        => 'gadget',
			'parent_id'   => 1,
			'description' => 'Artikel seputar style terkini yang wajib kamu tau',
			'image'       => '/storage/news/236669.jpg',
			'created_at'  => Carbon\Carbon::now(),
		];

		$data[9] = [
			'name'        => 'Hangout Place',
			'slug'        => 'hangout-place',
			'parent_id'   => 1,
			'description' => 'Artikel seputar style terkini yang wajib kamu tau',
			'image'       => '/storage/news/236669.jpg',
			'created_at'  => Carbon\Carbon::now(),
		];

		$data[10] = [
			'name'        => 'Movie',
			'slug'        => 'movie',
			'parent_id'   => 2,
			'description' => 'Artikel seputar moview terkini yang wajib kamu tau',
			'image'       => '/storage/news/236669.jpg',
			'created_at'  => Carbon\Carbon::now(),
		];

		$data[11] = [
			'name'        => 'Music',
			'slug'        => 'music',
			'parent_id'   => 2,
			'description' => 'Artikel seputar moview terkini yang wajib kamu tau',
			'image'       => '/storage/news/236669.jpg',
			'created_at'  => Carbon\Carbon::now(),
		];

		$data[12] = [
			'name'        => 'Sport',
			'slug'        => 'sport',
			'parent_id'   => 2,
			'description' => 'Artikel seputar moview terkini yang wajib kamu tau',
			'image'       => '/storage/news/236669.jpg',
			'created_at'  => Carbon\Carbon::now(),
		];

		$data[13] = [
			'name'        => 'News',
			'slug'        => 'news',
			'parent_id'   => 2,
			'description' => 'Artikel seputar moview terkini yang wajib kamu tau',
			'image'       => '/storage/news/236669.jpg',
			'created_at'  => Carbon\Carbon::now(),
		];

		$data[16] = [
			'name'        => 'Inspiring People',
			'slug'        => 'inspiring-people',
			'parent_id'   => 3,
			'description' => 'Artikel seputar moview terkini yang wajib kamu tau',
			'image'       => '/storage/news/236669.jpg',
			'created_at'  => Carbon\Carbon::now(),
		];

		$data[17] = [
			'name'        => 'Inspiring Places',
			'slug'        => 'inspiring-place',
			'parent_id'   => 3,
			'description' => 'Artikel seputar moview terkini yang wajib kamu tau',
			'image'       => '/storage/news/236669.jpg',
			'created_at'  => Carbon\Carbon::now(),
		];

		$data[18] = [
			'name'        => 'Inspiring Quotes',
			'slug'        => 'inspiring-quotes',
			'parent_id'   => 3,
			'description' => 'Artikel seputar moview terkini yang wajib kamu tau',
			'image'       => '/storage/news/236669.jpg',
			'created_at'  => Carbon\Carbon::now(),
		];

    	DB::table('categories')->insert($data);
    }
}
