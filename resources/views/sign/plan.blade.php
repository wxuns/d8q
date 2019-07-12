<!doctype html>
<html lang="zh">
<head>
    <title>iOS企业签名_苹果IPA签名_IPA企业签名_iOS企业证书打包签名_ios稳定签名_app签名证书服务_第八区</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="renderer" content="webkit">
    <meta name="keywords" content="iOS企业签名_苹果IPA签名_IPA企业签名_iOS企业证书打包签名_ios稳定签名_app签名证书服务_免越狱无需上架_稳定的app签名证书_ipa打包代签名_第八区">
    <meta property="og:url" content="https://www.dibaqu.com">
    <meta property="og:title" content="第八区">
    <meta name="baidu-site-verification" content="WDULFadCJ9" />
    <meta name="description" content="提供高效,快速,稳定不掉的IOS企业签名服务:包含苹果企业签名,IPA企业签名,IOS企业签名质量第一无需越狱,无需上架苹果商店独立企业证书,长期稳定不掉线">
    <link rel="stylesheet" href="/layui/css/layui.css">
    <link rel="stylesheet" href="//at.alicdn.com/t/font_780494_fdjuk9baed7.css" />
    <script src="https://js.fundebug.cn/fundebug.1.5.1.min.js" apikey="366273526a484dab7a5373fb1288ef3a8d567f391c68f618d3968cacd4de5f71"></script>
    <link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css?20190611" />
    <link rel="stylesheet" type="text/css" href="/css/base.css?20190611" />
    <link rel="stylesheet" type="text/css" href="/css/main.css?20190611" />
    <link rel="stylesheet" type="text/css" href="/css/h5.css?20190611" />
    <script type="text/javascript" src="/js/jquery.min.js?20190611"></script>
    <script type="text/javascript" src="/js/bootstrap.min.js?20190611"></script>
    <script type="text/javascript" src="/js/vue.js?20190611"></script>
    <script type="text/javascript" src="/js/js.js?20190611"></script>
    <link rel="shortcut icon" href="//dibaqu.com/favicon.ico?t=20190611" type="image/x-icon" />
    <script>
        isHideFooter = false;
        var static_version = 20190611;
    </script>
</head>
<body>
@include('public/header',['data'=>2])
<div class="release-app-wrap">
    <div class="container">
        <div class="signature1">

            <div class="crumbs"><a href="/sign">企业签名</a><span>/</span>上传苹果应用</div>


            <div class="con">
                <div class="row">
                    <div class="col-sm-2">
                        <div class="left">
                            <ul>
                                <li class="active">
                                    <a href="/sign/upload">
                                        <span class="iconfont icon-upload1"></span>
                                        上传苹果应用
                                    </a>
                                </li>
                                <li>
                                    <a href="/sign/lists">
                                        <span class="iconfont icon-qianming"></span>
                                        我的签名
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-10">
                        <div class="right">
                            <ul class="step clearfix">
                                <li class="active"><span>1</span>上传苹果应用</li>
                                <li class="active"><span>2</span>填写信息</li>
                                <li class="active"><span>3</span>选择套餐</li>
                                <li><span>4</span>等待处理</li>
                                <li><span>5</span>下载签名包</li>
                            </ul>

                            <div>
                                <div class="step3 step-common price-pay">
                                    <div class="layui-tab common">
                                        <div class="tit">选择套餐内容</div>
                                        <ul class="clearfix list1 layui-tab-title">
                                            @foreach($type as $type)
                                            <li class="clearfix {{$type->id == 2?'active layui-this':''}}" onclick="plan({{$type->id}})"
                                                data-toggle="tooltip" title="{{$type->info}}" data-level="1">
                                                <span>{{$type->name}}</span>
                                                <span class="radio-checked icon icon-checkbox"></span>
                                            </li>
                                            @endforeach
                                        </ul>
                                        <div class="layui-tab-content">
                                            @foreach($plan as $plan)
                                            <div class="layui-tab-item {{$plan->id == 2?'layui-show':''}}">
                                                <div class="certTips" style="margin-left:20px;background-color: #f9f9f9;border: 1px dashed red;padding:5px;width: 900px;">
                                                    {{$plan->info}}
                                                </div>
                                                <div class="tit">选择有效期</div>
                                                <ul class="clearfix list2">
                                                    @foreach($plan->plan as $key=>$p)
                                                    <li class="clearfix {{$p->month == 3?'active':''}}{{count($plan->plan)==1?'active':''}}"
                                                        onclick="month({{$p->id}},{{ceil($p->price*$discount)}},{{$plan->id}})"
                                                        @if($p->remark) data-toggle="tooltip" title="" data-original-title="{{$p->remark}}"@endif>
                                                        <span class="icon icon-radio fl"></span>
                                                        <span class="fl">{{$p->month}}个月</span>
                                                        @if($p->month == 3)
                                                        <span class="preferential" style="display: block;">推荐</span>
                                                            @endif
                                                    </li>
                                                    @endforeach
                                                    <li class="clearfix disabled">
                                                        <span class="icon icon-radio fl"></span>
                                                        <span class="fl">更新</span>
                                                    </li>
                                                </ul>
                                                <div class="tit">选择支付方式</div>
                                                <ul class="clearfix list3">
                                                    <li class="clearfix active" data="alipay" onclick="pay(this)">
                                                        <img src="/images/pay-1.jpg?20190611" data="alipay">
                                                        <span class="radio-checked icon icon-checkbox"></span>
                                                    </li>
                                                    <li class="clearfix" data="wechat" onclick="pay(this)">
                                                        <img src="/images/pay-2.jpg?20190611">
                                                        <span class="radio-checked icon icon-checkbox"></span>
                                                    </li>
                                                    <li class="clearfix" style="display: none">
                                                        <img src="/images/pay-3.jpg?20190611" alt="">
                                                        <span class="radio-checked icon icon-checkbox"></span>
                                                    </li>
                                                    <li class="clearfix" data="transfer" id="contraryTransfer" style="display: none">
                                                        <img src="/images/pay01.jpg?20190611" alt="" class="mr10">
                                                        对公转账
                                                        <span class="radio-checked icon icon-checkbox"></span>
                                                    </li>
                                                    <li class="clearfix {{$blance?'':'disabled'}}" data="balance" onclick="pay(this)">
                                                        <span class="iconfont icon-yue"></span>
                                                        <span class="remaining-amount">
                                                            <i class="a-text">余额</i>
                                                            <i class="a-num">
                                                            <i class="color-hover">
                                                            ￥{{$blance}} </i>
                                                            </i>
                                                        </span>
                                                        <span class="radio-checked icon icon-checkbox"></span>
                                                    </li>
                                                </ul>

                                                <div class="pay-money">
                                                    <div class="money">
                                                        应支付<span id="price-{{$plan->id}}">￥
                                                        @foreach($plan->plan as $key=>$p)
                                                            {{$p->month == 3?ceil($p->price*$discount):''}}
                                                            @endforeach
                                                            {{count($plan->plan)==1?ceil($p->price*$discount):''}}</span>
                                                    </div>
                                                    <a href="javascript:history.go(-1);" class="ms-btn color-hover">上一步</a>
                                                    <p class="ms-btn-primary ms-btn toPay" onclick="topay()">去支付</p>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="warn-prompt-wrap clearfix">
                    <dl class="clearfix warn-prompt-1 fr">
                        <dt class="fl">提示：</dt>
                        <dd>
                            根据最新的平台规则，本站禁止任何违反国家法律的相关内容，发现后立即禁用，自行承担带来的一切后果。
                        </dd>
                    </dl>
                </div>
            </div>
        </div>

    </div>
</div>
</div>

<script src="/layui/layui.js"></script>
<script>
    layui.use('element', function(){
        var element = layui.element;
    });
    localStorage.setItem('plan',2)
    localStorage.removeItem('id')
    localStorage.removeItem('price')
    localStorage.removeItem('type')
    function month(id,price,type){
        localStorage.setItem('id',id)
        localStorage.setItem('price',price)
        $('#price-'+type).html('￥'+price)
    }
    function plan(id) {
        localStorage.setItem('plan',id)
        localStorage.removeItem('id')
        localStorage.removeItem('price')
        localStorage.removeItem('type')
    }
    function pay(e) {
        var data = $(e).attr('data')
        localStorage.setItem('type',data)
    }
    function topay() {
        layui.use('layer', function(){
            var layer = layui.layer;

            layer.ready(function() {
                layer.confirm('是否确认购买此套餐？', {
                    btn: ['确认', '取消'] //按钮
                }, function () {
                    id = localStorage.getItem('id') != null ? localStorage.getItem('id') : '';
                    paytype = localStorage.getItem('type') != null ? localStorage.getItem('type') : 'alipay';
                    
                    window.open('/'+paytype+'/{{$token}}/' + localStorage.getItem('plan') + '/' + id);

                    layer.confirm('是否完成了购买？', {
                        btn: ['购买成功', '遇到问题'] //按钮
                    }, function () {
                        $.get('/checkpay/{{$token}}',function (data) {
                            if (data.code == 0){
                                window.location.href = '/sign/wait/{{$token}}'
                            }else {
                                layer.msg('支付失败',{icon:2})
                            }
                        });
                    });
                }, function () {
                });
            })
        });
    }
</script>


@include('public/foot')


<ul class="fixed-right right-float-window" style="display: none">
    <li>
        <a href="javascript:;" target="_blank">
            <span class="iconfont icon-qq chatQQ"></span>
        </a>
    </li>
    <li>
        <a href="javascript:;">
            <span class="iconfont icon-weixin1"></span>
            <div class="wechat">
                <img src="/images/weixin.png?20190611" alt="">
            </div>
        </a>
    </li>
    <li class="go-top">
        <a href="javascript:;"><span class="iconfont icon-go-top"></span></a>
    </li>
</ul>

</body>
</html>
