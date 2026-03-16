@extends('layouts.admin', ['title' => 'Edit Service'])

@section('content')
    <h1 class="text-2xl font-bold">Edit Service</h1>

    <form class="mt-6 space-y-4" method="POST" action="{{ route('admin.services.update', $service) }}">
        @csrf
        @method('PUT')
        @include('admin.services.partials.form', ['service' => $service])
        <button class="border px-4 py-2" type="submit">Save</button>
        <a class="underline ml-3" href="{{ route('admin.services.index') }}">Back</a>
    </form>
@endsection
