@extends('layouts.app')

@section('title', 'Posts')

@section('content')
<header class="hero">
    <div>
        <p class="eyebrow">Posts</p>
        <h1>Blog</h1>
        <p class="lead">Latest articles and updates.</p>
    </div>
</header>

<section class="card">
    @forelse($posts as $post)
        @php
            $title    = $post->title      ?? $post->post_title ?? '';
            $slug     = $post->slug       ?? $post->post_name  ?? '';
            $date     = $post->published_at ?? $post->post_date ?? null;
            $excerpt  = $post->excerpt    ?? '';
            $category = $post->category   ?? null;
        @endphp
        <article style="margin-bottom:1.5rem;padding-bottom:1.5rem;border-bottom:1px solid rgba(15,23,42,0.06);">
            <div style="display:flex;gap:0.75rem;align-items:center;margin-bottom:0.4rem;flex-wrap:wrap;">
                @if($category)
                    <span style="background:rgba(124,58,237,0.1);color:#5b21b6;padding:0.15rem 0.55rem;border-radius:999px;font-size:0.75rem;font-weight:700;">{{ $category }}</span>
                @endif
                <span style="color:var(--muted);font-size:0.85rem;">{{ optional(\Carbon\Carbon::parse($date))->format('M j, Y') }}</span>
            </div>
            <h2 style="margin:0 0 0.4rem 0;font-size:1.25rem;">
                <a class="link" style="color:inherit;text-decoration:none;" href="{{ url('/posts/' . $slug) }}">{{ $title }}</a>
            </h2>
            <p style="margin:0 0 0.6rem 0;color:var(--muted);">{{ $excerpt }}</p>
            <a class="link" href="{{ url('/posts/' . $slug) }}">Read more →</a>
        </article>
    @empty
        <p style="color:var(--muted);">No posts found.</p>
    @endforelse

    <div style="margin-top:1rem;">{{ $posts->links() }}</div>
</section>
@endsection
