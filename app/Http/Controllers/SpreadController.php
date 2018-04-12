<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SpreadController extends Controller
{
    /**
     * 返回立即推广模板并渲染数据
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $title = '立即推广';
        return view('spread.index', compact('title','qrcode'));
    }
}
