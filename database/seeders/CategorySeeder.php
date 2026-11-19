<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $rows = [
            ['Roti Jadul & Tradisional', 'roti-jadul-tradisional', null],
            ['Roti Modern & Kekinian',   'roti-modern-kekinian',   null],
            ['Kue & Cake Ulang Tahun',   'kue-cake-ulang-tahun',   'Cake Ulang Tahun'],
            ['Cheesecake & Mini Cake',   'cheesecake-mini-cake',   'Cheesecake'],
            ['Khas Langkat',             'khas-langkat',           'Khas Langkat'],
            ['Pastry & Snack Gurih',     'pastry-snack-gurih',     'Pastry'],
            ['Oleh-Oleh & Hampers',      'oleh-oleh-hampers',      'Oleh-Oleh & Hampers'],
        ];

        foreach ($rows as $i => [$name, $slug, $label]) {
            Category::updateOrCreate(
                ['slug' => $slug],
                ['name' => $name, 'filter_label' => $label, 'sort_order' => $i + 1]
            );
        }
    }
}
