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
    }
}
