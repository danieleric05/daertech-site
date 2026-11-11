<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    public function run(): void
    {
        foreach (Setting::KEYS as $key) {
            Setting::firstOrCreate(['key' => $key], ['value' => match ($key) {
                'company_name' => 'DaerTech',
                'tagline' => 'Conseil informatique, marketing stratégique et solutions numériques',
                default => null,
            }]);
        }
    }
}
