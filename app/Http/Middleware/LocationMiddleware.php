<?php

namespace App\Http\Middleware;

use Closure;

class LocationMiddleware
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
        if(!$request->session()->has("location")){
            return redirect("/home");
        }
        return $next($request);
    }
}
