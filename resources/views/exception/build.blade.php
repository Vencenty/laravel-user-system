@extends('common.layouts')


@section ('content')
    @component('common.tips')
        @slot('text')
            精彩即将呈现...
        @endslot
    @endcomponent
@stop