<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MiNuevoMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        // Aquí puedes agregar lógica personalizada
        if (!$request->has('token')) {
            return response()->json(['error' => 'Token requerido'], 403);
        }

        return $next($request);
    }
}