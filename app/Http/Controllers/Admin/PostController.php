<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\LocalPost;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Str;
use Illuminate\View\View;

class PostController extends Controller
{
    public function index(): View
    {
        $posts = LocalPost::orderBy('created_at', 'desc')->paginate(20);
        return view('admin.posts.index', compact('posts'));
    }

    public function create(): View
    {
        return view('admin.posts.create', ['post' => new LocalPost]);
    }

    public function store(StorePostRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $data['slug'] = $data['slug'] ?: Str::slug($data['title']);

        if ($data['status'] === 'publish' && empty($data['published_at'])) {
            $data['published_at'] = now();
        }

        LocalPost::create($data);

        return redirect()->route('admin.posts.index')->with('status', 'Post created.');
    }

    public function edit(LocalPost $post): View
    {
        return view('admin.posts.edit', compact('post'));
    }

    public function update(UpdatePostRequest $request, LocalPost $post): RedirectResponse
    {
        $data = $request->validated();
        $data['slug'] = $data['slug'] ?: Str::slug($data['title']);

        if ($data['status'] === 'publish' && empty($data['published_at']) && !$post->published_at) {
            $data['published_at'] = now();
        }

        $post->update($data);

        return redirect()->route('admin.posts.index')->with('status', 'Post updated.');
    }

    public function destroy(LocalPost $post): RedirectResponse
    {
        $post->delete();
        return redirect()->route('admin.posts.index')->with('status', 'Post deleted.');
    }
}
