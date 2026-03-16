<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'Admin' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen">
    <!doctype html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'Admin' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-slate-100 text-slate-900">

    <header class="border-b border-slate-200 bg-white">
        <div class="page-shell flex items-center justify-between py-4">

            <nav class="flex flex-wrap gap-2">

                <a class="rounded-xl px-4 py-2 text-sm font-medium hover:bg-slate-100"
                href="{{ route('admin.dashboard') }}">
                Dashboard
                </a>

                <a class="rounded-xl px-4 py-2 text-sm font-medium hover:bg-slate-100"
                href="{{ route('admin.pages.index') }}">
                Pages
                </a>

                <a class="rounded-xl px-4 py-2 text-sm font-medium hover:bg-slate-100"
                href="{{ route('admin.services.index') }}">
                Services
                </a>

                <a class="rounded-xl px-4 py-2 text-sm font-medium hover:bg-slate-100"
                href="{{ route('admin.posts.index') }}">
                Posts
                </a>

                <a class="rounded-xl px-4 py-2 text-sm font-medium hover:bg-slate-100"
                href="{{ route('admin.messages.index') }}">
                Messages
                </a>

                <a class="rounded-xl px-4 py-2 text-sm font-medium hover:bg-slate-100"
                href="{{ route('admin.settings.edit') }}">
                Settings
                </a>

                <a class="rounded-xl px-4 py-2 text-sm font-medium hover:bg-slate-100"
                href="{{ route('home') }}">
                View site
                </a>

            </nav>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn-secondary">
                    Logout
                </button>
            </form>

        </div>
    </header>

    <main class="page-shell">
        @yield('content')
    </main>

</body>
</html>
