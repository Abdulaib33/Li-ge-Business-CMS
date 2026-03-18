@extends('layouts.public', ['title' => 'Services'])

@section('content')
    <section class="page-shell">
        <div class="max-w-2xl">
            <h1 class="section-title">Services</h1>
            <p class="section-subtitle">Explore the services offered by our business.</p>
        </div>

        <div class="mt-8 grid gap-6 md:grid-cols-2">
            @forelse($services as $service)
                <article class="card">
                    <div class="card-body">
                        <h2 class="text-xl font-semibold">{{ $service->title }}</h2>

                        @if($service->price_text)
                            <p class="mt-2 text-sm font-medium text-slate-600">{{ $service->price_text }}</p>
                        @endif

                        @if($service->description)
                            <p class="mt-4 text-slate-600 whitespace-pre-line">{{ $service->description }}</p>
                        @endif
                    </div>
                </article>
            @empty
                <p class="text-slate-500">No services published yet.</p>
            @endforelse
        </div>
    </section>
@endsection