<?php

namespace App\Http\Middleware;

use Closure;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //die('aa');
        //dd($request);
        //判断会员是否有权限
        if ($request->session()->has("adminuser")) {
            if(session("adminuser")->name=="root"){
                return $next($request);
            }
            $rid = session('adminuser')->role;
            //dd($rid);
            $aa = \DB::table('r_n')->where('rid', $rid)->first();
            //dd($aa);
            if ($aa == null){
                return redirect('admin')->with('msg', '您无此操作权限');
            }
            return $next($request);
        }

    }
}