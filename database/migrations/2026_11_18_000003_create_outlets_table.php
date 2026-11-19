<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('outlets', function (Blueprint $t) {
            $t->id();
            $t->string('name');
            $t->string('slug', 100)->unique();
            $t->enum('type', ['pusat', 'cabang'])->default('cabang');
            $t->string('city')->index();
            $t->string('address')->nullable();
            $t->string('phone', 30)->nullable();
            $t->string('wa_number', 20)->nullable();       // null = pakai nomor utama di settings
            $t->string('opening_hours', 100)->default('Senin – Minggu: 07.30 – 22.30');
            $t->string('maps_url')->nullable();
            $t->decimal('latitude', 10, 7)->nullable();
            $t->decimal('longitude', 10, 7)->nullable();
            $t->string('image')->nullable();
            $t->unsignedSmallInteger('sort_order')->default(0);
            $t->boolean('is_active')->default(true);
            $t->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('outlets');
    }
};
