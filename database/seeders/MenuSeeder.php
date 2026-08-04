<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Menu;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class MenuSeeder extends Seeder
{
    public function run(): void
    {
        $menus = [
            ['category' => 'kopi', 'name' => 'Kopi Susu Gula Aren', 'price' => 22000, 'best' => true, 'new' => false, 'desc' => 'Kopi robusta pilihan dipadukan susu segar dan gula aren asli.'],
            ['category' => 'kopi', 'name' => 'Americano', 'price' => 18000, 'best' => false, 'new' => false, 'desc' => 'Espresso murni dengan air panas, rasa kopi yang bold dan bersih.'],
            ['category' => 'kopi', 'name' => 'Cappuccino', 'price' => 25000, 'best' => false, 'new' => true, 'desc' => 'Perpaduan espresso, susu steamed, dan foam lembut.'],
            ['category' => 'non-kopi', 'name' => 'Matcha Latte', 'price' => 24000, 'best' => true, 'new' => false, 'desc' => 'Matcha premium Jepang dipadukan susu segar.'],
            ['category' => 'non-kopi', 'name' => 'Chocolate Malt', 'price' => 23000, 'best' => false, 'new' => false, 'desc' => 'Cokelat creamy dengan sentuhan malt yang khas.'],
            ['category' => 'makanan', 'name' => 'Nasi Goreng Ncek', 'price' => 32000, 'best' => true, 'new' => false, 'desc' => 'Nasi goreng khas dengan bumbu rahasia dan telur mata sapi.'],
            ['category' => 'makanan', 'name' => 'Ayam Geprek Sambal Matah', 'price' => 30000, 'best' => false, 'new' => true, 'desc' => 'Ayam crispy dengan sambal matah pedas segar.'],
            ['category' => 'cemilan', 'name' => 'French Fries', 'price' => 18000, 'best' => false, 'new' => false, 'desc' => 'Kentang goreng renyah dengan saus pilihan.'],
            ['category' => 'cemilan', 'name' => 'Pisang Nugget', 'price' => 16000, 'best' => true, 'new' => false, 'desc' => 'Pisang crispy dengan topping cokelat dan keju.'],
        ];

        foreach ($menus as $m) {
            $category = Category::where('slug', $m['category'])->first();
            if (! $category) {
                continue;
            }

            Menu::updateOrCreate(
                ['slug' => Str::slug($m['name'])],
                [
                    'category_id' => $category->id,
                    'name' => $m['name'],
                    'description' => $m['desc'],
                    'composition' => null,
                    'price' => $m['price'],
                    'is_best_seller' => $m['best'],
                    'is_new' => $m['new'],
                    'is_available' => true,
                ]
            );
        }
    }
}
