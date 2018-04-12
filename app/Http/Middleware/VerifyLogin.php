<?php

namespace App\Http\Middleware;

use Closure;

class VerifyLogin
{
    /**
     * 中间件, 检查当前用户是否登陆过,没有登陆重定向到登陆界面
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!auth()->check()) {
            return redirect('/loginForm');
        }

        return $next($request);
    }
}
