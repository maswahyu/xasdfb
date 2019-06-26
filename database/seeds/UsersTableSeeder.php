<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
    	$users = [];
    	$faker = Faker\Factory::create();
        $users[0] = [
            'name'       => 'Administrator',
            'email'      => 'admin@saga.id',
            'password'   => bcrypt('lazone123'),
            'usertype'   => 'admin',
            'created_at' => Carbon\Carbon::now(),
        ];

        $users[1] = [
            'name'       => 'Editor',
            'email'      => 'editor@admin.com',
            'password'   => bcrypt('lazone123'),
            'usertype'   => 'editor',
            'created_at' => Carbon\Carbon::now(),
        ];

        DB::table('admins')->insert($users);

        for($i=0;$i<15;$i++){
            $data[$i] = [
                'name'        => $faker->name(),
                'email'       => $faker->email(),
                'password'    => bcrypt('lazone123'),
                'usertype'    => 'member',
                'created_at'  => Carbon\Carbon::now(),
            ];
        }        

        DB::table('users')->insert($data);
        
        for($i=0;$i<15;$i++){
            $data[$i] = [
                'name'          => $faker->name(),
                'email'         => $faker->email(),
                'password'      => bcrypt('lazone123'),
                'usertype'      => 'member',
                'short_bio'     => 'Hi',
                'profile_image' => 'testimonial-user.jpg',
                'bio'           => $faker->text(),
                'facebook'      => 'https://www.facebook.com/avengers/',
                'twitter'       => 'https://www.twitter.com/avengers/',
                'created_at'    => Carbon\Carbon::now(),
            ];
        }

        DB::table('users')->insert($data);
    }
}
