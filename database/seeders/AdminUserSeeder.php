<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use RuntimeException;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        $email = config('daertech.admin_email');
        $password = config('daertech.admin_password');

        if (blank($email) || blank($password)) {
            throw new RuntimeException('ADMIN_EMAIL et ADMIN_PASSWORD doivent être définis (ou utilisez : php artisan daertech:create-admin).');
        }

        $user = User::firstOrNew(['email' => $email]);
        $user->name = $user->name ?: 'Administrateur';
        $user->password = $password;
        $user->is_admin = true;
        $user->save();
    }
}
