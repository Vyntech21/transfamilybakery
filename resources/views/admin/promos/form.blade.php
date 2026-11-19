@if ($errors->any())
  <div class="err"><b>Periksa lagi isian Anda:</b>
    <ul style="margin:6px 0 0 18px">@foreach ($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul>
  </div>
@endif

<label for="title">Judul promo *</label>
<input id="title" type="text" name="title" value="{{ old('title', $promo->title) }}" maxlength="120" required>

<div class="row2">
  <div>
    <label for="discount_label">Label diskon</label>
    <input id="discount_label" type="text" name="discount_label" value="{{ old('discount_label', $promo->discount_label) }}" maxlength="40" placeholder="Diskon 20%">
  </div>
  <div>
    <label for="badge">Badge</label>
    <input id="badge" type="text" name="badge" value="{{ old('badge', $promo->badge) }}" maxlength="30" placeholder="Promo Spesial">
  </div>
</div>

<label for="description">Deskripsi singkat</label>
<textarea id="description" name="description" rows="3" maxlength="500">{{ old('description', $promo->description) }}</textarea>

<label for="image">Gambar (jpg/png/webp, maks 2 MB)</label>
<input id="image" type="file" name="image" accept="image/png,image/jpeg,image/webp">
@if ($promo->image_url)
  <p class="hint">Gambar sekarang:</p>
  <img src="{{ $promo->image_url }}" alt="" style="max-width:180px;border-radius:6px;margin-top:4px">
  <label class="check"><input type="checkbox" name="remove_image" value="1"> Hapus gambar</label>
@endif

<div class="row2">
  <div>
    <label for="starts_at">Mulai</label>
    <input id="starts_at" type="datetime-local" name="starts_at" value="{{ old('starts_at', optional($promo->starts_at)->format('Y-m-d\TH:i')) }}">
    <div class="hint">Kosong = langsung berlaku.</div>
  </div>
  <div>
    <label for="ends_at">Berakhir</label>
    <input id="ends_at" type="datetime-local" name="ends_at" value="{{ old('ends_at', optional($promo->ends_at)->format('Y-m-d\TH:i')) }}">
    <div class="hint">Kosong = tanpa batas. Otomatis hilang setelah lewat.</div>
  </div>
</div>

<label for="cta_url">Link tombol (opsional)</label>
<input id="cta_url" type="url" name="cta_url" value="{{ old('cta_url', $promo->cta_url) }}" placeholder="https://...">
<div class="hint">Kosong = tombol membuka WhatsApp dengan pesan otomatis.</div>

<label for="sort_order">Urutan</label>
<input id="sort_order" type="number" name="sort_order" min="0" value="{{ old('sort_order', $promo->sort_order ?? 0) }}">
<div class="hint">Angka kecil tampil lebih dulu.</div>

<input type="hidden" name="is_active" value="0">
<label class="check"><input type="checkbox" name="is_active" value="1" @checked(old('is_active', $promo->is_active))> <b>Aktif</b> (tayang di website)</label>
<input type="hidden" name="show_in_bar" value="0">
<label class="check"><input type="checkbox" name="show_in_bar" value="1" @checked(old('show_in_bar', $promo->show_in_bar))> Tampilkan juga di bar atas website</label>
