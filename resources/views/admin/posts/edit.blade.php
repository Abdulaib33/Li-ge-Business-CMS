@extends('layouts.admin', ['title' => 'Edit Post'])

@section('content')
    <h1 class="text-2xl font-bold">Edit Post</h1>

    <form class="mt-6 space-y-4" method="POST" action="{{ route('admin.posts.update', $post) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        @include('admin.posts.partials.form', ['post' => $post])
        <button class="border px-4 py-2" type="submit">Save</button>
        <a class="underline ml-3 btn-secondary" href="{{ route('admin.posts.index') }}">Back</a>
    </form>
@endsection
