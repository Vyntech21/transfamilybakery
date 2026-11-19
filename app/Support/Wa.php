<?php

namespace App\Support;

class Wa
{
    /** Tautan wa.me dengan pesan otomatis (di-urlencode). */
    public static function link(string $text = ''): string
    {
        $url = 'https://wa.me/' . SiteData::wa();

        return $text === '' ? $url : $url . '?text=' . rawurlencode($text);
    }

    public static function product(string $name): string
    {
        return self::link("Halo kak, saya mau pesan {$name}.");
    }
}
