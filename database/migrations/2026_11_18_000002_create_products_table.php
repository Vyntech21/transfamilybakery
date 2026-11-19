<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('products', function (Blueprint $t) {
            $t->id();
            $t->foreignId('category_id')->constrained()->cascadeOnDelete();
            $t->string('name')->index();
            $t->string('slug')->unique();
            $t->text('description')->nullable();
            $t->string('search_keywords')->nullable();     // sinonim pencarian, pisah koma
            $t->unsignedInteger('price')->nullable();      // Rupiah
            $t->string('badge', 30)->nullable();           // Populer / Best Seller / Khas Langkat
            $t->string('image')->nullable();
            $t->boolean('is_featured')->default(false);
            $t->boolean('is_best_seller')->default(false);
            $t->unsignedTinyInteger('best_seller_rank')->nullable();
            $t->boolean('is_active')->default(true);
            $t->unsignedSmallInteger('sort_order')->default(0);
            $t->timestamps();

            $t->index(['is_active', 'category_id']);
            $t->index(['is_best_seller', 'best_seller_rank']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
