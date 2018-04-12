<?php

namespace App\Http\Controllers;

use App\Http\Requests\CheckUser;
use App\User;
use Auth;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * 显示登录表单
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function LoginForm()
    {

        $openid = request()->openid ;
        $user = User::where('openid', $openid)->first();

        if ($user && $user->gid != 0) {
            $mobile = $user->mobile;
            $password = $user->pwd;

            $res = Auth::attempt(['mobile'=>$mobile, 'password'=>$password]);

            if ($res === true) return redirect('/home');
        }

        return view('user.login');
    }

    
    /**
     * 登陆
     * @param CheckUser $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function login(CheckUser $request)
    {
        // 表单验证
        $mobile = request()->mobile;
        $password = request()->password;
        $request->validate();

        // 尝试登录,查看当前用户是否存在
        $userExists = Auth::attempt([
            'mobile'    => $mobile,
            'password'  => $password
        ]);


        if ($userExists) {
            if (auth()->user()->gid == 0) {
                return redirect()->back()->with(['error' => '您目前不是微销会员,请注册后登陆']);
            }
            return redirect('/home');
        }

        return redirect()->back()->with(['error'=>'用户名或密码错误']);
    }

    /**
     * 用户退出
     */
    public function logout ()
    {
        auth()->logout();
        return redirect('/loginForm');
    }
}
