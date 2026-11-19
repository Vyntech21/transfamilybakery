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

        // Foto galeri Tentang memakai aset yang sudah ada di public/images/.
        foreach ([
            [null,    'Dari dapur kecil untuk Langkat', 'images/kolase-1.webp'],
            ['dapur', 'Setiap pagi, adonan dibuat dengan hati', 'images/kolase-2.webp'],
            ['tim',   'Tim kami adalah keluarga', 'images/kolase-3.webp'],
        ] as $i => [$kind, $caption, $image]) {
            Photo::updateOrCreate(
                ['placement' => 'tentang_galeri', 'caption' => $caption],
                ['kind' => $kind, 'image' => $image, 'sort_order' => $i + 1]
            );
        }

        // Garis waktu: fakta yang sudah ada di website. Tambah tonggak lain sendiri.
        TimelineEvent::updateOrCreate(['year' => 2010, 'title' => 'Trans Family Bakery berdiri'], [
            'description' => 'Berdiri 8 September 2010 di Langkat.',
            'sort_order'  => 1,
        ]);
        TimelineEvent::updateOrCreate(['year' => 2026, 'title' => '15 tahun dipercaya'], [
            'description' => 'Hadir dengan 6 outlet di Langkat, Binjai, dan Kuala Simpang.',
            'sort_order'  => 2,
        ]);
    }
}
