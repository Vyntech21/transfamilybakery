@extends('layouts.site')
@section('title', 'Artikel')
@section('description', 'Artikel dan cerita seputar roti, kue, dan oleh-oleh khas Langkat dari Trans Family Bakery.')

@section('content')
<section class="sec wrap" x-data="articlesPage(@js($articles), @js($cats))">
 <h1 class="h2 tc">Artikel</h1>

 <div class="chips">
  <button type="button" class="chip" :class="{ on: cat === 'Semua' }" @click="pick('Semua')">Semua</button>
  <template x-for="c in cats" :key="c"><button type="button" class="chip" :class="{ on: cat === c }" @click="pick(c)" x-text="c"></button></template>
 </div>

 {{-- Artikel utama --}}
 <template x-if="featured">
  <a class="featured" :href="url(featured)">
   <div class="ph"><template x-if="featured.img"><img :src="featured.img" alt="" loading="lazy"></template><span>Gambar artikel</span></div>
   <div class="fbody">
    <small><b x-text="featured.category"></b> · <span x-text="featured.date"></span> · <span x-text="featured.read"></span></small>
    <h3 x-text="featured.title"></h3>
    <p x-text="featured.excerpt"></p>
    <span class="more">Baca →</span>
   </div>
  </a>
 </template>

 <div class="grid3 cards-eq">
  <template x-for="a in visible" :key="a.slug">
   <a class="card acard" :href="url(a)">
    <div class="ph"><template x-if="a.img"><img :src="a.img" alt="" loading="lazy"></template><span>Gambar artikel</span></div>
    <div class="abody">
     <small><b x-text="a.category"></b> · <span x-text="a.date"></span> · <span x-text="a.read"></span></small>
     <h4 class="clamp2" x-text="a.title"></h4>
     <p class="clamp4" x-text="a.excerpt"></p>
     <span class="more">Baca →</span>
    </div>
   </a>
  </template>
 </div>

 <div class="tc" x-show="hasMore"><button type="button" class="btn ghost" @click="more()">Muat lebih banyak</button></div>
</section>
@endsection
