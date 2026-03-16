@extends('layouts.public', ['title' => $page->meta_title ?: $page->title])

@section('content')
    <h1 class="text-2xl font-bold">{{ $page->title }}</h1>

    @if($page->body)
        <div class="mt-4 whitespace-pre-line">
            {{ $page->body }}
        </div>
    @endif
@endsection
