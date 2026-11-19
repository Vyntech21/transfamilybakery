(function () {
  var calm = window.matchMedia && matchMedia('(prefers-reduced-motion: reduce)').matches;

  // ---- Slider (Swiper): setiap elemen [data-swiper] ----
  document.querySelectorAll('[data-swiper]').forEach(function (el) {
    var o = JSON.parse(el.dataset.swiper);
    var delay = o.autoplay;
    o.autoplay = (delay && !calm) ? { delay: delay, disableOnInteraction: false, pauseOnMouseEnter: true } : false;
    o.navigation = { nextEl: el.querySelector('.swiper-button-next'), prevEl: el.querySelector('.swiper-button-prev') };
    o.pagination = { el: el.querySelector('.swiper-pagination'), clickable: true };
    new Swiper(el, o);
  });


  // ---- Hero otomatis: foto meluncur dari balik tepi layar, lalu berganti foto ----
  if (!calm) {
    document.querySelectorAll('[data-hero-pool]').forEach(function (side, si) {
      var pool = [];
      try { pool = JSON.parse(side.dataset.heroPool); } catch (e) {}
      var slots = side.querySelectorAll('.slot'), next = slots.length;
      slots.forEach(function (slot, i) {
        var img = slot.querySelector('img');
        // masuk pertama kali dari balik layar (bertahap)
        slot.classList.add('away', 'instant'); void slot.offsetWidth; slot.classList.remove('instant');
        setTimeout(function () { slot.classList.remove('away'); }, 500 + i * 700 + si * 350);
        if (pool.length <= slots.length || !img) return;
        var cycle = function () {
          slot.classList.add('away');                       // meluncur ke balik layar
          setTimeout(function () {
            next = (next + 1) % pool.length;
            var fresh = new Image();
            fresh.onload = function () { img.src = pool[next]; slot.classList.remove('away'); };  // kembali dengan foto baru
            fresh.onerror = function () { slot.classList.remove('away'); };
            fresh.src = pool[next];
          }, 1700);
        };
        setTimeout(function () { setInterval(cycle, 9000 + i * 1800 + si * 1000); }, 3500 + i * 2200 + si * 1200);
      });
    });
  }


  // ---- Latar hero: foto kue berganti otomatis (pudar silang) ----
  var bgs = document.querySelectorAll('.hero-bg .bg');
  if (bgs.length > 1 && !calm) {
    var startBg = function () {
      bgs.forEach(function (b) {
        if (b.dataset.bg) { var im = new Image(); im.src = b.dataset.bg; b.style.backgroundImage = "url('" + b.dataset.bg + "')"; }
      });
      var k = 0;
      setInterval(function () {
        bgs[k].classList.remove('on');
        k = (k + 1) % bgs.length;
        bgs[k].classList.add('on');
      }, 6000);
    };
    if (document.readyState === 'complete') startBg(); else window.addEventListener('load', startBg);
  }

  // ---- Foto besar (GLightbox) ----
  if (window.GLightbox) GLightbox({ selector: '.glightbox', loop: false, touchNavigation: true });

  // ---- Kartu miring 3D ----
  if (window.VanillaTilt && !calm) {
    VanillaTilt.init(document.querySelectorAll('[data-tilt]'), { max: 6, speed: 500, glare: true, 'max-glare': 0.15, perspective: 900 });
  }

  // ---- Parallax latar kutipan (kursor / sentuhan) ----
  var q3d = document.getElementById('q3d');
  if (q3d && !calm) {
    var move = function (e) {
      var r = q3d.getBoundingClientRect();
      var x = ((e.clientX - r.left) / r.width - 0.5) * 2, y = ((e.clientY - r.top) / r.height - 0.5) * 2;
      q3d.style.setProperty('--mx', x.toFixed(3)); q3d.style.setProperty('--my', y.toFixed(3));
    };
    q3d.addEventListener('pointermove', move);
    q3d.addEventListener('pointerleave', function () { q3d.style.setProperty('--mx', 0); q3d.style.setProperty('--my', 0); });
  }

  // ---- Komponen Alpine ----
  document.addEventListener('alpine:init', function () {
    Alpine.data('catalog', function (items, cats, wa) {
      return {
        items: items, cats: cats, q: '', cat: 'Semua', focus: false,
        match: function (i, t) {
          var n = i.name.toLowerCase();
          return n.startsWith(t) || n.split(' ').some(function (w) { return w.startsWith(t); }) || (i.keywords || '').toLowerCase().indexOf(t) > -1;
        },
        get term() { return this.q.trim().toLowerCase(); },
        get quick() { return this.items.filter(function (i) { return i.badge; }).slice(0, 4); },
        get suggestions() {
          var t = this.term, self = this;
          var list = t ? this.items.filter(function (i) { return self.match(i, t); }) : this.items.filter(function (i) { return i.badge; });
          return list.slice(0, 6);
        },
        get recL() { return this.suggestions.filter(function (_, n) { return n % 2 === 0; }); },
        get recR() { return this.suggestions.filter(function (_, n) { return n % 2 === 1; }); },
        get filtered() {
          var t = this.term, c = this.cat;
          return this.items.filter(function (i) {
            return (c === 'Semua' || i.category === c) && (!t || i.name.toLowerCase().indexOf(t) > -1 || (i.keywords || '').toLowerCase().indexOf(t) > -1);
          });
        },
        wa: function (i) { return 'https://wa.me/' + wa + '?text=' + encodeURIComponent('Halo kak, saya mau pesan ' + i.name + '.'); },
        rupiah: function (n) { return n ? 'Rp ' + Number(n).toLocaleString('id-ID') : 'Hubungi kami'; }
      };
    });

    Alpine.data('outletsPage', function (outlets) {
      return {
        outlets: outlets, q: '', city: 'Semua',
        get cities() { return Array.from(new Set(this.outlets.map(function (o) { return o.city; }))); },
        get filtered() {
          var t = this.q.trim().toLowerCase(), c = this.city;
          return this.outlets.filter(function (o) {
            return (c === 'Semua' || o.city === c) && (!t || (o.name + ' ' + o.city + ' ' + (o.address || '')).toLowerCase().indexOf(t) > -1);
          });
        }
      };
    });

    Alpine.data('articlesPage', function (articles, cats) {
      return {
        articles: articles, cats: cats, cat: 'Semua', shown: 6,
        pick: function (c) { this.cat = c; this.shown = 6; },
        get pool() { var c = this.cat; return this.articles.filter(function (a) { return c === 'Semua' || a.category === c; }); },
        get featured() { return this.cat === 'Semua' ? this.pool[0] : null; },
        get rest() { return this.cat === 'Semua' ? this.pool.slice(1) : this.pool; },
        get visible() { return this.rest.slice(0, this.shown); },
        get hasMore() { return this.rest.length > this.shown; },
        more: function () { this.shown += 6; },
        url: function (a) { return '/artikel/' + a.slug; }
      };
    });
  });
})();
