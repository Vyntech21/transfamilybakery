<?php

use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/tentang', [PageController::class, 'tentang'])->name('tentang');
Route::get('/katalog', [PageController::class, 'katalog'])->name('katalog');
Route::get('/layanan/si-pesat', [PageController::class, 'pesat'])->name('pesat');
Route::get('/toko', [PageController::class, 'toko'])->name('toko');
Route::get('/artikel', [PageController::class, 'artikel'])->name('artikel');
Route::get('/artikel/{slug}', [PageController::class, 'artikelShow'])->name('artikel.show');

// Admin promo (paket transfamily-admin). Hapus baris ini kalau belum dipasang.
if (file_exists(__DIR__ . '/admin.php')) {
    require __DIR__ . '/admin.php';
}
