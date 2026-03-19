@extends('layouts.admin', ['title' => 'Settings'])

@section('content')
    <h1 class="text-2xl font-bold">Settings</h1>

    @if(session('status'))
        <div class="mt-4 p-3 border">{{ session('status') }}</div>
    @endif

    <form class="mt-6 space-y-4 max-w-xl" method="POST" action="{{ route('admin.settings.update') }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div>
            <label class="block font-medium">Business name</label>
            <input class="border p-2 w-full rounded-lg border-gray-300 dark:border-gray-700 dark:text-gray-100 text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500" name="business_name" value="{{ old('business_name', $settings['business_name']) }}">
            @error('business_name') <div class="text-sm mt-1">{{ $message }}</div> @enderror
        </div>

        <div>
            <label class="block font-medium">Phone</label>
            <input class="border p-2 w-full rounded-lg border-gray-300 dark:border-gray-700 dark:text-gray-100 text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500" name="phone" value="{{ old('phone', $settings['phone']) }}">
            @error('phone') <div class="text-sm mt-1">{{ $message }}</div> @enderror
        </div>

        <div>
            <label class="block font-medium">Email</label>
            <input class="border p-2 w-full rounded-lg border-gray-300 dark:border-gray-700 dark:text-gray-100 text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500" type="email" name="email" value="{{ old('email', $settings['email']) }}">
            @error('email') <div class="text-sm mt-1">{{ $message }}</div> @enderror
        </div>

        <div>
            <label class="block font-medium">Address</label>
            <input class="border p-2 w-full rounded-lg border-gray-300 dark:border-gray-700 dark:text-gray-100 text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500" name="address" value="{{ old('address', $settings['address']) }}">
            @error('address') <div class="text-sm mt-1">{{ $message }}</div> @enderror
        </div>

        <div>
            <label class="block font-medium">Logo (optional)</label>
            <input type="file" name="logo">
            @error('logo') <div class="text-sm mt-1">{{ $message }}</div> @enderror

            @if($settings['logo_path'])
                <div class="mt-3">
                    <div class="text-sm">Current logo:</div>
                        <img class="mt-2 max-w-xs border" src="{{ Storage::disk('r2')->url($settings['logo_path']) }}" alt="Logo">
                </div>
            @endif
        </div>

        <button class="border px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm rounded-lg transition shadow" type="submit">Save</button>
    </form>
@endsection
