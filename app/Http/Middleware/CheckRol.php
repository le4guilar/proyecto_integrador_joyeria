<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;


class CheckRol
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next, string $rol)
    {
        // se verifica si el rol de usuario coincide con el qq definimos
        if (Auth::check() && Auth::user()->rol->nombre_rol === $rol) {
            return $next($request);
        }

        // Si no es admin, lo mandamos a la raíz
        return redirect('/')->with('error', 'No tenés los permisos miloco!');
    }
}
