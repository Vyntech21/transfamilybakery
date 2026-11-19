<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    protected $guarded = [];

    protected $casts = [
        'price'          => 'integer',
        'is_featured'    => 'boolean',
        'is_best_seller' => 'boolean',
        'is_active'      => 'boolean',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function scopeActive(Builder $q): Builder
    {
        return $q->where('is_active', true);
    }

    public function scopeBestSellers(Builder $q): Builder
    {
        return $q->active()->where('is_best_seller', true)->orderBy('best_seller_rank')->orderBy('name');
    }

    /** Pencarian nama / sinonim, mis. Product::active()->search('ro')->get() */
    public function scopeSearch(Builder $q, string $term): Builder
    {
        return $q->where(function ($w) use ($term) {
            $w->where('name', 'like', "{$term}%")
              ->orWhere('name', 'like', "% {$term}%")
              ->orWhere('search_keywords', 'like', "%{$term}%");
        });
    }
}
