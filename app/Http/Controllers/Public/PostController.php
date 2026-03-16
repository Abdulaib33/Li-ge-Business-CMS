<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        return view('public.posts.index', [
            'posts' => Post::published()->paginate(10),
        ]);
    }

    public function show(string $slug)
    {
        $post = Post::published()->where('slug', $slug)->firstOrFail();

        return view('public.posts.show', [
            'post' => $post,
        ]);
    }
}
