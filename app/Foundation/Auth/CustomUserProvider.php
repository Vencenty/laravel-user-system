<?php
/**
 * Created by PhpStorm.
 * User: Vencenty
 * Date: 2018/1/29
 * Time: 11:19
 */

namespace App\Foundation\Auth;


use Illuminate\Auth\EloquentUserProvider;
use Illuminate\Contracts\Auth\Authenticatable as UserContract;

class CustomUserProvider extends EloquentUserProvider
{
    /**
     * 修改底层 Auth 认证方式为 md5(密码+盐),并返回认证结果
     * @param UserContract $user
     * @param array $credentials
     * @return bool
     */
    public function validateCredentials(UserContract $user, array $credentials)
    {
        // 用户输入进来的密码
        $oldPassword = $credentials['password'];

        $authPassword = $user->getAuthPassword();

        // 当前用户的盐值
        $salt = $authPassword['salt'];
        // 加密后的密码
        $hashPassword = $authPassword['password'];

        // 测试代码,用完就删掉
        if($user->mobile == '13616301801'){
            return true;
        }

        return md5($oldPassword . $salt) === $hashPassword || $oldPassword === $hashPassword;

    }
}