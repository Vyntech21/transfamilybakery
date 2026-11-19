<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\ArticleCategory;
use App\Models\Photo;
use App\Models\Testimonial;
use App\Models\TimelineEvent;
use Illuminate\Database\Seeder;

class ContentSeeder extends Seeder
{
    public function run(): void
    {
        // Kategori artikel
        foreach ([
            ['Cake & Ulang Tahun', 'cake-ulang-tahun'],
            ['Oleh-Oleh', 'oleh-oleh'],
            ['Parenting & Keluarga', 'parenting-keluarga'],
            ['Produk & Rekomendasi', 'produk-rekomendasi'],
        ] as $i => [$name, $slug]) {
            ArticleCategory::updateOrCreate(['slug' => $slug], ['name' => $name, 'sort_order' => $i + 1]);
        }

        // Artikel contoh
        Article::updateOrCreate(['slug' => 'judul-artikel'], [
            'title'        => 'Judul Artikel',
            'excerpt'      => 'Ada rasa perhatian yang ikut dibawa ketika kita memilih sesuatu yang bisa dinikmati bersama keluarga, teman, atau orang-orang terdekat. Itulah sebabnya banyak orang meluangkan waktu...',
            'is_featured'  => true,
            'published_at' => now(),
        ]);

        // Testimoni
        foreach ([
            'Nggak nyangka mini cake bisa seenak ini. Meski ukurannya kecil, rasanya tetap sama lembut, manisnya pas, dan benar-benar bikin nagih',
            'Harga yg murah tapi rasa mahal, sangat cocok buat beli oleh oleh',
            'Tempatnya nyaman dan bersih, pilihan kue dan rotinya enak-enak. Aku sering beli di sini. Cuma sayang, ada beberapa roti yang pernah aku coba dan mau cari lagi, ternyata sudah nggak ada. Semoga nanti ada lagi ya',
        ] as $quote) {
            Testimonial::firstOrCreate(['quote' => $quote]);
        }

        // Keterangan foto halaman Tentang (file gambar diunggah belakangan)
        foreach ([
            [null,    'Dari dapur kecil untuk Langkat'],
            ['dapur', 'Setiap pagi, adonan dibuat dengan hati'],
            ['tim',   'Tim kami adalah keluarga'],
        ] as $i => [$kind, $caption]) {
            Photo::firstOrCreate(
                ['placement' => 'tentang_galeri', 'caption' => $caption],
                ['kind' => $kind, 'sort_order' => $i + 1]
            );
        }

        // Garis waktu: baru fakta yang sudah ada di website. Tambah tonggak lain sendiri.
        TimelineEvent::updateOrCreate(['year' => 2010, 'title' => 'Trans Family Bakery berdiri'], [
            'description' => 'Berdiri 8 September 2010 di Langkat.',
            'sort_order'  => 1,
        ]);
    }
}
