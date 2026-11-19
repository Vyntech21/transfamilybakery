@extends('layouts.site')
@section('title', 'Outlet Kami')
@section('description', 'Daftar outlet Trans Family Bakery di Stabat, Binjai, Stabor, Pangkalan Berandan, dan Kuala Simpang.')

@section('content')
<div x-data="outletsPage(@js($outlets))">
 <section class="toko-hero">
  <span class="orb o1"></span><span class="orb o2"></span><span class="orb o3"></span><span class="wheat"></span>
  <div class="wrap tc">
   <div class="eyebrow light">Toko Kami</div>
   <h1>Kunjungi Outlet Trans Family Bakery Terdekat</h1>
   <p class="lead light">Temukan outlet Trans Family Bakery di Langkat, Binjai, dan Kuala Simpang. Setiap toko siap menyambut Anda dengan roti fresh, kue lezat, dan oleh-oleh khas Langkat yang selalu istimewa.</p>
   <div class="searchbox slim"><input type="search" x-model="q" placeholder="Cari outlet..." aria-label="Cari outlet"></div>
   <div class="chips">
    <button type="button" class="chip light" :class="{ on: city === 'Semua' }" @click="city = 'Semua'">Semua</button>
    <template x-for="c in cities" :key="c"><button type="button" class="chip light" :class="{ on: city === c }" @click="city = c" x-text="c"></button></template>
   </div>
  </div>
 </section>

 <section class="sec wrap">
  <div class="grid3 cards-eq">
   <template x-for="o in filtered" :key="o.name">
    <article class="card ocard">
     <div class="ph shot-wide"><template x-if="o.img"><img :src="o.img" alt="" loading="lazy"></template><span x-text="o.name"></span></div>
     <h4 x-text="o.name"></h4>
     <p x-text="o.address || 'Alamat lengkap segera diperbarui. Hubungi kami via WhatsApp.'"></p>
     <p class="muted">Jam buka: <span x-text="o.hours"></span></p>
     <div class="btns"><a class="btn" :href="o.route" target="_blank" rel="noopener">Rute →</a><a class="btn ghost" :href="o.wa" target="_blank" rel="noopener">✆ WhatsApp</a></div>
    </article>
   </template>
  </div>
  <p class="muted tc" x-show="!filtered.length">Outlet tidak ditemukan.</p>
 </section>
</div>
@endsection
