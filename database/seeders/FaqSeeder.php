<?php

namespace Database\Seeders;

use App\Models\Faq;
use Illuminate\Database\Seeder;

class FaqSeeder extends Seeder
{
    public function run(): void
    {
        $faqs = [
            ['q' => 'Apakah perlu reservasi sebelum datang?', 'a' => 'Enggak wajib, tapi disarankan terutama saat akhir pekan atau jam ramai (sore-malam) supaya kamu enggak perlu menunggu tempat duduk.'],
            ['q' => 'Apakah tersedia menu tanpa kopi?', 'a' => 'Tentu! Kami punya kategori Non Kopi seperti matcha latte dan chocolate malt, juga aneka makanan dan cemilan untuk kamu yang enggak minum kopi.'],
            ['q' => 'Apakah bisa pesan untuk acara atau rombongan besar?', 'a' => 'Bisa. Silakan hubungi kami lewat halaman Kontak atau WhatsApp untuk atur jadwal dan menu khusus rombongan.'],
            ['q' => 'Apakah tersedia wifi dan colokan listrik?', 'a' => 'Tersedia di hampir semua area duduk, cocok untuk kamu yang ingin kerja santai sambil ngopi.'],
            ['q' => 'Bagaimana cara melihat promo yang sedang berlangsung?', 'a' => 'Cek halaman Promo di website ini — kami selalu update penawaran terbaru di sana.'],
            ['q' => 'Apakah ada opsi pesan bawa pulang (takeaway)?', 'a' => 'Ada, kamu bisa datang langsung ke kasir kami untuk pesan takeaway tanpa perlu reservasi.'],
        ];

        foreach ($faqs as $i => $f) {
            Faq::updateOrCreate(
                ['question' => $f['q']],
                [
                    'answer' => $f['a'],
                    'order' => $i,
                    'is_active' => true,
                ]
            );
        }
    }
}