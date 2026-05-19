<?php

namespace App\Http\Controllers;

use App\Models\LocalPost;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        if (! config('posts.enabled')) {
            abort(404);
        }

        $posts = LocalPost::published()
            ->orderBy('published_at', 'desc')
            ->paginate(10);

        return view('posts.index', compact('posts'));
    }

    public function show(string $slug)
    {
        if (! config('posts.enabled')) {
            abort(404);
        }

        $post = LocalPost::where('slug', $slug)
            ->published()
            ->firstOrFail();

        return view('posts.show', compact('post'));
    }
}
