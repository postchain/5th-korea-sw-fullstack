@extends('layouts.master')

@section('stylesheet')
<style>
    body {
        background-color: #f2f4f7
    }

    .wrapper {
        width: 1173px;
        margin: 10px auto 0px 40px;
        display: grid;
        /*grid grid-template-columns: 1fr 1fr 1fr;*/
        grid-template-columns: 260px 260px 260px 260px;
        grid-template-rows: 348px 348px;
        grid-gap: 20px;
        grid-auto-rows: 100px;
        margin-top: 30px;

    }

    .wrapper>div {
        background: #FFFFFF;
        /* border: 1px solid #ec2514; */
    }

</style>
@stop

@section('content')
<div class="container">
    @include('include.navbar')
    <div class="wrapper">
        <h2>비어있습니다.</h2>
    </div>
</div>
@stop
