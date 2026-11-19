@use('App\Support\SiteData')
@use('App\Support\Wa')
@extends('layouts.site')
@section('title', 'Oleh-Oleh Manis Khas Langkat')

@section('content')
{{-- HERO: kue bergerak di kedua sisi, terpotong di tepi layar; logo di tengah selalu di atas --}}
@php($hero = SiteData::heroImages())
@php($bgs = SiteData::heroBackgrounds())
<section class="hero">
 {{-- Latar: foto kue berganti otomatis dengan efek pudar + zoom pelan --}}
 @if (count($bgs))
  <div class="hero-bg" aria-hidden="true">
   @foreach ($bgs as $i => $url)
    <div class="bg {{ $i === 0 ? 'on' : '' }}" @if ($i === 0) style="background-image:url('{{ $url }}')" @else data-bg="{{ $url }}" @endif></div>
   @endforeach
   <div class="veil"></div>
  </div>
 @endif
 @foreach (['left', 'right'] as $side)
  <div class="hero-side {{ $side }}" aria-hidden="true" data-hero-pool="{{ json_encode($hero[$side]) }}">
   @foreach ([1, 2, 3] as $i)
    <div class="slot f{{ $i }}">@if (! empty($hero[$side][$i - 1]))<img src="{{ $hero[$side][$i - 1] }}" alt="" decoding="async">@endif</div>
   @endforeach
  </div>
 @endforeach
 <div class="hero-center wrap">
  @if (SiteData::img('images/logo.webp'))
   <img class="logo-img" src="{{ asset('images/logo.webp') }}" alt="Trans Family Bakery">
  @else
   <x-ph class="logo-big" label="TRANS Family"/>
  @endif
  <h1>Oleh-Oleh Khas Langkat</h1>
  <p class="since">Sejak 2010</p>
  <p class="hours"><b>Buka setiap hari:</b> Senin – Minggu: 07.30 – 22.30</p>
  <a class="btn" href="{{ route('katalog') }}">Lihat Katalog →</a>
 </div>
</section>

{{-- Yang kami tawarkan --}}
<section class="sec wrap">
 <div class="eyebrow">Layanan</div>
 <h2 class="h2">Yang Kami Tawarkan</h2>
 <div class="grid3 cards-eq">
  <div class="card tc"><span class="sym">◆</span><h4>Halal &amp; Fresh</h4><p>Semua produk dibuat dari bahan halal, selalu fresh setiap hari.</p></div>
  <div class="card tc"><span class="sym">★</span><h4>Varian Lengkap</h4><p>Dari kue jadul, cheesecake, hingga roti es krim kekinian.</p></div>
  <div class="card tc"><span class="sym">❖</span><h4>15 Tahun Dipercaya</h4><p>Hadir sejak 8 September 2010 dengan 6 outlet di Langkat, Binjai, dan Kuala Simpang.</p></div>
 </div>
</section>

{{-- CITA RASA: kartu geser, kartu berikutnya terlihat separuh --}}
<section class="sec wrap">
 <div class="cita-head">
  <div>
   <div class="eyebrow">Oleh-Oleh &amp; Hidangan</div>
   <h2 class="h2">Cita Rasa Khas Langkat</h2>
   <hr class="rule">
   <a class="more" href="{{ Wa::link('Halo kak, saya mau order kuenya.') }}" target="_blank" rel="noopener">Shop Online →</a>
  </div>
  <div>
   <p class="lead">Trans Family Bakery menghadirkan berbagai roti, kue, dan hidangan khas Langkat yang halal dan fresh setiap hari. Dari cheesecake, rolling durian, hingga roti es krim, setiap gigitan menghadirkan cita rasa istimewa yang cocok sebagai oleh-oleh khas Langkat untuk keluarga maupun sahabat.</p>
   <a class="btn" href="{{ route('katalog') }}">Lihat Produk →</a>
  </div>
 </div>
 <div class="swiper sw cita" data-swiper='{"slidesPerView":1.4,"spaceBetween":16,"grabCursor":true,"breakpoints":{"640":{"slidesPerView":2.4},"1024":{"slidesPerView":3.5}}}'>
  <div class="swiper-wrapper">
   @foreach ($citaRasa as $c)
    <div class="swiper-slide">
     <article class="card pcard">
      <x-ph class="pimg" :src="$c['file']" :alt="$c['title']" label="Foto produk"/>
      <h4>{{ $c['title'] }}</h4><p>{{ $c['text'] }}</p>
     </article>
    </div>
   @endforeach
  </div>
  <button class="swiper-button-prev" aria-label="Sebelumnya"></button>
  <button class="swiper-button-next" aria-label="Berikutnya"></button>
  <div class="swiper-pagination"></div>
 </div>
</section>

{{-- KUNJUNGI OUTLET: kolase sejajar --}}
<section class="sec collage-sec">
 <div class="wrap tc">
  <div class="eyebrow">Toko Kami</div>
  <h2 class="h2">Kunjungi Outlet Trans Family Bakery Terdekat</h2>
  <p class="lead">Temukan outlet Trans Family Bakery di Langkat, Binjai, dan Kuala Simpang. Setiap toko siap menyambut Anda dengan roti fresh, kue lezat, dan oleh-oleh khas Langkat yang selalu istimewa.</p>
  <div class="collage" aria-hidden="true">
   @foreach ([1, 2, 3, 4, 5] as $i)<x-ph class="float-soft c{{ $i }}" :src="'images/kolase-'.$i.'.webp'" label="Foto kue"/>@endforeach
  </div>
  <a class="btn" href="{{ route('toko') }}">Lihat Semua Outlet →</a>
 </div>
</section>

{{-- Promo dari admin (muncul hanya bila ada promo tayang) --}}
@includeIf('partials.promo-section')

{{-- KUTIPAN PELANGGAN: latar 3D berlapis --}}
<section class="q3d" id="q3d">
 <div class="layer back" style="--d:6"><x-ph class="fl a" src="images/q3d-1.webp" label=""/><x-ph class="fl b" src="images/q3d-2.webp" label=""/></div>
 <div class="layer mid" style="--d:14"><span class="ring r1"></span><span class="ring r2"></span></div>
 <div class="layer front" style="--d:26"><x-ph class="fl c" src="images/q3d-3.webp" label=""/><x-ph class="fl d" src="images/q3d-4.webp" label=""/></div>
 <div class="wrap q3d-in">
  <div class="eyebrow light">Kata Mereka</div>
  <div class="swiper sw-quote" data-swiper='{"slidesPerView":1,"loop":true,"autoplay":7000,"grabCursor":true}'>
   <div class="swiper-wrapper">
    @foreach ($quotes as $q)
     <div class="swiper-slide"><blockquote class="qcard" data-tilt>❝ {{ $q }} ❞</blockquote></div>
    @endforeach
   </div>
   <div class="swiper-pagination"></div>
  </div>
 </div>
</section>
@endsection
