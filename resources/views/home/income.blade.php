@extends('common.layouts')

@section('title')
    {{ $title }}
@stop

@section('content')
    <div class="row income" style="margin:0;margin-top:70px;">
        <div class="income-top col-md-6 col-sm-6 col-xs-6 income-top-1">
            <p style="background: url(/static/img/click.png) center center no-repeat; height: 50px;"></p>
            <h3>已提现部分</h3>
            <span>{{ $data['bonus'] }}元</span>
        </div>
        <div class="income-top col-md-6 col-sm-6 col-xs-6">
            <p style="background: url(/static/img/dongjie.png) center center no-repeat; height: 50px;"></p>
            <h3>冻结部分</h3>
            <span>{{ $data['frozen'] }}元</span>
        </div>
    </div>
    <div class="row one-member" style="box-shadow: none;">
        <ul>
            <li class="title income-title">已提现记录</li>

            <li class="col-md-12" style="padding:0;">
                <span class="col-md-4 member-til col-xs-4 col-sm-4" style="width:35%;">收款方</span>
                <span class="col-md-4 member-til col-xs-4 col-sm-4" style="width:35%;">金额</span>
                <span class="col-md-4 member-til col-xs-4 col-sm-4" style="width:30%;border-right: 0;">时间</span>
            </li>
            @if( !$data['records']->isEmpty() )
            @foreach( $data['records'] as $record )
            <li class="col-md-12" style="padding:0;">
                <span class="col-md-4 member-til col-xs-4 col-sm-4" style="width:35%;color: #000;">
                    @if( $record->logmobile != 0)
                        {{ $record->logmobile}}
                    @else
                        {{$record->bankname }}
                    @endif
                </span>
                <span class="col-md-4 member-til col-xs-4 col-sm-4" style="width:35%;color: #000;">{{ $record->realmoney }}</span>
                <span class="col-md-4 member-til col-xs-4 col-sm-4 member-til-time" style="width:30%;color: #000;border-right: 0;">{{ date('Y.m.d',$record->createtime) }}
                    <br>{{ date('H:i:s',$record->createtime) }}</span>
            </li>
            @endforeach
            {{ $data['records']->links('common.page') }}

            @else
                <li class="col-md-12" style="padding:0; text-align: center;font-size: 1.2em;height: 100px;line-height: 100px;color:#ccc; border-bottom:0;">您目前暂无提现记录</li>
            @endif
        </ul>
    </div>
@stop