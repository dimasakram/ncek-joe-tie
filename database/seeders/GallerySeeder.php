<?php

namespace Database\Seeders;

use App\Models\Gallery;
use Illuminate\Database\Seeder;

class GallerySeeder extends Seeder
{
    public function run(): void
    {
        $photos = [
            ['title' => 'Secangkir Kopi Hangat', 'category' => 'makanan', 'url' => 'https://images.unsplash.com/photo-1495474472287-4d71bcdd2085?auto=format&fit=crop&w=800&q=80'],
            ['title' => 'Suasana Cafe', 'category' => 'interior', 'url' => 'https://images.unsplash.com/photo-1554118811-1e0d58224f24?auto=format&fit=crop&w=800&q=80'],
            ['title' => 'Racikan Kopi Pilihan', 'category' => 'makanan', 'url' => 'https://images.unsplash.com/photo-1509042239860-f550ce710b93?auto=format&fit=crop&w=800&q=80'],
            ['title' => 'Latte Art', 'category' => 'makanan', 'url' => 'https://images.unsplash.com/photo-1445116572660-236099ec97a0?auto=format&fit=crop&w=800&q=80'],
            ['title' => 'Sudut Nyaman', 'category' => 'interior', 'url' => 'https://images.unsplash.com/photo-1481833761820-0509d3217039?auto=format&fit=crop&w=800&q=80'],
            ['title' => 'Momen Berkumpul', 'category' => 'event', 'url' => 'https://images.unsplash.com/photo-1521017432531-fbd92d768814?auto=format&fit=crop&w=800&q=80'],
            ['title' => 'Kursi Outdoor', 'category' => 'interior', 'url' => 'https://images.unsplash.com/photo-1414235077428-338989a2e8c0?auto=format&fit=crop&w=800&q=80'],
            ['title' => 'Hidangan Spesial', 'category' => 'makanan', 'url' => 'https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?auto=format&fit=crop&w=800&q=80'],
            ['title' => 'Racikan Manual Brew', 'category' => 'makanan', 'url' => 'https://images.unsplash.com/photo-1442512595331-e89e73853f31?auto=format&fit=crop&w=800&q=80'],
            ['title' => 'Sarapan Hangat', 'category' => 'makanan', 'url' => 'https://images.unsplash.com/photo-1533089860892-a7c6f0a88666?auto=format&fit=crop&w=800&q=80'],
        ];

        foreach ($photos as $i => $p) {
            Gallery::updateOrCreate(
                ['title' => $p['title']],
                [
                    'image' => $p['url'],
                    'category' => $p['category'],
                    'order' => $i,
                ]
            );
        }
    }
}