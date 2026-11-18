@extends('layouts.app')
@section('title','Si PESAT')
@section('content')
<section class="hero" style="text-align:left">
 <div class="wrap">
  <p class="meta">SI PESAT TRANS FAMILY BAKERY</p>
  <h1 style="max-width:480px">Pesan Kue Cepat di Stabat</h1>
  <p style="font-size:17px;max-width:520px;margin-bottom:22px">Butuh kue hari ini? Pesan sekarang, siap dibuat dan langsung diantar ke lokasi Anda tanpa ribet.</p>
  <a class="btn" href="{{ $wa }}" target="_blank" rel="noopener">PESAN SEKARANG VIA WHATSAPP</a>
 </div>
</section>
<section class="sec alt">
 <div class="wrap">
  <h2 style="text-align:center">Cara Pesan dengan Si PESAT</h2>
  <ol class="steps" style="margin:30px auto">
   <li><b class="n">1</b><div><h3>Hubungi kami melalui WhatsApp</h3><p>Klik tombol WhatsApp dan chat langsung dengan admin kami.</p></div></li>
   <li><b class="n">2</b><div><h3>Pilih produk yang diinginkan</h3><p>Sampaikan produk pilihan Anda beserta detail pesanan.</p></div></li>
   <li><b class="n">3</b><div><h3>Tim kami akan konfirmasi pesanan</h3><p>Kami pastikan ketersediaan dan detail pesanan Anda.</p></div></li>
   <li><b class="n">4</b><div><h3>Pesanan diproses dan diantar ke lokasi Anda</h3><p>Duduk santai, pesanan Anda segera tiba!</p></div></li>
  </ol>
 </div>
</section>
@endsection
