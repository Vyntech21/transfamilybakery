<?php

use Illuminate\Support\Facades\Route;

$wa = 'https://wa.me/6282261011170?text=' . urlencode('Halo kak, saya mau pesan kuenya!');

$produk = [
    ['Roti Jadul & Tradisional', 'Nikmati roti klasik penuh nostalgia dengan rasa khas tempo dulu, mulai dari roti isi kacang, kelapa, hingga cokelat sederhana.'],
    ['Roti Modern & Kekinian', 'Roti lembut dengan isian kekinian seperti roti es krim dan soft bread premium, dibuat fresh setiap hari.'],
    ['Kue & Cake Ulang Tahun', 'Rayakan momen spesial dengan kue ulang tahun custom, dekorasi cantik, dan rasa yang selalu jadi favorit keluarga.'],
    ['Cheesecake & Mini Cake', 'Cheesecake lembut, mini cake manis, brownies, hingga roll cake sempurna untuk camilan atau hadiah kecil.'],
    ['Khas Langkat', 'Produk ikonik seperti Rolling Durian dan kreasi khas Langkat lainnya, pilihan tepat untuk oleh-oleh yang autentik.'],
    ['Pastry & Snack Gurih', 'Croissant, puff pastry, dan aneka snack gurih yang renyah dan lezat, cocok menemani waktu santai.'],
    ['Oleh-Oleh & Hampers', 'Paket oleh-oleh khas Langkat dan hampers spesial untuk acara, hadiah, maupun buah tangan perjalanan.'],
];
$toko = ['Pusat Stabat', 'Cabang Binjai', 'Cabang Stabor', 'Cabang Perniagaan Stabat', 'Cabang Pangkalan Berandan', 'Cabang Kuala Simpang'];
$artikel = [
    ['Tips Memilih Cake Ulang Tahun Stabat yang Tepat untuk Anak', '12 Jun 2026', 'Cake & Ulang Tahun'],
    ['Oleh-Oleh Khas Langkat yang Cocok Dibawa Pulang untuk Keluarga', '8 Jun 2026', 'Produk & Rekomendasi'],
    ['Cara Memilih Roti Manis Stabat yang Lembut dan Tahan Lama', '2 Jun 2026', 'Gaya Hidup'],
];
$share = compact('wa', 'produk', 'toko', 'artikel');

Route::view('/', 'home', $share)->name('home');
Route::view('/tentang', 'tentang', $share)->name('tentang');
Route::view('/katalog', 'katalog', $share)->name('katalog');
Route::view('/si-pesat', 'si-pesat', $share)->name('si-pesat');
Route::view('/toko', 'toko', $share)->name('toko');
Route::view('/artikel', 'artikel', $share)->name('artikel');
Route::view('/kontak', 'kontak', $share)->name('kontak');
