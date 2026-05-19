@extends('layouts.app')

@section('title', 'Admin · Edit Post')

@section('content')
<header class="hero">
    <div>
        <p class="eyebrow">Admin · Posts</p>
        <h1>Edit post</h1>
        <p class="lead">{{ $post->title }}</p>
    </div>
    @include('partials.admin-nav', ['active' => 'posts'])
</header>

<section class="card">
    <form method="POST" action="{{ route('admin.posts.update', $post) }}">
        @method('PUT')
        @include('admin.posts._form', ['submitLabel' => 'Save changes'])
    </form>
</section>
@endsection
