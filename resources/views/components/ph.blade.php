@props(['src' => null, 'alt' => '', 'label' => ''])
@php($ok = $src && file_exists(public_path($src)))
<div {{ $attributes->class(['ph']) }}>
 @if ($ok)<img src="{{ asset($src) }}" alt="{{ $alt }}" loading="lazy" decoding="async">@endif
 <span>{{ $label }}</span>
</div>
