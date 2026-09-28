<?php

namespace Database\Seeders;

use App\Models\Testimonial;
use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    public function run(): void
    {
        $testimonials = [
            ['name' => 'Andini Putri', 'rating' => 5, 'message' => 'Kopi susu gula arennya juara, dan tempatnya nyaman banget buat kerja santai sambil ngopi.', 'photo' => 'https://images.unsplash.com/photo-1544005313-94ddf0286df2?auto=format&fit=crop&w=200&q=80'],
            ['name' => 'Raka Pratama', 'rating' => 5, 'message' => 'Pelayanannya ramah, makanannya enak, dan harganya masih masuk akal buat sekelas cafe senyaman ini.', 'photo' => 'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?auto=format&fit=crop&w=200&q=80'],
            ['name' => 'Salsabila Rahma', 'rating' => 4, 'message' => 'Suasananya hangat, cocok buat kumpul bareng keluarga di akhir pekan. Bakal balik lagi!', 'photo' => 'https://images.unsplash.com/photo-1517841905240-472988babdf9?auto=format&fit=crop&w=200&q=80'],
            ['name' => 'Bima Satria', 'rating' => 5, 'message' => 'Nasi goreng Ncek enak banget, porsinya pas, dan kopinya tetap jadi favorit tiap kesini.', 'photo' => 'https://images.unsplash.com/photo-1539571696357-5a69c17a67c6?auto=format&fit=crop&w=200&q=80'],
        ];

        foreach ($testimonials as $t) {
            Testimonial::updateOrCreate(
                ['name' => $t['name']],
                [
                    'rating' => $t['rating'],
                    'message' => $t['message'],
                    'photo' => $t['photo'],
                    'is_featured' => true,
                ]
            );
        }
    }
}