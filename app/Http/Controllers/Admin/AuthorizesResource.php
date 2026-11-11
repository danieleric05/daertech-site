<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Routing\Controllers\Middleware;

/** Équivalent de authorizeResource() : policy sur chaque action du resource controller. */
trait AuthorizesResource
{
    public static function middleware(): array
    {
        $model = static::MODEL;
        $p = static::PARAM;

        return [
            new Middleware("can:viewAny,$model", only: ['index']),
            new Middleware("can:view,$p", only: ['show']),
            new Middleware("can:create,$model", only: ['create', 'store']),
            new Middleware("can:update,$p", only: ['edit', 'update']),
            new Middleware("can:delete,$p", only: ['destroy']),
        ];
    }
}
