@extends('layouts.admin', ['title' => 'Posts'])

@section('content')
    <div class="flex items-center justify-between">
        <h1 class="text-2xl font-bold">Posts</h1>
        <a class="border px-4 py-2" href="{{ route('admin.posts.create') }}">New</a>
    </div>

    @if(session('status'))
        <div class="mt-4 p-3 border">{{ session('status') }}</div>
    @endif

    <div class="mt-6 border rounded overflow-hidden">
        <table class="w-full">
            <thead class="border-b">
                <tr>
                    <th class="text-left p-3">Title</th>
                    <th class="text-left p-3">Slug</th>
                    <th class="text-left p-3">Published</th>
                    <th class="text-left p-3">Published at</th>
                    <th class="text-left p-3"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($posts as $post)
                    <tr class="border-b">
                        <td class="p-3">{{ $post->title }}</td>
                        <td class="p-3">{{ $post->slug }}</td>
                        <td class="p-3">{{ $post->is_published ? 'Yes' : 'No' }}</td>
                        <td class="p-3">{{ $post->published_at?->format('Y-m-d H:i') }}</td>
                        <td class="p-3 flex gap-3">
                            <a class="underline" href="{{ route('admin.posts.edit', $post) }}">Edit</a>

                            <form method="POST" action="{{ route('admin.posts.destroy', $post) }}"
                                  onsubmit="return confirm('Delete this post?');">
                                @csrf
                                @method('DELETE')
                                <button class="underline" type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-4">{{ $posts->links() }}</div>
@endsection
