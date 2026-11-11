<?php

namespace App\Http\Requests\Admin;

use App\Support\ImageUploader;
use Illuminate\Validation\Rule;

class PostRequest extends AdminRequest
{
    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:190'],
            'slug' => ['nullable', 'string', 'max:190', 'alpha_dash', Rule::unique('posts', 'slug')->ignore($this->route('post'))],
            'excerpt' => ['nullable', 'string', 'max:500'],
            'body' => ['required', 'string', 'max:50000'],
            'status' => ['required', Rule::in(['draft', 'published'])],
            'published_at' => ['nullable', 'date'],
            'image' => ['nullable', ...ImageUploader::RULES],
            'remove_image' => ['nullable', 'boolean'],
        ];
    }
}
