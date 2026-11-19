<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Promo extends Model
{
    protected $guarded = [];

    protected $casts = [
        'is_active'   => 'boolean',
        'show_in_bar' => 'boolean',
        'starts_at'   => 'datetime',
        'ends_at'     => 'datetime',
    ];

    /** Promo yang sedang tampil di website: saklar aktif + dalam rentang tanggal. */
    public function scopeRunning(Builder $q): Builder
    {
        return $q->where('is_active', true)
            ->where(fn ($w) => $w->whereNull('starts_at')->orWhere('starts_at', '<=', now()))
            ->where(fn ($w) => $w->whereNull('ends_at')->orWhere('ends_at', '>=', now()))
            ->orderBy('sort_order')
            ->orderByDesc('id');
    }

    public function getStatusAttribute(): string
    {
        if (! $this->is_active) {
            return 'nonaktif';
        }
        if ($this->starts_at && $this->starts_at->isFuture()) {
            return 'terjadwal';
        }
        if ($this->ends_at && $this->ends_at->isPast()) {
            return 'berakhir';
        }
        return 'tayang';
    }

    public function getImageUrlAttribute(): ?string
    {
        return $this->image ? Storage::disk('public')->url($this->image) : null;
    }

    /** Link tombol: URL buatan admin, atau WhatsApp dengan pesan otomatis. */
    public function getCtaLinkAttribute(): string
    {
        if ($this->cta_url) {
            return $this->cta_url;
        }
        $text = "Halo kak, saya mau pesan promo: {$this->title}";
        return 'https://wa.me/' . config('promo.whatsapp') . '?text=' . rawurlencode($text);
    }
}
