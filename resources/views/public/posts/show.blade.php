@extends('layouts.public', ['title' => $post->meta_title ?: $post->title])

@section('content')
    <a class="underline" href="{{ route('posts.index') }}">← Back to news</a>

    <h1 class="mt-4 text-2xl font-bold">{{ $post->title }}</h1>

    @if($post->cover_image_path)
        <img class="mt-4 max-w-2xl border" src="{{ asset('storage/'.$post->cover_image_path) }}" alt="">
    @endif

    @if($post->body)
        <div class="mt-4 whitespace-pre-line">
            {{ $post->body }}
        </div>
    @endif
@endsection
