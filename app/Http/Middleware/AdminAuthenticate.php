<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminAuthenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */

     //Middleware para el admin
    public function handle(Request $request, Closure $next)
        {
            if (auth()->check() && auth()->user()->rol==='admin'){
            return $next($request);
            }

            abort(403, 'No tienes permiso para acceder a la página');
    }
}
