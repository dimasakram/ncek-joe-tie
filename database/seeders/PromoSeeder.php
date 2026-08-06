<?php

namespace Database\Seeders;

use App\Models\Menu;
use App\Models\Promo;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PromoSeeder extends Seeder
{
    public function run(): void
    {
        $promos = [
            [
                'title' => 'Promo Ngopi Pagi',
                'menu' => 'Kopi Susu Gula Aren',
                'desc' => 'Diskon spesial untuk kamu yang memulai hari lebih awal bersama kami. Berlaku setiap pukul 07.00-10.00.',
                'discount' => 20,
                'image' => 'https://images.unsplash.com/photo-1495474472287-4d71bcdd2085?auto=format&fit=crop&w=900&q=80',
                'start' => now()->subDays(5),
                'end' => now()->addDays(25),
            ],
            [
                'title' => 'Paket Hangout Berdua',
                'menu' => null,
                'desc' => 'Pesan 2 minuman kopi apa saja dan dapatkan satu cemilan gratis. Cocok buat kamu yang datang bareng teman.',
                'discount' => 15,
                'image' => 'https://images.unsplash.com/photo-1521017432531-fbd92d768814?auto=format&fit=crop&w=900&q=80',
                'start' => now()->subDays(2),
                'end' => now()->addDays(20),
            ],
            [
                'title' => 'Weekend Feast',
                'menu' => 'Nasi Goreng Ncek',
                'desc' => 'Nikmati potongan harga untuk menu makanan favorit setiap akhir pekan bersama keluarga.',
                'discount' => 10,
                'image' => 'https://images.unsplash.com/photo-1414235077428-338989a2e8c0?auto=format&fit=crop&w=900&q=80',
                'start' => now()->subDays(1),
                'end' => now()->addDays(30),
            ],
        ];

        foreach ($promos as $p) {
            $menu = $p['menu'] ? Menu::where('name', $p['menu'])->first() : null;

            Promo::updateOrCreate(
                ['slug' => Str::slug($p['title'])],
                [
                    'menu_id' => $menu?->id,
                    'title' => $p['title'],
                    'description' => $p['desc'],
                    'image' => $p['image'],
                    'discount_percent' => $p['discount'],
                    'start_date' => $p['start'],
                    'end_date' => $p['end'],
                    'is_active' => true,
                ]
            );
        }
    }
}