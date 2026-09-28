<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            AdminUserSeeder::class,
            CategorySeeder::class,
            MenuSeeder::class,
            RestaurantProfileSeeder::class,
            AboutPageSeeder::class,
            SettingSeeder::class,
            PromoSeeder::class,
            GallerySeeder::class,
            ArticleSeeder::class,
            TestimonialSeeder::class,
            FaqSeeder::class,
        ]);
    }
}