{{-- Bar promo paling atas (dikelola dari admin). --}}
@php
 try {
  $barPromo = class_exists(\App\Models\Promo::class)
      ? \App\Models\Promo::running()->where('show_in_bar', true)->first() : null;
 } catch (\Throwable $e) { $barPromo = null; }
@endphp
@if ($barPromo)
<div class="promo-bar">
  <a href="{{ $barPromo->cta_link }}" @if(!$barPromo->cta_url) target="_blank" rel="noopener" @endif>
    ✦ <b>{{ $barPromo->title }}</b>
    @if ($barPromo->discount_label) · {{ $barPromo->discount_label }} @endif
    · <u>Pesan sekarang</u> →
  </a>
</div>
<style>
.promo-bar{background:#4a2f22;color:#fff;text-align:center;padding:10px 16px;font:700 13px/1.4 'PT Sans',Arial,sans-serif}
.promo-bar a{color:#fff;display:inline-block;min-height:24px}
</style>
@endif
