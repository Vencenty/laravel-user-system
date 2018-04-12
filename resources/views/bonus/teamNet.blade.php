@extends('common.layouts')

@section('title')
    {{ $title }}
@stop

@section('content')
    <div class="row one-member personal margin-seventy">
        <div class="col-md-12 col-sm-12 col-xs-12" style="padding:30px 0 20px 0;border-bottom:1px solid #d8d8d8;">
            <div class="col-md-6 col-sm-6 col-xs-8" style="text-align: right;padding:0;font-size: 1.2em;font-weight: bold;">您目前的团队网体业绩：</div>
            <div class="col-md-6 col-sm-6 col-xs-4" style="font-size: 1.2em;font-weight: bold;color:red;padding:0;">{{ auth()->user()->grouptotal }}</div>
        </div>
        <div style="padding:20px 10px;" class="col-md-12 col-sm-12 col-xs-12">
            <div class="col-md-4 col-sm-4 col-xs-4" style="padding-right:0;text-align: right;">400万</div>
            <div class="col-md-4 col-sm-4 col-xs-4" style="padding-right:0;text-align: right;">800万</div>
            <div class="col-md-4 col-sm-4 col-xs-4" style="padding-right:0;text-align: right;">1600万</div>
        </div>
        <div style="padding:0 20px; margin-bottom: 10px;height:20px;" class="col-md-12 col-sm-12 col-xs-12">
            <div style="padding:0 20px; margin-bottom: 10px;height:20px;background: #e9e9e9" class="col-md-12 col-sm-12 col-xs-12">
                <span style="position: absolute;background: red;left: 0;width: {{round(auth()->user()->grouptotal/16000000,2)*100}}%;height: 100%;"></span>
            </div>
        </div>
        <div class="col-md-12 col-sm-12 col-xs-12">
            <ul>
                <li class="title">团队网体业绩</li>
                <li class="col-md-12" style="padding:0;">
                    <span class="col-md-6 member-til col-xs-6 col-sm-6 title-left til-width">团队网体总人数</span>
                    <span class="col-md-6 member-til col-xs-6 col-sm-6 til-width">您的滑落业绩</span>
                </li>
                <li class="col-md-12 second-mem" style="padding:0;">
                    <span class="col-md-6 col-xs-6 col-sm-6 title-left til-width">{{ $data['totalPeople'] }}</span>
                    <span class="col-md-6 col-xs-6 col-sm-6 til-width">{{ $data['slipBonus'] }}</span>
                </li>
            </ul>
        </div>
        <div class="col-md-12 col-sm-12 col-xs-12" style="margin-top: 10px;margin-bottom:15px;">
            <ul>
                <li class="title">团队网体业绩超5万</li>
                <li class="col-md-12" style="padding:0;">
                    <span style="padding: 0" class="col-md-4 member-til col-xs-4 col-sm-4 title-left">用户名</span>
                    <span  style="padding: 0"  class="col-md-4 member-til col-xs-4 col-sm-4">累计业绩</span>
                    <span style="padding: 0"  class="col-md-4 member-til col-xs-4 col-sm-4">个人网体业绩</span>
                </li>
                @foreach( $data['users'] as $user)
                    <li class="col-md-12 second-mem" style="padding:0;">
                        <span class="col-md-4 col-xs-4 col-sm-4 title-left">{{ $user['nickname'] }}</span>
                        <span class="col-md-4 col-xs-4 col-sm-4">{{ $user['grouptotal'] }}</span>
                        <span class="col-md-4 col-xs-4 col-sm-4">{{ $user['selftotal'] }}</span>
                    </li>
                @endforeach
            </ul>
        </div>

    </div>
@stop