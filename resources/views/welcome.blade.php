<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Oleh-Oleh Manis Khas Langkat | TransFamily Bakery</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Bitter:wght@500;700;800&family=PT+Sans:wght@400;700&display=swap" rel="stylesheet">
<style>
:root{--brown:#9b6650;--brown-d:#5c4033;--ink:#2e2a28;--muted:#6a625e;--cream:#faf5ee;--line:#e8e2dc;--dark:#2a2523}
*{box-sizing:border-box;margin:0;padding:0}
html{scroll-behavior:smooth;scroll-padding-top:80px}
body{font-family:'PT Sans',Arial,sans-serif;color:var(--ink);line-height:1.7;background:#fff}
h1,h2,h3,h4,.slab{font-family:'Bitter',Georgia,serif}
a{color:inherit;text-decoration:none}
img{max-width:100%}
.wrap{max-width:1080px;margin:0 auto;padding:0 24px}
.btn{display:inline-block;background:var(--brown);color:#fff;font:700 13px 'Bitter',serif;letter-spacing:.06em;text-transform:uppercase;padding:14px 26px;border:0;cursor:pointer}
.btn:hover{background:var(--brown-d)}
/* header */
header{position:sticky;top:0;z-index:20;background:#fff;box-shadow:0 1px 6px rgba(0,0,0,.08)}
.nav{display:flex;align-items:center;justify-content:space-between;height:80px}
.logo{font:800 20px 'Bitter',serif;color:#b3202a;border:2px solid #b3202a;padding:2px 10px;transform:rotate(-3deg)}
.menu{display:flex;align-items:center;gap:26px;list-style:none}
.menu a{font:700 13px 'Bitter',serif;letter-spacing:.04em}
.menu a:hover,.menu a.on{color:var(--brown)}
.dd{position:relative}
.dd ul{display:none;position:absolute;top:100%;left:-20px;background:#fff;list-style:none;min-width:170px;padding:14px 20px;border-top:3px solid var(--brown);box-shadow:0 6px 16px rgba(0,0,0,.1)}
.dd:hover ul{display:block}
.burger{display:none;background:none;border:0;font-size:28px;cursor:pointer}
/* placeholders */
.foto{display:block;width:100%;object-fit:cover;background:#efe6dc;border-radius:6px}
/* hero */
.hero{position:relative;text-align:center;padding:70px 0 40px;overflow:hidden}
.hero .corner{position:absolute;left:0;top:0;width:240px;height:230px;clip-path:polygon(0 0,100% 0,0 100%);border-radius:0}
.hero .logo-big{width:260px;height:200px;margin:0 auto 30px;border-radius:0;background:none;color:#b3202a;font:800 56px 'Bitter',serif;border:6px solid #b3202a;transform:rotate(-3deg)}
.hero h1{font-size:clamp(34px,6vw,54px);font-weight:700;color:#333;line-height:1.2}
.hero p.since{font-size:26px;color:var(--muted);margin-top:8px}
.hero-row{display:flex;align-items:center;justify-content:space-between;gap:30px;margin-top:70px;text-align:left}
.hours{border-top:1px solid var(--line);padding-top:16px;font-size:14px;font-weight:700;width:190px;text-align:right}
.hours b{display:block;color:var(--brown)}
.hero-row .foto{width:340px;height:230px;border-radius:50% 50% 40% 40%}
/* features */
.features{display:grid;grid-template-columns:1fr 1fr;align-items:center;gap:40px;padding:50px 0}
.features .big{height:560px;clip-path:polygon(0 0,100% 0,100% 80%,60% 100%,0 100%);border-radius:0}
.features h2{font-size:30px;margin-bottom:22px}
.fcard{display:flex;gap:20px;border:1px solid var(--line);padding:22px;margin-bottom:20px;align-items:center}
.fcard .ic{font-size:44px}
.fcard h4{font-size:16px}
.fcard p{font-size:14px;color:var(--muted)}
/* produk */
.eyebrow{color:var(--brown);font:700 12px 'Bitter',serif;letter-spacing:.08em;text-transform:uppercase}
.produk{padding:60px 0}
.produk .head{display:grid;grid-template-columns:1fr 2fr;gap:40px;align-items:start;margin-bottom:40px}
.produk h2{font-size:30px;line-height:1.3}
.grid3,.grid4{display:grid;gap:22px}
.grid3{grid-template-columns:repeat(3,1fr)}
.grid4{grid-template-columns:repeat(4,1fr);margin-top:22px}
.pcard{border:1px solid var(--line);border-radius:8px;padding:16px;text-align:center;box-shadow:0 2px 10px rgba(0,0,0,.05);background:#fff}
.pcard .foto{aspect-ratio:3/4;margin-bottom:14px}
.grid4 .pcard .foto{aspect-ratio:1/1}
.pcard h4{font-size:15px;margin-bottom:6px}
.pcard p{font-size:12.5px;color:var(--muted);line-height:1.6}
/* testimoni */
.testi{background:linear-gradient(rgba(30,20,15,.7),rgba(30,20,15,.7)),#6b4a3a;color:#fff;text-align:center;padding:110px 24px;position:relative}
.testi blockquote{max-width:620px;margin:0 auto;font:700 26px/1.45 'Bitter',serif}
.testi .arr{position:absolute;top:50%;font-size:30px;background:none;border:0;color:#fff;cursor:pointer}
.testi .l{left:12%}.testi .r{right:12%}
/* tentang */
.tentang{padding:80px 0;background:#fff}
.tentang .row{display:grid;grid-template-columns:1fr 1fr;gap:50px;align-items:center}
.tentang h2{font-size:44px;margin:6px 0 16px}
.tentang p{font-size:14.5px;color:var(--muted);margin-bottom:14px}
.visimisi{display:grid;grid-template-columns:1fr 1.4fr;gap:40px;margin-top:50px}
.visimisi h4{margin-bottom:8px}
.visimisi ol{padding-left:18px;font-size:14px;color:var(--muted)}
.nilai{display:grid;grid-template-columns:repeat(3,1fr);gap:30px;margin-top:50px}
.nilai h4{font-size:14px;text-transform:uppercase;margin-bottom:6px}
.nilai p{font-size:14px;color:var(--muted)}
.strip{display:grid;grid-template-columns:1fr 1fr;gap:6px;margin-top:50px}
.strip .foto{height:150px;border-radius:0}
/* katalog */
.katalog{padding:70px 0;text-align:center}
.katalog h2{font-size:40px;margin-bottom:30px}
.kat-row{display:grid;grid-template-columns:200px 1fr;gap:30px;text-align:left}
.filter{border:1px solid var(--line);padding:18px;height:max-content;font-size:14px}
.filter h5{color:var(--brown);font:500 14px 'Bitter',serif;margin-bottom:10px}
.filter .sel{background:#f3eeea;border-left:3px solid var(--brown);padding:4px 10px;margin-bottom:10px}
.filter input{width:100%;padding:7px;border:1px solid var(--line);margin-bottom:12px;font:inherit;font-size:12px}
.filter .btn{width:100%;text-align:center;padding:10px 6px;font-size:11px;margin-top:12px}
/* pesat */
.pesat-hero{background:#f5f2ee;padding:70px 0}
.pesat-hero .row{display:grid;grid-template-columns:1.3fr 1fr;gap:40px;align-items:center}
.pesat-hero h2{font-size:48px;line-height:1.2;color:#3a241d;margin:8px 0 16px}
.pesat-hero .btn{background:var(--brown);outline:1px solid #d9b98a;outline-offset:-4px}
.pesat-hero .foto{height:280px;border-radius:50%}
.center{text-align:center}
.sect{padding:70px 0}
.sect h2{font-size:34px;margin-bottom:12px}
.sect hr{width:150px;border:0;border-top:1px solid #d9b98a;margin:0 auto 22px}
.sect p{max-width:640px;margin:0 auto 12px;color:#444;font-size:15px}
.tint{background:#efeae7}
.pills{max-width:440px;margin:20px auto;display:grid;gap:10px}
.pills div{background:var(--cream);padding:10px 16px;border-radius:6px;font-size:14px;text-align:left}
.steps{max-width:480px;margin:20px auto 0;text-align:left;list-style:none}
.steps li{display:flex;gap:14px;align-items:center;margin-bottom:14px;font:700 15px 'Bitter',serif}
.steps span{width:32px;height:32px;border-radius:50%;background:var(--brown-d);color:#fff;display:grid;place-items:center;font-size:14px}
.cta{background:var(--brown-d);color:#fff;max-width:640px;margin:0 auto;padding:40px;border-radius:12px;text-align:center}
.cta p{color:#fff;margin-bottom:14px}
.wa{display:inline-block;background:#25d366;color:#fff;font-weight:700;padding:12px 28px;border-radius:30px;box-shadow:0 4px 14px rgba(37,211,102,.4)}
/* toko */
.toko{padding:80px 0;text-align:center}
.toko h2{font-size:42px;margin:6px 0 14px}
.toko>.wrap>p{max-width:420px;margin:0 auto 40px;font-size:14px;color:var(--muted)}
.outlets{display:grid;grid-template-columns:repeat(3,1fr);gap:28px;text-align:left}
.outlets .foto{height:150px}
.outlets h4{font-size:15px;margin-top:12px;text-transform:uppercase}
/* artikel */
.artikel{padding:70px 0}
.artikel h2{font-size:36px;text-align:center;margin-bottom:34px}
.acard{padding:0;overflow:hidden;text-align:left}
.acard .foto{aspect-ratio:16/10;border-radius:0;margin:0}
.acard div.b{padding:16px}
.older{display:block;margin-top:24px;color:#2ea3f2;font-size:14px}
/* footer */
footer{background:linear-gradient(rgba(42,37,35,.92),rgba(42,37,35,.97)),#2a2523;color:#fff;position:relative;margin-top:30px}
footer::before{content:"🎀";position:absolute;left:50%;top:-34px;transform:translateX(-50%);font-size:68px;background:#fff;border-radius:50%;line-height:1}
footer .wrap{display:grid;grid-template-columns:1fr 1.4fr 1fr auto;gap:30px;padding-top:120px;padding-bottom:60px;align-items:start;font-size:13px;font-weight:700}
footer h6{color:var(--brown);font:700 12px 'Bitter',serif;margin-bottom:8px}
footer .soc span{display:inline-block;margin-right:12px}
.copy{background:rgba(0,0,0,.35);text-align:center;font-size:12px;font-weight:700;padding:8px}
/* responsive */
@media(max-width:860px){
.menu{display:none;position:absolute;top:80px;left:0;right:0;background:#fff;flex-direction:column;align-items:flex-start;padding:20px 24px;gap:14px}
.menu.open{display:flex}
.burger{display:block}
.features,.tentang .row,.visimisi,.pesat-hero .row,.kat-row,.produk .head{grid-template-columns:1fr}
.grid3,.outlets,.nilai{grid-template-columns:1fr}
.grid4{grid-template-columns:1fr 1fr}
.hero-row{flex-direction:column}
.hero .corner{width:120px;height:120px}
footer .wrap{grid-template-columns:1fr}
.testi .l{left:3%}.testi .r{right:3%}
.dd ul{position:static;display:block;box-shadow:none;border:0;padding:6px 0 0 12px}
}

.hero .corner{position:absolute;left:0;top:0;width:240px;height:230px;object-fit:cover;object-position:left top;clip-path:polygon(0 0,100% 0,0 100%)}
.hero .logo-big{display:block;width:270px;margin:0 auto 30px;transform:none;border:0;background:none}
.hero .cookie{position:absolute;right:30px;top:430px;width:135px}
.hero{position:relative}
.hero-row img.basket{width:330px;height:auto}
.features img.big{width:100%;height:560px;object-fit:cover;object-position:right top;clip-path:none}
.pcard img{width:100%;height:auto;display:block;border-radius:6px;margin-bottom:14px}
.outlets img{width:100%;height:auto;display:block;border-radius:8px;box-shadow:0 6px 14px rgba(0,0,0,.2)}
@media(max-width:860px){.hero .cookie{display:none}}
</style>
</head>
<body>

<header>
 <div class="wrap nav">
  <a href="#beranda"><img src="https://transfamilybakery.com/wp-content/uploads/2025/09/logo-trans-family.webp" alt="Trans Family" height="46"></a>
  <button class="burger" onclick="document.getElementById('m').classList.toggle('open')" aria-label="Menu">☰</button>
  <ul class="menu" id="m">
   <li><a href="#beranda" class="on">Beranda</a></li>
   <li><a href="#tentang">Tentang</a></li>
   <li><a href="#katalog">Katalog</a></li>
   <li class="dd"><a href="#layanan">Layanan ⌄</a><ul><li><a href="#layanan">SI PESAT</a></li></ul></li>
   <li class="dd"><a href="#toko">Toko ⌄</a><ul><li><a href="#toko">Outlet Kami</a></li></ul></li>
   <li><a href="#artikel">Artikel</a></li>
   <li><a href="#kontak">Kontak</a></li>
   <li><a class="btn" href="#layanan">Pesan Kue Sekarang</a></li>
  </ul>
 </div>
</header>

<section class="hero" id="beranda">
 <img class="corner" src="https://transfamilybakery.com/wp-content/uploads/2025/09/logo-trans-family.webp" alt=""><img class="cookie" src="" alt="">
 <div class="wrap">
  <img class="logo-big" src="https://transfamilybakery.com/wp-content/uploads/2025/09/logo-trans-family.webp" width="400" height="322" alt="Trans Family">
  <h1>Oleh-Oleh Khas Langkat</h1>
  <p class="since">Sejak 2010</p>
  <div class="hero-row">
   <div class="hours"><b>Buka setiap hari:</b>Senin – Minggu: 07.30 – 22.30</div>
   <img class="basket" src="" alt="Aneka roti">
   <a class="btn" href="#katalog">Lihat Katalog →</a>
  </div>
 </div>
</section>

<section class="wrap features">
 <img class="big" src="" alt="Roti panggang">
 <div>
  <h2>Yang Kami Tawarkan</h2>
  <div class="fcard"><span class="ic">🍞</span><div><h4>Halal &amp; Fresh</h4><p>Semua produk dibuat dari bahan halal, selalu fresh setiap hari.</p></div></div>
  <div class="fcard"><span class="ic">🍰</span><div><h4>Varian Lengkap</h4><p>Dari kue jadul, cheesecake, hingga roti es krim kekinian.</p></div></div>
  <div class="fcard"><span class="ic">🛍️</span><div><h4>15 Tahun Dipercaya</h4><p>Hadir sejak 8 September 2010 dengan 6 outlet di Langkat, Binjai, dan Kuala Simpang.</p></div></div>
 </div>
</section>

<section class="produk wrap">
 <div class="head">
  <div>
   <h2>Cita Rasa Khas Langkat</h2>
   <a href="#toko" style="font-size:12px;color:var(--brown);font-weight:700">Shop Online →</a>
  </div>
  <div>
   <p style="font-size:14px;color:var(--muted);margin-bottom:16px">Trans Family Bakery menghadirkan roti dan kue segar setiap hari. Dari cheesecake, rolling durian, hingga roti es krim, setiap gigitan menghadirkan cita rasa istimewa yang cocok sebagai oleh-oleh khas Langkat untuk keluarga maupun sahabat.</p>
   <a class="btn" href="#katalog">Lihat Produk →</a>
  </div>
 </div>
 <div class="grid3">
  <div class="pcard"><img src="" alt=""><h4>Roti Jadul &amp; Tradisional</h4><p>Nikmati roti klasik penuh nostalgia dengan rasa khas tempo dulu, mulai dari roti isi kacang, kelapa, hingga cokelat sederhana yang selalu bikin rindu.</p></div>
  <div class="pcard"><img src="" alt=""><h4>Roti Modern &amp; Kekinian</h4><p>Roti lembut dengan isian kekinian seperti roti es krim dan soft bread premium, dibuat fresh setiap hari untuk selera masa kini.</p></div>
  <div class="pcard"><img src="" alt=""><h4>Kue &amp; Cake Ulang Tahun</h4><p>Rayakan momen spesial dengan kue ulang tahun custom, dekorasi cantik, dan cita rasa premium yang selalu jadi favorit keluarga.</p></div>
 </div>
 <div class="grid4">
  <div class="pcard"><img src="" alt=""><h4>Cheesecake &amp; Mini Cake</h4><p>Cheesecake lembut, mini cake manis, brownies, hingga roll cake sempurna untuk camilan atau hadiah kecil penuh kesan.</p></div>
  <div class="pcard"><img src="" alt=""><h4>Khas Langkat</h4><p>Produk ikonik seperti Rolling Durian dan kreasi khas Langkat lainnya, pilihan tepat untuk oleh-oleh yang autentik dan berkesan.</p></div>
  <div class="pcard"><img src="" alt=""><h4>Pastry &amp; Snack Gurih</h4><p>Croissant, puff pastry, dan aneka snack gurih yang renyah dan lezat, cocok menemani waktu santai Anda.</p></div>
  <div class="pcard"><img src="" alt=""><h4>Oleh-Oleh &amp; Hampers</h4><p>Paket oleh-oleh khas Langkat dan hampers spesial untuk acara, hadiah, maupun bekal perjalanan Anda.</p></div>
 </div>
</section>

<section class="testi">
 <button class="arr l" onclick="slide(-1)" aria-label="Sebelumnya">‹</button>
 <blockquote id="q">"Nggak nyangka mini cake bisa seenak ini. Meski ukurannya kecil, rasanya tetap sama lembut, manisnya pas, dan benar-benar bikin nagih"</blockquote>
 <button class="arr r" onclick="slide(1)" aria-label="Berikutnya">›</button>
</section>

<section class="tentang" id="tentang">
 <div class="wrap">
  <div class="row">
   <div>
    <div class="eyebrow">Sejak 2010</div>
    <h2>Tentang Kami</h2>
    <p>Trans Family Bakery berdiri sejak 2010 di Langkat dengan visi menyajikan roti dan kue halal berkualitas. Dari kue jadul hingga kreasi modern, semua dibuat fresh tanpa pengawet. Kini hadir dengan 7 outlet di Langkat, Binjai, dan Kuala Simpang sebagai oleh-oleh khas yang dipercaya pelanggan.</p>
    <a class="btn" href="#tentang">Pelajari Selanjutnya</a>
   </div>
   <img class="foto" src="" style="height:280px" alt="Foto roti">
  </div>
  <div class="visimisi">
   <div><h4>VISI</h4><p style="font-size:14px;color:var(--muted)">Menyajikan roti dan kue berkualitas terbaik yang halal, fresh, dan terpercaya, serta menjadi pilihan utama oleh-oleh khas Langkat.</p></div>
   <div><h4>MISI</h4><ol>
    <li>Menghadirkan produk bakery dari bahan premium, tanpa pengawet dan pemanis buatan.</li>
    <li>Menjaga kehalalan, mutu, dan keamanan pangan dengan standar sertifikasi resmi.</li>
    <li>Memberikan pelayanan yang ramah, cepat, dan penuh ketulusan kepada setiap pelanggan.</li>
    <li>Terus berinovasi menghadirkan variasi produk, dari kue tradisional hingga modern.</li>
    <li>Menjadi bagian dari setiap momen berharga pelanggan, dari sajian sehari-hari hingga perayaan istimewa.</li>
    <li>Berkontribusi dalam menciptakan lapangan kerja, khususnya bagi masyarakat di Kabupaten Langkat.</li>
   </ol></div>
  </div>
  <div class="nilai">
   <div><h4>Bahan Premium &amp; Halal</h4><p>Setiap roti dan kue dibuat dari bahan pilihan berkualitas, halal, tanpa pengawet, dan selalu fresh setiap hari.</p></div>
   <div><h4>Resep Asli &amp; Inovatif</h4><p>Menggabungkan resep klasik penuh nostalgia dengan sentuhan modern, menghadirkan rasa yang tak pernah lekang oleh waktu.</p></div>
   <div><h4>Dibuat dengan Sepenuh Hati</h4><p>Semua produk kami diolah dengan teliti dan penuh ketulusan, demi menjaga rasa, kualitas, dan kepuasan pelanggan.</p></div>
  </div>
 </div>
 <div class="strip"><img class="foto" src="" alt="Foto roti"><img class="foto" src="" alt="Foto roll cake"></div>
</section>

<section class="katalog" id="katalog">
 <div class="wrap">
  <div class="eyebrow">Produk Kami</div>
  <h2>Nikmati Produk Kami</h2>
  <div class="kat-row">
   <aside class="filter">
    <h5>Filter</h5>
    <div class="sel">Semua</div>
    <input type="search" placeholder="Cari kue berdasarkan nama...">
    <div>Baca Artikel</div>
    <a class="btn" href="#layanan">Pesan Kue Online</a>
   </aside>
   <div class="grid3">
    <div class="pcard"><img class="foto" src="" alt="Produk"><h4>Nama Produk</h4></div>
    <div class="pcard"><img class="foto" src="" alt="Produk"><h4>Nama Produk</h4></div>
    <div class="pcard"><img class="foto" src="" alt="Produk"><h4>Nama Produk</h4></div>
   </div>
  </div>
 </div>
</section>

<section id="layanan">
 <div class="pesat-hero">
  <div class="wrap row">
   <div>
    <div class="eyebrow">Si PESAT Trans Family Bakery</div>
    <h2>Pesan Kue Cepat di Stabat</h2>
    <p style="margin-bottom:20px">Butuh kue hari ini? Pesan sekarang, siap dibuat dan langsung diantar ke lokasi Anda tanpa ribet.</p>
    <a class="btn" href="#wa">Pesan Sekarang via WhatsApp</a>
   </div>
   <img class="foto" src="" alt="Ilustrasi kurir">
  </div>
 </div>
 <div class="sect center">
  <div class="wrap">
   <h2>Apa Itu Si PESAT?</h2><hr>
   <p>Si PESAT adalah layanan pemesanan cepat dari Trans Family Bakery untuk Anda yang membutuhkan kue, roti, atau hampers tanpa harus datang langsung ke toko.</p>
   <p>Dengan layanan ini, Anda cukup melakukan pemesanan melalui WhatsApp, dan tim kami akan menyiapkan serta mengantarkan pesanan langsung ke alamat Anda.</p>
  </div>
 </div>
 <div class="sect center tint">
  <div class="wrap">
   <p>Kami memahami bahwa tidak semua orang punya waktu untuk datang langsung ke toko. Terkadang, kebutuhan datang tiba-tiba.</p>
   <div class="pills">
    <div>😱 Lupa beli kue ulang tahun</div>
    <div>⏰ Butuh kue untuk acara hari ini</div>
    <div>🎁 Ingin kirim hampers ke keluarga atau rekan</div>
    <div>🏠 Tidak sempat keluar rumah</div>
   </div>
   <p style="color:var(--brown-d);font-weight:700">Dengan Si PESAT, semua bisa diselesaikan dengan cepat dan praktis.</p>
  </div>
 </div>
 <div class="sect center" style="background:var(--cream)">
  <div class="wrap">
   <h2>Cara Pesan dengan Si PESAT</h2><hr>
   <ol class="steps">
    <li><span>1</span>Hubungi kami melalui WhatsApp</li>
    <li><span>2</span>Pilih kue atau roti yang diinginkan</li>
    <li><span>3</span>Pesanan disiapkan dan diantar</li>
   </ol>
  </div>
 </div>
 <div class="sect" id="wa">
  <div class="wrap">
   <div class="cta">
    <p>👇 Klik di bawah untuk langsung terhubung dengan admin kami.</p>
    <a class="wa" href="https://wa.me/" target="_blank" rel="noopener">👉 Pesan via WhatsApp Sekarang</a>
   </div>
  </div>
 </div>
</section>

<section class="toko" id="toko">
 <div class="wrap">
  <div class="eyebrow">Toko Kami</div>
  <h2>Kunjungi Outlet Trans Family Bakery Terdekat</h2>
  <p>Temukan outlet Trans Family Bakery di Langkat, Binjai, dan Kuala Simpang. Setiap toko siap menyambut Anda dengan roti fresh, kue lezat, dan oleh-oleh khas Langkat yang selalu istimewa.</p>
  <div class="outlets">
   <div><img src="" alt=""><h4>Outlite Pusat – Stabat</h4></div>
   <div><img src="" alt=""><h4>Outlite Cabang – Binjai</h4></div>
   <div><img src="" alt=""><h4>Outlite Cabang – Stabor</h4></div>
   <div><img src="" alt=""><h4>Outlite Cabang – Pangkalan Berandan</h4></div>
   <div><img src="" alt=""><h4>Outlite Pusat – Kuala Simpang</h4></div>
   <div><img src="" alt=""><h4>Outlite Pusat – Stabat</h4></div>
  </div>
 </div>
</section>

<section class="artikel wrap" id="artikel">
 <h2>Artikel</h2>
 <div class="grid3">
  <article class="pcard acard"><img class="foto" src="" alt="Gambar artikel"><div class="b"><h4>Judul Artikel</h4><p>Ada rasa perhatian yang ikut dibawa ketika kita memilih sesuatu yang bisa dinikmati bersama keluarga, teman, atau orang-orang terdekat. Itulah sebabnya banyak orang meluangkan waktu...</p></div></article>
 </div>
 <a class="older" href="#artikel">« Older Entries</a>
</section>

<footer id="kontak">
 <div class="wrap">
  <div><h6>Buka Setiap hari:</h6>Senin – Minggu: 07.30 – 22.30 WIB</div>
  <div><h6>Kunjungi Kami</h6>Jl. KH. Zainul Arifin No.9, Kwala Bingai, Kec. Stabat, Kabupaten Langkat, Sumatera Utara 20811, Indonesia</div>
  <div class="soc"><h6>Ikuti Kami</h6><span>◎</span><span>f</span><span>♪</span></div>
  <a class="btn" href="#layanan">Beli Online →</a>
 </div>
 <div class="copy">© 2026 TransFamily Bakery. All rights reserved.</div>
</footer>

<script>
const quotes=[
 '"Nggak nyangka mini cake bisa seenak ini. Meski ukurannya kecil, rasanya tetap sama lembut, manisnya pas, dan benar-benar bikin nagih"',
 '"Rotinya selalu fresh dan empuk. Cocok banget buat oleh-oleh keluarga setiap pulang kampung"',
 '"Pesan lewat Si PESAT cepat sekali, kue ulang tahunnya sampai tepat waktu dan rasanya enak"'];
let i=0;
function slide(d){i=(i+d+quotes.length)%quotes.length;document.getElementById('q').textContent=quotes[i]}
</script>
</body>
</html>
