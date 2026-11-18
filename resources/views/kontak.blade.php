@extends('layouts.app')
@section('title','Kontak')
@section('content')
<section class="sec" style="background:var(--cream)">
 <div class="wrap" style="max-width:640px;text-align:center">
  <h1 style="font-size:46px;margin-bottom:30px">Hubungi Kami!</h1>
  <div class="foot" style="justify-content:center;color:var(--ink);text-align:left">
   <div><h4>Buka Setiap Hari</h4><p>Senin – Minggu: 07.30 – 22.30 WIB</p></div>
   <div><h4>Visit Us</h4><p>Jl. KH. Zainul Arifin No.9, Kwala Bingai, Kec. Stabat, Kabupaten Langkat, Sumatera Utara 20811</p></div>
  </div>
  <p style="margin:26px 0"><a class="btn" href="{{ route('toko') }}">LIHAT TOKO LAIN</a></p>
  <iframe title="Peta" loading="lazy" style="border:0;width:100%;height:320px;border-radius:6px" src="https://www.google.com/maps?q=Trans+Family+Bakery+Stabat&output=embed"></iframe>
 </div>
</section>
@endsection
