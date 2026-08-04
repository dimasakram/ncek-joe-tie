<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    public function run(): void
    {
        $settings = [
            'site_name' => 'Ncek Joe Tie',
            'site_tagline' => 'Cafe & Resto Hangat Penuh Cita Rasa',
            'meta_title' => 'Ncek Joe Tie - Cafe & Resto',
            'meta_description' => 'Ncek Joe Tie menghadirkan kopi dan hidangan hangat dengan suasana cafe yang elegan dan nyaman.',
            'favicon' => null,
            'og_image' => null,
            'primary_color' => '#3E5F2B',
        ];

        foreach ($settings as $key => $value) {
            Setting::set($key, $value);
        }
    }
}
