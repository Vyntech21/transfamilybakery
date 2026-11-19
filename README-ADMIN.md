# Admin Promo TransFamily Bakery

Admin sederhana (Blade + login Laravel), tanpa paket tambahan.
Promo bisa dinyalakan/dimatikan dan dijadwalkan; website otomatis menampilkannya.

## Pasang
1. Salin isi folder ini ke project (app, config, database, resources, routes).
2. Di `routes/web.php` tambahkan di baris paling bawah:
       require __DIR__.'/admin.php';
3. Di `.env`:
       APP_TIMEZONE=Asia/Jakarta        # penting agar jadwal promo sesuai WIB
       BAKERY_WA=6282261011170
       ADMIN_NAME="Admin TransFamily"
       ADMIN_EMAIL=emailanda@contoh.com
       ADMIN_PASSWORD=password-kuat-min-12-karakter
4. Jalankan:
       php artisan config:clear
       php artisan migrate
       php artisan db:seed --class=AdminSeeder
       php artisan db:seed --class=PromoSeeder      # opsional (promo contoh, nonaktif)
       php artisan storage:link                     # agar gambar promo tampil
   Setelah akun admin jadi, HAPUS ADMIN_PASSWORD dari .env.
5. Sambungkan ke website (di file Blade halaman depan):
       @include('partials.promo-bar')       {{-- tepat setelah <body> --}}
       @include('partials.promo-section')   {{-- di bagian mana pun, mis. setelah testimoni --}}
6. Buka http://transfamilybakery.test/admin/login

## Cara kerja
Promo tayang di website bila: saklar "Aktif" menyala DAN tanggal sekarang di antara
"Mulai" dan "Berakhir" (kosong = tanpa batas). Tidak ada promo tayang = bagian promo
tidak muncul sama sekali.

## Catatan keamanan
- Login dibatasi 5 percobaan per menit.
- Hanya user dengan is_admin = 1 yang bisa masuk /admin.
- Online nanti: wajib HTTPS, APP_DEBUG=false, dan .env jangan di-commit.
- Kalau project sudah punya route bernama "login" (mis. Breeze), ganti nama route login di routes/admin.php.
