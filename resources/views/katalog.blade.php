@extends('layouts.app')
@section('title','Katalog')
@section('content')
<section class="sec">
 <div class="wrap">
  <h1 style="font-size:42px">Katalog Produk</h1>
  <p class="lead">Pilih kategori favoritmu, lalu pesan lewat WhatsApp.</p>
  <div class="grid g3">
   @foreach($produk as [$nama, $desk])
   <div class="card"><div class="ph"><img src="{{ asset('images/produk-'.$loop->iteration.'.jpg') }}" alt="" onerror="this.remove()"></div>
    <div class="body"><h3>{{ $nama }}</h3><p>{{ $desk }}</p></div></div>
   @endforeach
  </div>
  <p style="margin-top:34px"><a class="btn" href="{{ $wa }}" target="_blank" rel="noopener">PESAN KUE ONLINE</a></p>
 </div>
</section>
@endsection
