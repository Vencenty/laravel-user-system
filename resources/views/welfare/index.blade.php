@extends('common.layouts')

@section('content')
    <div class="row four" style="margin:0; margin-top:50px;">
        <div class="col-md-12 col-xs-12 col-sm-12 team team-2" style="padding:0; width:99%;">
            <a href="/welfare/detail">
                <p style="background: url(/static/image/12.png) right center no-repeat;height: 54px;"></p>
            </a>
            <h3 class="money-title" style="height: 40px;line-height: 20px;">福利奖</h3>
            <div class="team-l col-md-6 col-sm-6 col-xs-6" style="padding:0;">
                <h4 style="font-weight: bold; font-size: 1.2em;margin-top: 10px;"><span>{{ $data['firstGenerationPeople'] }}</span>人</h4>
                <h5>直推人数</h5>
            </div>
            <div class="team-r col-md-6 col-sm-6 col-xs-6" style="padding:0;">
                <h4 style="font-weight: bold; font-size: 1.2em;margin-top: 10px;"><span>{{ auth()->user()->grouptotal }}</span>元</h4>
                <h5>团队业绩</h5>
            </div>
            <div class=" col-md-12 col-sm-12 col-xs-12" style="padding:0;">
                <ul>
                    <a href="/welfare/car40" target="_self"><li class="team-icon"></li>
                        <li>15万元新能源汽车(200万以上)</li>
                        <li class="line-br">
                            <div id="car1" style="height:16px;width: 80%;margin: 0 auto;background: #d8d8d8;-webkit-border-radius: 10px;-moz-border-radius: 10px;border-radius: 10px;position: relative;">
                            <span style="background: green; width:{{ $data['progress_car_15'] }}%">

                            </span>
                            </div>
                        </li>
                    </a>
                    <a href="/welfare/car40" target="_self"><li class="team-icon"></li></a>
                    <li>40万元新能源汽车(500万以上)</li>
                    <li>
                        <div id="car1" style="height:16px;width: 80%;margin: 0 auto;background: #d8d8d8;-webkit-border-radius: 10px;-moz-border-radius: 10px;border-radius: 10px;position: relative;">
                            <span style="background: green; width:{{ $data['progress_car_40'] }}%">

                            </span>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>

@stop