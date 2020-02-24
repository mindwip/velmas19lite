<?php

namespace App\Http\Middleware;

use Closure;

class UserSituationMiddleware{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next){
        //Comprobamos si el usuario está activo:
        if(!auth()->user()->state){
            return redirect('/');
        }

        return $next($request);
    }
}

