@extends('layouts.site')
@section('title', 'Katalog Produk')
@section('description', 'Katalog roti, kue, cheesecake, pastry, dan hampers Trans Family Bakery. Pesan langsung via WhatsApp.')

@section('content')
<section class="sec wrap tc" x-data="catalog(@js($items), @js($cats), @js($wa))" @click.outside="focus = false">
 <div class="eyebrow">Produk Kami</div>
 <h1 class="h2">Nikmati Produk Kami</h1>

 {{-- Filter di tengah: cari + kategori --}}
 <div class="searchzone" @focusin="focus = true">
  <div class="rec rec-side l" x-show="focus && recL.length" x-transition>
   <template x-for="i in recL" :key="i.slug">
    <a class="rec-card" :href="wa(i)" target="_blank" rel="noopener">
     <img x-show="i.img" :src="i.img" alt="" loading="lazy"><span class="thumb" x-show="!i.img"></span>
     <b x-text="i.name"></b><em x-show="i.badge" x-text="i.badge"></em>
    </a>
   </template>
  </div>

  <div class="searchbox">
   <input type="search" x-model="q" placeholder="Cari kue, mis. Ro..." autocomplete="off" aria-label="Cari kue">
   <div class="quick"><span>Pilihan cepat:</span>
    <template x-for="i in quick" :key="i.slug"><button type="button" class="chip" @click="q = i.name" x-text="i.name"></button></template>
   </div>
   <ul class="suggest" x-show="focus && suggestions.length" x-transition>
    <template x-for="i in suggestions" :key="i.slug">
     <li><a :href="wa(i)" target="_blank" rel="noopener">
      <img x-show="i.img" :src="i.img" alt="" loading="lazy"><span class="thumb" x-show="!i.img"></span>
      <b x-text="i.name"></b><em x-show="i.badge" x-text="i.badge"></em><i>✆</i>
     </a></li>
    </template>
   </ul>
  </div>

  <div class="rec rec-side r" x-show="focus && recR.length" x-transition>
   <template x-for="i in recR" :key="i.slug">
    <a class="rec-card" :href="wa(i)" target="_blank" rel="noopener">
     <img x-show="i.img" :src="i.img" alt="" loading="lazy"><span class="thumb" x-show="!i.img"></span>
     <b x-text="i.name"></b><em x-show="i.badge" x-text="i.badge"></em>
    </a>
   </template>
  </div>
 </div>

 {{-- Di HP: rekomendasi jadi baris kartu di bawah kolom cari --}}
 <div class="rec-row" x-show="focus && suggestions.length">
  <template x-for="i in suggestions" :key="'m'+i.slug"><a class="rec-card" :href="wa(i)" target="_blank" rel="noopener"><b x-text="i.name"></b><em x-show="i.badge" x-text="i.badge"></em></a></template>
 </div>

 <div class="chips">
  <button type="button" class="chip" :class="{ on: cat === 'Semua' }" @click="cat = 'Semua'">Semua</button>
  <template x-for="c in cats" :key="c"><button type="button" class="chip" :class="{ on: cat === c }" @click="cat = c" x-text="c"></button></template>
 </div>

 <div class="grid4 cards-eq">
  <template x-for="i in filtered" :key="i.slug">
   <article class="card pcard">
    <div class="ph pimg"><template x-if="i.img"><img :src="i.img" alt="" loading="lazy"></template><span x-text="i.name"></span><em class="badge" x-show="i.badge" x-text="i.badge"></em></div>
    <h4 x-text="i.name"></h4>
    <p class="price" x-text="rupiah(i.price)"></p>
    <a class="btn block" :href="wa(i)" target="_blank" rel="noopener">✆ Pesan via WhatsApp</a>
   </article>
  </template>
 </div>
 <p class="muted" x-show="!filtered.length">Kue tidak ditemukan. Coba kata lain atau pilih "Semua".</p>
</section>
@endsection
