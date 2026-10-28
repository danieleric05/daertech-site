<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

abstract class AdminRequest extends FormRequest
{
    public function authorize(): bool
    {
        return (bool) $this->user()?->is_admin;
    }

    public function messages(): array
    {
        return [
            'required' => 'Le champ « :attribute » est obligatoire.',
            'max' => 'Le champ « :attribute » est trop long (:max maximum).',
            'string' => 'Le champ « :attribute » n\'est pas valide.',
            'url' => 'Le champ « :attribute » doit être une adresse web valide (http ou https).',
            'email' => 'Le champ « :attribute » doit être une adresse e-mail valide.',
            'in' => 'La valeur du champ « :attribute » n\'est pas valide.',
            'image' => 'Le fichier doit être une image.',
            'mimes' => 'L\'image doit être au format jpg, jpeg, png ou webp.',
            'image.max' => 'L\'image ne doit pas dépasser 2 Mo.',
            'date' => 'Le champ « :attribute » doit être une date valide.',
            'after_or_equal' => 'La date de fin doit être postérieure à la date de début.',
            'unique' => 'Cette valeur est déjà utilisée pour « :attribute ».',
            'alpha_dash' => 'Le champ « :attribute » ne peut contenir que des lettres, chiffres, tirets et underscores.',
            'integer' => 'Le champ « :attribute » doit être un nombre entier.',
            'min' => 'Le champ « :attribute » est trop petit.',
            'boolean' => 'Le champ « :attribute » n\'est pas valide.',
            'regex' => 'Le format du champ « :attribute » n\'est pas valide.',
        ];
    }

    public function attributes(): array
    {
        return [
            'title' => 'titre', 'slug' => 'adresse (slug)', 'summary' => 'résumé', 'description' => 'description',
            'icon' => 'icône', 'page_slug' => 'page', 'status' => 'statut', 'position' => 'position',
            'excerpt' => 'extrait', 'body' => 'contenu', 'published_at' => 'date de publication',
            'text' => 'texte', 'link_url' => 'lien', 'placement' => 'emplacement', 'starts_at' => 'début',
            'ends_at' => 'fin', 'image' => 'image', 'meta_description' => 'meta description',
            'hero_title' => 'titre d\'en-tête', 'hero_subtitle' => 'sous-titre d\'en-tête', 'content' => 'contenu',
        ];
    }
}
