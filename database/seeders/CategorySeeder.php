<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'Kopi', 'slug' => 'kopi', 'icon' => 'bi-cup-hot', 'order' => 1],
            ['name' => 'Non Kopi', 'slug' => 'non-kopi', 'icon' => 'bi-cup-straw', 'order' => 2],
            ['name' => 'Makanan', 'slug' => 'makanan', 'icon' => 'bi-egg-fried', 'order' => 3],
            ['name' => 'Cemilan', 'slug' => 'cemilan', 'icon' => 'bi-cookie', 'order' => 4],
        ];

        foreach ($categories as $category) {
            Category::updateOrCreate(['slug' => $category['slug']], $category);
        }
    }
}
