<!doctype html>

<head>
    <title>포스트체인</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    @yield('stylesheet')
</head>

<body>
    @yield('content')
<div class="container">
    <div class="family">
        <p>포스트체인 소개&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;이용 안내&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;이용
            약관&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;개인정보처리방침&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;웹접근정책</p>
        <select name="family-site" style="float: right; margin-top: -35px; margin-right: 50px">
            <option value="">관련사이트</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
        </select>
        <button style="float: right; margin-top: -35px">이동</button>
    </div>
    <div class="footer"></div>
</div>

@yield('javascript')
</body>

</html>
