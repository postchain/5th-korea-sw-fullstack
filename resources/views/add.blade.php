<!doctype html>

<head>

</head>
{{--  --}}
<body>
    <form action="{{ route('get.test.add') }}" method="post">
        {{ csrf_field() }}
        <select name="category">
            <option value="electric">electric</option>
            <option value="bill">bill</option>
            <option value="gas">gas</option>
            <option value="notice">notice</option>
        </select>
        <p>'title', 'a_date', 'n_date', 'customer_email', 'address', 'date', 'c_month', 'pre_month', 'usage', 'price'</p>
        <input type="text" name="title">
        <input type="text" name="a_date">
        <input type="text" name="n_date">
        <input type="text" name="customer_email" value="{{ Auth::User()->email }}">
        <input type="text" name="address">
        <input type="text" name="date">
        <input type="text" name="c_month">
        <input type="text" name="pre_month">
        <input type="text" name="usage">
        <input type="text" name="price">
        <button type="submit">add</button>


    </form>

</body>
