@extends('admin.layout')
@section('title', 'Promo')

@section('content')
<div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:6px">
  <h1 style="margin:0">Promo</h1>
  <a class="btn" href="{{ route('admin.promos.create') }}">+ Promo Baru</a>
</div>
<p class="hint" style="margin-bottom:14px">
  Saat ini <b>{{ $running }}</b> promo sedang tayang di website.
  Promo tayang jika saklarnya aktif dan tanggalnya sedang berlaku.
</p>

<div class="card">
@if ($promos->isEmpty())
  <p>Belum ada promo. Klik "Promo Baru" untuk membuat.</p>
@else
<table>
  <thead><tr><th>Promo</th><th>Periode</th><th>Status</th><th></th></tr></thead>
  <tbody>
  @foreach ($promos as $p)
    <tr>
      <td>
        <b>{{ $p->title }}</b>
        @if ($p->discount_label)<div class="hint">{{ $p->discount_label }}</div>@endif
        @if ($p->show_in_bar)<div class="hint">Tampil di bar atas</div>@endif
      </td>
      <td class="hint">
        {{ $p->starts_at ? $p->starts_at->format('d M Y H:i') : 'Langsung' }}
        &rarr;
        {{ $p->ends_at ? $p->ends_at->format('d M Y H:i') : 'Tanpa batas' }}
      </td>
      <td><span class="pill {{ $p->status }}">{{ ucfirst($p->status) }}</span></td>
      <td>
        <div class="actions">
          <form class="inline" method="POST" action="{{ route('admin.promos.toggle', $p) }}">
            @csrf @method('PATCH')
            <button class="btn ghost">{{ $p->is_active ? 'Matikan' : 'Aktifkan' }}</button>
          </form>
          <a class="btn ghost" href="{{ route('admin.promos.edit', $p) }}">Ubah</a>
          <form class="inline" method="POST" action="{{ route('admin.promos.destroy', $p) }}"
                onsubmit="return confirm('Hapus promo ini?')">
            @csrf @method('DELETE')
            <button class="btn red">Hapus</button>
          </form>
        </div>
      </td>
    </tr>
  @endforeach
  </tbody>
</table>
@endif
</div>
@endsection
