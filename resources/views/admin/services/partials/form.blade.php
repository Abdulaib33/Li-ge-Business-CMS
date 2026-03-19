@php
    $title = old('title', $service?->title);
    $description = old('description', $service?->description);
    $price_text = old('price_text', $service?->price_text);
    $sort_order = old('sort_order', $service?->sort_order ?? 0);
    $is_published = old('is_published', (int)($service?->is_published ?? 1));
@endphp

<div>
    <label class="block font-medium label">Title</label>
    <input class="border p-2 w-full rounded-lg border-gray-300 dark:border-gray-700 dark:text-gray-100 text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500" name="title" value="{{ $title }}">
    @error('title') <div class="text-sm mt-1 error-text">{{ $message }}</div> @enderror
</div>

<div>
    <label class="block font-medium label">Description</label>
    <textarea class="border p-2 w-full rounded-lg border-gray-300 dark:border-gray-700 dark:text-gray-100 text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500" rows="6" name="description">{{ $description }}</textarea>
    @error('description') <div class="text-sm mt-1">{{ $message }}</div> @enderror
</div>

<div>
    <label class="block font-medium">Price text (optional)</label>
    <input class="rounded-lg border-gray-300 dark:border-gray-700 dark:text-gray-100 text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500" name="price_text" value="{{ $price_text }}">
    @error('price_text') <div class="text-sm mt-1">{{ $message }}</div> @enderror
</div>

<div>
    <label class="block font-medium">Sort order</label>
    <input class="rounded-lg border-gray-300 dark:border-gray-700 dark:text-gray-100 text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500" type="number" name="sort_order" value="{{ $sort_order }}">
    @error('sort_order') <div class="text-sm mt-1">{{ $message }}</div> @enderror
</div>

<div>
    <label class="block font-medium">Published</label>
    <select class="rounded-lg border-gray-300 dark:border-gray-700 dark:text-gray-100 text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500" name="is_published">
        <option value="1" @selected((int)$is_published === 1)>Yes</option>
        <option value="0" @selected((int)$is_published === 0)>No</option>
    </select>
    @error('is_published') <div class="text-sm mt-1">{{ $message }}</div> @enderror
</div>
