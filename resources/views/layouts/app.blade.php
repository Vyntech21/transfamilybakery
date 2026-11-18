<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>@yield('title', 'Oleh-Oleh Manis Khas Langkat') | TransFamily Bakery</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Bitter:wght@500;700;800&family=PT+Sans:wght@400;700&display=swap" rel="stylesheet">
<style>
:root{--brown:#9b6650;--brown-d:#5c4033;--ink:#2e2a28;--muted:#6a625e;--cream:#faf5ee;--line:#e8e0d8}
*{box-sizing:border-box;margin:0;padding:0}
html{scroll-behavior:smooth}
body{font-family:'PT Sans',Arial,sans-serif;color:var(--ink);line-height:1.7;background:#fff}
h1,h2,h3,.slab{font-family:'Bitter',Georgia,serif}
a{color:inherit;text-decoration:none}
.wrap{max-width:1080px;margin:0 auto;padding:0 24px}
.btn{display:inline-block;background:var(--brown);color:#fff;font:700 13px 'Bitter',serif;letter-spacing:.04em;padding:12px 22px;border-radius:3px}
.btn:hover{background:var(--brown-d)}
.ph{background:linear-gradient(135deg,#efe6dc,#e0cfc0);overflow:hidden;position:relative}
.ph img{display:block;width:100%;height:100%;object-fit:cover}
header{position:sticky;top:0;z-index:20;background:#fff;box-shadow:0 1px 6px rgba(0,0,0,.08)}
.nav{display:flex;align-items:center;justify-content:space-between;height:76px}
.logo{font:800 20px 'Bitter',serif;color:#b3202a;border:2px solid #b3202a;padding:2px 10px}
.menu{display:flex;align-items:center;gap:24px;list-style:none}
.menu a{font:700 13px 'Bitter',serif}
.menu a:hover,.menu a.on{color:var(--brown)}
.dd{position:relative}
.dd ul{display:none;position:absolute;top:100%;left:-16px;background:#fff;box-shadow:0 6px 20px rgba(0,0,0,.15);list-style:none;min-width:200px;padding:10px 0}
.dd:hover ul{display:block}
.dd ul a{display:block;padding:7px 18px;font-size:12px}
.burger{display:none;background:none;border:0;font-size:28px;cursor:pointer}
.hero{text-align:center;padding:80px 0 70px;background:radial-gradient(ellipse at top,#fbf7f1,#fff 70%)}
.hero h1{font-size:clamp(34px,6vw,56px);margin:20px 0 8px}
.hero p{color:var(--muted);font-size:20px}
.badge-logo{display:inline-block;font:800 34px 'Bitter',serif;color:#b3202a;border:3px solid #b3202a;padding:14px 26px}
.sec{padding:70px 0}
.sec.alt{background:var(--cream)}
.sec h2{font-size:34px;margin-bottom:10px}
.sec .lead{color:var(--muted);max-width:640px}
.grid{display:grid;gap:24px;margin-top:34px}
.g3{grid-template-columns:repeat(3,1fr)}
.g4{grid-template-columns:repeat(4,1fr)}
.card{background:#fff;border:1px solid var(--line);border-radius:6px;overflow:hidden}
.card .ph{aspect-ratio:4/3}
.card .body{padding:16px 18px}
.card h3{font-size:15px;margin-bottom:6px}
.card p{font-size:14px;color:var(--muted)}
.meta{font-size:12px;color:var(--brown)}
.split{display:grid;grid-template-columns:1fr 1fr;gap:50px;align-items:center}
.split .ph{aspect-ratio:1/1;clip-path:polygon(0 0,100% 0,100% 100%,18% 100%)}
.steps{list-style:none;margin-top:30px;max-width:520px}
.steps li{display:flex;gap:16px;margin-bottom:22px}
.steps b.n{flex:none;width:34px;height:34px;border-radius:50%;background:var(--brown);color:#fff;text-align:center;line-height:34px;font-family:'Bitter',serif}
.quote{background:linear-gradient(rgba(60,40,30,.75),rgba(60,40,30,.75)),#5c4033;color:#fff;text-align:center;padding:90px 0}
.quote p{font:700 28px/1.5 'Bitter',serif;max-width:720px;margin:0 auto}
footer{background:#2a1f1a;color:#fff;padding:70px 0 0;margin-top:0}
.foot{display:flex;flex-wrap:wrap;gap:50px;align-items:flex-start}
.foot h4{color:var(--brown);font-size:12px;margin-bottom:8px}
.foot p{font-size:13px;max-width:240px}
.copy{text-align:center;font-size:13px;padding:40px 0 18px}
@media(max-width:820px){
 .burger{display:block}
 .menu{display:none;position:absolute;top:76px;left:0;right:0;background:#fff;flex-direction:column;align-items:flex-start;padding:16px 24px;gap:12px;box-shadow:0 8px 16px rgba(0,0,0,.1)}
 .menu.open{display:flex}
 .dd ul{position:static;display:block;box-shadow:none;padding:0 0 0 12px}
 .g3,.g4,.split{grid-template-columns:1fr}
}

.hero{position:relative;min-height:calc(100vh - 76px);display:flex;flex-direction:column;align-items:center;justify-content:center;overflow:hidden;padding:60px 0 150px}
.hero h1{font-weight:800;color:var(--ink)}
.deco{position:absolute}
.deco.kiri{left:0;top:0;width:230px;height:300px;clip-path:polygon(0 0,100% 0,0 100%)}
.deco.kanan{right:6%;top:36%;width:150px;height:150px;border-radius:50%;box-shadow:0 14px 24px rgba(0,0,0,.18)}
.deco.bawah{left:18%;bottom:-40px;width:420px;height:200px;border-radius:50% 50% 0 0}
.deco.sudut{right:0;bottom:0;width:340px;height:300px;background:#f1eeea;clip-path:polygon(100% 0,100% 100%,0 100%)}
.bean{position:absolute;width:12px;height:18px;border:2px solid #9b8a7e;border-radius:50%;opacity:.55;transform:rotate(30deg)}
.hero-info{position:absolute;left:60px;bottom:70px;border-top:1px solid var(--line);padding-top:14px;font-size:13px;text-align:left}
.hero-info b{display:block;color:var(--brown);font-size:12px;margin-bottom:6px}
.hero-btn{position:absolute;right:15%;bottom:90px}
.svc{display:grid;grid-template-columns:1fr 1fr;min-height:560px;background:#fff}
.svc .foto{background:linear-gradient(135deg,#efe6dc,#e0cfc0);clip-path:polygon(0 0,100% 0,62% 100%,0 100%);overflow:hidden}
.svc .foto img{width:100%;height:100%;object-fit:cover;display:block}
.svc .isi{padding:70px 40px 70px 0;display:flex;flex-direction:column;justify-content:center}
.svc small{font:700 11px 'Bitter',serif;color:var(--brown);letter-spacing:.12em}
.svc h2{font-size:34px;margin:6px 0 22px}
.svc .item{display:flex;gap:18px;border:1px solid var(--line);padding:16px 20px;margin-bottom:14px;max-width:440px;background:#fff}
.svc .item i{flex:none;width:44px;height:44px;border:1px solid #b9aca2;border-radius:50% 50% 8px 8px;display:block}
.svc .item h3{font-size:14px}
.svc .item p{font-size:13px;color:var(--muted)}
.produk .card{box-shadow:0 8px 20px rgba(0,0,0,.1);border:0;text-align:center}
.produk .card .ph{aspect-ratio:1/1;margin:14px 14px 0;border-radius:8px}
.produk .card h3{font-size:14px;margin-top:6px}
.slider{position:relative;color:#fff;text-align:center;padding:120px 0 90px;background:linear-gradient(rgba(50,35,28,.72),rgba(50,35,28,.72)),#5c4033 center/cover}
.slider q{display:block;font:700 30px/1.5 'Bitter',serif;max-width:720px;margin:0 auto;quotes:"\201C" "\201D"}
.slider .nav2{position:absolute;top:50%;background:none;border:0;color:#fff;font-size:34px;cursor:pointer;transform:translateY(-50%)}
.slider .nav2.p{left:30px}.slider .nav2.n{right:30px}
.dots{margin-top:36px}.dots span{display:inline-block;width:8px;height:8px;border-radius:50%;background:#fff;opacity:.4;margin:0 4px;cursor:pointer}.dots span.on{opacity:1}
footer{position:relative;background:linear-gradient(rgba(35,25,20,.9),rgba(35,25,20,.95)),#2a1f1a;padding-top:120px}
footer::before{content:"";position:absolute;left:0;right:0;top:0;height:70px;background:#fff;-webkit-mask:radial-gradient(circle at 10px 100%,#0000 9px,#000 10px) 0 0/20px 100%;mask:radial-gradient(circle at 10px 100%,#0000 9px,#000 10px) 0 0/20px 100%;transform:scaleY(-1)}
.bow{position:absolute;left:50%;top:14px;transform:translateX(-50%);width:130px}
.page-top{padding:70px 0 0}
@media(max-width:820px){
 .deco.kiri{width:120px;height:160px}.deco.kanan,.deco.bawah,.deco.sudut{display:none}
 .hero-info,.hero-btn{position:static;margin-top:26px}
 .svc{grid-template-columns:1fr}.svc .foto{min-height:260px;clip-path:none}.svc .isi{padding:40px 24px}
 .slider q{font-size:22px;padding:0 40px}
}
.wa-float{position:fixed;right:18px;bottom:18px;z-index:50;width:54px;height:54px;border-radius:50%;background:#25d366;box-shadow:0 4px 12px rgba(0,0,0,.3);display:flex;align-items:center;justify-content:center}
.wa-float svg{width:30px;height:30px;fill:#fff}
.logo-img img{height:58px;width:auto;display:block}
</style>
</head>
<body>
<header>
 <div class="wrap nav">
  <a href="{{ route('home') }}" class="logo-img"><img src="{{ asset('images/logo.png') }}" alt="TransFamily Bakery"></a>
  <button class="burger" onclick="document.getElementById('m').classList.toggle('open')" aria-label="Menu">&#9776;</button>
  <ul class="menu" id="m">
   <li><a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'on' : '' }}">Beranda</a></li>
   <li><a href="{{ route('tentang') }}" class="{{ request()->routeIs('tentang') ? 'on' : '' }}">Tentang</a></li>
   <li><a href="{{ route('katalog') }}" class="{{ request()->routeIs('katalog') ? 'on' : '' }}">Katalog</a></li>
   <li class="dd"><a href="{{ route('si-pesat') }}" class="{{ request()->routeIs('si-pesat') ? 'on' : '' }}">Layanan &#9662;</a>
     <ul><li><a href="{{ route('si-pesat') }}">Si PESAT</a></li></ul></li>
   <li class="dd"><a href="{{ route('toko') }}" class="{{ request()->routeIs('toko') ? 'on' : '' }}">Toko &#9662;</a>
     <ul>@foreach($toko as $t)<li><a href="{{ route('toko') }}">{{ $t }}</a></li>@endforeach</ul></li>
   <li><a href="{{ route('artikel') }}" class="{{ request()->routeIs('artikel') ? 'on' : '' }}">Artikel</a></li>
   <li><a href="{{ route('kontak') }}" class="{{ request()->routeIs('kontak') ? 'on' : '' }}">Kontak</a></li>
   <li><a class="btn" href="{{ $wa }}" target="_blank" rel="noopener">PESAN KUE SEKARANG</a></li>
  </ul>
 </div>
</header>

@yield('content')

<footer>
 <svg class="bow" viewBox="0 0 130 90" fill="none" stroke="#e8c9a0" stroke-width="3" stroke-linecap="round"><path d="M65 38C50 12 22 8 20 26c-2 16 30 14 45 12zM65 38C80 12 108 8 110 26c2 16-30 14-45 12z"/><path d="M62 42c-10 14-18 30-22 44M68 42c10 14 18 30 22 44"/><circle cx="65" cy="40" r="6" fill="#e8c9a0"/></svg>
 <div class="wrap foot">
  <div><h4>Buka Setiap Hari</h4><p>Senin – Minggu: 07.30 – 22.30 WIB</p></div>
  <div><h4>Kunjungi Kami</h4><p>Jl. KH. Zainul Arifin No.9, Kwala Bingai, Kec. Stabat, Kabupaten Langkat, Sumatera Utara 20811, Indonesia</p></div>
  <div><h4>Ikuti Kami</h4><p>Instagram · Facebook · TikTok</p></div>
  <div><a class="btn" href="{{ $wa }}" target="_blank" rel="noopener">BELI ONLINE</a></div>
 </div>
 <p class="copy">&copy; {{ date('Y') }} TransFamily Bakery. All rights reserved.</p>
</footer>
<a class="wa-float" href="{{ $wa }}" target="_blank" rel="noopener" aria-label="Chat WhatsApp"><svg viewBox="0 0 32 32"><path d="M16 3C9 3 3.4 8.6 3.4 15.5c0 2.3.6 4.4 1.7 6.3L3 29l7.4-1.9c1.8 1 3.800 1.500 5.600 1.500 7 0 12.600-5.600 12.600-12.500S23 3 16 3zm0 22.800c-1.800 0-3.500-.5-5-1.400l-.4-.2-4.400 1.100 1.200-4.200-.3-.4a10.200 10.200 0 0 1-1.600-5.500C5.500 9.900 10.200 5.400 16 5.400s10.500 4.500 10.500 10.100S21.800 25.800 16 25.800zm5.800-7.600c-.3-.2-1.900-.9-2.200-1s-.5-.2-.7.200-.8 1-1 1.200-.4.200-.7.100a8.500 8.500 0 0 1-4.200-3.700c-.3-.6.300-.5.900-1.700.1-.2 0-.4 0-.5l-1-2.300c-.2-.6-.5-.5-.7-.5h-.6c-.2 0-.5.100-.8.400s-1 1-1 2.500 1.100 2.900 1.200 3.100 2.100 3.300 5.200 4.600c2 .8 2.800.9 3.800.7.600-.1 1.900-.8 2.200-1.500s.3-1.400.2-1.500-.3-.2-.6-.4z"/></svg></a>
</body>
</html>
