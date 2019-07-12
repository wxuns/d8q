<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>在线支付</title>
</head>
<body>
<div style="text-align: center">
    {!! QrCode::size(200)->generate($body->data->qr); !!}
    <p>{{$body->data->pay_way.' - '.($body->data->pay_price/100).'元'}}</p>
    <p>支付码过期时间 {{$body->data->expire_at}}，支付完成会自动刷新</p>
</div>
<script type="text/javascript" src="/js/jquery.min.js?20190611"></script>
<script crossorigin="anonymous" integrity="sha384-Ysr53n0PIGi7rAduJ+BAMGbxA9RFQwIQfPh2bD9pf1x3vrnDsdX4SlwCNpxmrPIi" src="https://lib.baomitu.com/layer/3.1.1/layer.js"></script>
<script>
    var check = setInterval(function () {
        $.get('/checkpayblance/{{$body->data->order_sn}}',function (data) {
            if (data.code == 0){
                clearInterval(check)
                layer.msg('支付成功');
                setTimeout(function () {
                    window.location.href = '/user/order'
                },1000);
            }
        });
    },1000)
</script>
</body>
</html>
