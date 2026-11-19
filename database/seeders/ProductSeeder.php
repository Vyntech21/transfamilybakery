<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Produk CONTOH (nama dari teks website). Ganti dengan produk dan harga
     * asli sebelum dipublikasikan.
     * Format: nama => [badge, peringkat best seller atau null]
     */
    public function run(): void
    {
        $samples = [
            'roti-jadul-tradisional' => [
                'Roti Isi Kacang' => [], 'Roti Isi Kelapa' => [], 'Roti Cokelat' => [],
                'Roti Kelapa Ceres' => [null, null, 'images/produk/roti-kelapa-ceres.webp'],
                'Bolu Cake Marmor'  => [null, null, 'images/produk/bolu-cake-marmor.webp'],
                'Bolu Marble Cake Pandan Tiramisu' => [null, null, 'images/produk/bolu-marble-cake-pandan-tiramisu.webp'],
            ],
            'roti-modern-kekinian'   => ['Roti Es Krim' => ['Populer', 3], 'Soft Bread Premium' => [],
                'Roti Coffee' => [null, null, 'images/produk/roti-coffee.webp']],
            'kue-cake-ulang-tahun'   => ['Kue Ulang Tahun Custom' => []],
            'cheesecake-mini-cake'   => ['Cheesecake' => ['Best Seller', 2, 'images/produk/cheesecake.webp'], 'Mini Cake' => [], 'Brownies' => [], 'Roll Cake' => [],
                'Bolu Switch Roll Mocca' => [null, null, 'images/produk/bolu-switch-roll-mocca.webp'],
            ],
            'khas-langkat'           => ['Rolling Durian' => ['Khas Langkat', 1]],
            'pastry-snack-gurih'     => ['Croissant' => [], 'Puff Pastry' => []],
            'oleh-oleh-hampers'      => ['Paket Oleh-Oleh Langkat' => [], 'Hampers Spesial' => []],
        ];

        foreach ($samples as $categorySlug => $items) {
            $category = Category::where('slug', $categorySlug)->first();
            if (! $category) {
                continue;
            }
            foreach ($items as $name => $meta) {
                $data = [
                    'category_id'      => $category->id,
                    'name'             => $name,
                    'badge'            => $meta[0] ?? null,
                    'is_best_seller'   => isset($meta[1]),
                    'best_seller_rank' => $meta[1] ?? null,
                    'is_featured'      => isset($meta[1]),
                ];
                if (! empty($meta[2])) {
                    $data['image'] = $meta[2];   // foto hanya diisi bila ada
                }
                Product::updateOrCreate(['slug' => Str::slug($name)], $data);
            }
        }
    }
}
