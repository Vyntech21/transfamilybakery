@use('App\Support\SiteData')
@use('App\Support\Wa')
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>@yield('title', 'Oleh-Oleh Manis Khas Langkat') | TransFamily Bakery</title>
<meta name="description" content="@yield('description', 'Roti dan kue halal, fresh setiap hari. Oleh-oleh khas Langkat sejak 2010.')">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Bitter:wght@500;700;800&family=PT+Sans:wght@400;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11.1.14/swiper-bundle.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glightbox@3.3.0/dist/css/glightbox.min.css">
<link rel="stylesheet" href="{{ asset('css/site.css') }}">
@stack('head')
</head>
<body x-data="{ open: false }">
@includeIf('partials.promo-bar')

@php($nav = [['home', 'Beranda'], ['tentang', 'Tentang'], ['katalog', 'Katalog'], ['pesat', 'Layanan'], ['toko', 'Toko'], ['artikel', 'Artikel']])
<header class="site-head">
 <div class="wrap nav">
  @php($logoUrl = SiteData::img('images/logo.webp'))
  <a href="{{ route('home') }}" class="brand {{ $logoUrl ? 'has-img' : '' }}" aria-label="Trans Family Bakery">
   @if ($logoUrl)<img class="brand-img" src="{{ $logoUrl }}" alt="Trans Family Bakery">@else TF @endif
  </a>
  <button class="burger" @click="open = !open" :aria-expanded="open" aria-label="Menu">☰</button>
  <nav class="menu" :class="{ open: open }">
   @foreach ($nav as [$r, $label])
    <a href="{{ route($r) }}" class="{{ request()->routeIs($r . '*') ? 'on' : '' }}">{{ $label }}</a>
   @endforeach
   <a href="#kontak">Kontak</a>
   <a class="btn" href="{{ Wa::link('Halo kak, saya mau pesan kuenya!') }}" target="_blank" rel="noopener">Pesan Kue Sekarang</a>
  </nav>
 </div>
</header>

<main>@yield('content')</main>

<footer id="kontak" class="site-foot">
 <div class="wrap foot-grid">
  <div><h6>Buka Setiap Hari</h6>{{ SiteData::setting('hours', 'Senin – Minggu: 07.30 – 22.30') }} WIB</div>
  <div><h6>Kunjungi Kami</h6>{{ SiteData::setting('address', 'Jl. KH. Zainul Arifin No.9, Kwala Bingai, Kec. Stabat, Kabupaten Langkat, Sumatera Utara 20811, Indonesia') }}</div>
  <div><h6>Ikuti Kami</h6>
   <a href="{{ config('site.instagram') }}" target="_blank" rel="noopener">Instagram</a> ·
   <a href="{{ config('site.facebook') }}" target="_blank" rel="noopener">Facebook</a> ·
   <a href="{{ config('site.tiktok') }}" target="_blank" rel="noopener">TikTok</a>
  </div>
  <a class="btn" href="{{ Wa::link('Halo kak, saya mau order kuenya.') }}" target="_blank" rel="noopener">Beli Online →</a>
 </div>
 <div class="copy">© {{ date('Y') }} TransFamily Bakery. All rights reserved.</div>
</footer>

<a class="wa-float" href="{{ Wa::link('Halo kak, saya mau pesan kuenya!') }}" target="_blank" rel="noopener" aria-label="Pesan via WhatsApp">✆ <span>Pesan via WhatsApp</span></a>

<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.14.1/dist/cdn.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@11.1.14/swiper-bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/glightbox@3.3.0/dist/js/glightbox.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vanilla-tilt@1.8.1/dist/vanilla-tilt.min.js"></script>
<script src="{{ asset('js/site.js') }}"></script>
@stack('scripts')
</body>
</html>
