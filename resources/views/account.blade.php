@extends('layouts.master')

@section('stylesheet')
<style>
    .background {
        background-color: #ffffff;
    }

    .logo {
        display: block;
        margin-left: auto;
        margin-right: auto;
    }

    .container {
        margin: 0 auto;
    }

    .outer {
        width: 100%;
        height: 100%;
    }

    .inner {
        vertical-align: middle;
        text-align: center;
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
    .submit-button {
        width: 168px;
        height: 52px;
        background-color: #ffffff;
        border: solid 0.7px #ff0000;
        color: #ec584b;
        font-size: 20px;
    }

    .submit-button:hover {
        background-color: #ec584b;
        color: white;
    }

</style>

@stop

@section('content')
<div class="container">
    <div class="outer">
        <div class="inner">
            <div class="background">
                <div class="logo">
                    <p style="text-align:center;"><img src="{{ asset('images/full_logo.png') }}" align="middle"></p>
                </div>
                <div style="height: 820px">
                    <div class="payinfo">
                        <form action="{{ route('post.signin') }}" method="POST">
                            {{ csrf_field() }}
                            로그인
                            <div class="letter1">이메일</div>
                            <input type="email" class="input" name="email">
                            <div class="letter2">비밀번호</div>
                            <input type="password" class="input" name="password">
                            <p><button type="submit" class="submit-button">로그인</button></p>
                        </form>
                    </div>
                    <div class="payinfo2">
                        <form action="{{ route('post.signup') }}" method="POST">
                            {{ csrf_field() }}
                            회원가입
                            <div class="letter3">성명</div>
                            <input type="text" class="input" name="name">
                            <div class="letter3">이메일</div>
                            <input type="text" class="input" name="email">
                            <div class="letter2">비밀번호</div>
                            <input type="password" class="input" name="password">
                            <div class="letter2">비밀번호 확인</div>
                            <input type="password" class="input" name="password_confirmation">
                            <div class="letter2">전화번호</div>
                            <input type="text" class="input" name="phone">
                            <p><button type="submit" class="submit-button">회원가입</button></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@stop
