<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RolMiddleware
{
    public function handle(
        Request $request,
        Closure $next,
        string $rol
    ): Response
    {
        if (auth()->user()->rol !== $rol) {
            abort(403, 'No autorizado');
        }

        return $next($request);
    }
}