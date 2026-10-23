<?php

namespace App\Policies;

use App\Models\Banner;
use App\Models\User;

class BannerPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->is_admin;
    }

    public function view(User $user, Banner $model): bool
    {
        return $user->is_admin;
    }

    public function create(User $user): bool
    {
        return $user->is_admin;
    }

    public function update(User $user, Banner $model): bool
    {
        return $user->is_admin;
    }

    public function delete(User $user, Banner $model): bool
    {
        return $user->is_admin;
    }
}
