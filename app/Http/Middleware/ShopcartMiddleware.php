<?php

namespace App\Http\Middleware;

use Closure;

class ShopcartMiddleware
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
        //($request->route("shopid"));
        $shopid = $request->shopid;
        if(!isset($request->session()->get('shopcart')[$shopid])){
            return redirect("/shoplist/".$shopid);
        }
        return $next($request);
    }
}
