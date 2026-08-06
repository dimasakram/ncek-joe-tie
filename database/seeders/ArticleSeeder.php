<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ArticleSeeder extends Seeder
{
    public function run(): void
    {
        $author = User::first();

        $articles = [
            [
                'title' => '5 Alasan Kopi Susu Gula Aren Selalu Jadi Favorit',
                'excerpt' => 'Kombinasi rasa manis alami dan aroma kopi robusta yang kuat bikin menu ini enggak pernah sepi peminat.',
                'content' => "Kopi susu gula aren sudah lama jadi primadona di Ncek Joe Tie. Perpaduan gula aren asli dengan susu segar dan kopi robusta pilihan menciptakan rasa yang seimbang antara manis dan pahit.\n\nSelain rasanya yang khas, proses pembuatannya juga memperhatikan kualitas bahan baku dari petani lokal. Ini yang membuat cita rasanya konsisten di setiap cangkir.\n\nKalau kamu belum pernah coba, menu ini wajib masuk daftar kunjungan pertamamu ke Ncek Joe Tie.",
                'image' => 'https://images.unsplash.com/photo-1495474472287-4d71bcdd2085?auto=format&fit=crop&w=900&q=80',
            ],
            [
                'title' => 'Tips Memilih Tempat Nongkrong yang Nyaman untuk Kerja',
                'excerpt' => 'Bukan cuma soal wifi kencang, ada beberapa hal lain yang bikin sebuah cafe nyaman dijadikan tempat kerja.',
                'content' => "Bekerja dari cafe kini jadi kebiasaan banyak orang. Tapi enggak semua cafe cocok dijadikan tempat kerja yang produktif.\n\nBeberapa hal yang perlu diperhatikan: pencahayaan yang cukup, kursi yang nyaman untuk duduk lama, colokan listrik yang memadai, dan suasana yang tidak terlalu ramai.\n\nDi Ncek Joe Tie, kami merancang beberapa sudut khusus yang nyaman untuk kamu yang ingin bekerja sambil menikmati kopi.",
                'image' => 'https://images.unsplash.com/photo-1481833761820-0509d3217039?auto=format&fit=crop&w=900&q=80',
            ],
            [
                'title' => 'Mengenal Proses Sangrai Biji Kopi yang Kami Gunakan',
                'excerpt' => 'Kualitas kopi enggak cuma soal jenis bijinya, tapi juga bagaimana proses sangrai dilakukan.',
                'content' => "Proses sangrai (roasting) sangat menentukan karakter rasa kopi yang dihasilkan. Di Ncek Joe Tie, kami memilih tingkat sangrai medium untuk menyeimbangkan keasaman dan kepahitan.\n\nBiji kopi disangrai dalam batch kecil agar kualitasnya tetap terjaga dan aromanya lebih maksimal saat diseduh.\n\nKami percaya, secangkir kopi yang enak dimulai dari proses yang diperhatikan dengan detail.",
                'image' => 'https://images.unsplash.com/photo-1509042239860-f550ce710b93?auto=format&fit=crop&w=900&q=80',
            ],
        ];

        foreach ($articles as $a) {
            Article::updateOrCreate(
                ['slug' => Str::slug($a['title'])],
                [
                    'user_id' => $author?->id,
                    'title' => $a['title'],
                    'excerpt' => $a['excerpt'],
                    'content' => $a['content'],
                    'image' => $a['image'],
                    'is_published' => true,
                    'published_at' => now()->subDays(rand(1, 15)),
                ]
            );
        }
    }
}