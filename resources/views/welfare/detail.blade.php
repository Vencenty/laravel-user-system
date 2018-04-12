@extends('common.layouts')

@section('title')
{{$title}}
@stop

@section('content')
    <div class="row one-member welfare" style="margin-top: 70px;">
        <ul>
            <li class="title">直推业绩前五</li>

            <li class="col-md-12" style="padding:0;">
                <span class="col-md-3 member-til col-xs-3 col-sm-3;" style="color:red;font-size:0.9em;padding:0;">用户名</span>
                <span class="col-md-3 member-til col-xs-3 col-sm-3" style="color:red;font-size:0.9em;padding:0;">奖金总额</span>
                <span class="col-md-3 member-til col-xs-3 col-sm-3" style="color:red;font-size:0.9em;padding:0;">距5万差额</span>
                <span class="col-md-3 member-til col-xs-3 col-sm-3" style="color:red;font-size:0.9em;padding:0;">距10万差额</span>
            </li>
            @if( !$data )
                <li class="col-md-12" style="padding:0; text-align: center;font-size: 1.2em;height: 100px;line-height: 100px;color:#ccc;">您目前暂无数据</li>
            @else
                @foreach( $data as $agent )
                    <li class="col-md-12" style="padding:0;">
                        <span class="col-md-3 member-til col-xs-3 col-sm-3" style="font-size:0.9em;padding:0;">{{ str_limit($agent['nickname'],8 , '...') }}</span>
                        <span class="col-md-3 member-til col-xs-3 col-sm-3" style="font-size:0.9em;padding:0;">{{ $agent['bouns'] }}</span>
                        <span class="col-md-3 member-til col-xs-3 col-sm-3" style="font-size:0.9em;padding:0;">{{ round(50000-$agent['bouns'],2) < 0 ? 0 : round(50000-$agent['bouns'],2)}}</span>
                        <span class="col-md-3 member-til col-xs-3 col-sm-3" style="font-size:0.9em;padding:0;">{{ round(100000-$agent['bouns'],2) < 0 ? 0 : round(100000-$agent['bouns'],2) }}</span>
                    </li>
                @endforeach
            @endif

        </ul>

    </div>
@stop