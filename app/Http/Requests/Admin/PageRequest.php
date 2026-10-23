<?php

namespace App\Http\Requests\Admin;

use App\Support\ImageUploader;

class PageRequest extends AdminRequest
{
    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:190'],
            'meta_description' => ['nullable', 'string', 'max:255'],
            'hero_title' => ['nullable', 'string', 'max:190'],
            'hero_subtitle' => ['nullable', 'string', 'max:255'],
            'content' => ['nullable', 'string', 'max:20000'],
            'image' => ['nullable', ...ImageUploader::RULES],
            'remove_image' => ['nullable', 'boolean'],
        ];
    }
}
