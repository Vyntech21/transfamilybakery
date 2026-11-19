<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class BakerySeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            CategorySeeder::class,   // sebelum ProductSeeder
            ProductSeeder::class,
            OutletSeeder::class,
            ContentSeeder::class,
            SettingSeeder::class,
            PromoSeeder::class,      // promo contoh (nonaktif)
        ]);
    }
}
