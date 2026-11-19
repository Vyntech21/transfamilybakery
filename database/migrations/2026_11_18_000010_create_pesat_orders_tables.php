<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pesat_orders', function (Blueprint $t) {
            $t->id();
            $t->string('order_code', 20)->unique();        // mis. PSAT-20261118-001
            $t->string('customer_name');
            $t->string('phone', 30);
            $t->text('address');                           // alamat antar
            $t->foreignId('outlet_id')->nullable()->constrained()->nullOnDelete();
            $t->dateTime('needed_at')->nullable();
            $t->text('notes')->nullable();                 // tulisan di kue, permintaan khusus
            $t->enum('status', ['baru', 'diproses', 'diantar', 'selesai', 'batal'])->default('baru');
            $t->unsignedInteger('total')->default(0);      // Rupiah
            $t->timestamps();

            $t->index(['status', 'created_at']);
        });

        Schema::create('pesat_order_items', function (Blueprint $t) {
            $t->id();
            $t->foreignId('pesat_order_id')->constrained('pesat_orders')->cascadeOnDelete();
            $t->foreignId('product_id')->nullable()->constrained()->nullOnDelete();
            $t->string('product_name');                    // salinan nama saat pesan
            $t->unsignedSmallInteger('qty')->default(1);
            $t->unsignedInteger('price')->default(0);      // harga satuan saat pesan
            $t->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pesat_order_items');
        Schema::dropIfExists('pesat_orders');
    }
};
