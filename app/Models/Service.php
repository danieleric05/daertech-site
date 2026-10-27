<?php

namespace App\Models;

use App\Models\Concerns\HasImage;
use App\Models\Concerns\HasStatusLabel;
use App\Models\Concerns\HasUniqueSlug;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasImage, HasUniqueSlug;
    use HasStatusLabel;

    public const ICONS = ['conseil', 'web', 'mobile', 'marketing', 'formation', 'assistance'];

    public const PAGES = ['home', 'conseil', 'developpement', 'formation'];

    public const STATUSES = ['draft', 'published', 'archived'];

    protected $fillable = ['title', 'slug', 'summary', 'description', 'icon', 'page_slug', 'image', 'status', 'position'];

    public function scopePublished(Builder $q): Builder
    {
        return $q->where('status', 'published')->orderBy('position')->orderBy('id');
    }
}
