<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\ThirdParty\Sms;


class CenterController extends Controller
{
    /**
     * 返回会员中心模板并渲染数据
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        // 获取个人中心所有数据
        $data = User::getCenterData();

        $title = '会员中心';
        return view( 'center.index', compact( 'title', 'data' ) );
    }

    /**
     * 设置安全问题功能
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function safeQuestion()
    {
        $title = '设置安全问题';
        return view( 'center.safeQuestion', compact( 'title' ) );
    }

    /**
     * 设置支付密码
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function payPassword()
    {
        $title = '创建支付密码';
        return view( 'center.payPassword', compact( 'title' ) );
    }


    /**
     * 设置支付密码业务逻辑
     * @return bool
     */
    public function setPayPassword()
    {
        // 表单验证
        $payPassword = request()->pay;

        // 验证规则
        $rules = [
            'pay' => 'required|digits:6|confirmed',
        ];

        $messages = [
            'pay.required' => '支付密码不能为空',
            'pay.digits' => '支付密码必须为六位数字',
            'pay.confirmed' => '两次密码输入不一致',
        ];

        // 验证重复密码
        $this->validate( request(), $rules, $messages );

        // 获取当前用户模型
        $user = auth()->user();

        // 设置支付密码,保存
        $user->code = md5( $payPassword );
        $user->save();

        return redirect()->back();
    }


    /**
     * 设置安全问题业务逻辑处理
     * @return bool
     */
    public function setSafeQuestion()
    {
        $rules = [
            'question1' => 'different:question2,question3',
            'question2' => 'different:question1,question3',
            'question3' => 'different:question2,question1',
            'answer1' => 'required',
            'answer2' => 'required',
            'answer3' => 'required'
        ];

        $messages = [
            'question1.different' => '问题不能重复',
            'question2.different' => '问题不能重复',
            'question3.different' => '问题不能重复',
            'answer1.required' => '问题一不能为空',
            'answer2.required' => '问题二不能为空',
            'answer3.required' => '问题三不能为空',
        ];


        $this->validate( request(), $rules, $messages );

        $questions = [
            request()->question1 => request()->answer1,
            request()->question2 => request()->answer2,
            request()->question3 => request()->answer3
        ];

        $user = auth()->user();

        $user->question = json_encode( $questions );
        $user->save();
        return redirect()->back();

    }


    /**
     * 重置支付密码页面
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function resetPayPasswordForm()
    {
        $title = '重置支付密码';
        return view( 'center.resetPayPasswordForm', compact( 'title' ) );
    }

    public function resetPayPassword()
    {
        // 用户输入的代码
        $userInputCode  = request()->smsCode;
        $newPayPassword = request()->newPayPassword;

        $code = session()->get( 'smsCode' );

        $this->validate( request(), [
            'smsCode' => 'required',
            'newPayPassword' => 'required|digits:6',
        ], [
            'smsCode.required' => '验证码不能为空',
            'newPayPassword.required' => '新的支付密码不能为空',
            'newPayPassword.digits' => '支付密码只能为六位整数',
        ] );

        if ( $userInputCode != $code ) {
            return redirect()->back()->with( [ 'error' => '验证码不正确' ] );
        }

        $user = User::find( auth()->id() );

        $user->code = md5( $newPayPassword );
        $user->save();

        session()->forget( 'smsCode' );

        return redirect()->back()->with( [ 'success' => '密码重置成功~' ] );
    }

    // 发送短信方法
    public function sendResetPasswordMessage()
    {
        $sms = new Sms();

        if ( $sms->send() ) {
            return [
                'errno' => 0
            ];
        }
        return [
            'errno' => 999,
            'errmsg' => '短信发送失败,请稍后重试~'
        ];
    }

}
