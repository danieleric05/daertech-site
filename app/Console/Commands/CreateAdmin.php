<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

use function Laravel\Prompts\password;

class CreateAdmin extends Command
{
    protected $signature = 'daertech:create-admin {email} {--name=Administrateur} {--generate : Génère un mot de passe aléatoire et l\'affiche (shell non interactif)}';

    protected $description = 'Crée ou met à jour un compte administrateur (mot de passe demandé en saisie masquée)';

    public function handle(): int
    {
        $email = $this->argument('email');
        $pass = $this->option('generate') ? Str::password(20, symbols: false) : password('Mot de passe (12 caractères minimum)', required: true);

        $v = Validator::make(['email' => $email, 'password' => $pass], [
            'email' => ['required', 'email'],
            'password' => ['required', 'min:12'],
        ]);

        if ($v->fails()) {
            $this->error($v->errors()->first());

            return self::FAILURE;
        }

        $user = User::firstOrNew(['email' => $email]);
        $user->name = $this->option('name');
        $user->password = $pass;
        $user->is_admin = true;
        $user->save();

        $this->info("Administrateur {$email} enregistré.");

        if ($this->option('generate')) {
            $this->line("Mot de passe : {$pass}");
        }

        return self::SUCCESS;
    }
}
