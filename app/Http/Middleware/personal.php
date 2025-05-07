<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class personal
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(!$request->user() || $request->user()->Puesto != 'Personal') {
            return redirect('/')->with('error', 'No tienes permiso para acceder a esta página.');
        }
        //Revisa en la base de datos si el usuario que esta intentando acceder es un personal


        return $next($request);
    }
}
