<?php

namespace App\Http\Controllers;

use App\Bonus;
use Illuminate\Http\Request;

class BonusController extends Controller
{
    /**
     * 返回奖金管理页面并渲染数据
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $data = Bonus::getBonusData();

        $title = '奖金管理';
        return view('bonus.index', compact('title', 'data'));
    }

    /**
     * 获取一代分享人信息
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function firstGenerationPeople()
    {
        $data = Bonus::getFirstGenerationPeopleData();

        $title = '一代分享人';
        return view('bonus.firstGenerationPeople', compact('title', 'data'));
    }

    /**
     * 返回第二代分享人信息
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function secondGenerationPeople()
    {

        $data = Bonus::getSecondGenerationPeopleData();
        $title = '二代分享人';
        return view('bonus.secondGenerationPeople', compact('title', 'data'));
    }

    /**
     * 获取积分明细信息
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function credit()
    {
        $data = Bonus::getCreditData();

        $title = '积分明细';
        return view('bonus.credit', compact('title', 'data'));
    }

    /**
     * 获取管理奖金数据
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function managerBonus()
    {
        $data = Bonus::getManagerBonusData();
        $title = '管理奖金';
        return view('bonus.managerBonus', compact('title', 'data'));
    }

    /**
     * 个人网体奖金数据
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function personalNet()
    {
        $data = Bonus::getPersonalNetData();
        $title = '个人网体奖金';
        return view('bonus.personalNet', compact('title', 'data'));
    }

    /**
     * 团队网体业绩数据
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function teamNet()
    {
        $data = Bonus::getTeamNetData();

        $title = '团队网体奖金';
        return view('bonus.teamNet', compact('title', 'data'));
    }
}
