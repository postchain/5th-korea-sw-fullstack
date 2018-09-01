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
        margin-top: -117px;
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
        <h1 style="color: #ec2514">위반사실 통지 및 과태료 고지서</h1>
        <img src="{{ asset('images/box/police.png') }}" height="150px" width="278px" id="police">
    </header>

    <section class="content1">
        <div class="info">
            <div style="float: left; width: 647px">
                대상자 : {{ $customer->name }} 님<br><br>
                주소 : {{ $detail->address }}
            </div>
            <div style="float: right">
                차량번호 : -
            </div>
        </div>
    </section>

    <section class="content2">
        <nav class="payment">
            <p style="font-size: 23px;">귀하의 차량이 오른쪽과 같이 법규위반한 사실이 확인되어 과태료 부과대상이 되었기에 통지합니다.</p>
            <ol>
                <li>위반운전자가 확인되는 경우, 아래 의견진술기한 이내에 가까운 경찰서 민원실 또는 지구대를 방문하여 범칙금고 지서를 발부받으실 수 있습니다. </li> <br>
                <li>위반운전자가 확인되지 않을 경우, 차량 소유자인 귀하에게 아래와 같이 과태료가 부과됩니다.</li> <br>
                <li>귀하의 차량이 위반한 속도의 경우 의견진술기한 이내에 아래 교태료 사전납부고지서를 이용하여 과태료를 자진 납부 할 경우에는 과태료가 20%감경됩니다</li>
        </nav>

        <figure>
            <img src="img/car.png" height="287px" width="510px" id="car" style="display: block;">
            <figcaption class="violation">

                <div style="float: left;">
                    위반 장소: {{ $detail->place_violation }}<br>
                    위반 내용: {{ $detail->content_violation }}
                </div>
                <div style="float: right; ">
                    위반 일시: {{ $detail->date_violation }}
                </div>

            </figcaption>
        </figure>
    </section>
</div>
@stop
