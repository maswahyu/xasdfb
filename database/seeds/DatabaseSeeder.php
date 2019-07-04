<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(SettingsTableSeeder::class);
        $this->call(ContactTableSeeder::class);
        $this->call(NewsTableSeeder::class);
        $this->call(GalleryTableSeeder::class);
        $this->call(CategoryTableSeeder::class);
        $this->call(AlbumTableSeeder::class);
        $this->call(TagsTableSeeder::class);
        $this->call(LinkTableSeeder::class);
        $this->call(EventsTableSeeder::class);
        $this->call(SlideTableSeeder::class);
    }
}
