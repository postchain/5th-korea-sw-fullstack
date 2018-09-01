@extends('layouts.master')

@section('stylesheet')
<style>
    .payTitle {
        font-size: 50px;
        font-weight: bold;
        font-style: normal;
        font-stretch: normal;
        line-height: normal;
        letter-spacing: 12px;
        text-align: center;
        color: #ec584b;
        padding: 45px 10px 41px 10px;
    }

    #payco {
        width: 200px;
        height: 45px;
    }

    .Rectangle-3 {
        width: 331px;
        height: 148px;
        background-color: #ffffff;
        border: solid 0.5px #ff0000;
        display: inline-block;
        margin-left: 10px;
        margin-right: 10px;
        margin-top: 30px;
        text-align: center;
    }

    #npay-big {
        width: 142px;
        height: 56px;
    }

    .payinfo {
        font-size: 30px;
        font-weight: bold;
        font-style: normal;
        font-stretch: normal;
        line-height: normal;
        letter-spacing: 2px;
        float: left;
        text-align: left;
        margin-top: 80px;
        color: #f24536;
        margin-left: 8%;
    }


    .payinfo2 {
        font-size: 30px;
        font-weight: bold;
        font-style: normal;
        font-stretch: normal;
        line-height: normal;
        float: right;
        letter-spacing: 2px;
        margin-right: 10%;
        text-align: left;
        margin-top: 80px;
        color: #f24536;

    }

    .letter1 {
        font-size: 24px;
        font-weight: normal;
        font-style: normal;
        font-stretch: normal;
        line-height: normal;
        float: none;
        letter-spacing: 4.8px;
        /* margin-left: 5%; */
        text-align: left;
        margin-top: 55px;
        color: #ec584b;
    }

    .letter2 {
        font-size: 24px;
        font-weight: normal;
        font-style: normal;
        font-stretch: normal;
        line-height: normal;
        float: none;
        letter-spacing: 4.8px;
        /* margin-left: 5%; */
        text-align: left;
        margin-top: 60px;
        color: #ec584b;
    }

    .letter3 {
        font-size: 24px;
        font-weight: normal;
        font-style: normal;
        font-stretch: normal;
        line-height: normal;
        float: none;
        letter-spacing: 4.8px;
        margin-right: 5%;
        text-align: left;
        margin-top: 60px;
        color: #ec584b;
    }

    hr {
        width: 426px;
        height: 2px;
        background-color: #ff0000;
        border: solid 0.7px #ff0000;
        margin-top: 60px;
    }

    .bottom {
        width: 527px;
        height: 13px;
        font-size: 14px;
        font-weight: 300;
        font-style: normal;
        font-stretch: normal;
        line-height: normal;
        letter-spacing: 2.8px;
        text-align: none;
        margin-left: 30%;
        color: #000000;
    }

    .redbox {
        width: 1170px;
        height: 117px;
    }

    .layer {
        width: 200px;
        height: 45px;
    }

    .outer {
        width: 100%;
        height: 100%;
    }

    .inner {
        vertical-align: middle;
        text-align: center;
    }

    .centered {
        position: relative;
        display: inline-block;
        width: 50%;
        padding: 1em;
        background: white;
    }

    .input {
        width: 200px;
        outline: none;
        border: none;
        border-bottom: 1px solid #ec2514;
        width: 350px;
        font-size: 20px;
        padding-left: 5px;
        padding-bottom: 4px;
    }

</style>

@stop
@section('content')
<div class="container">
    <div class="outer">
        <div class="inner">
            <div class="payTitle">납부하기</div>
            <div>
                <span style="background: white; padding :41px 11px 30px 11px; text-align:center">결제 수단을 선택해주세요</span>
            </div>
            <div class="Rectangle-3"><img src="{{ asset('images/npay.png') }}"></div>
            <div class="Rectangle-3"><img src="{{ asset('images/gpay.png') }}"></div>
            <div class="Rectangle-3"><img src="{{ asset('images/payco.png') }}"></div>
            <div style="height: 600px">
                <div class="payinfo">납부 정보
                    <div class="letter1">이름</div>
                    <input class="input">
                    <div class="letter2">주소</div>
                    <input class="input">
                </div>
                <div class="payinfo2">결제 정보
                    <div class="letter3">카드번호</div>
                    <input class="input">
                    <div class="letter2">카드 유효 날짜</div>
                    <input class="input">
                    <div class="letter2">비밀번호</div>
                    <input class="input">
                </div>
            </div>
        </div>
    </div>
</div>


@stop
