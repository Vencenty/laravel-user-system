@extends('common.layouts')

@section('title')
    {{ $title }}
@stop

@section('content')
    <div class="row one-member personal margin-seventy">
        <ul>
            <li class="title">个人网体业绩</li>
            {{--@if( $users->isEmpty() )--}}
            {{--<li class="col-md-12" style="padding:0; text-align: center;font-size: 1.2em;height: 100px;line-height: 100px;color:#ccc;">您目前暂无数据</li>--}}
            {{--@else--}}
            <div class="col-md-12 col-sm-12 col-xs-12" style="padding:30px 0 20px 0;border-bottom:1px solid #d8d8d8;">
                <div class="col-md-6 col-sm-6 col-xs-8" style="text-align: right;padding:0;font-size: 1.2em;font-weight: bold;">您目前的个人网体业绩：</div>
                <div class="col-md-6 col-sm-6 col-xs-4" style="font-size: 1.2em;font-weight: bold;color:red;padding:0;">{{ auth()->user()->selftotal }}元</div>
            </div>

            <div style="margin: 16px 0;padding: 0"  class="col-md-12 col-sm-12 col-xs-12">
                <span style="padding-right:0;text-align: right;width: 12%;display: inline-block">10万</span>
                <span style="padding-right:0;text-align: right;width: 18%;display: inline-block">50万</span>
                <span style="padding-right:0;text-align: right;width: 25%;display: inline-block">100万</span>
                <span style="padding-right:0;text-align: right;width: 40%;display: inline-block">200万</span>
            </div>
            <div style="padding:0 20px; margin-bottom: 10px;height:20px;background: #e9e9e9" class="col-md-12 col-sm-12 col-xs-12">
                <span style="position: absolute;background: red;left: 0;width: {{round(auth()->user()->selftotal/2000000,2)*100}}%;height: 100%;"></span>
            </div>
            <div style="padding:0 10px;height: 30px;" class="col-md-12 col-sm-12 col-xs-12">
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12">
                <ul>
                    <li class="title">个人网体总业绩</li>
                    <li class="col-md-12" style="padding:0;">
                        <span style="width: 50%" class="col-md-6 member-til col-xs-6 col-sm-6 title-left til-width">总人数</span>
                        <span style="width: 50%" class="col-md-6 member-til col-xs-6 col-sm-6 til-width">总业绩</span>
                    </li>
                    <li class="col-md-12" style="padding:0;">
                        <span style="width: 50%" class="col-md-6 col-xs-6 col-sm-6 title-left til-width">{{ $data['totalPeople'] ?? 0 }}</span>
                        <span style="width: 50%" class="col-md-6 col-xs-6 col-sm-6 til-width">{{ auth()->user()->selftotal }}</span>
                    </li>
                </ul>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12" style="margin-top: 10px;margin-bottom:15px;">
                <ul>
                    <li class="title">个人网体业绩超5万</li>
                    <li class="col-md-12" style="padding:0;">
                        <span style="width: 50%" class="col-md-6 member-til col-xs-6 col-sm-6 title-left">用户名</span>
                        <span style="width: 50%"  class="col-md-6 member-til col-xs-6 col-sm-6">业绩</span>
                    </li>
                    @foreach( $data['topFive'] as $item )
                        <li class="col-md-12 second-mem" style="padding:0;">
                            <span style="width: 50%" class="col-md-6 col-xs-6 col-sm-6 title-left">{{ $item['nickname'] }}</span>
                            <span style="width: 50%" class="col-md-6 col-xs-6 col-sm-6">{{ $item['selftotal'] }}</span>
                        </li>
                    @endforeach
                </ul>
            </div>
        </ul>

    </div>
@stop