<?php

namespace App\Http\Middleware;

use Closure;

class redirectIfAuthenticated2
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     
     */
    public function handle($request, Closure $next)
    {
        if (false) {
          return $next($request);
        }
        return response('NO Puedes Continuar',404);
    }
}
