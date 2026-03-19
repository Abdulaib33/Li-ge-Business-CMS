@extends('layouts.admin', ['title' => 'New Service'])

@section('content')
    <h1 class="text-2xl font-bold">New Service</h1>

    <form class="mt-6 space-y-4" method="POST" action="{{ route('admin.services.store') }}">
        @csrf
        @include('admin.services.partials.form', ['service' => null])
        <button class="border px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm rounded-lg transition shadow" type="submit">Create</button>
        <a class="underline ml-3" href="{{ route('admin.services.index') }}">Back</a>
    </form>
@endsection
