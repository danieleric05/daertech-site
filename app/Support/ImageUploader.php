<?php

namespace App\Support;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class ImageUploader
{
    public const RULES = ['image', 'mimes:jpg,jpeg,png,webp', 'max:2048'];

    /** Stocke le fichier (disque public) et supprime l'ancien. Retourne le nouveau chemin. */
    public static function replace(UploadedFile $file, string $folder, ?string $old = null): string
    {
        $path = $file->storeAs($folder, bin2hex(random_bytes(16)).'.'.$file->guessExtension(), 'public');
        self::delete($old);

        return $path;
    }

    public static function delete(?string $path): void
    {
        if ($path) {
            Storage::disk('public')->delete($path);
        }
    }
}
