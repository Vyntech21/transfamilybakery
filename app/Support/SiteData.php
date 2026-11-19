<?php

namespace App\Support;

use Illuminate\Support\Facades\Cache;

/**
 * Sumber data website. Membaca database (paket transfamily-database) dan
 * otomatis memakai DATA CADANGAN bila tabel kosong atau belum ada,
 * sehingga halaman tidak pernah kosong / "Gagal memuat produk".
 */
class SiteData
{
    private static function safe(callable $fn, array $fallback): array
    {
        try {
            $r = $fn();
            return $r === [] ? $fallback : $r;
        } catch (\Throwable $e) {
            return $fallback;
        }
    }

    public static function setting(string $key, ?string $default = null): ?string
    {
        try {
            return \App\Models\Setting::get($key) ?: $default;
        } catch (\Throwable $e) {
            return $default;
        }
    }

    public static function wa(): string
    {
        return preg_replace('/\D/', '', self::setting('whatsapp', config('site.wa')));
    }

    /** URL gambar bila filenya ada di /public, kalau tidak null (placeholder tampil). */
    public static function img(?string $path): ?string
    {
        return $path && file_exists(public_path($path)) ? asset($path) : null;
    }

    /** Foto hero otomatis dari public/images/hero (urut nama). Genap = kiri, ganjil = kanan. */
    public static function heroImages(): array
    {
        $files = [];
        foreach (['webp', 'jpg', 'jpeg', 'png'] as $ext) {
            $files = array_merge($files, glob(public_path("images/hero/*.{$ext}")) ?: []);
        }
        sort($files);
        $urls = array_map(fn ($f) => asset('images/hero/' . basename($f)), $files);

        return [
            'left'  => array_values(array_filter($urls, fn ($v, $k) => $k % 2 === 0, ARRAY_FILTER_USE_BOTH)),
            'right' => array_values(array_filter($urls, fn ($v, $k) => $k % 2 === 1, ARRAY_FILTER_USE_BOTH)),
        ];
    }

    /** Foto latar hero (berganti otomatis) dari public/images/hero-bg, urut nama file. */
    public static function heroBackgrounds(): array
    {
        $files = [];
        foreach (['webp', 'jpg', 'jpeg', 'png'] as $ext) {
            $files = array_merge($files, glob(public_path("images/hero-bg/*.{$ext}")) ?: []);
        }
        sort($files);

        return array_map(fn ($f) => asset('images/hero-bg/' . basename($f)), $files);
    }

    // ---------- Produk ----------
    public static function products(): array
    {
        return self::safe(fn () => \App\Models\Product::active()->with('category')
            ->orderBy('sort_order')->orderBy('name')->get()
            ->map(fn ($p) => self::product($p->name, $p->slug, $p->price, $p->badge, $p->image,
                $p->category?->label, $p->best_seller_rank, $p->search_keywords))->all(),
            self::fallbackProducts());
    }

    public static function bestSellers(): array
    {
        return Cache::remember('site.bestsellers', 600, fn () => self::safe(
            fn () => \App\Models\Product::bestSellers()->with('category')->get()
                ->map(fn ($p) => self::product($p->name, $p->slug, $p->price, $p->badge, $p->image,
                    $p->category?->label, $p->best_seller_rank, $p->search_keywords))->all(),
            array_values(array_filter(self::fallbackProducts(), fn ($p) => $p['rank']))
        ));
    }

    public static function categories(): array
    {
        return self::safe(fn () => \App\Models\Category::orderBy('sort_order')->get()
            ->map(fn ($c) => $c->label)->unique()->values()->all(),
            ['Roti Jadul & Tradisional', 'Roti Modern & Kekinian', 'Cake Ulang Tahun', 'Cheesecake', 'Khas Langkat', 'Pastry', 'Oleh-Oleh & Hampers']);
    }

    private static function product($name, $slug, $price, $badge, $image, $cat, $rank, $kw): array
    {
        return ['name' => $name, 'slug' => $slug, 'price' => $price, 'badge' => $badge,
            'img' => self::img($image), 'category' => $cat, 'rank' => $rank, 'keywords' => $kw];
    }

    private static function fallbackProducts(): array
    {
        $rows = [
            ['Rolling Durian', 'rolling-durian', 'Khas Langkat', 'Khas Langkat', 1, 'durian,roll,roling'],
            ['Cheesecake', 'cheesecake', 'Best Seller', 'Cheesecake', 2, 'keju,cheese', 'images/produk/cheesecake.webp'],
            ['Roti Es Krim', 'roti-es-krim', 'Populer', 'Roti Modern & Kekinian', 3, 'ice cream'],
            ['Mini Cake', 'mini-cake', null, 'Cheesecake', 4, 'kue mini'],
            ['Roll Cake Pandan', 'roll-cake-pandan', null, 'Cheesecake', 5, 'roll,bolu gulung'],
            ['Croissant', 'croissant', null, 'Pastry', 6, 'pastry'],
            ['Hampers Spesial', 'hampers-spesial', null, 'Oleh-Oleh & Hampers', null, 'parcel,oleh-oleh'],
            ['Kue Ulang Tahun Custom', 'kue-ulang-tahun-custom', null, 'Cake Ulang Tahun', null, 'tart,birthday,ultah'],
            ['Bolu Switch Roll Mocca', 'bolu-switch-roll-mocca', null, 'Cheesecake', null, 'roll,bolu gulung,mocca,moka', 'images/produk/bolu-switch-roll-mocca.webp'],
            ['Roti Kelapa Ceres', 'roti-kelapa-ceres', null, 'Roti Jadul & Tradisional', null, 'kelapa,ceres,coklat', 'images/produk/roti-kelapa-ceres.webp'],
            ['Bolu Cake Marmor', 'bolu-cake-marmor', null, 'Roti Jadul & Tradisional', null, 'marmer,bolu,cake', 'images/produk/bolu-cake-marmor.webp'],
            ['Bolu Marble Cake Pandan Tiramisu', 'bolu-marble-cake-pandan-tiramisu', null, 'Roti Jadul & Tradisional', null, 'pandan,tiramisu,marble,bolu', 'images/produk/bolu-marble-cake-pandan-tiramisu.webp'],
            ['Roti Coffee', 'roti-coffee', null, 'Roti Modern & Kekinian', null, 'kopi,coffee,mocca', 'images/produk/roti-coffee.webp'],
        ];

        return array_map(fn ($r) => self::product($r[0], $r[1], null, $r[2], $r[6] ?? null, $r[3], $r[4], $r[5]), $rows);
    }

    // ---------- Outlet ----------
    public static function outlets(): array
    {
        return self::safe(fn () => \App\Models\Outlet::active()->get()->map(fn ($o) => self::outlet(
            $o->name, $o->slug, $o->city, $o->address, $o->opening_hours, $o->wa_number, $o->maps_url, $o->image))->all(),
            self::fallbackOutlets());
    }

    private static function outlet($name, $slug, $city, $address, $hours, $wa, $maps, $image): array
    {
        $name = preg_replace('/^Outlet\s+/i', '', $name);
        $query = $address ?: "TransFamily Bakery {$city}";

        return [
            'name'    => 'Outlet ' . $name, 'slug' => $slug, 'city' => $city, 'address' => $address,
            'hours'   => $hours ?: 'Senin – Minggu: 07.30 – 22.30',
            'wa'      => 'https://wa.me/' . ($wa ?: self::wa()) . '?text=' . rawurlencode("Halo kak, saya mau tanya outlet {$name}."),
            'route'   => $maps ?: 'https://www.google.com/maps/search/?api=1&query=' . rawurlencode($query),
            'img'     => self::img($image ?: "images/outlet-{$slug}.webp"),
        ];
    }

    private static function fallbackOutlets(): array
    {
        $pusat = 'Jl. KH. Zainul Arifin No.9, Kwala Bingai, Kec. Stabat, Kabupaten Langkat, Sumatera Utara 20811, Indonesia';
        $rows = [
            ['Pusat Stabat', 'pusat-stabat', 'Stabat', $pusat],
            ['Cabang Binjai', 'binjai', 'Binjai', null],
            ['Cabang Stabor', 'stabor', 'Stabor', null],
            ['Cabang Perniagaan Stabat', 'perniagaan-stabat', 'Stabat', null],
            ['Cabang Pangkalan Berandan', 'pangkalan-berandan', 'Pangkalan Berandan', null],
            ['Cabang Kuala Simpang', 'kuala-simpang', 'Kuala Simpang', null],
        ];

        return array_map(fn ($r) => self::outlet($r[0], $r[1], $r[2], $r[3], null, null, null, null), $rows);
    }

    // ---------- Artikel ----------
    public static function articles(): array
    {
        return self::safe(fn () => \App\Models\Article::published()->with('category')->get()->map(fn ($a) => [
            'title' => $a->title, 'slug' => $a->slug, 'excerpt' => $a->excerpt, 'body' => $a->body,
            'category' => $a->category?->name, 'date' => $a->published_at?->translatedFormat('d M Y'),
            'read' => $a->read_minutes ? "{$a->read_minutes} menit baca" : null,
            'img' => self::img($a->image),
        ])->all(), [[
            'title' => 'Judul Artikel', 'slug' => 'judul-artikel', 'category' => 'Produk & Rekomendasi',
            'excerpt' => 'Ada rasa perhatian yang ikut dibawa ketika kita memilih sesuatu yang bisa dinikmati bersama keluarga, teman, atau orang-orang terdekat. Itulah sebabnya banyak orang meluangkan waktu...',
            'body' => null, 'date' => now()->translatedFormat('d M Y'), 'read' => '3 menit baca', 'img' => null,
        ]]);
    }

    public static function articleCategories(): array
    {
        return self::safe(fn () => \App\Models\ArticleCategory::orderBy('sort_order')->pluck('name')->all(),
            ['Cake & Ulang Tahun', 'Oleh-Oleh', 'Parenting & Keluarga', 'Produk & Rekomendasi']);
    }

    // ---------- Konten lain ----------
    public static function testimonials(): array
    {
        return self::safe(fn () => \App\Models\Testimonial::active()->pluck('quote')->all(), [
            'Nggak nyangka mini cake bisa seenak ini. Meski ukurannya kecil, rasanya tetap sama lembut, manisnya pas, dan benar-benar bikin nagih',
            'Harga yg murah tapi rasa mahal, sangat cocok buat beli oleh oleh',
            'Tempatnya nyaman dan bersih, pilihan kue dan rotinya enak-enak. Aku sering beli di sini. Cuma sayang, ada beberapa roti yang pernah aku coba dan mau cari lagi, ternyata sudah nggak ada. Semoga nanti ada lagi ya',
        ]);
    }

    public static function photos(string $placement): array
    {
        $fallback = [
            'tentang_galeri' => [
                ['caption' => 'Dari dapur kecil untuk Langkat', 'kind' => null, 'file' => 'images/tentang-1.webp'],
                ['caption' => 'Setiap pagi, adonan dibuat dengan hati', 'kind' => 'dapur', 'file' => 'images/tentang-2.webp'],
                ['caption' => 'Tim kami adalah keluarga', 'kind' => 'tim', 'file' => 'images/tentang-3.webp'],
            ],
            'tentang_cerita' => [
                ['caption' => 'Pemilik', 'kind' => 'pemilik', 'file' => 'images/cerita-pemilik.webp'],
                ['caption' => 'Tim kami', 'kind' => 'tim', 'file' => 'images/cerita-tim.webp'],
                ['caption' => 'Suasana dapur', 'kind' => 'dapur', 'file' => 'images/cerita-dapur.webp'],
                ['caption' => 'Ulang tahun toko', 'kind' => 'ulang_tahun', 'file' => 'images/cerita-ultah.webp'],
            ],
        ][$placement] ?? [];

        $fallback = array_map(fn ($p) => ['caption' => $p['caption'], 'kind' => $p['kind'], 'img' => self::img($p['file'])], $fallback);

        return self::safe(fn () => \App\Models\Photo::placement($placement)->get()->map(fn ($p) => [
            'caption' => $p->caption, 'kind' => $p->kind, 'img' => self::img($p->image)])->all(), $fallback);
    }

    public static function timeline(): array
    {
        return self::safe(fn () => \App\Models\TimelineEvent::orderBy('year')->orderBy('sort_order')->get()->map(fn ($t) => [
            'year' => $t->year, 'title' => $t->title, 'text' => $t->description])->all(), [
            ['year' => 2010, 'title' => 'Trans Family Bakery berdiri', 'text' => 'Berdiri 8 September 2010 di Langkat.'],
            ['year' => 2026, 'title' => '15 tahun dipercaya', 'text' => 'Hadir dengan 6 outlet di Langkat, Binjai, dan Kuala Simpang.'],
        ]);
    }

    public static function citaRasa(): array
    {
        $rows = [
            ['Roti Jadul & Tradisional', 'Nikmati roti klasik penuh nostalgia dengan rasa khas tempo dulu, mulai dari roti isi kacang, kelapa, hingga cokelat sederhana yang selalu bikin rindu.', 'produk-roti-jadul'],
            ['Roti Modern & Kekinian', 'Roti lembut dengan isian kekinian seperti roti es krim dan soft bread premium, dibuat fresh setiap hari untuk selera masa kini.', 'produk-roti-modern'],
            ['Kue & Cake Ulang Tahun', 'Rayakan momen spesial dengan kue ulang tahun custom, dekorasi cantik, dan cita rasa premium yang selalu jadi favorit keluarga.', 'produk-kue-ultah'],
            ['Cheesecake & Mini Cake', 'Cheesecake lembut, mini cake manis, brownies, hingga roll cake sempurna untuk camilan atau hadiah kecil penuh kesan.', 'produk-cheesecake'],
            ['Khas Langkat', 'Produk ikonik seperti Rolling Durian dan kreasi khas Langkat lainnya, pilihan tepat untuk oleh-oleh yang autentik dan berkesan.', 'produk-khas-langkat'],
            ['Pastry & Snack Gurih', 'Croissant, puff pastry, dan aneka snack gurih yang renyah dan lezat, cocok menemani waktu santai Anda.', 'produk-pastry'],
            ['Oleh-Oleh & Hampers', 'Paket oleh-oleh khas Langkat dan hampers spesial untuk acara, hadiah, maupun bekal perjalanan Anda.', 'produk-hampers'],
        ];

        return array_map(fn ($r) => ['title' => $r[0], 'text' => $r[1], 'file' => "images/{$r[2]}.webp"], $rows);
    }
}
