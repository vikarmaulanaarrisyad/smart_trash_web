<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Setting::query()->updateOrCreate(
            [
                'id' => 1
            ],
            [
                'nama_aplikasi' => 'Smart Trash Web',
                'logo_aplikasi' => 'logo.png',
                'favicon_aplikasi' => 'favicon.png',
                'logo_login' => 'logo.png',
                'tipe_aplikasi' => 'Laravel',
                'url_aplikasi' => 'https://smarttrashweb.com',
                'deskripsi_aplikasi' => 'Aplikasi Smart Trash Web',
                'footer_aplikasi' => 'Copyright © 2024. All rights reserved.',
                'interval'  => 1000,

                'versi_aplikasi' => '1.0.0',
                'versi_database' => '1.0.0',
                'versi_laravel' => '11.0',
                'versi_php' => '1.0.0'
            ]
        );
    }
}
