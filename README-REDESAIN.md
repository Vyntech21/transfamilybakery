# Redesain TransFamily Bakery (Laravel + Blade)

Mengikuti dokumen "Ide Redesain Website" (15 November 2026).
Halaman: / , /tentang , /katalog , /layanan/si-pesat , /toko , /artikel , /artikel/{slug}

## Pasang
1. Salin isi folder ini ke project (app, config, public, resources, routes).
   routes/web.php lama TERTIMPA; resources/views/welcome.blade.php tidak dipakai lagi.
2. Pastikan paket database sudah dipasang (php artisan migrate --seed).
   Tanpa database pun website tetap tampil memakai data cadangan.
3. (Opsional, admin promo) pasang paket transfamily-admin; promo tampil otomatis di beranda.
4. php artisan optimize:clear
5. Butuh internet saat dibuka: Swiper, GLightbox, Alpine.js, vanilla-tilt dimuat dari CDN (jsDelivr).

## Foto
Taruh file .webp di public/images/ dengan nama di bawah. Belum ada = placeholder otomatis.
logo, hero-kiri-1..3, hero-kanan-1..3, produk-roti-jadul, produk-roti-modern, produk-kue-ultah,
produk-cheesecake, produk-khas-langkat, produk-pastry, produk-hampers, kolase-1..5, q3d-1..4,
tentang-1..3, cerita-pemilik, cerita-tim, cerita-dapur, cerita-ultah,
outlet-pusat-stabat, outlet-binjai, outlet-stabor, outlet-perniagaan-stabat,
outlet-pangkalan-berandan, outlet-kuala-simpang
Foto produk, outlet, dan artikel dari database memakai kolom image (mis. images/rolling-durian.webp).

## Pengaturan (.env)
BAKERY_WA=6282261011170
BESTSELLER_LAYOUT=carousel   # atau grid
Best seller di-cache 10 menit: jalankan php artisan cache:clear setelah mengubahnya.

## Catatan
- Tailwind/Vite/Filament di dokumen belum dipakai: CSS biasa (public/css/site.css) agar langsung jalan
  tanpa npm. Bisa dimigrasi nanti.
- Langkah Si PESAT dijadikan 4 (langkah "disiapkan dan diantar" dipecah dua).
- Garis waktu baru berisi 2010 dan 2026 (fakta dari website). Tambah lewat tabel timeline_events.
