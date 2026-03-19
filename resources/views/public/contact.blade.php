@extends('layouts.public', ['title' => 'Contact'])

@section('content')
    <h1 class="text-2xl font-bold">Contact</h1>

    @if(session('status'))
        <div class="mt-4 p-3 border">{{ session('status') }}</div>
    @endif

    <form class="mt-6 space-y-4 max-w-xl" method="POST" action="{{ route('contact.submit') }}">
        @csrf

        <div>
            <label class="block font-medium">Name</label>
            <input class="border p-2 w-full rounded-lg border-gray-300 dark:border-gray-700 dark:text-gray-100 text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500" name="name" value="{{ old('name') }}">
            @error('name') <div class="text-sm mt-1">{{ $message }}</div> @enderror
        </div>

        <div>
            <label class="block font-medium">Email</label>
            <input class="border p-2 w-full rounded-lg border-gray-300 dark:border-gray-700 dark:text-gray-100 text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500" type="email" name="email" value="{{ old('email') }}">
            @error('email') <div class="text-sm mt-1">{{ $message }}</div> @enderror
        </div>

        <div>
            <label class="block font-medium">Phone (optional)</label>
            <input class="border p-2 w-full rounded-lg border-gray-300 dark:border-gray-700 dark:text-gray-100 text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500" name="phone" value="{{ old('phone') }}">
            @error('phone') <div class="text-sm mt-1">{{ $message }}</div> @enderror
        </div>

        <div>
            <label class="block font-medium">Message</label>
            <textarea class="border p-2 w-full rounded-lg border-gray-300 dark:border-gray-700 dark:text-gray-100 text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500" rows="6" name="message">{{ old('message') }}</textarea>
            @error('message') <div class="text-sm mt-1">{{ $message }}</div> @enderror
        </div>

        <button class="border px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm rounded-lg transition shadow" type="submit">Send</button>
    </form>
@endsection
