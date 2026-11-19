@use('App\Support\Wa')
@extends('layouts.site')
@section('title', 'Si PESAT – Pesan Kue Cepat di Stabat')

@section('content')
<section class="page-hero warm">
 <div class="wrap">
  <div class="eyebrow">Si PESAT Trans Family Bakery</div>
  <h1>Pesan Kue Cepat di Stabat</h1>
  <p class="lead">Butuh kue hari ini? Pesan sekarang, siap dibuat dan langsung diantar ke lokasi Anda tanpa ribet.</p>
  <a class="btn" href="{{ Wa::link('Halo kak, saya mau pesan lewat Si PESAT.') }}" target="_blank" rel="noopener">✆ Pesan Sekarang via WhatsApp</a>
 </div>
</section>

<section class="sec wrap tc">
 <h2 class="h2">Apa Itu Si PESAT?</h2>
 <p class="lead">Si PESAT adalah layanan pemesanan cepat dari Trans Family Bakery untuk Anda yang membutuhkan kue, roti, atau hampers tanpa harus datang langsung ke toko.</p>
 <p class="lead">Dengan layanan ini, Anda cukup melakukan pemesanan melalui WhatsApp, dan tim kami akan menyiapkan serta mengantarkan pesanan langsung ke alamat Anda.</p>
</section>

{{-- BEST SELLER: dari database + data cadangan, tidak pernah kosong --}}
<section class="sec wrap">
 <div class="tc"><div class="eyebrow">Pilihan Favorit</div><h2 class="h2">Produk Best Seller</h2></div>

 @if ($layout === 'grid')
  <div class="grid4 cards-eq">
   @foreach ($best as $p)@include('partials.best-card', ['p' => $p])@endforeach
  </div>
 @else
  <div class="swiper sw" data-swiper='{"slidesPerView":1.4,"spaceBetween":16,"grabCursor":true,"breakpoints":{"640":{"slidesPerView":2.4},"1024":{"slidesPerView":4}}}'>
   <div class="swiper-wrapper">
    @foreach ($best as $p)<div class="swiper-slide">@include('partials.best-card', ['p' => $p])</div>@endforeach
   </div>
   <button class="swiper-button-prev" aria-label="Sebelumnya"></button>
   <button class="swiper-button-next" aria-label="Berikutnya"></button>
   <div class="swiper-pagination"></div>
  </div>
 @endif
</section>

<section class="sec tint">
 <div class="wrap tc">
  <p class="lead">Kami memahami bahwa tidak semua orang punya waktu untuk datang langsung ke toko. Terkadang, kebutuhan datang tiba-tiba.</p>
  <div class="pills">
   <div>◆ Lupa beli kue ulang tahun</div>
   <div>◆ Butuh kue untuk acara hari ini</div>
   <div>◆ Ingin kirim hampers ke keluarga atau rekan</div>
   <div>◆ Tidak sempat keluar rumah</div>
  </div>
  <p class="lead strong">Dengan Si PESAT, semua bisa diselesaikan dengan cepat dan praktis.</p>
 </div>
</section>

<section class="sec wrap tc">
 <h2 class="h2">Cara Pesan dengan Si PESAT</h2>
 <ol class="steps4">
  <li><span>①</span>Hubungi kami melalui WhatsApp</li>
  <li><span>②</span>Pilih kue atau roti yang diinginkan</li>
  <li><span>③</span>Pesanan disiapkan</li>
  <li><span>④</span>Pesanan diantar ke lokasi Anda</li>
 </ol>
 <div class="info2">
  <div class="card"><h4>Area Layanan</h4><p>{{ $area }}</p></div>
  <div class="card"><h4>Jam Pemesanan</h4><p>{{ $hours }}</p></div>
 </div>
</section>

<section class="sec wrap">
 <div class="cta">
  <p>Klik di bawah untuk langsung terhubung dengan admin kami.</p>
  <a class="btn wa" href="{{ Wa::link('Halo kak, saya mau pesan lewat Si PESAT.') }}" target="_blank" rel="noopener">✆ Pesan via WhatsApp Sekarang</a>
 </div>
</section>
@endsection
