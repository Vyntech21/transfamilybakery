@use('App\Support\Wa')
<article class="card pcard">
 <div class="ph pimg">
  @if ($p['img'])<img src="{{ $p['img'] }}" alt="{{ $p['name'] }}" loading="lazy">@endif
  <span>{{ $p['name'] }}</span>
  @if ($p['rank'])<em class="badge">★ #{{ $p['rank'] }}</em>@endif
 </div>
 <h4>{{ $p['name'] }}</h4>
 <p class="price">{{ $p['price'] ? 'Rp '.number_format($p['price'], 0, ',', '.') : 'Hubungi kami' }}</p>
 <a class="btn block" href="{{ Wa::product($p['name']) }}" target="_blank" rel="noopener">Pesan →</a>
</article>
