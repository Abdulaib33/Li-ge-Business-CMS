@extends('layouts.admin', ['title' => 'Edit Page'])

@section('content')
    <h1 class="text-2xl font-bold">Edit Page: {{ $page->key }}</h1>

    <form class="mt-6 space-y-4" method="POST" action="{{ route('admin.pages.update', $page) }}">
        @csrf
        @method('PUT')

        <div>
            <label class="block font-medium">Title</label>
            <input class="rounded-lg border-gray-300 dark:border-gray-700 dark:text-gray-100 text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500" name="title" value="{{ old('title', $page->title) }}">
            @error('title') <div class="text-sm mt-1">{{ $message }}</div> @enderror
        </div>

        <div>
            <label class="block font-medium">Body</label>
            <textarea class="rounded-lg border-gray-300 dark:border-gray-700 dark:text-gray-100 text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500" rows="10" name="body">{{ old('body', $page->body) }}</textarea>
            @error('body') <div class="text-sm mt-1">{{ $message }}</div> @enderror
        </div>

        <div>
            <label class="block font-medium">Meta title</label>
            <input class="rounded-lg border-gray-300 dark:border-gray-700 dark:text-gray-100 text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500" name="meta_title" value="{{ old('meta_title', $page->meta_title) }}">
            @error('meta_title') <div class="text-sm mt-1">{{ $message }}</div> @enderror
        </div>

        <div>
            <label class="block font-medium">Meta description (max 160)</label>
            <input class="rounded-lg border-gray-300 dark:border-gray-700 dark:text-gray-100 text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500" name="meta_description" value="{{ old('meta_description', $page->meta_description) }}">
            @error('meta_description') <div class="text-sm mt-1">{{ $message }}</div> @enderror
        </div>

        <div>
            <label class="block font-medium">Published</label>
            <select class="rounded-lg border-gray-300 dark:border-gray-700 dark:text-gray-100 text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500" name="is_published">
                <option value="1" @selected(old('is_published', (int)$page->is_published) === 1)>Yes</option>
                <option value="0" @selected(old('is_published', (int)$page->is_published) === 0)>No</option>
            </select>
            @error('is_published') <div class="text-sm mt-1">{{ $message }}</div> @enderror
        </div>

        <div class="flex gap-3">
            <button class="rounded-lg border-gray-300 dark:border-gray-700 dark:text-gray-100 text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500" type="submit">Save</button>
            <a class="underline btn-secondary" href="{{ route('admin.pages.index') }}">Back</a>
        </div>
    </form>
@endsection
