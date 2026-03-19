@extends('layouts.admin', ['title' => 'New Post'])

@section('content')
    <h1 class="text-2xl font-bold">New Post</h1>

    <form class="mt-6 space-y-4" method="POST" action="{{ route('admin.posts.store') }}" enctype="multipart/form-data">
        @csrf
        @include('admin.posts.partials.form', ['post' => null])
        <button class="border px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm rounded-lg transition shadow" type="submit">Create</button>
        <a class="underline ml-3" href="{{ route('admin.posts.index') }}">Back</a>
    </form>
@endsection
