<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('promos', function (Blueprint $t) {
            $t->id();
            $t->string('title', 120);
            $t->string('discount_label', 40)->nullable();   // mis. "Diskon 20%", "Beli 2 Gratis 1"
            $t->string('badge', 30)->nullable();            // mis. "Promo Spesial"
            $t->text('description')->nullable();
            $t->string('image')->nullable();                // path di storage/app/public/promos
            $t->string('cta_url')->nullable();              // kosong = otomatis ke WhatsApp
            $t->dateTime('starts_at')->nullable();          // kosong = langsung berlaku
            $t->dateTime('ends_at')->nullable();            // kosong = tanpa batas
            $t->boolean('is_active')->default(false);       // saklar utama dari admin
            $t->boolean('show_in_bar')->default(false);     // tampil juga di bar atas website
            $t->unsignedSmallInteger('sort_order')->default(0);
            $t->timestamps();

            $t->index(['is_active', 'starts_at', 'ends_at']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('promos');
    }
};
