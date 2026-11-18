@extends('layouts.app')
@section('title','Tentang Kami')
@section('content')
<style>
.bean{position:absolute;width:12px;height:18px;border:2px solid #9b8a7e;border-radius:50%;opacity:.5;transform:rotate(30deg)}
.t-hero{position:relative;overflow:hidden;min-height:560px;display:grid;grid-template-columns:1fr 1fr;align-items:center}
.t-hero .txt{position:relative;z-index:2;padding:80px 40px 80px max(24px,calc((100vw - 1080px)/2 + 24px))}
.t-hero small{font:700 11px 'Bitter',serif;color:var(--brown);letter-spacing:.12em}
.t-hero h1{font-size:clamp(36px,5vw,56px);font-weight:800;margin:10px 0 18px}
.t-hero p{font-size:14px;color:var(--muted);max-width:430px;margin-bottom:24px}
.t-hero .besar{align-self:stretch;min-height:560px;clip-path:polygon(0 28%,100% 0,100% 100%,0 100%)}
.t-hero .kecil{position:absolute;left:0;top:0;width:130px;height:150px;clip-path:polygon(0 0,100% 0,0 100%)}
.t-hero .segi{position:absolute;left:155px;top:0;width:100px;height:150px;background:#f4f0ec;clip-path:polygon(0 0,100% 0,0 100%)}
.t-hero .segi2{position:absolute;right:0;bottom:0;width:240px;height:200px;background:#f1eeea;clip-path:polygon(100% 0,100% 100%,0 100%);z-index:1}
.cerita{display:grid;grid-template-columns:26% 1fr;position:relative;margin-top:30px}
.cerita .kol{position:relative}
.cerita .foto{position:sticky;top:76px;height:calc(100vh - 76px);clip-path:polygon(0 0,100% 0,100% 55%,0 100%);overflow:hidden}
.cerita .isi{padding:70px 24px 70px 70px;max-width:760px;position:relative}
.cerita small{font:700 11px 'Bitter',serif;color:var(--brown);letter-spacing:.12em}
.cerita h2{font-size:34px;font-weight:800;margin:8px 0 22px}
.cerita p{font-size:13.5px;color:var(--muted);margin-bottom:16px;line-height:1.85}
.cerita p b{color:var(--ink)}
.vm{display:grid;grid-template-columns:1fr 1.3fr;gap:30px;margin-top:40px}
.vm h3{font-size:14px;margin-bottom:8px}
.vm p,.vm li{font-size:13px;color:var(--muted)}
.vm ol{padding-left:18px}.vm li{margin-bottom:6px}
.emas{max-width:1000px;margin:20px auto 0;padding:0 24px}
.emas .ph{border-radius:22px;aspect-ratio:21/8}
.nilai{display:grid;grid-template-columns:repeat(3,1fr);gap:40px;max-width:1080px;margin:50px auto;padding:0 24px}
.nilai h3{font-size:15px;margin-bottom:6px}.nilai p{font-size:13.5px;color:var(--muted)}
.strip{display:grid;grid-template-columns:1fr 1fr;height:260px;margin-bottom:0}
.strip .a{clip-path:polygon(0 0,100% 0,82% 100%,0 100%)}
.strip .b{clip-path:polygon(18% 0,100% 0,100% 100%,0 100%);margin-left:-8%}
.strip .ph img{height:100%}
@media(max-width:820px){
 .t-hero,.cerita,.vm,.nilai,.strip{grid-template-columns:1fr}
 .t-hero .txt{padding:60px 24px 20px}.t-hero .besar{min-height:300px}
 .cerita .foto{position:relative;top:0;height:260px;clip-path:none}
 .cerita .isi{padding:40px 24px}
 .strip{height:auto}.strip .a,.strip .b{clip-path:none;margin:0;height:180px}
}
</style>

<section class="t-hero">
 <div class="ph kecil"><img src="{{ asset('images/tentang-kecil.jpg') }}" alt="" onerror="this.remove()"></div>
 <div class="segi"></div>
 <i class="bean" style="left:46%;top:8%"></i><i class="bean" style="left:50%;top:14%"></i><i class="bean" style="left:43%;top:18%"></i><i class="bean" style="left:53%;top:6%"></i>
 <div class="txt">
  <small>SEJAK 2010</small>
  <svg width="34" height="12" viewBox="0 0 34 12" fill="none" stroke="#b9a090" stroke-width="1.4" style="display:block;margin-top:8px"><path d="M1 8c8-6 18-7 32-2M8 9c5-3 10-4 16-4"/></svg>
  <h1>Tentang Kami</h1>
  <p>Trans Family Bakery berdiri sejak 2010 di Langkat dengan visi menyajikan roti dan kue halal berkualitas. Dari kue jadul hingga kreasi modern, semua dibuat fresh tanpa pengawet. Kini hadir dengan 7 outlet di Langkat, Binjai, dan Kuala Simpang sebagai oleh-oleh khas yang dipercaya pelanggan.</p>
  <a class="btn" href="#cerita">PELAJARI SELANJUTNYA &rarr;</a>
 </div>
 <div class="ph besar"><img src="{{ asset('images/tentang.jpg') }}" alt="" onerror="this.remove()"></div>
 <div class="segi2"></div>
</section>

<section class="cerita" id="cerita">
 <div class="kol"><div class="ph foto"><img src="{{ asset('images/tentang-cerita.jpg') }}" alt="" onerror="this.remove()"></div></div>
 <div class="isi">
  <i class="bean" style="left:20px;top:140px"></i><i class="bean" style="left:46px;top:170px"></i>
  <small>PERJALANAN 15 TAHUN</small>
  <h2>Cerita Trans Family Bakery</h2>
  <p>Trans Family Bakery lahir pada 8 September 2010 di Kota Stabat, Kabupaten Langkat, dari tekad sederhana seorang warga asli Langkat yang ingin menghadirkan roti dan kue terbaik untuk masyarakat. Dari dapur kecil hingga kini memiliki 7 outlet di Langkat, Binjai, dan Kuala Simpang, kami tumbuh dengan satu visi yang sama: <b>menyajikan kualitas dan pelayanan terbaik untuk semua pelanggan</b>.</p>
  <p>Sejak awal berdiri, kami percaya bahwa makanan bukan hanya soal rasa, tetapi juga soal kepercayaan. Karena itu, setiap produk Trans Family Bakery dibuat dari bahan baku premium, tanpa bahan pengawet ataupun pemanis buatan, serta sudah bersertifikat halal, izin Dinkes, dan BPOM. Semua itu adalah wujud komitmen kami agar setiap potongan roti dan kue yang sampai ke tangan Anda selalu aman, halal, dan penuh kebaikan.</p>
  <p>Lebih dari sekadar toko roti, Trans Family Bakery ingin menjadi bagian dari setiap momen istimewa Anda: dari sarapan sederhana di rumah, bingkisan oleh-oleh khas Langkat, hingga perayaan ulang tahun yang penuh cerita. Selama lebih dari satu dekade, kami terus berinovasi, menjaga kualitas, dan menghadirkan layanan yang ramah, karena bagi kami kepuasan pelanggan adalah prioritas utama.</p>
  <div class="vm">
   <div><h3>VISI</h3><p>Menyajikan roti dan kue berkualitas terbaik yang halal, fresh, dan terpercaya, serta menjadi pilihan utama oleh-oleh khas Langkat.</p></div>
   <div><h3>MISI</h3><ol>
    <li>Menghadirkan produk bakery dari bahan premium, tanpa pengawet dan pemanis buatan.</li>
    <li>Menjaga kehalalan, mutu, dan keamanan pangan dengan standar sertifikasi resmi.</li>
    <li>Memberikan pelayanan yang ramah, cepat, dan penuh ketulusan kepada setiap pelanggan.</li>
    <li>Terus berinovasi menghadirkan variasi produk, dari kue tradisional hingga modern.</li>
    <li>Menjadi bagian dari setiap momen berharga pelanggan, dari sajian sehari-hari hingga perayaan istimewa.</li>
    <li>Berkontribusi dalam menciptakan lapangan kerja, khususnya bagi masyarakat di Kabupaten Langkat.</li>
   </ol></div>
  </div>
 </div>
</section>

<div class="emas"><div class="ph"><img src="{{ asset('images/hujan-emas.jpg') }}" alt="" onerror="this.remove()"></div></div>

<section class="nilai">
 <div><h3>Halal &amp; Fresh</h3><p>Dibuat dari bahan pilihan dan dipanggang fresh setiap hari.</p></div>
 <div><h3>Resep Autentik</h3><p>Cita rasa khas Langkat dengan rasa yang tak pernah lekang oleh waktu.</p></div>
 <div><h3>Pelayanan Ramah</h3><p>Kami menjaga kualitas, dan kepuasan pelanggan.</p></div>
</section>

<section class="strip">
 <div class="ph a"><img src="{{ asset('images/strip-1.jpg') }}" alt="" onerror="this.remove()"></div>
 <div class="ph b"><img src="{{ asset('images/strip-2.jpg') }}" alt="" onerror="this.remove()"></div>
</section>
@endsection
