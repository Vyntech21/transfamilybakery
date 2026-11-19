# Database TransFamily Bakery (Laravel) - LENGKAP

Gabungan skema v1 + v2 + v3 dalam bentuk migration, siap di-push ke GitHub.

## Isi paket
- `database/migrations/` : 11 file migration (urutan sudah benar, foreign key aman)
- `database/seeders/`    : BakerySeeder + seeder per bagian (tidak bergantung pada config/bakery.php)
- `app/Models/`          : Category, Product, Outlet, Article, ArticleCategory, Testimonial,
                           Setting, Photo, TimelineEvent, PesatOrder, PesatOrderItem, ContactMessage

## Pasang di project
1. Salin folder `app/Models`, `database/migrations`, `database/seeders` ke project
   (DatabaseSeeder lama akan tertimpa; kalau ada isi penting, cukup tambahkan
   `$this->call(BakerySeeder::class);` ke DatabaseSeeder milik Anda).
2. Buat database kosong, atur `.env` (DB_CONNECTION=mysql, DB_DATABASE=transfamily, dst.)
3. `php artisan config:clear`
4. `php artisan migrate --seed`
   Ulang dari nol (menghapus data): `php artisan migrate:fresh --seed`

## Pemakaian
Product::active()->with('category')->get();
Product::bestSellers()->take(8)->get();
Product::active()->search('ro')->limit(8)->get();
Outlet::active()->get();
Outlet::where('slug', 'binjai')->firstOrFail();
Article::published()->with('category')->paginate(9);
Photo::placement('hero')->get();
Setting::get('whatsapp');

## Catatan sebelum publish
- Produk di ProductSeeder hanya contoh (harga kosong). Ganti dengan data asli.
- Alamat cabang selain Pusat Stabat masih kosong.
- Garis waktu baru berisi tahun 2010.
- Tabel admin tidak dibuat: pakai tabel `users` bawaan Laravel.
- Jangan commit .env atau file .sql berisi data pelanggan.

## Tambahan di versi lengkap
- Migration `promos` (2026_11_18_000020) dan kolom `users.is_admin` (2026_11_18_000021)
- Model Promo, AdminSeeder, PromoSeeder, config/promo.php
- Sudah pernah menjalankan migrate versi sebelumnya? Cukup salin file baru lalu jalankan:
      php artisan migrate
  (hanya 2 migration baru yang dijalankan, data lama aman)
- Buat akun admin: isi ADMIN_EMAIL dan ADMIN_PASSWORD (min. 12 karakter) di .env, lalu
      php artisan db:seed --class=AdminSeeder
  Setelah itu hapus ADMIN_PASSWORD dari .env.
