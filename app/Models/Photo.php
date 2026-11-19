<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $guarded = [];

    protected $casts = ['is_active' => 'boolean'];

    public function scopePlacement(Builder $q, string $placement): Builder
    {
        return $q->where('placement', $placement)->where('is_active', true)->orderBy('sort_order');
    }
}
