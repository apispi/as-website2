@extends('layouts.app')

@php
    $title    = $post->title      ?? $post->post_title   ?? '';
    $date     = $post->published_at ?? $post->post_date  ?? null;
    $content  = $post->content    ?? $post->post_content ?? '';
    $category = $post->category   ?? null;
@endphp

@section('title', $title)

@section('content')
<header class="hero">
    <div>
        @if($category)
            <p class="eyebrow">{{ $category }}</p>
        @else
            <p class="eyebrow">Post</p>
        @endif
        <h1>{{ $title }}</h1>
        <p class="lead">{{ optional(\Carbon\Carbon::parse($date))->format('M j, Y') }}</p>
    </div>
</header>

<section class="card">
    <article style="line-height:1.75;max-width:72ch;">
        {!! $content !!}
    </article>
    <div style="margin-top:2rem;">
        <a class="link" href="{{ url('/posts') }}">← Back to posts</a>
    </div>
</section>
@endsection
