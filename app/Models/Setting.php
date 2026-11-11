<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Setting extends Model
{
    public const KEYS = ['company_name', 'tagline', 'phone', 'whatsapp', 'email', 'address', 'hours',
        'facebook', 'linkedin', 'instagram', 'x', 'youtube', 'tiktok'];

    protected $fillable = ['key', 'value'];

    protected static function booted(): void
    {
        static::saved(fn () => Cache::forget('settings'));
        static::deleted(fn () => Cache::forget('settings'));
    }

    /** @return array<string, string|null> */
    public static function allKeyed(): array
    {
        $stored = Cache::rememberForever('settings', fn () => static::pluck('value', 'key')->all());

        return array_merge(array_fill_keys(self::KEYS, null), $stored);
    }

    public static function get(string $key, mixed $default = null): mixed
    {
        return static::allKeyed()[$key] ?? $default;
    }
}
