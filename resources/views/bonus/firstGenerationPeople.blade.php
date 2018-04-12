@extends('common.layouts')

@section('title')
    {{ $title }}
@stop

@section('content')
    <div class="row one-member" style="box-shadow: none;margin-top: 70px;">
        <ul>
            <li class="col-md-12" style="padding:0;">
                <span class="col-md-6 member-til  col-xs-6 col-sm-6 member-til-top">分享人</span>
                <span class="col-md-6 member-til col-xs-6 col-sm-6 stratic-bonus member-til-right">分享所得奖励</span>
            </li>

            @if( !$data->isEmpty() )

                @foreach( $data as $item )
                <li class="col-md-12" style="padding:0;">
                    <span class="col-md-6 member-til  col-xs-6 col-sm-6" style="color: #000;">{{ $item->nickname }}</span>
                    <span class="col-md-6 member-til col-xs-6 col-sm-6 stratic-bonus" style="color: #000;">
                         @if(in_array($item->wxlevel, [1,0]))
                             0
                        @else
                            {{ $item->wxlevel * 0.15}}
                        @endif
                    </span>
                </li>
                @endforeach
            @else
                <li class="col-md-12 under-line" style="padding:0; text-align: center;font-size: 1.2em;height: 100px;line-height: 100px;color:#ccc;">您目前暂无一代推荐人</li>
            @endif
        </ul>
    </div>
@stop