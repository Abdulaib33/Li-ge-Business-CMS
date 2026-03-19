@php
    $title = old('title', $post?->title);
    $slug = old('slug', $post?->slug);
    $excerpt = old('excerpt', $post?->excerpt);
    $body = old('body', $post?->body);
    $meta_title = old('meta_title', $post?->meta_title);
    $meta_description = old('meta_description', $post?->meta_description);
    $is_published = old('is_published', (int)($post?->is_published ?? 0));
    $published_at = old('published_at', $post?->published_at?->format('Y-m-d\TH:i'));
@endphp

<div>
    <label class="block font-medium">Title</label>
    <input class="border p-2 w-full rounded-lg border-gray-300 dark:border-gray-700 dark:text-gray-100 text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500" name="title" value="{{ $title }}">
    @error('title') <div class="text-sm mt-1">{{ $message }}</div> @enderror
</div>

<div>
    <label class="block font-medium">Slug (optional)</label>
    <input class="border p-2 w-full rounded-lg border-gray-300 dark:border-gray-700 dark:text-gray-100 text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500" name="slug" value="{{ $slug }}">
    <div class="text-sm mt-1">Leave empty to auto-generate from the title.</div>
    @error('slug') <div class="text-sm mt-1">{{ $message }}</div> @enderror
</div>

<div>
    <label class="block font-medium">Excerpt</label>
    <textarea class="border p-2 w-full rounded-lg border-gray-300 dark:border-gray-700 dark:text-gray-100 text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500" rows="3" name="excerpt">{{ $excerpt }}</textarea>
    @error('excerpt') <div class="text-sm mt-1">{{ $message }}</div> @enderror
</div>

<div>
    <label class="block font-medium">Body</label>
    <textarea class="border p-2 w-full rounded-lg border-gray-300 dark:border-gray-700 dark:text-gray-100 text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500" rows="10" name="body">{{ $body }}</textarea>
    @error('body') <div class="text-sm mt-1">{{ $message }}</div> @enderror
</div>

<div>
    <label class="block font-medium">Cover image (optional)</label>
    <input type="file" name="cover_image">
    @error('cover_image') <div class="text-sm mt-1">{{ $message }}</div> @enderror

    @if($post?->cover_image_path)
        <div class="mt-2">
            <div class="text-sm">Current:</div>
            <img class="mt-1 max-w-sm border" src="{{ asset('storage/'.$post->cover_image_path) }}" alt="">
        </div>
    @endif
</div>

<div>
    <label class="block font-medium">Meta title</label>
    <input class="border p-2 w-full rounded-lg border-gray-300 dark:border-gray-700 dark:text-gray-100 text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500" name="meta_title" value="{{ $meta_title }}">
    @error('meta_title') <div class="text-sm mt-1">{{ $message }}</div> @enderror
</div>

<div>
    <label class="block font-medium">Meta description (max 160)</label>
    <input class="border p-2 w-full rounded-lg border-gray-300 dark:border-gray-700 dark:text-gray-100 text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500" name="meta_description" value="{{ $meta_description }}">
    @error('meta_description') <div class="text-sm mt-1">{{ $message }}</div> @enderror
</div>

<div>
    <label class="block font-medium">Published</label>
    <select class="border p-2 rounded-lg border-gray-300 dark:border-gray-700 dark:text-gray-100 text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500" name="is_published">
        <option value="1" @selected((int)$is_published === 1)>Yes</option>
        <option value="0" @selected((int)$is_published === 0)>No</option>
    </select>
    @error('is_published') <div class="text-sm mt-1">{{ $message }}</div> @enderror
</div>

<div>
    <label class="block font-medium">Publish date/time (optional)</label>
    <input class="border p-2 rounded-lg border-gray-300 dark:border-gray-700 dark:text-gray-100 text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500" type="datetime-local" name="published_at" value="{{ $published_at }}">
    <div class="text-sm mt-1">If empty, and Published=Yes, it can show immediately (depending on your model logic).</div>
    @error('published_at') <div class="text-sm mt-1">{{ $message }}</div> @enderror
</div>
