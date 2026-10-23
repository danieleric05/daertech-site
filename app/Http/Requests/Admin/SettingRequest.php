<?php

namespace App\Http\Requests\Admin;

use App\Models\Setting;

class SettingRequest extends AdminRequest
{
    public function rules(): array
    {
        $rules = array_fill_keys(Setting::KEYS, ['nullable', 'string', 'max:255']);
        $rules['company_name'] = ['required', 'string', 'max:120'];
        $rules['email'] = ['nullable', 'email', 'max:190'];
        $rules['whatsapp'] = ['nullable', 'regex:/^\d{8,15}$/'];
        foreach (['facebook', 'linkedin', 'instagram', 'x', 'youtube', 'tiktok'] as $k) {
            $rules[$k] = ['nullable', 'url:http,https', 'max:255'];
        }

        return $rules;
    }

    public function attributes(): array
    {
        return parent::attributes() + [
            'company_name' => 'nom de l\'entreprise', 'whatsapp' => 'WhatsApp', 'email' => 'e-mail',
        ];
    }

    public function messages(): array
    {
        return parent::messages() + ['whatsapp.regex' => 'Le numéro WhatsApp doit contenir uniquement des chiffres, avec l\'indicatif pays, sans « + » (ex. 225…).'];
    }
}
