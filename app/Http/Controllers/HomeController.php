<?php

namespace App\Http\Controllers;

use App\Bonus;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    /**
     * 获取用户数据渲染查询端首页模板
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        // 获取首页数据
        $data = Bonus::getHomeData();

        $title = '环润创新微销';
        return view('home.index', compact('data', 'title', 'head'));
    }

    /**
     * 返回注册升级界面
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function upGrade()
    {
        $wxlevel = auth()->user()->wxelevel;

        $title = '起步升级';
        return view('home.upGrade', compact('title', 'wxlevel'));
    }

    /**
     * 返回奖金查询模板
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function bonusQuery()
    {
        $data = Bonus::getBonusQueryData();

        $title = '奖金查询';
        return view('home.bonusQuery', compact('title', 'data'));
    }

    /**
     * 返回 总收入(个人) 模板
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function income()
    {
        $data = Bonus::getIncome();

        $title = '总收入(个人)';
        return view('home.income', compact('title', 'data'));
    }

    /**
     * 返回 总收益(静态) 模板
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function staticBonus()
    {
        $data = Bonus::getStaticBonus();
        $title = '总收益(静态)';
        return view('home.staticBonus', compact('title', 'data'));
    }

    /**
     * 返回 前日分红 模板
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View\
     */
    public function yesterdayShare()
    {
        $data = Bonus::getYesterdayShare();
        $title = '前日分红';
        return view('home.yesterdayShare', compact('title', 'data'));
    }

    /**
     * 返回 前日奖金 模板
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function yesterdayBonus()
    {
        $data = Bonus::getYesterdayBonus();
        $title = '前日奖金';
        return view('home.yesterdayBonus', compact('title', 'data'));
    }


    /**
     * 复购积分明细
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function fgDetail()
    {

        // 扣除的钱
        $data = auth()->user()->hasManyTransferLog()
            ->where('rechargetype', 'fgbouns')
            ->orderBy('createtime', 'desc')
            ->paginate(30);

        $title = '复购转账记录';
        return view('home.fgDetail', compact('title', 'data'));
    }

}


