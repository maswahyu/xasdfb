<?php

use App\Setting;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingsTableSeederTwo extends Seeder
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
                'key' => 'point_copy',
                'name' => 'Point Copy',
                'group' => 'MYPOINT',
                'section' => 'COPY',
                'value' => 'Dapatkan <strong>#Merchandise</strong> Merchandise Pack - Scratch Visible X LAZone.ID atau <strong>#TukarLAngsung</strong> point kamu, buat kesempatan menangin PlayStation 5',
                'type' => Setting::TYPE_TEXTAREA,
                'sort' => 5,
                'sort_group' => Setting::SORT_MYPOINT,
                'status' => Setting::STATUS_ACTIVE
            ],
            [
                'key' => 'point_tnc_copy',
                'name' => 'TNC Copy',
                'group' => 'MYPOINT',
                'section' => 'COPY',
                'value' => 'Hadiah utama dan merchandise bulanan per bulan Desember 2021 adalah <strong>#TukarLAngsung</strong> PlayStation 5 dan <strong>#Merchandise</strong> Merchandise Pack - Scratch Visible X LAZone.ID',
                'type' => Setting::TYPE_TEXTAREA,
                'sort' => 5,
                'sort_group' => Setting::SORT_MYPOINT,
                'status' => Setting::STATUS_ACTIVE
            ],
            [
                'key' => 'point_popup',
                'name' => 'Home Popup',
                'group' => 'MYPOINT',
                'section' => 'POPUP',
                'value' => 'placeholder.jpg',
                'type' => Setting::TYPE_IMAGE,
                'sort' => 5,
                'sort_group' => Setting::SORT_MYPOINT,
                'status' => Setting::STATUS_ACTIVE
            ],
            [
                'key' => 'point_popup_status',
                'name' => 'Enable Home Popup',
                'group' => 'MYPOINT',
                'section' => 'POPUP',
                'value' => 0,
                'type' => Setting::TYPE_CHECKSWITCH,
                'sort' => 5,
                'sort_group' => Setting::SORT_MYPOINT,
                'status' => Setting::STATUS_ACTIVE
            ],
        ];

        DB::table('settings')->insert($data);
    }
}
