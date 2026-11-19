<?php

namespace Database\Seeders;

use App\Models\Promo;
use Illuminate\Database\Seeder;

class PromoSeeder extends Seeder
{
    public function run(): void
    {
        // Contoh, NONAKTIF supaya tidak tampil di website sebelum Anda mengaturnya.
        Promo::firstOrCreate(['title' => 'Contoh Promo Akhir Pekan'], [
            'discount_label' => 'Diskon 10%',
            'badge'          => 'Promo Spesial',
            'description'    => 'Ubah atau hapus promo contoh ini di halaman admin.',
            'is_active'      => false,
        ]);
    }
}
