@extends('layouts.public', ['title' => 'Services'])

@section('content')
    <h1 class="text-2xl font-bold">Services</h1>

    <div class="mt-6 space-y-4">
        @forelse($services as $service)
            <div class="border p-4">
                <h2 class="text-xl font-semibold">{{ $service->title }}</h2>

                @if($service->price_text)
                    <div class="mt-1">{{ $service->price_text }}</div>
                @endif

                @if($service->description)
                    <p class="mt-2 whitespace-pre-line">{{ $service->description }}</p>
                @endif
            </div>
        @empty
            <p>No services published yet.</p>
        @endforelse
    </div>
@endsection
