<?php

namespace App\Http\Middleware;

use Closure;

class CheckPayPassword
{
    /**
     * 检查用户是否设置过支付密码,没有设置过的话重定向到设置支付密码的界面,否则进行下一步操作
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if( !auth()->user()->code ) {
            return redirect('/center/payPassword');
        }

        return $next($request);
    }
}
