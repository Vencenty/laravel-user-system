@extends('common.layouts')

@section('title')
{{ $title }}
@stop

@section('content')
    @if( !empty(auth()->user()->hasOneQR->imgaddress))
        <div class="row second-wrap" style="padding-top: 0;margin-top:70px;">
            <div class="col-md-12 col-sm-12 col-xs-12 form-wrap" style="padding:0;">
                <img src="{{ auth()->user()->hasOneQR->imgaddress }}" alt="" style="display: block;margin:0 auto;width:100%;">
            </div>
        </div>
    @else
        @component('common.tips')
            @slot('text')
                请重新生成您的专属创新微销海报 <br> 注:请在千河商城服务号内，福利中心-微销海报生成。
            @endslot
        @endcomponent
    @endif


@stop