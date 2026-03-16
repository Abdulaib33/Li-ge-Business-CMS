@php
    $title = old('title', $service?->title);
    $description = old('description', $service?->description);
    $price_text = old('price_text', $service?->price_text);
    $sort_order = old('sort_order', $service?->sort_order ?? 0);
    $is_published = old('is_published', (int)($service?->is_published ?? 1));
@endphp

<div>
    <label class="block font-medium">Title</label>
    <input class="border p-2 w-full" name="title" value="{{ $title }}">
    @error('title') <div class="text-sm mt-1">{{ $message }}</div> @enderror
</div>

<div>
    <label class="block font-medium">Description</label>
    <textarea class="border p-2 w-full" rows="6" name="description">{{ $description }}</textarea>
    @error('description') <div class="text-sm mt-1">{{ $message }}</div> @enderror
</div>

<div>
    <label class="block font-medium">Price text (optional)</label>
    <input class="border p-2 w-full" name="price_text" value="{{ $price_text }}">
    @error('price_text') <div class="text-sm mt-1">{{ $message }}</div> @enderror
</div>

<div>
    <label class="block font-medium">Sort order</label>
    <input class="border p-2 w-full" type="number" name="sort_order" value="{{ $sort_order }}">
    @error('sort_order') <div class="text-sm mt-1">{{ $message }}</div> @enderror
</div>

<div>
    <label class="block font-medium">Published</label>
    <select class="border p-2" name="is_published">
        <option value="1" @selected((int)$is_published === 1)>Yes</option>
        <option value="0" @selected((int)$is_published === 0)>No</option>
    </select>
    @error('is_published') <div class="text-sm mt-1">{{ $message }}</div> @enderror
</div>
