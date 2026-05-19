@extends('layouts.app')

@section('title', 'Admin · Posts')

@section('content')
<header class="hero">
    <div>
        <p class="eyebrow">Admin</p>
        <h1>Posts</h1>
        <p class="lead">Create and manage blog posts served from the native posts table.</p>
    </div>
    @include('partials.admin-nav', ['active' => 'posts'])
</header>

<section class="card">
    <div style="display:flex;align-items:center;justify-content:space-between;flex-wrap:wrap;gap:1rem;margin-bottom:1.25rem;">
        <h2 style="margin:0;">All posts <span style="font-weight:400;color:var(--muted);font-size:1rem;">({{ $posts->total() }})</span></h2>
        <a class="link" style="padding:0.55rem 1rem;border:1px solid rgba(15,23,42,0.12);border-radius:0.9rem;background:#fff;box-shadow:0 6px 18px rgba(15,23,42,0.08);font-weight:600;" href="{{ route('admin.posts.create') }}">+ New post</a>
    </div>

    @if($posts->isEmpty())
        <p style="color:var(--muted);">No posts yet. <a class="link" href="{{ route('admin.posts.create') }}">Create the first one.</a></p>
    @else
        <table style="width:100%;border-collapse:collapse;font-size:0.9rem;">
            <thead>
                <tr style="border-bottom:2px solid rgba(15,23,42,0.08);text-align:left;">
                    <th style="padding:0.5rem 0.75rem 0.75rem 0;">Title</th>
                    <th style="padding:0.5rem 0.75rem 0.75rem;">Category</th>
                    <th style="padding:0.5rem 0.75rem 0.75rem;">Status</th>
                    <th style="padding:0.5rem 0.75rem 0.75rem;">Published</th>
                    <th style="padding:0.5rem 0 0.75rem;text-align:right;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($posts as $post)
                    <tr style="border-bottom:1px solid rgba(15,23,42,0.05);">
                        <td style="padding:0.65rem 0.75rem 0.65rem 0;">
                            <a class="link" href="{{ route('admin.posts.edit', $post) }}">{{ $post->title }}</a>
                            <div style="font-size:0.78rem;color:var(--muted);font-family:monospace;">{{ $post->slug }}</div>
                        </td>
                        <td style="padding:0.65rem 0.75rem;color:var(--muted);">{{ $post->category ?: '—' }}</td>
                        <td style="padding:0.65rem 0.75rem;">
                            <span style="display:inline-block;padding:0.2rem 0.6rem;border-radius:999px;font-size:0.75rem;font-weight:700;{{ $post->status === 'publish' ? 'background:rgba(22,163,74,0.12);color:#166534;' : 'background:rgba(15,23,42,0.06);color:var(--muted);' }}">
                                {{ $post->status === 'publish' ? 'Published' : 'Draft' }}
                            </span>
                        </td>
                        <td style="padding:0.65rem 0.75rem;color:var(--muted);font-size:0.85rem;">{{ optional($post->published_at)->format('M j, Y') ?: '—' }}</td>
                        <td style="padding:0.65rem 0;text-align:right;">
                            <div style="display:flex;gap:0.5rem;justify-content:flex-end;">
                                @if($post->status === 'publish' && config('posts.enabled'))
                                    <a class="link" href="{{ url('/posts/' . $post->slug) }}" target="_blank" style="font-size:0.85rem;">View</a>
                                @endif
                                <a class="link" href="{{ route('admin.posts.edit', $post) }}" style="font-size:0.85rem;">Edit</a>
                                <form method="POST" action="{{ route('admin.posts.destroy', $post) }}" onsubmit="return confirm('Delete this post?')">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="link button-reset" style="font-size:0.85rem;color:var(--error);">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div style="margin-top:1rem;">{{ $posts->links() }}</div>
    @endif
</section>
@endsection
