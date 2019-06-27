<?php

use Illuminate\Database\Seeder;

class NewsTableSeeder extends Seeder
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
				'title'        => $faker->text(60),
				'user_id'      => 1,
				'summary'      => $faker->text(200),
                'content'      => '<p>Etiam vehicula risus in sem consectetur finibus nec nec nulla. Aliquam erat volutpat. Vivamus quis ligula nec enim malesuada tempor. Suspendisse rutrum orci sed risus ullamcorper elementum. Phasellus non nisi eget odio tempus mollis id a erat. Nulla mi ligula, tempus nec mauris sed, varius iaculis mauris. Morbi elit mauris, pretium eu fermentum in, ullamcorper id turpis. Nulla at lacus eu orci scelerisque rutrum. Donec suscipit ante nulla. Ut blandit odio neque, in aliquam velit pretium at. Cras sed felis felis. Nullam imperdiet fringilla sem at sollicitudin. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Sed ex enim, pellentesque vitae ligula et, venenatis porttitor urna.</p>

<blockquote>&ldquo; Sed pharetra dui eget eros egestas lobortis. Cras tempor, enim id scelerisque fermentum, metus lectus congue orci, sed vestibulum tortor augue bibendum justo. Morbi ac lacus vitae dui congue pellentesque. Sed mattis orci ipsum. &ldquo; - Jhon Snow -</blockquote>

<p>Sed sagittis ac turpis id ultricies. Ut auctor sem ligula, eu porta augue laoreet non. Cras justo massa, pulvinar a nisi sit amet, ultrices finibus enim. Aliquam non consequat ligula. Aliquam rutrum dui nec ante lobortis, quis aliquet est faucibus. Quisque id condimentum nulla, a facilisis lorem. Quisque condimentum lectus at ante fringilla accumsan. Nulla sit amet fringilla elit. Aliquam aliquet commodo aliquet.</p>

Donec eget odio purus. Donec tempor, ligula ultrices aliquam bibendum, nisi mauris consequat dolor, at pretium mi augue vel mi. Nunc rhoncus justo metus, sed luctus risus placerat at. Mauris ornare neque quis pretium tincidunt.</p>

<ul>
    <li>Proin tellus nisi, efficitur et enim vel, fermentum Curabitur ac hendrerit neque.</li>
    <li>Maecenas dapibus egestas enim laoreet porttitor.</li>
    <li>Donec accumsan at dui at scelerisque.</li>
    <li>Ut faucibus arcu in enim convallis, quis interdum nulla imperdiet.</li>
</ul>

<p>Donec eget odio purus. Donec tempor, ligula ultrices aliquam bibendum, nisi mauris consequat dolor, at pretium mi augue vel mi. Nunc rhoncus justo metus, sed luctus risus placerat at. Mauris ornare neque quis pretium tincidunt.</p>
', 
				'slug'         => $faker->slug,
				'image'        => "/storage/news/236669.jpg",
                'publish'      => 1,
				'category_id'  => 1,
				'created_at'   => Carbon\Carbon::now(),
    		];
    	}

    	DB::table('news')->insert($data);
    }
}
