<?php

namespace App\Models\Concerns;

trait HasStatusLabel
{
    public function getStatusLabelAttribute(): string
    {
        return ['published' => 'Publié', 'draft' => 'Brouillon', 'archived' => 'Archivé'][$this->status] ?? (string) $this->status;
    }
}
