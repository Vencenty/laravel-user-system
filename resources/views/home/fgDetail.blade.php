@extends('common.layouts')

@section('title')
    {{ $title }}
@stop

@section('content')
    <div class="row one-member" style="box-shadow: none; margin-top: 80px;">
        <ul>
            <li class="title income-title">转账记录</li>
            @if( !$data->isEmpty() )
                <li class="col-md-12" style="padding:0;">
                    <span class="col-md-4 member-til col-xs-4 col-sm-4" style="width:35%;">收款方</span>
                    <span class="col-md-4 member-til col-xs-4 col-sm-4" style="width:35%;">金额</span>
                    <span class="col-md-4 member-til col-xs-4 col-sm-4" style="width:30%;border-right: 0;">时间</span>
                </li>
                @foreach( $data as $record )
                    <li class="col-md-12" style="padding:0;">
                        <span class="col-md-4 member-til col-xs-4 col-sm-4" style="width:35%;color: #000;">
                             @if( $record->logmobile != 0)
                                {{ $record->logmobile}}
                            @else
                                {{$record->bankname }}
                            @endif
                        </span>
                        <span class="col-md-4 member-til col-xs-4 col-sm-4" style="width:35%;color: #000;">{{ $record->realmoney }}</span>
                        <span class="col-md-4 member-til col-xs-4 col-sm-4 member-til-time" style="width:30%;color: #000;border-right: 0;">{{ date('Y-m-d',$record->createtime) }}<br>{{ date('H:i:s', $record->createtime) }}</span>
                    </li>
                @endforeach
                {{ $data->links('common.page') }}
            @else
                <li class="col-md-12" style="padding:0; text-align: center;font-size: 1.2em;height: 100px;line-height: 100px;color:#ccc; border-bottom:0;">
                    您目前暂无转账记录
                </li>
            @endif
        </ul>
    </div>
@stop