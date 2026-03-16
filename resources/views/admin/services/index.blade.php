@extends('layouts.admin', ['title' => 'Services'])

@section('content')
    <div class="flex items-center justify-between">
        <h1 class="text-2xl font-bold section-title">Services</h1>
        <a class="border px-4 py-2 btn-primary" href="{{ route('admin.services.create') }}">New</a>
    </div>

    @if(session('status'))
        <div class="mt-4 p-3 border alert-success mb-6">
            {{ session('status') }}
        </div>
    @endif

    <div class="mt-6 border rounded overflow-hidden">
        <table class="w-full table">
            <thead class="border-b">
                <tr>
                    <th class="text-left p-3">Order</th>
                    <th class="text-left p-3">Title</th>
                    <th class="text-left p-3">Published</th>
                    <th class="text-left p-3">Price</th>
                    <th class="text-left p-3"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($services as $service)
                    <tr class="border-b">
                        <td class="p-3">{{ $service->sort_order }}</td>
                        <td class="p-3">{{ $service->title }}</td>
                        <td class="p-3">{{ $service->is_published ? 'Yes' : 'No' }}</td>
                        <td class="p-3">{{ $service->price_text }}</td>
                        <td class="p-3 flex gap-3">
                            <a class="underline btn-secondary" href="{{ route('admin.services.edit', $service) }}">Edit</a>

                            <form method="POST" action="{{ route('admin.services.destroy', $service) }}"
                                  onsubmit="return confirm('Delete this service?');">
                                @csrf
                                @method('DELETE')
                                <button class="underline btn-danger" type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $services->links() }}
    </div>
@endsection
