<?php

namespace App\Http\Controllers;

use App\Bonus;
use Illuminate\Http\Request;

class WelfareController extends Controller
{
    /**
     * 返回福利中心模板并且渲染数据
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $data = Bonus::getIWelfareData();
        $title = '福利奖项';
        return view('welfare.index', compact('title','data'));
    }

    /**
     * 福利奖详情
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function detail()
    {
        $data = Bonus::getWelfareDetail();

        $title = '福利奖详情';
        return view('welfare.detail', compact('title','data'));
    }
}
