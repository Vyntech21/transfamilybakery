<?php

namespace App\Http\Controllers;

use App\Support\SiteData;

class PageController extends Controller
{
    public function home()
    {
        return view('home', [
            'citaRasa' => SiteData::citaRasa(),
            'quotes'   => SiteData::testimonials(),
        ]);
    }

    public function tentang()
    {
        return view('tentang', [
            'gallery'  => SiteData::photos('tentang_galeri'),
            'story'    => SiteData::photos('tentang_cerita'),
            'timeline' => SiteData::timeline(),
        ]);
    }

    public function katalog()
    {
        return view('katalog', [
            'items' => SiteData::products(),
            'cats'  => SiteData::categories(),
            'wa'    => SiteData::wa(),
        ]);
    }

    public function pesat()
    {
        return view('si-pesat', [
            'best'   => SiteData::bestSellers(),
            'layout' => config('site.bestseller_layout'),
            'area'   => SiteData::setting('pesat_service_area', 'Stabat dan sekitarnya'),
            'hours'  => SiteData::setting('pesat_order_hours', '09.00 – 16.30'),
        ]);
    }

    public function toko()
    {
        return view('toko', ['outlets' => SiteData::outlets()]);
    }

    public function artikel()
    {
        return view('artikel', [
            'articles' => SiteData::articles(),
            'cats'     => SiteData::articleCategories(),
        ]);
    }

    public function artikelShow(string $slug)
    {
        $article = collect(SiteData::articles())->firstWhere('slug', $slug);
        abort_unless($article, 404);

        return view('artikel-show', ['a' => $article]);
    }
}
