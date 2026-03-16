<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255'],
            'excerpt' => ['nullable', 'string'],
            'body' => ['nullable', 'string'],

            'meta_title' => ['nullable', 'string', 'max:255'],
            'meta_description' => ['nullable', 'string', 'max:160'],

            // HTML datetime-local: we’ll store as timestamp
            'published_at' => ['nullable', 'date'],
            'is_published' => ['required', 'boolean'],

            'cover_image' => ['nullable', 'image', 'max:2048'], // 2MB
        ];
    }
}
