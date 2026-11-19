<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('photos', function (Blueprint $t) {
            $t->id();
            // hero, cita_rasa, kolase_outlet, kutipan_3d, tentang_cerita, tentang_galeri, toko_header
            $t->string('placement', 30);
            $t->string('kind', 20)->nullable();            // pemilik, tim, dapur, ulang_tahun
            $t->string('title')->nullable();
            $t->string('caption')->nullable();
            $t->string('image')->nullable();
            $t->string('alt')->nullable();
            $t->unsignedSmallInteger('sort_order')->default(0);
            $t->boolean('is_active')->default(true);
            $t->timestamps();

            $t->index(['placement', 'is_active', 'sort_order']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('photos');
    }
};
