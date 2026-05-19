@extends('layouts.app')

@section('title', 'Admin · New Post')

@section('content')
<header class="hero">
    <div>
        <p class="eyebrow">Admin · Posts</p>
        <h1>New post</h1>
    </div>
    @include('partials.admin-nav', ['active' => 'posts'])
</header>

<section class="card">
    <form method="POST" action="{{ route('admin.posts.store') }}">
        @include('admin.posts._form', ['submitLabel' => 'Create post'])
    </form>
</section>
@endsection
