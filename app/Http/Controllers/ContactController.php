<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\ContactMessage;

class ContactController extends Controller
{
    public function send(ContactRequest $request)
    {
        // Honeypot : un robot remplit `website` ; on répond comme si tout allait bien.
        if (! $request->filled('website')) {
            ContactMessage::create($request->safe()->except('website') + ['ip' => $request->ip()]);
        }

        return back()->with('success', 'Merci, votre message a bien été envoyé. Nous vous répondrons rapidement.');
    }
}
