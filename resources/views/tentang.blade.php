@extends('layouts.site')
@section('title', 'Tentang Kami')

@section('content')
<section class="page-hero warm">
 <div class="wrap">
  <div class="eyebrow">Sejak 2010</div>
  <h1>Tentang Kami</h1>
  <p class="lead">Trans Family Bakery berdiri sejak 2010 di Langkat dengan visi menyajikan roti dan kue halal berkualitas. Dari kue jadul hingga kreasi modern, semua dibuat fresh tanpa pengawet. Kini hadir dengan 6 outlet di Langkat, Binjai, dan Kuala Simpang sebagai oleh-oleh khas yang dipercaya pelanggan.</p>
 </div>
</section>

{{-- Galeri bergerak; klik foto = tampil besar dengan kata menarik --}}
<section class="sec wrap">
 <div class="swiper sw" data-swiper='{"slidesPerView":1.3,"spaceBetween":16,"grabCursor":true,"autoplay":4000,"speed":900,"breakpoints":{"700":{"slidesPerView":2.3},"1024":{"slidesPerView":3.2}}}'>
  <div class="swiper-wrapper">
   @foreach ($gallery as $g)
    <div class="swiper-slide">
     @if ($g['img'])
      <a class="glightbox shot" href="{{ $g['img'] }}" data-gallery="tentang" data-description="❝ {{ $g['caption'] }} ❞">
       <img src="{{ $g['img'] }}" alt="{{ $g['caption'] }}" loading="lazy"><span class="cap">❝ {{ $g['caption'] }} ❞</span>
      </a>
     @else
      <div class="shot"><x-ph label="Foto"/><span class="cap">❝ {{ $g['caption'] }} ❞</span></div>
     @endif
    </div>
   @endforeach
  </div>
  <button class="swiper-button-prev" aria-label="Sebelumnya"></button>
  <button class="swiper-button-next" aria-label="Berikutnya"></button>
  <div class="swiper-pagination"></div>
 </div>
</section>

{{-- Cerita Trans Family Bakery: album polaroid --}}
<section class="sec album-sec">
 <div class="wrap tc">
  <div class="eyebrow">Cerita</div>
  <h2 class="h2">Cerita Trans Family Bakery</h2>
  <div class="album">
   @foreach ($story as $i => $p)
    <figure class="polaroid p{{ $i % 4 }}">
     @if ($p['img'])
      <a class="glightbox" href="{{ $p['img'] }}" data-gallery="cerita" data-description="{{ $p['caption'] }}"><img src="{{ $p['img'] }}" alt="{{ $p['caption'] }}" loading="lazy"></a>
     @else
      <x-ph label="Foto"/>
     @endif
     <figcaption>{{ $p['caption'] }}</figcaption>
    </figure>
   @endforeach
  </div>
 </div>
</section>

{{-- Garis waktu --}}
<section class="sec wrap">
 <h2 class="h2 tc">Perjalanan Kami</h2>
 <ol class="timeline">
  @foreach ($timeline as $t)
   <li><span class="yr">{{ $t['year'] }}</span><div><h4>{{ $t['title'] }}</h4>@if ($t['text'])<p>{{ $t['text'] }}</p>@endif</div></li>
  @endforeach
 </ol>
</section>

{{-- Nilai --}}
<section class="sec wrap">
 <div class="grid3 cards-eq">
  <div class="card tc"><span class="sym">✓</span><h4>Bahan Premium &amp; Halal</h4><p>Setiap roti dan kue dibuat dari bahan pilihan berkualitas, halal, tanpa pengawet, dan selalu fresh setiap hari.</p></div>
  <div class="card tc"><span class="sym">✓</span><h4>Resep Asli &amp; Inovatif</h4><p>Menggabungkan resep klasik penuh nostalgia dengan sentuhan modern, menghadirkan rasa yang tak pernah lekang oleh waktu.</p></div>
  <div class="card tc"><span class="sym">✓</span><h4>Dibuat dengan Sepenuh Hati</h4><p>Semua produk kami diolah dengan teliti dan penuh ketulusan, demi menjaga rasa, kualitas, dan kepuasan pelanggan.</p></div>
 </div>
</section>

{{-- Visi & Misi --}}
<section class="sec wrap">
 <div class="vm">
  <div class="card"><h4>VISI</h4><p>Menyajikan roti dan kue berkualitas terbaik yang halal, fresh, dan terpercaya, serta menjadi pilihan utama oleh-oleh khas Langkat.</p></div>
  <div class="card"><h4>MISI</h4><ol>
   <li>Menghadirkan produk bakery dari bahan premium, tanpa pengawet dan pemanis buatan.</li>
   <li>Menjaga kehalalan, mutu, dan keamanan pangan dengan standar sertifikasi resmi.</li>
   <li>Memberikan pelayanan yang ramah, cepat, dan penuh ketulusan kepada setiap pelanggan.</li>
   <li>Terus berinovasi menghadirkan variasi produk, dari kue tradisional hingga modern.</li>
   <li>Menjadi bagian dari setiap momen berharga pelanggan, dari sajian sehari-hari hingga perayaan istimewa.</li>
   <li>Berkontribusi dalam menciptakan lapangan kerja, khususnya bagi masyarakat di Kabupaten Langkat.</li>
  </ol></div>
 </div>
</section>
@endsection
