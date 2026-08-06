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
            ['category' => 'kopi', 'name' => 'Kopi Susu Gula Aren', 'price' => 22000, 'best' => true, 'new' => false, 'desc' => 'Kopi robusta pilihan dipadukan susu segar dan gula aren asli.', 'image' => 'https://images.unsplash.com/photo-1495474472287-4d71bcdd2085?auto=format&fit=crop&w=700&q=80'],
            ['category' => 'kopi', 'name' => 'Americano', 'price' => 18000, 'best' => false, 'new' => false, 'desc' => 'Espresso murni dengan air panas, rasa kopi yang bold dan bersih.', 'image' => 'https://images.unsplash.com/photo-1447933601403-0c6688de566e?auto=format&fit=crop&w=700&q=80'],
            ['category' => 'kopi', 'name' => 'Cappuccino', 'price' => 25000, 'best' => false, 'new' => true, 'desc' => 'Perpaduan espresso, susu steamed, dan foam lembut.', 'image' => 'https://images.unsplash.com/photo-1534778101976-62847782c213?auto=format&fit=crop&w=700&q=80'],
            ['category' => 'non-kopi', 'name' => 'Matcha Latte', 'price' => 24000, 'best' => true, 'new' => false, 'desc' => 'Matcha premium Jepang dipadukan susu segar.', 'image' => 'https://images.unsplash.com/photo-1515823064-d6e0c04616a7?auto=format&fit=crop&w=700&q=80'],
            ['category' => 'non-kopi', 'name' => 'Chocolate Malt', 'price' => 23000, 'best' => false, 'new' => false, 'desc' => 'Cokelat creamy dengan sentuhan malt yang khas.', 'image' => 'https://images.unsplash.com/photo-1541167760496-1628856ab772?auto=format&fit=crop&w=700&q=80'],
            ['category' => 'makanan', 'name' => 'Nasi Goreng Ncek', 'price' => 32000, 'best' => true, 'new' => false, 'desc' => 'Nasi goreng khas dengan bumbu rahasia dan telur mata sapi.', 'image' => 'https://images.unsplash.com/photo-1512058564366-18510be2db19?auto=format&fit=crop&w=700&q=80'],
            ['category' => 'makanan', 'name' => 'Ayam Geprek Sambal Matah', 'price' => 30000, 'best' => false, 'new' => true, 'desc' => 'Ayam crispy dengan sambal matah pedas segar.', 'image' => 'https://images.unsplash.com/photo-1626082927389-6cd097cee6a6?auto=format&fit=crop&w=700&q=80'],
            ['category' => 'cemilan', 'name' => 'French Fries', 'price' => 18000, 'best' => false, 'new' => false, 'desc' => 'Kentang goreng renyah dengan saus pilihan.', 'image' => 'https://images.unsplash.com/photo-1573080496219-bb080dd4f877?auto=format&fit=crop&w=700&q=80'],
            ['category' => 'cemilan', 'name' => 'Pisang Nugget', 'price' => 16000, 'best' => true, 'new' => false, 'desc' => 'Pisang crispy dengan topping cokelat dan keju.', 'image' => 'https://images.unsplash.com/photo-1587314168485-3236d6710814?auto=format&fit=crop&w=700&q=80'],
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
                    'image' => $m['image'] ?? null,
                    'is_best_seller' => $m['best'],
                    'is_new' => $m['new'],
                    'is_available' => true,
                ]
            );
        }
    }
}