<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RolMiddleware
{
    public function handle(Request $request, Closure $next, string $rol)
{
    $user = auth()->user();

    if ($user->rol == 'superadmin') {
        return $next($request);
    }

    if ($user->rol != $rol) {
        abort(403);
    }

    return $next($request);
}
}