<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\ContactMessage;
use Illuminate\Support\Facades\RateLimiter;

class ContactController extends Controller
{
    public function send(ContactRequest $request)
    {
        // Limite appliquée après validation : une saisie invalide ne consomme pas d'envoi et garde ses valeurs.
        $key = 'contact:'.$request->ip();
        if (RateLimiter::tooManyAttempts($key, 5)) {
            $min = (int) ceil(RateLimiter::availableIn($key) / 60);

            return back()->withInput()->withErrors(['message' => "Trop de messages envoyés. Réessayez dans {$min} min."]);
        }

        // Honeypot : un robot remplit `website` ; on répond comme si tout allait bien.
        if (! $request->filled('website')) {
            ContactMessage::create($request->safe()->except('website') + ['ip' => $request->ip()]);
            RateLimiter::hit($key, 600);
        }

        return back()->with('success', 'Merci, votre message a bien été envoyé. Nous vous répondrons rapidement.');
    }
}
