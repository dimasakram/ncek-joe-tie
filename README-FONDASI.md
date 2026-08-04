# Ncek Joe Tie - Tahap 1: Fondasi

Tahap ini berisi: migration (12 tabel), model Eloquent + relasi, seeder, dan autentikasi admin.

## Cara Pakai (di komputer lokal kamu, bukan di sandbox ini)

Sandbox ini tidak punya akses ke Packagist/internet penuh, jadi filenya perlu digabung ke instalasi Laravel asli di laptop kamu.

1. Buat project Laravel baru:
   ```
   composer create-project laravel/laravel ncek-joe-tie
   cd ncek-joe-tie
   ```
2. Salin semua file dari folder ini ke project barumu, timpa file yang sama:
   - `database/migrations/*` -> timpa migration users bawaan dengan punya kita
   - `database/seeders/*`
   - `app/Models/*`
   - `app/Http/Middleware/AdminMiddleware.php`
   - `app/Http/Controllers/Auth/AdminLoginController.php`
   - `bootstrap/app.php` -> timpa punya bawaan (sudah termasuk daftar middleware alias `admin`)
   - `routes/web.php` dan `routes/admin.php` (routes/admin.php baru, di-require dari bootstrap/app.php)
   - `resources/views/admin/auth/login.blade.php`
   - `resources/views/admin/dashboard/placeholder.blade.php`
   - `resources/views/welcome.blade.php`
   - `.env.example` -> salin ke `.env`, sesuaikan DB, lalu `php artisan key:generate`

3. Buat database MySQL bernama `db_nji`.
4. Jalankan migrasi + seeder:
   ```
   php artisan migrate --seed
   php artisan storage:link
   ```
5. Jalankan server:
   ```
   php artisan serve
   ```
6. Login admin di `http://localhost:8000/admin/login`
   - Email: `admin@ncekjoetie.com`
   - Password: `12345678`

## Yang sudah selesai di tahap ini
- 12 migration tabel (users, categories, menus, promos, galleries, articles, testimonials, reservations, faqs, contacts, restaurant_profiles, settings) lengkap dengan foreign key
- Model Eloquent + relasi (Category -> Menu, Menu -> Promo, Article -> User, dst) + scope aktif untuk promo & artikel published
- Seeder: admin default, 4 kategori, 9 menu contoh, profil restoran, dan pengaturan website
- Autentikasi admin: login, logout, middleware `admin` yang menolak user non-admin
- Halaman placeholder dashboard admin (biar bisa dites login-nya dulu)

## Tahap selanjutnya
- Halaman Frontend (Home, Tentang, Menu, Promo, Galeri, Artikel, Reservasi, Kontak)
- Dashboard Admin lengkap (sidebar, CRUD semua entitas, statistik, grafik)
