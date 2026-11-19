<?php

namespace Database\Seeders;

use App\Models\Outlet;
use Illuminate\Database\Seeder;

class OutletSeeder extends Seeder
{
    public function run(): void
    {
        $alamatPusat = 'Jl. KH. Zainul Arifin No.9, Kwala Bingai, Kec. Stabat, Kabupaten Langkat, Sumatera Utara 20811, Indonesia';

        // Alamat cabang selain Pusat Stabat belum diketahui: isi lewat admin / ubah di sini.
        $rows = [
            ['Pusat Stabat',              'pusat-stabat',       'pusat',  'Stabat',             $alamatPusat],
            ['Cabang Binjai',             'binjai',             'cabang', 'Binjai',             null],
            ['Cabang Stabor',             'stabor',             'cabang', 'Stabor',             null],
            ['Cabang Perniagaan Stabat',  'perniagaan-stabat',  'cabang', 'Stabat',             null],
            ['Cabang Pangkalan Berandan', 'pangkalan-berandan', 'cabang', 'Pangkalan Berandan', null],
            ['Cabang Kuala Simpang',      'kuala-simpang',      'cabang', 'Kuala Simpang',      null],
        ];

        foreach ($rows as $i => [$name, $slug, $type, $city, $address]) {
            Outlet::updateOrCreate(
                ['slug' => $slug],
                ['name' => $name, 'type' => $type, 'city' => $city, 'address' => $address, 'sort_order' => $i + 1]
            );
        }
    }
}
