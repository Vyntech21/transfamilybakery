@extends('admin.layout')
@section('title', 'Ubah Promo')

@section('content')
<h1>Ubah Promo</h1>
<form class="card" method="POST" action="{{ route('admin.promos.update', $promo) }}" enctype="multipart/form-data">
  @csrf @method('PUT')
  @include('admin.promos.form')
  <div class="actions" style="margin-top:20px">
    <button class="btn">Simpan Perubahan</button>
    <a class="btn ghost" href="{{ route('admin.promos.index') }}">Batal</a>
  </div>
</form>
@endsection
