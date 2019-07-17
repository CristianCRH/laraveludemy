<?php

namespace App\Http\Middleware;

use Closure;

class checkRoles
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
        $roles=func_get_args();
        $roles=array_slice($roles,2);//Quitando 2 parametros
       # dd($roles);
        
           if (auth()->user()->hasRoles($roles)) {
             return $next($request);
            }
      // dd($roles);
     return redirect('work');
    }
}
