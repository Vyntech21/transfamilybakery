<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    public function run(): void
    {
        $rows = [
            'site_name'          => 'TransFamily Bakery',
            'tagline'            => 'Oleh-Oleh Khas Langkat',
            'since'              => '2010',
            'hours'              => 'Senin – Minggu: 07.30 – 22.30',
            'address'            => 'Jl. KH. Zainul Arifin No.9, Kwala Bingai, Kec. Stabat, Kabupaten Langkat, Sumatera Utara 20811, Indonesia',
            'whatsapp'           => '6282261011170',
            'instagram'          => 'https://www.instagram.com/transfamilybakery/',
            'facebook'           => 'https://www.facebook.com/transfamily.langkat?locale=id_ID',
            'tiktok'             => 'https://www.tiktok.com/@transfamilybakerylangkat',
            'pesat_order_hours'  => '09.00 – 16.30',
            'pesat_service_area' => 'Stabat dan sekitarnya',
        ];

        foreach ($rows as $key => $value) {
            Setting::set($key, $value);
        }
    }
}
