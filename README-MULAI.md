# TransFamily Bakery - paket lengkap (Laravel)

Satu paket: redesain website + database + admin promo.
Salin SEMUA isi folder ini ke dalam project (timpa bila ditanya). Disarankan pakai branch baru:

    git checkout -b versi-lengkap

## Langkah
1. Salin isi paket ke folder project.
2. Atur .env sesuai ENV-TAMBAHAN.txt (pilih SQLite ATAU MySQL).
3. Database:
   - SQLite: sudah ada di database/database.sqlite (tabel + data awal, tidak perlu migrate).
   - MySQL: buat database kosong, lalu `php artisan migrate --seed`
4. `php artisan storage:link`
5. Buat admin: isi ADMIN_EMAIL + ADMIN_PASSWORD (min. 12 karakter) di .env, lalu
       php artisan db:seed --class=AdminSeeder
   dan hapus ADMIN_PASSWORD dari .env.
6. `php artisan optimize:clear`
7. Buka http://transfamilybakery.test  (admin: /admin/login)

## Isi
- routes/web.php        : / , /tentang , /katalog , /layanan/si-pesat , /toko , /artikel (+ admin otomatis)
- app/                  : PageController, Support (SiteData, Wa), Admin controllers, Middleware, 13 model
- database/migrations   : 13 migration (termasuk promos dan users.is_admin)
- database/seeders      : data awal + AdminSeeder
- resources/views       : layout, 6 halaman, partials promo, admin
- public/css, public/js : site.css, site.js
- public/images         : taruh foto .webp di sini (daftar nama: lihat bawah)

## Foto (public/images, format .webp; belum ada = placeholder)
logo, hero-kiri-1..3, hero-kanan-1..3, produk-roti-jadul, produk-roti-modern, produk-kue-ultah,
produk-cheesecake, produk-khas-langkat, produk-pastry, produk-hampers, kolase-1..5, q3d-1..4,
tentang-1..3, cerita-pemilik, cerita-tim, cerita-dapur, cerita-ultah,
outlet-pusat-stabat, outlet-binjai, outlet-stabor, outlet-perniagaan-stabat,
outlet-pangkalan-berandan, outlet-kuala-simpang

## Catatan
- Butuh internet saat membuka website (Swiper, GLightbox, Alpine, vanilla-tilt dari CDN).
- Produk, harga, dan alamat cabang masih contoh/kosong: isi sebelum publish.
- Jangan commit .env. database.sqlite biasanya di-ignore git (aman).

## Foto yang SUDAH terpasang (public/images)
logo (latar transparan), hero/ (10 foto), produk-roti-jadul, produk-roti-modern,
produk-kue-ultah, produk-cheesecake, produk-khas-langkat, produk-hampers, kolase-1..5, q3d-1..4,
dan di public/images/produk: bolu-switch-roll-mocca, roti-kelapa-ceres, bolu-cake-marmor, cheesecake.
Yang masih placeholder: produk-pastry, tentang-1..3, cerita-*, outlet-*.
Untuk mengganti foto, timpa file dengan nama yang sama (format .webp).

## Hero bergerak otomatis
Foto di kiri dan kanan beranda meluncur masuk dari balik tepi layar, lalu berganti foto secara bergilir.
Semua foto di public/images/hero/ otomatis ikut (urut nama file: nomor genap = kiri, ganjil = kanan).
Tambah foto baru cukup dengan menaruh file persegi (.webp/.jpg/.png) di folder itu, mis. 11-nama.webp.
Animasi berhenti otomatis bila pengguna memilih mode hemat animasi.

## Latar beranda berganti otomatis
Foto kue di belakang beranda berganti sendiri (pudar silang + zoom pelan, tiap 6 detik).
Semua foto di public/images/hero-bg/ otomatis ikut (urut nama file; ukuran ideal 1280x720, .webp).
Tambah foto baru: taruh file di folder itu, mis. 11-nama.webp. Folder kosong = latar polos.
Lapisan putih tipis (.veil di public/css/site.css) menjaga tulisan tetap terbaca; ubah angka
opacity-nya untuk membuat foto lebih jelas atau lebih samar.
