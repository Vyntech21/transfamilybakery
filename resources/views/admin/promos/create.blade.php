@extends('admin.layout')
@section('title', 'Promo Baru')

@section('content')
<h1>Promo Baru</h1>
<form class="card" method="POST" action="{{ route('admin.promos.store') }}" enctype="multipart/form-data">
  @csrf
  @include('admin.promos.form')
  <div class="actions" style="margin-top:20px">
    <button class="btn">Simpan</button>
    <a class="btn ghost" href="{{ route('admin.promos.index') }}">Batal</a>
  </div>
</form>
@endsection
