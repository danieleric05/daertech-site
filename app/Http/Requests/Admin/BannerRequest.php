<?php

namespace App\Http\Requests\Admin;

use App\Models\Banner;
use App\Support\ImageUploader;
use Illuminate\Validation\Rule;

class BannerRequest extends AdminRequest
{
    public function rules(): array
    {
        $creating = $this->isMethod('post');

        return [
            'title' => ['required', 'string', 'max:190'],
            'text' => ['nullable', 'string', 'max:255'],
            'link_url' => ['nullable', 'url:http,https', 'max:2048'],
            'placement' => ['required', Rule::in(Banner::PLACEMENTS)],
            'starts_at' => ['nullable', 'date'],
            'ends_at' => ['nullable', 'date', 'after_or_equal:starts_at'],
            'is_active' => ['nullable', 'boolean'],
            'image' => [$creating ? 'required' : 'nullable', ...ImageUploader::RULES],
        ];
    }
}
