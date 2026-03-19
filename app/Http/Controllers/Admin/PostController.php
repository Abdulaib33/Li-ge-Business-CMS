<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StorePostRequest;
use App\Http\Requests\Admin\UpdatePostRequest;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::orderByDesc('created_at')->paginate(15);

        return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
        return view('admin.posts.create');
    }

    public function store(StorePostRequest $request)
    {
        $data = $request->validated();

        // Slug: generate if empty
        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($data['title']);
        }

        // Ensure slug unique (simple approach)
        $baseSlug = $data['slug'];
        $i = 2;
        while (Post::where('slug', $data['slug'])->exists()) {
            $data['slug'] = $baseSlug.'-'.$i;
            $i++;
        }

        // Image upload
        if ($request->hasFile('cover_image')) {
            $data['cover_image_path'] = $request->file('cover_image')->store('posts', 'r2');
        }

        Post::create($data);

        return redirect()
            ->route('admin.posts.index')
            ->with('status', 'Post created.');
    }

    public function edit(Post $post)
    {
        return view('admin.posts.edit', compact('post'));
    }

    public function update(UpdatePostRequest $request, Post $post)
    {
        $data = $request->validated();

        // Slug: generate if empty
        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($data['title']);
        }

        // Ensure slug unique excluding current
        $baseSlug = $data['slug'];
        $i = 2;
        while (Post::where('slug', $data['slug'])->where('id', '!=', $post->id)->exists()) {
            $data['slug'] = $baseSlug.'-'.$i;
            $i++;
        }

        // Image upload (replace old)
        if ($request->hasFile('cover_image')) {
            if ($post->cover_image_path) {
                Storage::disk('public')->delete($post->cover_image_path);
            }
            $data['cover_image_path'] = $request->file('cover_image')->store('posts', 'public');
        }

        $post->update($data);

        return redirect()
            ->route('admin.posts.index')
            ->with('status', 'Post updated.');
    }

    public function destroy(Post $post)
    {
        if ($post->cover_image_path) {
            Storage::disk('public')->delete($post->cover_image_path);
        }

        $post->delete();

        return redirect()
            ->route('admin.posts.index')
            ->with('status', 'Post deleted.');
    }
}
