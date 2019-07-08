<?php

use Illuminate\Database\Seeder;
use App\Setting;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
        	[
	        	'key' => 'site_name',
	        	'value' => 'LAzone.id'
	        ], 
	        [
	        	'key' => 'site_email',
	        	'value' => 'info@laravel.com'
	        ], 
	        [
	        	'key' => 'site_image',
	        	'value' => 'iFRfo.jpg'
	        ],
	        [
	        	'key' => 'site_meta_title',
	        	'value' => 'Berita Lifestyle dan Gaya Hidup Terkini'
	        ],
            [
                'key' => 'site_meta_description',
                'value' => 'Temukan berita lifestyle seputar gaya hidup terkini yang kini jadi trending topic di Indonesia dan Dunia hanya di LAzone.id'
            ],
	        [
	        	'key' => 'site_meta_keyword',
	        	'value' => 'berita lifestyle,berita gaya hidup,portal berita online'
	        ],
	        [
	        	'key' => 'terms_title',
	        	'value' => 'Terms Title'
	        ],
	        [
	        	'key' => 'terms_content',
	        	'value' => 'Terms content'
	        ],
	        [
	        	'key' => 'policy_title',
	        	'value' => 'Policy title'
	        ],
	        [
	        	'key' => 'policy_content',
	        	'value' => 'Policy content'
	        ],
            [
                'key' => 'analytics_id',
                'value' => 'UA-25056701-1'
            ],
	        [
	        	'key' => 'fb_id',
	        	'value' => '914890341980196'
	        ],
	        [
	        	'key' => 'headercode',
	        	'value' => ''
	        ],
            [
                'key' => 'footercode',
                'value' => ''
            ],
	        [
	        	'key' => 'bodycode',
	        	'value' => ''
	        ],
        ];

        DB::table('settings')->insert($data);

        Setting::create([
            'key' => 'home_youtube',
            'name' => 'Youtube ID',
            'group' => 'HOME',
            'section' => 'Header',
            'help' => 'Insert youtube id https://www.youtube.com/watch?v=[4izN85WS49I]',
            'placeholder' => null,
            'type' => Setting::TYPE_TEXTINPUT,
            'value' => '1G4isv_Fylg',
            'sort' => 0,
            'sort_group' => Setting::SORT_HOME,
            'status' => Setting::STATUS_ACTIVE,
        ]);

        /************** CONTACT INFORMATION **************/

        Setting::create([
            'key' => 'contact_office',
            'name' => 'Phone Office',
            'group' => 'ALL PAGES',
            'section' => 'Contact Information',
            'help' => null,
            'placeholder' => null,
            'type' => Setting::TYPE_TEXTINPUT,
            'value' => '+021 - 123 1012 1211',
            'sort' => 2,
            'sort_group' => Setting::SORT_ALL_PAGES,
            'status' => Setting::STATUS_ACTIVE,
        ]);
        Setting::create([
            'key' => 'contact_whatsapp',
            'name' => 'Whatsapp',
            'group' => 'ALL PAGES',
            'section' => 'Contact Information',
            'help' => "With +62",
            'placeholder' => null,
            'type' => Setting::TYPE_TEXTINPUT,
            'value' => '+6285103009886',
            'sort' => 3,
            'sort_group' => Setting::SORT_ALL_PAGES,
            'status' => Setting::STATUS_ACTIVE,
        ]);
        Setting::create([
            'key' => 'contact_fax',
            'name' => 'FAX Office',
            'group' => 'ALL PAGES',
            'section' => 'Contact Information',
            'help' => null,
            'placeholder' => null,
            'type' => Setting::TYPE_TEXTINPUT,
            'value' => '(021) 558 2777',
            'sort' => 2,
            'sort_group' => Setting::SORT_ALL_PAGES,
            'status' => Setting::STATUS_ACTIVE,
        ]);
        Setting::create([
            'key' => 'contact_we_work',
            'name' => 'We Work',
            'group' => 'ALL PAGES',
            'section' => 'Contact Information',
            'help' => null,
            'placeholder' => null,
            'type' => Setting::TYPE_TEXTINPUT,
            'value' => '10:00 AM - 4:00 PM',
            'sort' => 2,
            'sort_group' => Setting::SORT_ALL_PAGES,
            'status' => Setting::STATUS_ACTIVE,
        ]);
        Setting::create([
            'key' => 'contact_maps_url',
            'name' => 'Google Maps Url',
            'group' => 'ALL PAGES',
            'section' => 'Contact Information',
            'help' => null,
            'placeholder' => null,
            'type' => Setting::TYPE_TEXTINPUT,
            'value' => 'https://goo.gl/maps/4YYvgZa9M5n',
            'sort' => 4,
            'sort_group' => Setting::SORT_ALL_PAGES,
            'status' => Setting::STATUS_ACTIVE,
        ]);

        Setting::create([
            'key' => 'contact_email_info',
            'name' => 'Email Info',
            'group' => 'ALL PAGES',
            'section' => 'Contact Information',
            'help' => null,
            'placeholder' => null,
            'type' => Setting::TYPE_TEXTINPUT,
            'value' => 'info@lazone.id',
            'sort' => 5,
            'sort_group' => Setting::SORT_ALL_PAGES,
            'status' => Setting::STATUS_ACTIVE,
        ]);

        Setting::create([
            'key' => 'contact_address',
            'name' => 'Address',
            'group' => 'ALL PAGES',
            'section' => 'Contact Information',
            'help' => null,
            'placeholder' => null,
            'type' => Setting::TYPE_TEXTAREA,
            'value' => '',
            'sort' => 6,
            'sort_group' => Setting::SORT_ALL_PAGES,
            'status' => Setting::STATUS_ACTIVE,
        ]);

        Setting::create([
            'key' => 'contact_facebook',
            'name' => 'Facebook',
            'group' => 'ALL PAGES',
            'section' => 'Contact Information',
            'help' => null,
            'placeholder' => null,
            'type' => Setting::TYPE_TEXTINPUT,
            'value' => 'https://www.facebook.com/LAzone.ID',
            'sort' => 7,
            'sort_group' => Setting::SORT_ALL_PAGES,
            'status' => Setting::STATUS_ACTIVE,
        ]);

        Setting::create([
            'key' => 'contact_twitter',
            'name' => 'Twitter',
            'group' => 'ALL PAGES',
            'section' => 'Contact Information',
            'help' => null,
            'placeholder' => null,
            'type' => Setting::TYPE_TEXTINPUT,
            'value' => 'https://twitter.com/lazoneid',
            'sort' => 8,
            'sort_group' => Setting::SORT_ALL_PAGES,
            'status' => Setting::STATUS_ACTIVE,
        ]);

        Setting::create([
            'key' => 'contact_youtube',
            'name' => 'Youtube',
            'group' => 'ALL PAGES',
            'section' => 'Contact Information',
            'help' => null,
            'placeholder' => null,
            'type' => Setting::TYPE_TEXTINPUT,
            'value' => 'https://www.youtube.com/user/lalightsofficial',
            'sort' => 9,
            'sort_group' => Setting::SORT_ALL_PAGES,
            'status' => Setting::STATUS_ACTIVE,
        ]);

        Setting::create([
            'key' => 'contact_instagram',
            'name' => 'Instagram',
            'group' => 'ALL PAGES',
            'section' => 'Contact Information',
            'help' => null,
            'placeholder' => null,
            'type' => Setting::TYPE_TEXTINPUT,
            'value' => 'https://instagram.com/lazone.id',
            'sort' => 9,
            'sort_group' => Setting::SORT_ALL_PAGES,
            'status' => Setting::STATUS_ACTIVE,
        ]);

    }
}
