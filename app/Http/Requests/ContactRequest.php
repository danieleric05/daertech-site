<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:120'],
            'email' => ['nullable', 'email:rfc', 'max:190', 'required_without:phone'],
            'phone' => ['nullable', 'string', 'max:30', 'required_without:email'],
            'company' => ['nullable', 'string', 'max:150'],
            'subject' => ['nullable', 'string', 'max:190'],
            'message' => ['required', 'string', 'min:10', 'max:5000'],
            'website' => ['nullable', 'string'], // honeypot
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Veuillez indiquer votre nom.',
            'email.required_without' => 'Indiquez un e-mail ou un téléphone pour qu\'on puisse vous répondre.',
            'phone.required_without' => 'Indiquez un e-mail ou un téléphone pour qu\'on puisse vous répondre.',
            'email.email' => 'Cette adresse e-mail n\'est pas valide.',
            'message.required' => 'Veuillez écrire votre message.',
            'message.min' => 'Votre message est trop court (10 caractères minimum).',
            'message.max' => 'Votre message est trop long (5000 caractères maximum).',
            '*.max' => 'Ce champ est trop long.',
        ];
    }
}
