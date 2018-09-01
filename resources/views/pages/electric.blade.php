@extends('layouts.master')

@section('stylesheet')
<style>
    .content1 {
        display: flex;
        width: 1173px;
        margin: 10px auto 0 auto;
        border-bottom: 2px solid #ec2514;
        padding-left: 20px;
        font-size: 20px;
        font-weight: bold;

    }

    .content2 {
        display: flex;
        width: 1173px;
        margin: 10px auto 0 auto;
        padding-left: 20px;
    }

    .payment {
        margin-top: 20px;
        border-right: 2px solid #ec2514;
        flex-basis: 586px;
        flex-shrink: 0;
        padding-right: 20px;
        font-size: 22px;
        font-weight: normal;
    }

    #police {
        float: right;
        margin-right: 20px;
        margin-top: -85px;
    }

    .info {
        padding: 20px;
        font-size: 25px;
        font-weight: normal;

    }

    #car {
        float: right;
        margin-left: 20px;
        margin-top: 35px;
        margin-bottom: 20px;
    }

    .violation {
        margin-top: 10px;
        padding: 20px;
        font-size: 17px;
        font-weight: normal;

    }

    #QR {
        padding-left: 100px;

    }

    .full {
        margin-top: 10px;
        font-size: 28px;
        font-weight: bold;
        text-align: center;
        padding-left: 120px;
        padding-bottom: 30px;
        padding-top: 10px;
        color: #f24536;
        letter-spacing: 20px;
    }

    .liner {
        margin-top: 20px;

        flex-basis: 586px;
        flex-shrink: 0;
        padding-right: 20px;
        font-size: 22px;
        font-weight: normal;
    }

    .bg {
        background-color: #F0ACA8;
        height: 50px;
    }

    .bill {
        font-size: 23px;
    }

    .content3 {
        margin-top: 5px;
        margin-left: 20px;
    }

    .btds {
        border-top: 2px solid #ec2514;
        border-bottom: 2px solid #ec2514;
    }

    header {
        width: 1173px;
        margin: 10px auto 0 auto;
        border-bottom: 4px solid #ec2514;
        padding-left: 20px;
        font-size: bolder;
    }

</style>
@stop

@section('content')
@include('include.navbar')
<div class="container">
    <header>
        <h1 style="color: #ec2514">전기요금 청구 및 영수</h1>
        <img src="{{ asset('images/box/electric_detail.png') }}" height="80px" width="278px" id="police">
    </header>

    <section class="content1">
        <div class="info">
            <div style="float: left; width: 647px">
                대상자 : {{ $customer->name }} 님<br><br>
                전기사용장소 : {{ $detail->address }}
            </div>
            <div style="float: right">
                고객번호 : {{ substr(hash('sha256', $detail->email), 50) }}
            </div>
        </div>
    </section>

    <section class="content2">
        <nav class="liner">
            <p style="font-size: 23px;">자동이체 미납고객중 희망 고객을 대상으로 납기일 이외에 1회 추가로 출금하고있습니다.<br><br>
                추가 출금을 희망하실 경우 고객센터 (국번없이 123)로 신청하시기 바랍니다. </p>

            <ol>
                <li>여름철 적정 냉방온도는 26 ~ 28도 입니다. </li> <br>
                <li>지정계좌로 납부하실경우에는 청구금액과 동일하게 입금하셔야 합니다. </li> <br>
                <li>타행(농협, 국민) 계좌로 변경이 가능하며,지정계좌 납부시 수수료가 발생할 수 있습니다.</li>
            </ol>
        </nav>

        <div class="content3">
            <table width="545px" class="bill" cellpadding="10px">
                <tr class="bg">
                    <td class="btds" bgcolor="#F0ACA8">청구금액: {{ number_format($detail->price) }} 원</td>
                </tr>
                <tr>
                    <?php
                    $date = explode('-', $detail->date);
                    ?>
                    <td>납기일: {{ substr($date[0], 0) . '년 ' . $date[1] . '월 ' . substr($date[2], 0, 2) . '일' }}</td>
                </tr>
                <tr class="bg">
                    <?php
                    $a_date = explode('-', $detail->a_date);
                    $n_date = explode('-', $detail->n_date);

                    ?>
                    <td class="btds" bgcolor="#F0ACA8">사용기간: {{ substr($a_date[0], 2) . '년 ' . $a_date[1] . '월 ' .
                        substr($a_date[2], 0, 2) . '일' }} ~ {{ substr($n_date[0], 2) . '년 ' . $n_date[1] . '월 ' .
                        substr($n_date[2], 0, 2) . '일' }}</td>
                </tr>
                <tr align="center">
                    <td style="font-size: 28px">사용량사항</td>
                </tr>
                <tr class="bg">
                    <td class="btds" bgcolor="#F0ACA8">
                        <div style="float: left;">당월지침</div>
                        <div style="float: right;"> {{ number_format($detail->c_month) }}</div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div style="float: left;">전월지침</div>
                        <div style="float: right;"> {{ number_format($detail->pre_month) }}</div>
                    </td>
                </tr>
                <tr class="bg">
                    <td class="btds" bgcolor="#F0ACA8">
                        <div style="float: left;">사용량</div>
                        <div style="float: right;"> {{ number_format($detail->usage) }}kWh</div>
                    </td>
                </tr>
            </table>
        </div>
    </section>

</div>
@stop
