@extends('layouts.app')
@section('title','Artikel')
@section('content')
<section class="sec">
 <div class="wrap">
  <h1 style="font-size:42px">Artikel</h1>
  <div class="grid g3">
   @foreach($artikel as [$judul, $tgl, $kat])
   <div class="card"><div class="ph" style="aspect-ratio:16/10"><img src="{{ asset('images/artikel-'.$loop->iteration.'.jpg') }}" alt="" onerror="this.remove()"></div>
    <div class="body"><h3>{{ $judul }}</h3><p class="meta">{{ $tgl }} | {{ $kat }}</p></div></div>
   @endforeach
  </div>
 </div>
</section>
@endsection
