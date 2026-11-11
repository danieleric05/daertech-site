<?php

namespace App\Models;

use App\Models\Concerns\HasImage;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    public function getPlacementLabelAttribute(): string
    {
        return ['home_top' => 'Accueil (haut)', 'sidebar' => 'Colonne latérale', 'footer' => 'Pied de page', 'actualites' => 'Actualités'][$this->placement] ?? (string) $this->placement;
    }

    use HasImage;

    public const PLACEMENTS = ['home_top', 'sidebar', 'footer', 'actualites'];

    protected $fillable = ['title', 'image', 'text', 'link_url', 'placement', 'starts_at', 'ends_at', 'is_active'];

    protected function casts(): array
    {
        return ['starts_at' => 'datetime', 'ends_at' => 'datetime', 'is_active' => 'boolean'];
    }

    public function scopeVisible(Builder $q): Builder
    {
        return $q->where('is_active', true)
            ->where(fn ($q) => $q->whereNull('starts_at')->orWhere('starts_at', '<=', now()))
            ->where(fn ($q) => $q->whereNull('ends_at')->orWhere('ends_at', '>=', now()));
    }
}
