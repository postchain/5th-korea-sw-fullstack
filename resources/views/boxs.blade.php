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
        @if(isset($allJoinLists))
        @foreach($allJoinLists as $key=>$db)
        <?php
            $exp = explode('-', $db->a_date);
        ?>
        <div class="item{{ ++$key }}" onclick="window.location.href='{{ route('get.detail.box', [ 'id' => $db->n_id, 'category' => $db->category ] ) }}'" style="cursor: pointer">
            <h2 style="position: absolute; color: white; margin-left: 58px; margin-top: 9.8px;letter-spacing: 1px">{{
                $exp[0] }}년 {{ $exp[1] }}월</h2><img src="{{ asset('images/box/' . $db->category . '.png') }}" height="348px">
        </div>
        @endforeach
        @else
        <h2>비어있습니다.</h2>
        @endif 
    </div>
</div>
@stop
