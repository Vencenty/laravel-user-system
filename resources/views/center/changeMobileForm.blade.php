@extends('common.layouts')

@section('title')
    {{$title}}
@stop

@section('content')
    <div class="row welfare" style="margin-top: 80px; margin-bottom: 80px;margin-left: 0;margin-right: 0;">
        <form action="" style="margin:0 10px;">
            <div class="col-md-12 col-sm-12 col-xs-12 phone-change">
                <strong>您推荐人手机号：</strong>
                <input type="text">
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12 phone-change">
                <strong>推荐人验证码：</strong>
                <input type="text"  style="width:95px;">
                <button>获取验证码</button>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12 phone-change">
                <strong>原手机号：</strong>
                <input type="text" placeholder="13268539658" disabled>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12 phone-change">
                <strong>新手机号：</strong>
                <input type="text">
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12 phone-change">
                <strong>新手机验证码：</strong>
                <input type="text"  style="width:95px;">
                <button>获取验证码</button>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12" style="padding-left:0;line-height: 28px;">
                更改手机号流程：
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12 phone-change-pro">
                1、输入推荐人/新手机号验证码。
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12 phone-change-pro">
                2、点击立即修改，支付100元手续费用。
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12 phone-change-pro">
                3、支付完毕，手机号即刻修改生效。
            </div>
            <button class="col-md-12 col-sm-12 col-xs-12 change-sub">立即修改</button>
        </form>
    </div>
@stop
