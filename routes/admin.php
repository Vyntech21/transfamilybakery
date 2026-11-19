<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\PromoController;
use App\Http\Middleware\EnsureAdmin;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->group(function () {
    // Nama 'login' dipakai middleware auth bawaan Laravel untuk mengarahkan tamu.
    Route::get('login', [AuthController::class, 'showLogin'])->name('login')->middleware('guest');
    Route::post('login', [AuthController::class, 'login'])->middleware('throttle:5,1')->name('admin.login.post');

    Route::middleware(['auth', EnsureAdmin::class])->group(function () {
        Route::post('logout', [AuthController::class, 'logout'])->name('admin.logout');
        Route::get('/', fn () => redirect()->route('admin.promos.index'))->name('admin.home');

        Route::patch('promos/{promo}/toggle', [PromoController::class, 'toggle'])->name('admin.promos.toggle');
        Route::resource('promos', PromoController::class)->except('show')->names('admin.promos');
    });
});
