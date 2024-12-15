<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ValidateId
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $id = $request->route("id");

        // Validar que el "id" sea un número positivo
        if (!is_numeric($id) || intval($id) < 1) {
            return response()->json([
                "Success" => false,
                "Message" => "El ID no es válido. Debe ser un número entero positivo.",
                "Data" => null,
            ], 400);
        }

        return $next($request);
    }
}
