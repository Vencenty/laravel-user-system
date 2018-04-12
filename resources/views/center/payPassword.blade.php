@extends('common.layouts')

@section('title')
    {{$title}}
@stop

@section('content')
    @if( !auth()->user()->code )
        <div class="row welfare" style="margin-top: 80px; margin-bottom: 80px;margin-left: 0;margin-right: 0;">
            <form action="/center/setPayPassword" method="post" style="margin:0 10px;">
                {{ csrf_field() }}
                <div class="col-md-12 col-sm-12 col-xs-12 phone-change">
                    <strong>设置支付密码：</strong>
                    <input type="password" name="pay" placeholder="请输入您的支付密码" style="width:187px;">
                </div>

                <div class="col-md-12 col-sm-12 col-xs-12 phone-change">
                    <strong>确认支付密码：</strong>
                    <input type="password" name="pay_confirmation" placeholder="再次输入您的支付密码" style="width:187px;">
                </div>

                <button class="col-md-12 col-sm-12 col-xs-12 change-sub">立即提交</button>
            </form>
        </div>
    @else
        @component('common.tips')
            @slot('text')
                支付密码设置成功
                <a href="/home" class="back-button">返回</a>
            @endslot
        @endcomponent
    @endif

@stop
