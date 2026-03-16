@php
    $businessName = \App\Models\Setting::getValue('business_name', 'My Business');
    $logoPath = \App\Models\Setting::getValue('logo_path');
@endphp

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'Business Site' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen">
    <header class="p-4 border-b">
        <div class="flex items-center gap-3">
            @if($logoPath)
                <img src="{{ asset('storage/'.$logoPath) }}" class="h-10 w-auto" alt="Logo">
            @endif
            <div class="font-bold">{{ $businessName }}</div>
        </div>

        <nav class="flex gap-4">
            <a href="{{ route('page.show', 'home') }}">Home</a>
            <a href="{{ route('posts.index') }}">News</a>
            <a href="{{ route('services.index') }}">Services</a>
            <a href="{{ route('page.show', 'about') }}">About</a>
            <a href="{{ route('page.show', 'contact') }}">Contact</a>
            <a href="{{ route('admin.dashboard') }}">Admin</a>

        </nav>

    </header>

    <main class="p-6">
        @yield('content')
    </main>
</body>
</html>
