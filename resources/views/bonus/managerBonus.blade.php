@extends('common.layouts')

@section('title')
    {{ $title }}
@stop

@section('content')
    <div class="row one-member welfare" style="margin-top: 70px;margin-bottom:80px;">
        <div class="col-md-12 col-sm-12 col-xs-12" style="padding:0;">
            <h1 style="margin-bottom: 0;background: #00a892;height: 50px;line-height: 50px;">近五天管理奖金</h1>

            @if( empty($data))
            <ul>
                <li class="col-md-12" style="padding:0; text-align: center;font-size: 1.2em;height: 100px;line-height: 100px;color:#ccc; border-bottom: 0;">你目前暂无管理奖金</li>
            </ul>

            @else
                @foreach( $data as $date=>$item )
            <table class="table table-bordered" style="margin-bottom: 10px;">
                <tbody>
                <tr>
                    <th width="15%" rowspan="100" style="text-align: center;border-left: 0;color: #333;">{{ $date }}</th>
                    <th width="15%" style="background: #dfdfdf;border-right:1px solid #fff;color:#666;">用户名</th>
                    <th width="15%" style="background: #dfdfdf;border-right:1px solid #fff;color:#666;">当日业绩</th>
                    <th width="15%" style="background: #dfdfdf;border-right:1px solid #fff;color:#666;">奖金</th>
                </tr>
                    @foreach( $item  as $v )
                        <tr>
                            <td>{{ $v['nickname'] }}</td>
                            <td>{{ $v['wxlevel'] }}</td>
                            <td>{{ $v['bouns'] }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
                @endforeach
            @endif

        </div>
    </div>
@stop