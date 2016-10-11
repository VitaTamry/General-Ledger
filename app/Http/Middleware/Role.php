<?php

namespace App\Http\Middleware;

use Closure;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role="")
    {
        if($request->user() === null)
        {
            return response('you cannot get in',401);
        }

         if ($request->user()->hasRole($role)){
            return $next($request);
         }else{
            return response("you don't have the permission",401);
        }
        
    }
}
