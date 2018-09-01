@extends('layouts.master')

@section('stylesheet')
<link rel="stylesheet" href="{{ asset('css/billboard.css') }}">
<style>
    body {
        background-color: #f2f4f7
    }

    .banner {
        width: 1174px;
        height: 90px;
        margin-top: -10px
    }

    .container {
        width: 1174px;
        margin: 10px auto 0 auto;
    }

    .wrapper {
        width: 1174px;
        margin: 13px 4px 16px auto;
        display: grid;
        grid-template-columns: 628px 216px 80px 80px 80px;
        grid-template-rows: 148px 111px 56px 84px 188px;
        grid-auto-rows: 100px;

    }

    .wrapper>div {
        background: #FFFFFF;
        border: 1px solid #ec2514;

    }

    .item8 {
        margin-top: 10px;
        grid-column-start: 1;
        grid-column-end: 2;
        grid-row-start: 4;
        grid-row-end: 6;
        margin-right: 10px;

    }

    .item9 {
        margin-top: 10px;
        grid-column-start: 2;
        grid-column-end: 3;
        grid-row-start: 4;
        grid-row-end: 6;
        margin-right: 10px;
        color: #7f7f7f;
        text-align: center;
    }

    .item10 {
        margin-top: 10px;
        grid-column-start: 3;
        grid-column-end: 7;
        grid-row-start: 4;
        grid-row-end: 6;
    }

    .item11 {
        grid-column-start: 3;
        grid-column-end: 7;
        grid-row-start: 5;
        grid-row-end: 6;
    }

    #profile {
        float: right;
        margin-left: 35px;
    }

    .item111 {
        grid-column-start: 3;
        grid-column-end: 7;
        grid-row-start: 1;
        grid-row-end: 2;
        margin-bottom: -6px;
        z-index: 111;
        padding-left: 20px;
        padding-right: 20px;
    }

    .item1111 {
        grid-column-start: 3;
        grid-column-end: 7;
        grid-row-start: 3;
        grid-row-end: 2;
        margin-bottom: -5px;
    }

    .login-form input {
        outline: none;
        border-top: none;
        width: 200px;
        margin-top: 5px;
        border: solid 1px #ff0000;
        height: 31px;
        padding-left: 10px;
    }

    .login-form .submit {
        width: 74px;
        height: 75px;
        background-color: #ec2514;
        border: solid 0.5px #ff0000;
        color: white;
        float: right;
    
        margin-top: -75px;
    }

    .toolbox {
        font-size: 13px
    }

    .item-menu {
        background-color: #fafafa;
    }

    .item-mini-1 {
        background-color: #fafafa;
        grid-column-start: 3;
        grid-column-end: 4;
        grid-row-start: 4;
        grid-row-end: 3;
        margin-bottom: -5px;
        z-index: -1;
    }
    .item-mini-2 {
        grid-column-start: 4;
        grid-column-end: 5;
        grid-row-start: 4;
        grid-row-end: 3;
        margin-bottom: -5px;
        z-index: -1;
    }
    .item-mini-3 {
        grid-column-start: 6;
        grid-column-end: 5;
        grid-row-start: 4;
        grid-row-end: 3;
        margin-bottom: -5px;
        z-index: -1;
    }
    .item-mini-4 {
        grid-column-start: 7;
        grid-column-end: 6;
        grid-row-start: 4;
        grid-row-end: 3;
        margin-bottom: -5px;
        z-index: -11;
    }


    .submit-button {
        width: 100px;
        height: 32px;
        background-color: #ffffff;
        border: solid 0.7px #ff0000;
        color: #ec584b;
        font-size: 17px;
        margin-top: -3px;
    }

    .submit-button:hover {
        background-color: #ec584b;
        color: white;
    }

</style>
@stop
@section('content')
<div class="container">
    @include('include.navbar')
    <div class="wrapper">
        <div class="item1" style="border: 0"><img src="{{ asset('images/homep.jpg') }}" height="320px" width="835px"></div>

        @if(Auth::User())
        <div class="item111">
            <h1>{{ Auth::User()->name }}님</h1>
            <p>우편수 <span style="color: green">{{ $allPosts }}</span>&nbsp;&nbsp;&nbsp;&nbsp; 미납수 <span style="color: green">{{
                    $unPaidCount }}</span><span style="float: right"><button class="submit-button" onclick="window.location.href='{{ route('get.logout') }}'">로그아웃</button></span></p>


        </div>
        <div class="item1111"></div>
        <div class="item1111" style="padding-left: 20px; padding-right: 20px">
            <div style="height: 68px">
                <?php $dt = explode('-', $dt); ?>
                <p style="letter-spacing: 2px; float: left">{{ $dt[0] }}년 {{ $dt[1] }}월분<br>납부하실 금액은</p>
                <p style="letter-spacing: 3px; float: right; height: 48px">고지서 요금 <img src="{{ asset('images/under_arrow.png') }}"
                        width="20"></p>
            </div>
            <div style="font-weight: bold; margin-top: -30px; float:right; margin-right: 26px;">
                @if(Auth::User())
                <h2>{{ $unPaidAllMoney }} <span>원</span></h2>
                @else
                <h2>- <span>원</span></h2>
                @endif
            </div>
        </div>
        <div class="item-menu item-mini-1">
            <p style="text-align: center">알림</p>
        </div>
        <div class="item-menu item-mini-2">
            <p style="text-align: center">메일</p>
        </div>
        <div class="item-menu item-mini-3">
            <p style="text-align: center">납부</p>
        </div>
        <div class="item-menu item-mini-4">
            <p style="text-align: center">페이</p>
        </div>
        @else
        <div class="item111">
            <input type="checkbox"><span style="font-weight: 200; font-size: 13px">로그인 상태 유지</span>
            <form class="login-form" action="{{ route('post.signin') }}" method="post">
                {{ csrf_field() }}
                <input type="email" name="email" placeholder="이메일을 입력하세요"><br>
                <input type="password" name="password" placeholder="비밀번호를 입력하세요"><br>
                <button type="submit" class="submit">로그인</button>
            </form>
            <div class="toolbox" style="cursor: pointer">
                <p style="float: left" onClick="window.location.href='{{ route('get.account') }}'">회원가입</p>
                <p style="float: right">이메일 ·비밀번호 찾기</p>
            </div>
        </div>
        <div class="item1111" style="padding-left: 20px; padding-right: 20px">
            <div style="height: 68px">
                <?php $dt = explode('-', $dt); ?>
                <p style="letter-spacing: 2px; float: left">{{ $dt[0] }}년 {{ $dt[1] }}월분<br>납부하실 금액은</p>
                <p style="letter-spacing: 3px; float: right; height: 48px">도시가스 요금 <img src="{{ asset('images/under_arrow.png') }}"
                        width="20"></p>
            </div>
            <div style="font-weight: bold; margin-top: -30px; float:right; margin-right: 26px;">
                <h2>- <span>원</span></h2>
            </div>
        </div>

        <div class="item-menu item-mini-1">
            <p style="text-align: center">알림</p>
        </div>
        <div class="item-menu item-mini-2">
            <p style="text-align: center">메일</p>
        </div>
        <div class="item-menu item-mini-3">
            <p style="text-align: center">납부</p>
        </div>
        <div class="item-menu item-mini-4">
            <p style="text-align: center">페이</p>
        </div>
        @endif
        <div class="item8">
            <img src="{{ asset('images/main_postchain.png') }}" height="262px" width="618px">
        </div>
        <div class="item9">
            <div style="padding-top: 23px;">
                <h3 style="font-weight: 400">포스트체인 콜센터</h3>
                <h1 style="font-weight: bold">1588-1300</h1>
                <div style="padding-right: 14px; padding-left: 17px;">
                    <p style="float: left; text-align: left; padding-left; 40px;">평일<br>토요일</p>
                    <p style="float: right; text-align: right">09:00 ~ 18:00<br>
                        10:00 ~ 14:00</p>
                </div>
            </div>
        </div>
        <div class="item10">
            <h2 style="font-weight: 400; text-align: center; margin-top: 3.4px">월별 사용 요금 비교</h2>
            <p style="text-align: right; padding-right: 25px; margin-top: -14px;">상하수도 사용 요금 <img src="{{ asset('images/under_arrow.png') }}"
                    width="20"></p>
        </div>
        @if(Auth::User())
        <div class="item11">
            <div id="chart"></div>
        </div>
        @else
        <div class="item11" style="background-color: #7f7f7f; opacity: 0.6">
            <h2 style="color: white; position: absolute; margin-left: 50px; margin-top: 70px;">로그인 후 사용해주세요</h2>
            <img src="{{ asset('images/graph.png') }}" height="180px" width="330px" grid-auto-rows="100px;">
        </div>
        @endif
    </div>
    <div class="banner">
        <img src="{{ asset('images/homepro.png') }}">
    </div>
    @stop

    @section('javascript')
    <script src="https://d3js.org/d3.v4.min.js"></script>
    <script src="{{ asset('js/billboard.js') }}"></script>
    <script>
        var chart = bb.generate({
            bindto: "#chart",
            data: {
                type: "line",
                columns: [
                    ["data1", 30, 200, 100, 170, 150, 250],
                    ["data2", 130, 100, 140, 35, 110, 50]
                ]
            }
        });

    </script>
    @stop
