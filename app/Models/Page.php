<?php

namespace App\Models;

use App\Models\Concerns\HasImage;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasImage;

    protected $fillable = ['slug', 'title', 'meta_description', 'hero_title', 'hero_subtitle', 'content', 'image'];

    /** HTML simple nettoyé : balises autorisées, aucun attribut. À afficher avec {!! !!}. */
    protected function safeContent(): Attribute
    {
        return Attribute::get(function () {
            $html = strip_tags((string) $this->content, '<p><br><strong><em><ul><ol><li><h2><h3>');

            return preg_replace('/<(\w+)[\s\/][^>]*>/', '<$1>', $html);
        });
    }
}
