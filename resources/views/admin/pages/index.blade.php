@extends('layouts.admin', ['title' => 'Pages'])

@section('content')
    <div class="flex items-center justify-between">
        <h1 class="text-2xl font-bold section-title">Pages</h1>
    </div>

    @if(session('status'))
        <div class="mt-4 p-3 border alert-success mb-6">
            {{ session('status') }}
        </div>
    @endif

    <div class="mt-6 border rounded">
        <table class="w-full">
            <thead class="border-b">
                <tr>
                    <th class="text-left p-3">Key</th>
                    <th class="text-left p-3">Title</th>
                    <th class="text-left p-3">Published</th>
                    <th class="text-left p-3">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pages as $page)
                    <tr class="border-b">
                        <td class="p-3 font-medium">{{ $page->key }}</td>
                        <td class="p-3">{{ $page->title }}</td>
                        <td class="p-3">{{ $page->is_published ? 'Yes' : 'No' }}</td>
                        <td class="p-3">
                            <a class="underline" href="{{ route('admin.pages.edit', $page) }}">Edit</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
