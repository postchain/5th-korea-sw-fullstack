@extends('layouts.master')

@section('content')
<div class="logo">
    <p style="text-align: center; cursor: pointer" onclick="window.location.href='{{ url('/') }}'"><img src="{{ asset('images/mainlogo.png') }}" /></p>
    <div class="checkbox">
        <p style="text-align: center"><img src="{{ asset('images/check.png') }}" height="124px" width="124px"></p>
    </div>
    <div>
        <p style="text-align: center; color: #ec2514; font-size: 30px; font-weight: bold">회원가입이 완료되었습니다</p>
    </div>
</div>
@stop
