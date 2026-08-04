# Ncek Joe Tie - Tahap 3: Halaman Frontend

Tahap ini melengkapi tahap Fondasi dan Dashboard Admin dengan seluruh halaman publik (frontend).

## Cara Pakai
Salin file-file baru berikut ke project Laravel kamu:

- `app/Providers/AppServiceProvider.php` (timpa yang lama — sekarang share $profile & $settings ke semua view)
- `app/Http/Controllers/HomeController.php`, `MenuController.php`, `PromoController.php`, `GalleryController.php`, `ArticleController.php`, `ReservationController.php`, `ContactController.php`, `SitemapController.php`
- `app/Http/Requests/StoreReservationRequest.php`, `StoreContactRequest.php`
- `resources/views/layouts/app.blade.php` (layout publik)
- `resources/views/home.blade.php`, `about.blade.php`, `sitemap.blade.php`
- `resources/views/menu/`, `promo/`, `gallery/`, `article/`, `reservation/`, `contact/`
- `resources/views/errors/404.blade.php`, `500.blade.php`
- `routes/web.php` (timpa versi lama)
- `public/robots.txt`

**Penting:** hapus `resources/views/welcome.blade.php` kalau masih ada (sudah diganti route `/` ke `HomeController`).

Setelah itu:
```
php artisan serve
```
Buka `http://localhost:8000` — kalau data menu/promo/galeri/testimoni/FAQ masih kosong, isi dulu lewat dashboard admin (`/admin/login`) supaya section Home enggak kosong.

## Yang sudah selesai di tahap ini
- **Layout publik**: navbar transparan yang berubah solid saat scroll, footer lengkap, animasi fade-up (Intersection Observer), tombol back-to-top, loading spinner, SweetAlert2 untuk flash message
- **Home**: Hero, Tentang Kami, Menu Favorit, Promo aktif, Kenapa Memilih Kami, Galeri (lightbox), Testimoni (carousel), FAQ (accordion), Lokasi (embed Google Maps)
- **Tentang Kami**: sejarah, visi, misi, nilai perusahaan
- **Menu**: search + filter kategori + pagination, halaman detail dengan menu terkait & penghitung views
- **Promo**: hanya menampilkan promo yang sedang aktif (scope `active()`)
- **Galeri**: filter kategori (makanan/interior/event) + lightbox
- **Artikel**: search + pagination, halaman detail dengan artikel terkait, hanya yang published
- **Reservasi**: form dengan validasi (tanggal tidak boleh sebelum hari ini)
- **Kontak**: form + info kontak + peta
- **SEO**: meta title/description dinamis per halaman, Open Graph, Schema.org Restaurant, `robots.txt`, `sitemap.xml` dinamis (route `/sitemap.xml`)
- **Custom 404 & 500 page** bertema cafe

## Semua tahap sudah selesai
Fondasi → Dashboard Admin → Halaman Frontend. Project ini sekarang lengkap sesuai spesifikasi awal. Kalau mau, saya bisa bantu poles detail tertentu (misalnya isi konten dummy lebih banyak, atau sesuaikan UI) — tinggal bilang bagian mana.
