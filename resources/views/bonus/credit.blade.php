@extends('common.layouts')

@section('title')
    {{ $title }}
@stop

@section('content')
    <div class="row one-member bonus" style="margin-top:70px;">
        <ul>
            <li class="col-md-6 col-sm-6 col-xs-6 jifen-top-til" style="padding:0;border-right:1px solid #d8d8d8;">
                <p class="top-img"><img src="/static/image/shop.png" alt=""></p>
                <p class="top-img2">消费积分余额</p>
                <p style="font-size: 1.2em"><strong>{{ $data['costCredit'] }}</strong>元</p>
            </li>
            <li class="col-md-6 col-sm-6 col-xs-6 jifen-top-til" style="padding:0;">
                <p class="top-img"><img src="/static/image/jifen.png" alt=""></p>
                <p class="top-img2">环润积分</p>
                <p style="font-size: 1.2em"><strong>0</strong>元</p>
            </li>
        </ul>
    </div>

    <div class="row one-member" style="box-shadow: none;">
        <ul>
            <li class="title income-title" style="height: 60px;line-height: 60px; font-weight: normal;">消费积分记录</li>
            <li class="col-md-12" style="padding:0;">
                <span class="col-md-6 member-til col-xs-6 col-sm-6" style="font-weight: normal;color: #f0685d;">金额(负为支出)</span>
                <span class="col-md-6 member-til col-xs-6 col-sm-6 no-line" style="font-weight: normal;color: #f0685d;">时间</span>
            </li>
            @foreach( $data['records'] as $record)
            <li class="col-md-12" style="padding:0;">
                <span class="col-md-6 col-xs-6 col-sm-6 jifen-bg">{{$record->costprice}}</span>
                <span class="col-md-6 col-xs-6 col-sm-6 no-line">{{$record->datey}}-{{ $record->datemon }}-{{$record->dated}}</span>
            </li>
            @endforeach
            {{ $data['records']->links('common.page') }}

        </ul>

    </div>
@stop