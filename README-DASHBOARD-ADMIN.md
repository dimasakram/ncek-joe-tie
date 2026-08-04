# Ncek Joe Tie - Tahap 2: Dashboard Admin

Tahap ini melengkapi tahap Fondasi dengan dashboard admin lengkap: sidebar, statistik, grafik, dan CRUD penuh untuk semua entitas.

## Cara Pakai
Salin file-file baru berikut ke project Laravel kamu (menimpa yang lama untuk `routes/admin.php`):

- `app/Providers/AppServiceProvider.php` + `bootstrap/providers.php` (pagination Bootstrap 5)
- `app/Http/Controllers/Admin/*` (13 controller: Dashboard, Menu, Category, Promo, Gallery, Article, Testimonial, Faq, Reservation, Contact, RestaurantProfile, Setting, AdminUser)
- `app/Http/Requests/Admin/*` (Form Request validation untuk tiap resource)
- `resources/views/admin/*` (layout sidebar + semua view index/create/edit)
- `routes/admin.php` (timpa versi lama)

Lalu jalankan lagi (kalau belum):
```
php artisan migrate --seed
php artisan storage:link
php artisan serve
```

## Yang sudah selesai di tahap ini
- **Layout sidebar** modern bertema Olive Green/Cream/Coral, responsive, dengan SweetAlert2 untuk konfirmasi hapus & flash message
- **Dashboard**: kartu statistik (Total Menu, Reservasi, Artikel, Promo, Testimoni) + grafik reservasi bulanan (Chart.js) + daftar reservasi terbaru
- **CRUD penuh** (Form Request validation, upload gambar via Storage, hapus gambar lama saat update/hapus):
  - Kelola Menu (search + filter kategori + pagination)
  - Kelola Kategori
  - Kelola Promo (relasi ke menu, periode aktif)
  - Kelola Galeri (tampilan grid per foto)
  - Kelola Artikel (draft/publish, meta SEO)
  - Kelola Testimoni (rating bintang, featured di Home)
  - Kelola FAQ (urutan tampil, aktif/nonaktif)
  - Kelola Reservasi (filter status, ubah status pending/confirmed/cancelled)
  - Kelola Kontak (tandai terbaca otomatis saat dibuka)
  - Profil Restoran (data singleton: sejarah, visi misi, kontak, maps)
  - Pengaturan Website (SEO meta, favicon, OG image, warna tema)
  - Kelola Admin (tidak bisa hapus akun sendiri)

## Tahap selanjutnya
- Halaman Frontend (Home, Tentang, Menu, Promo, Galeri, Artikel, Reservasi, Kontak) yang mengonsumsi semua data ini
