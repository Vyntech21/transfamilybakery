@extends('layouts.app')
@section('content')
@php
    // ====== ISI DI SINI ======
    // Gambar banner yang berganti-ganti. Boleh link lengkap (https://...) atau nama file di public/images.
    $banner = ['roti-kacang-merah.jpg', 'roti-kelapa.jpg', 'roti-nanas.jpg'];
    $fotoLayanan = '';   // foto miring di bagian "Yang Kami Tawarkan" (kosong = hero.jpg)
    $fotoTestimoni = ''; // latar slider kutipan (kosong = testimoni.jpg)
    // =========================

    $img = fn ($x) => str_starts_with($x, 'http') ? $x : asset('images/'.$x);
    $fotoLayanan   = $fotoLayanan   ?: 'hero.jpg';
    $fotoTestimoni = $fotoTestimoni ?: 'testimoni.jpg';
@endphp

<section class="bnr" id="bnr">
 <div class="bnr-track">
  @foreach($banner as $g)
  <div class="bnr-slide"><img src="{{ $img($g) }}" alt=""></div>
  @endforeach
 </div>
 <div class="bnr-cap">
  <img class="bnr-logo" src="{{ asset('images/logo.png') }}" alt="TransFamily Bakery">
  <h1>Oleh-Oleh Khas Langkat</h1>
  <p>Sejak 2010 &nbsp;|&nbsp; Buka setiap hari 07.30 – 22.30</p>
  <a class="btn" href="{{ route('katalog') }}">LIHAT KATALOG &rarr;</a>
 </div>
 <button class="bp" aria-label="Sebelumnya">&#8249;</button>
 <button class="bn" aria-label="Berikutnya">&#8250;</button>
 <div class="bdots"></div>
</section>

<section class="svc">
 <div class="foto"><img src="{{ $img($fotoLayanan) }}" alt="" onerror="this.remove()"></div>
 <div class="isi">
  <small>LAYANAN</small>
  <h2>Yang Kami Tawarkan</h2>
  <div class="item"><i></i><div><h3>Halal &amp; Fresh</h3><p>Semua produk dibuat dari bahan halal, selalu fresh setiap hari.</p></div></div>
  <div class="item"><i></i><div><h3>Varian Lengkap</h3><p>Dari kue jadul, cheesecake, hingga es krim kekinian.</p></div></div>
  <div class="item"><i></i><div><h3>15 Tahun Dipercaya</h3><p>Hadir sejak 8 September 2010 dengan 6 outlet di Langkat, Binjai, dan Kuala Simpang.</p></div></div>
 </div>
</section>

<section class="sec produk">
 <div class="wrap">
  <div class="grid g3" style="margin-top:0">
   @foreach(array_slice($produk,0,3) as [$n,$d])
   <div class="card"><div class="ph"><img src="{{ $img('produk-'.$loop->iteration.'.jpg') }}" alt="" onerror="this.remove()"></div><div class="body"><h3>{{ $n }}</h3><p>{{ $d }}</p></div></div>
   @endforeach
  </div>
  <div class="grid g4">
   @foreach(array_slice($produk,3) as [$n,$d])
   <div class="card"><div class="ph"><img src="{{ $img('produk-'.($loop->iteration+3).'.jpg') }}" alt="" onerror="this.remove()"></div><div class="body"><h3>{{ $n }}</h3><p>{{ $d }}</p></div></div>
   @endforeach
  </div>
 </div>
</section>

<section class="slider" id="sl" style="background-image:linear-gradient(rgba(50,35,28,.72),rgba(50,35,28,.72)),url('{{ $img($fotoTestimoni) }}')">
 <button class="nav2 p" aria-label="Sebelumnya">&#8249;</button>
 <div class="wrap"><q id="slq"></q></div>
 <button class="nav2 n" aria-label="Berikutnya">&#8250;</button>
 <div class="dots" id="sld"></div>
</section>

<style>
.bnr{position:relative;overflow:hidden;background:#f3ece4}
.bnr-track{display:flex;transition:transform .7s ease}
.bnr-slide{flex:0 0 100%;height:clamp(460px,52vw,620px);position:relative}
.bnr-slide img{width:100%;height:100%;object-fit:cover;display:block}
.bnr-slide::after{content:"";position:absolute;inset:0;background:rgba(30,20,15,.5)}
.bnr-cap{position:absolute;left:50%;top:50%;transform:translate(-50%,-50%);color:#fff;z-index:2;width:90%;max-width:700px;text-align:center;pointer-events:none}
.bnr-cap .btn{pointer-events:auto}
.bnr-logo{display:block;margin:0 auto 14px;height:clamp(120px,18vw,200px);width:auto;filter:drop-shadow(0 4px 10px rgba(0,0,0,.45))}
.bnr-cap h1{font-size:clamp(28px,4.6vw,48px);line-height:1.15;color:#fff;text-shadow:0 2px 8px rgba(0,0,0,.5)}
.bnr-cap p{margin:8px 0 20px;font-size:16px;text-shadow:0 1px 6px rgba(0,0,0,.5)}
.bnr button{position:absolute;top:50%;transform:translateY(-50%);z-index:3;width:34px;height:46px;border:0;background:rgba(0,0,0,.35);color:#fff;font-size:28px;cursor:pointer}
.bnr button:hover{background:rgba(0,0,0,.6)}
.bnr .bp{left:12px}.bnr .bn{right:12px}
.bdots{position:absolute;left:0;right:0;bottom:14px;text-align:center;z-index:3}
.bdots span{display:inline-block;width:9px;height:9px;border-radius:50%;background:#fff;opacity:.5;margin:0 4px;cursor:pointer}
.bdots span.on{opacity:1}

</style>
<script>
(function(){
 var box=document.getElementById('bnr'),tr=box.querySelector('.bnr-track'),n=tr.children.length,i=0,t,dots=box.querySelector('.bdots');
 if(n<2){box.querySelector('.bp').style.display=box.querySelector('.bn').style.display='none';return;}
 for(var k=0;k<n;k++){(function(x){var s=document.createElement('span');s.onclick=function(){go(x,true)};dots.appendChild(s)})(k)}
 function go(x,manual){i=(x+n)%n;tr.style.transform='translateX(-'+i*100+'%)';[].forEach.call(dots.children,function(s,j){s.className=j===i?'on':''});if(manual)auto()}
 function auto(){clearInterval(t);t=setInterval(function(){go(i+1)},4000)}
 box.querySelector('.bp').onclick=function(){go(i-1,true)};
 box.querySelector('.bn').onclick=function(){go(i+1,true)};
 var x0=null;
 box.addEventListener('touchstart',function(e){x0=e.touches[0].clientX},{passive:true});
 box.addEventListener('touchend',function(e){if(x0===null)return;var d=e.changedTouches[0].clientX-x0;if(Math.abs(d)>40)go(i+(d<0?1:-1),true);x0=null});
 box.addEventListener('mouseenter',function(){clearInterval(t)});
 box.addEventListener('mouseleave',auto);
 go(0);auto();
})();
</script>
<script>
(function(){
 var q=["Tempatnya nyaman dan bersih, pilihan kue dan rotinya enak-enak. Aku sering beli di sini.","Kue ulang tahunnya cantik dan rasanya pas, anak-anak suka sekali.","Oleh-oleh Langkat yang selalu jadi andalan keluarga kalau pulang kampung."];
 var i=0,t=document.getElementById('slq'),d=document.getElementById('sld');
 q.forEach(function(_,k){var s=document.createElement('span');s.onclick=function(){go(k)};d.appendChild(s)});
 function go(n){i=(n+q.length)%q.length;t.textContent=q[i];[].forEach.call(d.children,function(s,k){s.className=k===i?'on':''})}
 document.querySelector('#sl .p').onclick=function(){go(i-1)};
 document.querySelector('#sl .n').onclick=function(){go(i+1)};
 go(0);
})();
</script>
@endsection
