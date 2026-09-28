<?php

namespace Database\Seeders;

use App\Models\RestaurantProfile;
use Illuminate\Database\Seeder;

class RestaurantProfileSeeder extends Seeder
{
    public function run(): void
    {
        RestaurantProfile::updateOrCreate(
            ['id' => 1],
            [
                'name' => 'Ncek Joe Tie',
                'address' => 'Jl. Raya Contoh No. 123, Sukabumi, Jawa Barat',
                'phone' => '0266-123456',
                'whatsapp' => '628123456789',
                'email' => 'info@ncekjoetie.com',
                'instagram' => 'https://instagram.com/ncekjoetie',
                'facebook' => 'https://facebook.com/ncekjoetie',
                'opening_hours' => 'Setiap hari, 09.00 - 22.00 WIB',
            ]
        );
    }
}