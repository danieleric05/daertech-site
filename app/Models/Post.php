<?php

namespace App\Models;

use App\Models\Concerns\HasImage;
use App\Models\Concerns\HasStatusLabel;
use App\Models\Concerns\HasUniqueSlug;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasImage, HasUniqueSlug;
    use HasStatusLabel;

    protected $fillable = ['title', 'slug', 'excerpt', 'body', 'image', 'status', 'published_at'];

    protected function casts(): array
    {
        return ['published_at' => 'datetime'];
    }

    public function scopePublished(Builder $q): Builder
    {
        return $q->where('status', 'published')->where('published_at', '<=', now());
    }

    public function isPublished(): bool
    {
        return $this->status === 'published' && $this->published_at && $this->published_at->lte(now());
    }
}
