@extends('layouts.app')
@section('title','Toko')
@section('content')
<section class="sec">
 <div class="wrap">
  <h1 style="font-size:42px">Toko Kami</h1>
  <p class="lead">Setiap toko siap menyambut Anda dengan roti fresh, kue lezat, dan oleh-oleh khas Langkat yang selalu istimewa.</p>
  <div class="grid g3">
   @foreach($toko as $t)
   <div><div class="ph card" style="aspect-ratio:4/3"><img src="{{ asset('images/toko-'.$loop->iteration.'.jpg') }}" alt="" onerror="this.remove()"></div>
    <h3 style="margin-top:12px;font-size:14px;text-transform:uppercase">Outlet {{ $t }}</h3></div>
   @endforeach
  </div>
 </div>
</section>
@endsection
