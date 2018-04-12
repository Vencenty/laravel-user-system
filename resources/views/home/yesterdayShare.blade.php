@extends('common.layouts')

@section('title')
    {{ $title }}
@stop

@section('content')
    @component('home._form')
        @slot('frozen')
            {{ $data['frozen'] }}
        @endslot
        @slot('unfrozen')
            {{ $data['unfrozen'] }}
        @endslot
    @endcomponent
@stop