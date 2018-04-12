<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/loginForm', 'UserController@loginForm');
Route::post('/login', 'UserController@login');
Route::get('/logout', 'UserController@logout');

Route::get('/clear',function () {
    session()->flush();
});

/**
 * 查询端首页各种页面
 */
Route::prefix('home')->middleware('verifyLogin')->group( function () {
    Route::get('/', 'HomeController@index');
    Route::get('/upGrade', 'HomeController@upGrade');
    Route::get('/bonusQuery', 'HomeController@bonusQuery');
    Route::get('/income', 'HomeController@income');
    Route::get('/staticBonus', 'HomeController@staticBonus');
    Route::get('/yesterdayShare', 'HomeController@yesterdayShare');
    Route::get('/yesterdayBonus', 'HomeController@yesterdayBonus');
    Route::get('/fgDetail', 'HomeController@fgDetail');
});

// 奖金管理路由
Route::prefix('bonus')->middleware('verifyLogin')->group(function () {
    Route::get('/', 'BonusController@index');
    Route::get('/firstGenerationPeople', 'BonusController@firstGenerationPeople');
    Route::get('/secondGenerationPeople', 'BonusController@secondGenerationPeople');
    Route::get('/credit', 'BonusController@credit');
    Route::get('/managerBonus', 'BonusController@managerBonus');
    Route::get('/personalNet', 'BonusController@personalNet');
    Route::get('/teamNet', 'BonusController@teamNet');

    // 奖金提现路由
    Route::group(['middleware'=>'check.payPassword'], function(){
        Route::get('/transfer', function(){
            return redirect('http://pt.hrkj1319.com/app/index.php?i=4&c=entry&m=ewei_shopv2&do=mobile&r=member.withdraw&type=3');
        });

        Route::get('/withdraw', function(){
            return redirect('http://pt.hrkj1319.com/app/index.php?i=4&c=entry&m=ewei_shopv2&do=mobile&r=member.withdraw&type=4');
        });

        Route::get('/fg', function(){
            return redirect('http://pt.hrkj1319.com/app/index.php?i=4&c=entry&m=ewei_shopv2&do=mobile&r=member.withdraw&type=5');
        });
    });

});

/**
 * 福利奖项路由
 */
Route::prefix('welfare')->middleware('verifyLogin')->group(function () {
    Route::get('/', 'WelfareController@index');
    Route::get('/detail', 'WelfareController@detail');
    // 十五万的小汽车
    Route::get('/car15', function(){
        $title = '汽车详情';
        return view('welfare.car15',compact('title'));
    });
    // 四十万的小汽车
    Route::get('/car40', function(){
        $title = '汽车详情';
        return view('welfare.car40', compact('title'));
    });
});

/**
 * 立即推广路由
 */
Route::prefix('spread')->middleware('verifyLogin')->group(function () {
    Route::get('/', 'SpreadController@index');
});

/**
 * 会员中心路由
 */
Route::prefix('center')->middleware('verifyLogin')->group(function () {
    Route::get('/', 'CenterController@index');
    // 设置支付密码表单
    Route::get('/payPassword', 'CenterController@payPassword');
    // 设置支付密码逻辑处理
    Route::post('/setPayPassword', 'CenterController@setPayPassword');

    // 重置支付密码表单
    Route::get('/resetPayPasswordForm', 'CenterController@resetPayPasswordForm');
    // 重置支付密码的逻辑处理
    Route::post('/resetPayPassword', 'CenterController@resetPayPassword');
    // 安全问题展示界面
    Route::get('/safeQuestion', 'CenterController@safeQuestion');
    // 安全问题逻辑逻辑处理
    Route::post('/setSafeQuestion', 'CenterController@setSafeQuestion');
    Route::get('/changeMobileForm', 'CenterController@changeMobileForm');


    // 发送短信
    Route::any('/sendResetPasswordMessage', 'CenterController@sendResetPasswordMessage');
});



/**
 * 模板路由,页面失踪,建站等页面
 */

Route::view('/exception/build','exception.build');
