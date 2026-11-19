@extends('layouts.site')
@section('title', $a['title'])

@section('content')
<article class="sec wrap narrow">
 <a class="more" href="{{ route('artikel') }}">← Semua artikel</a>
 <small class="muted"><b>{{ $a['category'] }}</b> · {{ $a['date'] }} @if($a['read']) · {{ $a['read'] }} @endif</small>
 <h1 class="h2">{{ $a['title'] }}</h1>
 @if ($a['img'])<img class="hero-img" src="{{ $a['img'] }}" alt="{{ $a['title'] }}">@endif
 <p class="lead left">{{ $a['excerpt'] }}</p>
 @if ($a['body']){!! nl2br(e($a['body'])) !!}@endif
</article>
@endsection
