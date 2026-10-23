<?php

namespace App\Http\Requests\Admin;

use App\Models\Service;
use App\Support\ImageUploader;
use Illuminate\Validation\Rule;

class ServiceRequest extends AdminRequest
{
    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:190'],
            'slug' => ['nullable', 'string', 'max:190', 'alpha_dash', Rule::unique('services', 'slug')->ignore($this->route('service'))],
            'summary' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string', 'max:10000'],
            'icon' => ['required', Rule::in(Service::ICONS)],
            'page_slug' => ['nullable', Rule::in(Service::PAGES)],
            'status' => ['required', Rule::in(Service::STATUSES)],
            'position' => ['nullable', 'integer', 'min:0', 'max:9999'],
            'image' => ['nullable', ...ImageUploader::RULES],
            'remove_image' => ['nullable', 'boolean'],
        ];
    }
}
