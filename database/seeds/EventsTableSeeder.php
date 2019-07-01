<?php

use Illuminate\Database\Seeder;

class EventsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [];
    	$faker = Faker\Factory::create();
    	for($i=0;$i<20;$i++){
    		$data[$i] = [
				'created_by'      => 1,
				'slug'         => $faker->slug,
				'title'        => $faker->text(60),
                'publish'      => 1,
				'image'        => "/storage/news/236669.jpg",
				'summary'      => $faker->text(200),
                'content'      => '<p>Etiam vehicula risus in sem consectetur finibus nec nec nulla. Aliquam erat volutpat. Vivamus quis ligula nec enim malesuada tempor. Suspendisse rutrum orci sed risus ullamcorper elementum. Phasellus non nisi eget odio tempus mollis id a erat. Nulla mi ligula, tempus nec mauris sed, varius iaculis mauris. Morbi elit mauris, pretium eu fermentum in, ullamcorper id turpis. Nulla at lacus eu orci scelerisque rutrum. Donec suscipit ante nulla. Ut blandit odio neque, in aliquam velit pretium at. Cras sed felis felis. Nullam imperdiet fringilla sem at sollicitudin. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Sed ex enim, pellentesque vitae ligula et, venenatis porttitor urna.</p><p>Donec eget odio purus. Donec tempor, ligula ultrices aliquam bibendum, nisi mauris consequat dolor, at pretium mi augue vel mi. Nunc rhoncus justo metus, sed luctus risus placerat at. Mauris ornare neque quis pretium tincidunt.</p>', 
				'created_at'   => Carbon\Carbon::now(),
    		];
    	}

    	DB::table('events')->insert($data);
    }
}
