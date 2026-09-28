<?php

namespace Database\Seeders;

use App\Models\AboutPage;
use Illuminate\Database\Seeder;

class AboutPageSeeder extends Seeder
{
    public function run(): void
    {
        AboutPage::updateOrCreate(
            ['id' => 1],
            [
                'history' => 'Ncek Joe Tie berawal dari kedai kecil yang menyajikan kopi dan hidangan hangat dengan resep turun-temurun.',
                'vision' => 'Menjadi cafe resto pilihan keluarga yang menghadirkan kehangatan di setiap kunjungan.',
                'mission' => 'Menyajikan menu berkualitas dengan pelayanan ramah dan suasana yang nyaman.',
                'core_values' => 'Kualitas, Kehangatan, Konsistensi, dan Kepuasan Pelanggan.',
                'coffee_sourcing_title' => 'Coffee Sourcing',
                'coffee_sourcing_description' => 'Kami percaya secangkir kopi yang enak dimulai jauh sebelum proses seduh. Biji kopi yang kami gunakan dipilih langsung dari petani lokal di dataran tinggi, dipanen pada waktu yang tepat untuk menjaga karakter rasa terbaiknya. Setiap batch disangrai dalam jumlah kecil agar kualitas tetap terjaga, lalu diuji rasanya sebelum sampai ke cangkirmu.',
            ]
        );
    }
}