{{-- Bagian promo. Pasang di mana saja, mis. setelah testimoni: @include('partials.promo-section')
     Tidak menampilkan apa pun kalau tidak ada promo yang sedang tayang. --}}
@php($promos = \App\Models\Promo::running()->get())
@if ($promos->isNotEmpty())
<section class="promo-sec" id="promo">
  <div class="promo-wrap">
    <div class="promo-eyebrow">Promo</div>
    <h2>Promo Spesial Untuk Anda</h2>
    <div class="promo-grid">
      @foreach ($promos as $p)
        <article class="promo-card">
          @if ($p->image_url)<img src="{{ $p->image_url }}" alt="{{ $p->title }}" loading="lazy">@endif
          <div class="promo-body">
            @if ($p->badge)<span class="promo-badge">{{ $p->badge }}</span>@endif
            <h3>{{ $p->title }}</h3>
            @if ($p->discount_label)<div class="promo-label">{{ $p->discount_label }}</div>@endif
            @if ($p->description)<p>{{ $p->description }}</p>@endif
            @if ($p->ends_at)<div class="promo-until">Sampai {{ $p->ends_at->translatedFormat('d F Y') }}</div>@endif
            <a class="promo-btn" href="{{ $p->cta_link }}" @if(!$p->cta_url) target="_blank" rel="noopener" @endif>Pesan Promo</a>
          </div>
        </article>
      @endforeach
    </div>
  </div>
</section>
<style>
.promo-sec{background:#faf5ee;padding:64px 0}
.promo-wrap{max-width:1080px;margin:0 auto;padding:0 24px;text-align:center}
.promo-eyebrow{color:#9b6650;font:700 12px 'Bitter',serif;letter-spacing:.08em;text-transform:uppercase}
.promo-sec h2{font:700 32px 'Bitter',serif;margin:6px 0 28px;color:#3a241d}
.promo-grid{display:grid;grid-template-columns:repeat(auto-fit,minmax(260px,1fr));gap:22px;text-align:left}
.promo-card{background:#fff;border:1px solid #e8e2dc;border-radius:10px;overflow:hidden;box-shadow:0 2px 10px rgba(0,0,0,.05)}
.promo-card img{display:block;width:100%;aspect-ratio:16/10;object-fit:cover}
.promo-body{padding:18px}
.promo-badge{display:inline-block;background:#b3202a;color:#fff;font:700 11px Arial,sans-serif;padding:3px 10px;border-radius:20px;margin-bottom:8px}
.promo-card h3{font:700 18px 'Bitter',serif;margin-bottom:4px}
.promo-label{color:#9b6650;font:700 20px 'Bitter',serif;margin-bottom:6px}
.promo-card p{font-size:14px;color:#6a625e;margin-bottom:8px}
.promo-until{font-size:12px;color:#6a625e;margin-bottom:12px}
.promo-btn{display:inline-block;background:#9b6650;color:#fff;font:700 13px 'Bitter',serif;padding:10px 20px;border-radius:4px}
.promo-btn:hover{background:#5c4033}
</style>
@endif
