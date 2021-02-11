<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class AccessDepot
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
        if(Auth::user()->hasAnyRole('depot')){
            return $next($request);
        }
        return response("Insufficient permission", 401);
    }
}
