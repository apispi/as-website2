@extends('layouts.app')

@section('title', 'Admin · Upload Media')

@section('content')
<header class="hero">
    <div>
        <p class="eyebrow">Admin</p>
        <h1>Upload media</h1>
        <p class="lead">Add images to the media library for use on the site.</p>
    </div>
    @include('partials.admin-nav', ['active' => 'media'])
</header>

<div class="card">
    <form method="POST" action="{{ route('admin.media.store') }}" enctype="multipart/form-data">
        @csrf
        <div style="display:flex;flex-direction:column;gap:0.75rem;max-width:520px;">
            <label>Image file (jpg, png, gif, svg, webp)</label>
            <input type="file" name="file" required accept="image/*" />
            @error('file') <div style="color:var(--error);">{{ $message }}</div> @enderror

            <div style="display:flex;gap:0.5rem;margin-top:0.5rem;">
                <a class="link" href="{{ route('admin.media.index') }}">Cancel</a>
                <button class="btn">Upload</button>
            </div>
        </div>
    </form>
</div>
@endsection
