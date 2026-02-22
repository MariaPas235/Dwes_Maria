<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckMaintenanceMode
{
    public function handle(Request $request, Closure $next): Response
    {
        // Verificar si la aplicación está en modo mantenimiento
        if (env('MAINTENANCE_MODE', false)) {
            return response()->json(['error' => 'El sitio está en mantenimiento'], 503);
        }

        // Continuar con la solicitud
        return $next($request);
    }
}