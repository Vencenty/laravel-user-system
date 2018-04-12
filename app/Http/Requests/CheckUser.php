<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CheckUser extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'mobile'   => 'required|digits:11',
            'password' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'mobile.required'   => '手机号码不能为空',
            'mobile.digits'     => '手机号码格式不正确',
            'password.required' => '密码不能为空',
        ];
    }
}
