<!doctype html>
<html lang="zh">
<head>
    <title>第八区-领先的应用服务平台</title>
    <meta charset="utf-8">
    <meta name="viewport"
          content="width=device-width,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta name="renderer" content="webkit">
    <meta name="keywords" content="">
    <meta property="og:url" content="https://www.dibaqu.com">
    <meta property="og:title" content="第八区">
    <meta name="baidu-site-verification" content="WDULFadCJ9" />
    <meta name="description" content="">

    <link rel="stylesheet" href="//at.alicdn.com/t/font_780494_fdjuk9baed7.css"/>
    <script src="https://js.fundebug.cn/fundebug.1.5.1.min.js" apikey="366273526a484dab7a5373fb1288ef3a8d567f391c68f618d3968cacd4de5f71"></script>
    <link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css?20190611" />
    <link rel="stylesheet" type="text/css" href="/css/base.css?20190611" />
    <link rel="stylesheet" type="text/css" href="/css/main.css?20190611" />
    <link rel="stylesheet" type="text/css" href="/css/h5.css?20190611" />
    <script type="text/javascript" src="/js/jquery.min.js?20190611"></script>
    <script type="text/javascript" src="/js/bootstrap.min.js?20190611"></script>
    <script type="text/javascript" src="/js/vue.js?20190611"></script>
    <script type="text/javascript" src="/js/js.js?20190611"></script>
    <link rel="shortcut icon" href="//dibaqu.com/favicon.ico?t=20190611" type="image/x-icon"/>
    <script>
        isHideFooter = false;
        var static_version = 20190611;
    </script>
</head>
<body>

@include('public/header')
<div class="user-center-wrap">
    <div class="container">
        <!--面包屑导航-->
        <div class="crumbs"><a href="#">个人中心</a><span>/</span>账户充值</div>
        <!--/面包屑导航-->
        <div class="user-center1">
            <div class="row clearfix">
                <div class="col-sm-2">
                    <aside class="aside-left">
                        <ul>
                            <li class="active">
                                <a href="/user/order">
                                    <span class="iconfont icon-028"></span>我的订单
                                </a>
                            </li>
                            <li >
                                <a href="/user/profile">
                                    <span class="iconfont icon-user1"></span>账号设置
                                </a>
                            </li>
                            <li >
                                <a href="/notice/lists">
                                    <span class="iconfont icon-msg"></span>消息通知
                                </a>
                            </li>
                        </ul>
                    </aside>

                </div>
                <div class="col-sm-10">
                    <div class="aside-right">
                        <div class="price-pay">
                            <div class="balance-recharge-wrap">
                                <div class="con">
                                    <div class="common">
                                        <div class="balance-recharge">
                                            <div class="b-tit">当前余额</div>
                                            <div class="b-num">{{$blance}}</div>
                                        </div>
                                    </div>
                                    <div class="common">
                                        <div class="tit">选择充值金额</div>
                                        <ul class="clearfix choose-recharge radio-round">
                                            <li class="clearfix" data-type="0">
                                                <span class="icon icon-radio fl"></span>
                                                <span class="r-num">500</span>
                                            </li>
                                            <li class="clearfix active" data-type="0">
                                                <span class="icon icon-radio icon-radio-checked fl"></span>
                                                <span class="r-num">1000</span>
                                            </li>
                                            <li class="clearfix " data-type="0">
                                                <span class="icon icon-radio fl"></span>
                                                <span class="r-num">2000</span>
                                            </li>
                                            <li class="clearfix" data-type="0">
                                                <span class="icon icon-radio fl"></span>
                                                <span class="r-num">5000</span>
                                            </li>
                                            <li class="clearfix" data-type="0">
                                                <span class="icon icon-radio fl"></span>
                                                <span class="r-num">10000</span>
                                            </li>
                                            <li class="clearfix" data-type="0">
                                                <span class="icon icon-radio fl"></span>
                                                <span class="r-num">50000</span>
                                            </li>
                                            <li class="clearfix" data-type="0">
                                                <span class="icon icon-radio fl"></span>
                                                <span class="r-num">100000</span>
                                            </li>
                                            <li class="clearfix" data-type="1">
                                                <span class="icon icon-radio fl"></span>
                                                <input name="rechargeAmount" type="number" class="form-control" step="1" min="1" onKeyUp="value=value.replace(/\D|\b(0+)/g,'')" onafterpaste="value=value.replace(/\D/g,'')" >

                                            </li>
                                            <span class="error">自定义金额必须大于1元的整数</span>
                                        </ul>
                                    </div>
                                    <div class="common">
                                        <div class="tit">选择支付方式</div>
                                        <ul class="clearfix list3">
                                            <li class="clearfix active" data="alipay">
                                                <img src="/images/pay-1.jpg?20190611" alt="">
                                                <span class="radio-checked icon icon-checkbox"></span>
                                            </li>
                                            <li class="clearfix" data="wechat">
                                                <img src="/images/pay-2.jpg?20190611" alt="">
                                                <span class="radio-checked icon icon-checkbox"></span>
                                            </li>
                                            <li class="clearfix" style="display: none">
                                                <img src="/static/images/pay-3.jpg?201810101529" alt="">
                                                <span class="radio-checked icon icon-checkbox"></span>
                                            </li>

                                            <li class="clearfix" data="transfer" id="contraryTransfer">
                                                <img src="/images/pay01.jpg?20190611" alt=""
                                                     class="mr10">
                                                对公转账
                                                <span class="radio-checked icon icon-checkbox"></span>
                                            </li>

                                        </ul>
                                        <div class="contrary-transfer">
                                            <div class="warn-prompt"><span class="icon-warn iconfont"></span>请在打款完成后认真填写以下内容，只支持公司银行账号进行转账，个人请用支付宝和微信支付。
                                            </div>
                                            <dl class="clearfix">
                                                <dt class="fl">开户行</dt>
                                                <dd class="col-sm-7">中国建设银行股份有限公司福建省分行</dd>
                                            </dl>
                                            <dl class="clearfix">
                                                <dt class="fl">对公账号</dt>
                                                <dd class="col-sm-7">35050100240600001290</dd>
                                            </dl>
                                            <dl class="clearfix">
                                                <dt class="fl">开户名</dt>
                                                <dd class="col-sm-7">福建喜佳宝网络科技有限公司</dd>
                                            </dl>
                                            <dl class="clearfix dl-input">
                                                <dt class="fl">汇款名称</dt>
                                                <dd class="col-sm-7">
                                                    <input class="form-control" name="remittanceName" type="text"
                                                           placeholder="请输入汇款名称">
                                                    <div class="error">请输入汇款名称</div>
                                                </dd>
                                            </dl>
                                            <dl class="clearfix dl-input">
                                                <dt class="fl">汇款账号</dt>
                                                <dd class="col-sm-7">
                                                    <input name="remittanceAccount" class="form-control" type="text"
                                                           placeholder="请输入汇款账号">
                                                    <div class="error">请输入汇款账号</div>
                                                </dd>
                                            </dl>
                                        </div>
                                    </div>
                                    <div class="pay-money">
                                        <div class="money">
                                            充值<span>￥1000</span>
                                        </div>
                                        <div class="give" style="font-size:12px"></div>
                                        <div class="mb25 color-333 font12">
                                            <span class="iconfont icon-checkbox1 checkbox-btn mr8"></span>
                                            账户余额可用来购买分发次数，企业签名、封装APP等服务。目前暂时不支持余额提现功能。
                                        </div>
                                        <input type="hidden" name="discount_id" value="47">
                                        <input type="hidden" name="activity" value="">
                                        <a href="javascript:;" class="ms-btn-primary ms-btn to-pay">充值</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade ms-modal in" id="transferModal" tabindex="-1" role="dialog"
     style="padding-left: 15px;">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="text-center">
                    <div><span class="icon icon-modal-success2"></span></div>
                    <p class="color-333 bold font16 mt5">等待确认</p>
                    <p class="color-333 mt5">您的对公转账申请已提交成功，客服人员将在1个工作日内与您核对信息，请保持手机畅通。</p>
                    <div class="mt15">
                        <a type="button" class="ms-btn ms-btn-default w90" href="/user/order">确定</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    var activity_on = "0";
    $(function () {
        tab.radioRound({
            el: ".radio-round li",
            checkedClass: "icon-radio-checked"
        });

        var o = Number($(".pay-money .money").find("span").text().substr(1));
        giveMoney(o);

        // 复选
        var checkbox = $(".pay-money .checkbox-btn");
        checkbox.click(function () {
            $(this).toggleClass("icon-checkbox-checked1");
            if (!checkbox.hasClass("icon-checkbox-checked1")) {
                $(".pay-money a").addClass("disabled");
                $(".pay-money a").removeClass("to-pay");
            } else {
                $(".pay-money a").removeClass("disabled");
                $(".pay-money a").addClass("to-pay");
            }
        });

        if (!checkbox.hasClass("icon-checkbox-checked1")) {
            $(".pay-money a").addClass("disabled");
            $(".pay-money a").removeClass("to-pay");
        }

        $(".price-pay .common").on('click', '.choose-recharge li', function () {
            var li = $(".choose-recharge li").has("input[name=rechargeAmount]");
            var has = li.hasClass("active");
            if (has) {
                price = Number($("input[name='rechargeAmount']").val());
                if (isNaN(price)) price = 0;
                console.info(price);
            } else {
                price = Number($(this).find(".r-num").text());
                $("input[name=rechargeAmount]").val('');
                if (isNaN(price)) price = 0;
            }
            $(".money span").text('￥' + price);
        });

        $("input[name='rechargeAmount']").on('input propertychange', function () {
            var value = $(this).val();
            value =value.replace(/\D/g,'');
            var amount = Number(value).toFixed(2);
            if (!isNaN(amount) && amount >= 1) {
                $(".choose-recharge").removeClass("form-error");
                $(".money span").text('￥' + amount);
            } else {
                $(".choose-recharge").addClass("form-error");
                $(".money span").text('￥0');
            }
        });

        $(".money").bind("DOMNodeInserted", function () {
            var price = Number($(this).find("span").text().substr(1));
            giveMoney(price);
        });

        $(document).on('click', ".to-pay", function () {
            // 获取折扣
            var discount_id = $("input[name='discount_id']").val();
            var activity = $("input[name='activity']").val();
            // 获取价格
            var li = $(".choose-recharge li").has("input[name=rechargeAmount]");
            var has = li.hasClass("active");
            if (has) {
                var quantity = Number(li.find("input[name=rechargeAmount]").val()).toFixed(2);
                if (has && quantity < 0.01) {
                    alert('请填写需要充值的金额，且充值金额不能小于1元');
                    return;
                }
            } else {
                quantity = Number($(".price-pay .common .choose-recharge li.active").find(".r-num").text()).toFixed(2);
            }

            // 获取支付渠道
            channel = $(".list3 li.active").attr('data');
            if (!discount_id) {
                alert('请选择需要购买的套餐');
                return;
            }

            if (!channel || channel == 'undefined') {
                alert('请选择支付渠道');
                return;
            }

            var user = $(".contrary-transfer input[name=user]");
            var phoneNum = $(".contrary-transfer input[name=phoneNum]");
            var remittanceName = $(".contrary-transfer input[name=remittanceName]");
            var remittanceAccount = $(".contrary-transfer input[name=remittanceAccount]");
            var phoneValidation = /0?(13|14|15|16|17|18|19)[0-9]{9}/;

            // 验证汇款名称
            console.log(remittanceName.val());
            if (remittanceName.val().length > 0) {
                remittanceName.removeClass("form-error");
            } else {
                remittanceName.addClass("form-error");
            }
            // 验证汇款账户
            if (remittanceAccount.val().length > 0) {
                remittanceAccount.removeClass("form-error");
            } else {
                remittanceAccount.addClass("form-error");
            }

            dataJson = '';
            if ($("#contraryTransfer").hasClass("active")) {
                if ($(".contrary-transfer .form-error").length > 0) {
                    return false;
                }
                transfer = {};
                transfer.user_name = user.val();
                transfer.mobile = phoneNum.val();
                transfer.transfer_name = remittanceName.val();
                transfer.transfer_no = remittanceAccount.val();
                dataJson = '&transfer=' + JSON.stringify(transfer);
            }

            //$(".pay-money a").addClass("disabled");
            //$(".pay-money a").removeClass("to-pay");


            if (channel == 'transfer') {
                $("#transferModal").modal({backdrop: 'static', keyboard: false});
                $('#transferModal').modal('show');
            } else {
                // $('#myModalPay').modal('show');
                // $('#myModalPay').find('input[name="order_sn"]').val(result.data.trade_id);
                window.location.href = '/buy/'+channel+'/'+quantity;
                form = $("<form target='_blank'></form>");
                form.attr('action', '/pay/to-pay');
                form.attr('method', 'get');
                form.append($("<input type='hidden' name='trade_id' value='" + result.data.trade_id + "'/>"));
                form.append($("<input type='hidden' name='channel' value='" + result.data.channel + "' />"));
                form.appendTo("body");
                form.submit();
            }
            $.ajax({
                async: false,
                type: "POST",
                url: '/buy',
                data: 'discount_id=' + discount_id + '&quantity=' + quantity + '&pay_channel=' + channel + dataJson + '&activity=' + activity,
                dataType: 'json',
                success: function (result) {
                    if (result.code != 200) {
                        if (result.code == -10001) {
                            alert(result.msg, function () {
                                window.location.href = '/user/login';
                            });
                        } else {
                            alert(result.msg);
                        }
                        return;
                    }

                    if (result.data.is_payed == 1) {
                        $("#transferModal").modal({backdrop: 'static', keyboard: false});
                        $('#transferModal').modal('show');
                        return;
                    }
                }
            });
        })
    });

    function giveMoney(price) {
        console.log(price);
        // 活动期间的赠送价格
        var ratio = 0;
        switch (true) {
            case price >= 500 && price < 2000:
                ratio = 0.1;
                break;
            case price >= 2000 && price < 5000:
                ratio = 0.13;
                break;
            case price >= 5000 && price < 10000:
                ratio = 0.16;
                break;
            case price >= 10000 && price < 30000:
                ratio = 0.2;
                break;
            case price >= 30000:
                ratio = 0.25;
                break;
            default:
                ratio = 0;
        }
        if (activity_on == 1 && ratio > 0) {
            var givePrice = parseInt(price * ratio);
            $(".give").html('<span>新春钜惠赠送<span style="color:#fd641d;font-size:16px;">' + givePrice + '</span>元，共计<span style="color:#fd641d;font-size:16px;">' + (price + givePrice) + '</span>元，充值完成后即刻到账</span>');
        } else {
            $(".give").html('');
        }
    }
</script><!--底部-->
@include('public/foot')
<!--底部-->

<!--右侧悬浮-->
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
<!--右侧悬浮-->


<!--弹窗-->

<div class="modal fade ms-modal" id="myModalPay" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">购买</h4>
            </div>
            <div class="modal-body">
                <div class="font18 color-333">是否完成了购买？</div>
                <p class="mt15">请在新打开的页面中完成购买，购买完成后，请根据购买结果点击下面的按钮 </p>
            </div>
            <div class="modal-footer">
                <input type="hidden" name="order_sn" value="">
                <button type="button" class="ms-btn ms-btn-primary complete-pay">支付成功</button>
                <button type="button" class="ms-btn ms-btn-default fail-pay" data-dismiss="modal">支付遇到问题</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade ms-modal" id="paySuccessModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="text-center">
                    <div><span class="icon icon-modal-success1"></span></div>
                    <p class="color-333 bold font16 mt5">购买成功</p>
                    <p class="color-333 mt5"></p>
                    <div class="mt15">
                        <a type="button" class="ms-btn ms-btn-default w90" href="#">确定（3）</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade ms-modal auto-hide-modal" id="submitLoading" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="text-center">
                    <div class="auto-hide">
                        <span class="icon icon-modal-success3"></span>
                        <div class="mt5">已提交，请稍后...</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/弹窗-->

<script src="/js/clipboard.js?20190611"></script>
<script src="/js/common.min.js?20190611"></script>
<script>
    if (!isHideFooter) {
        $('.right-float-window').show();
    }

    $(function () {

        $("body").on('click', '.fail-pay', function () {
            $(".pay-money a:last").removeClass("disabled");
            $(".pay-money a:last").addClass("toPay");
        });
        $("body").on('click', '.complete-pay', function () {
            $(".toPay").removeClass('disabled');
            order_sn = $('#myModalPay').find('input[name="order_sn"]').val();
            if (!order_sn) {
                $('#myModalPay').modal('hide');
                return;
            }

            $.post('/order/check-pay', {order_sn: order_sn}, function (result) {
                if (result.code != 200) {
                    $('#myModalPay').modal('hide');
                } else {
                    if (result.data.service_type == 3 || result.data.service_type == 4) {
                        window.location.href = '/publish';
                    } else if (result.data.service_type == 2) {
                        window.location.href = '/sign/upload?step=4&sign_id=' + result.data.goods_id;
                    } else if (result.data.service_type == 1) {
                        window.location.href = '/pack?step=5&id=' + result.data.goods_id;
                    } else if (result.data.service_type == 5) {
                        window.location.href = '/user/order';
                    }

                }
            })

        });

        var windowWidth = $(window).width();
        $("body").on('click', '.chatQQ', function () {
            console.info(windowWidth);
            if (windowWidth <= 750) {
                /*1234567对应的就是需要聊天的客服*/
                window.location.href = "mqqwpa://im/chat?chat_type=wpa&uin=38695299&version=1&src_type=web&web_src=oicqzone.com";
            } else {
                window.location.href = "http://wpa.qq.com/msgrd?v=3&uin=38695299&site=qq&menu=yes";
            }
        });

        var source_login = 0;
        if (windowWidth <= 750 && source_login) {
            Modal.templateModal({
                imgName: "modal-bg-3.jpg",
                title1: '提示',
                title2: '',
                p: '建议您：<br>尽快<span class="color-danger">电脑</span>登录第八区网站，即可享受<br><span class="iconfont icon-xingxing" style="color: #fec323; font-size: 12px; margin-right: 5px;"></span>免费试用封装打包APP<br><span class="iconfont icon-xingxing" style="color: #fec323; font-size: 12px; margin-right: 5px;"></span>每天免费赠送<span class="color-danger">1000</span>次分发下载次数',
                align: 'left', // 居左 left, 居中 center, 居右 right
                btnText: '知道了',
                btnClass: "modal-btn2"
            });
        }

        var num = 3;
        var linkTime = null;
        clearInterval(linkTime);

        function linkfun() {
            if ($("#paySuccessModal").is(":visible")) {
                $("#paySuccessModal a").text('确定（' + num + ')');
                num--;
                if (num <= 0) {
                    var href = $("#paySuccessModal a").attr('href');
                    window.location.href = href;
                }
            }
        }

        linkTime = setInterval(linkfun, 1000);

        $.post("/user/messages/dialog", function (data) {
            if(data.code == 200 && data.data) {
                console.log(data.data.message);
                Modal.generalModal({
                    backdrop: false, // 点击阴影是否关闭弹窗， // true 开启； false 关闭
                    iconClass: "",  // success: icon-modal-success1,  error: icon-modal-error2
                    title: data.data.subject,  // 弹窗标题
                    p: data.data.message, // 弹窗内容
                    align: 'left', // 弹窗内容排列顺序 left center right
                    cancelBtnText: '关闭',    // 取消按钮文字
                    successBtnText: '知道了',  // 确定按钮文字
                    successBtnModal: true, // 点击确定按钮是否关闭弹窗 true 关闭 false 不关闭
                    cancelBtnModal: true, // 点击取消按钮是否关闭弹窗 true 关闭 false 不关闭
                    style:'width:528px',
                    successCallback: function () {

                    },
                    cancelCallback: function () {

                    }
                });
            }
        })
    });


    var _hmt = _hmt || [];
    (function () {
        var hm = document.createElement("script");
        hm.src = "https://hm.baidu.com/hm.js?932e6e061f7d4ac477e82f20fd3778c6";
        var s = document.getElementsByTagName("script")[0];
        s.parentNode.insertBefore(hm, s);
    })();
    //var cnzz_protocol = (("https:" == document.location.protocol) ? " https://" : " http://");
    //document.write(unescape("%3Cspan style='display:none' id='cnzz_stat_icon_1275094025'%3E%3C/span%3E%3Cscript src='" + cnzz_protocol + "s19.cnzz.com/z_stat.php%3Fid%3D1275094025' type='text/javascript'%3E%3C/script%3E"));
</script>
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-128185075-1"></script>
<script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }

    gtag('js', new Date());
    gtag('config', 'UA-128185075-1');
</script>

<!-- Google Analytics -->
<script>
    window.ga = window.ga || function () {
        (ga.q = ga.q || []).push(arguments)
    };
    ga.l = +new Date;
    ga('create', 'UA-128185075-1', 'auto');
    ga('send', 'pageview');
</script>
<script async src='https://www.google-analytics.com/analytics.js'></script>
<!-- End Google Analytics -->

<!--<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>-->
<!--<script>-->
<!--  (adsbygoogle = window.adsbygoogle || []).push({-->
<!--      google_ad_client: "ca-pub-3859964528859854",-->
<!--      enable_page_level_ads: true-->
<!--  });-->
<!--</script>-->

<script>

    function alert(msg, callback, cancelCallback, align, successBtn, cancelBtn) {
        if (!align) align = 'center';
        if (!successBtn) successBtn = '确定';
        Modal.generalModal({
            backdrop: true, // 点击阴影是否关闭弹窗， // true 开启； false 关闭
            iconClass: "",  // success: icon-modal-success1,  error: icon-modal-error2
            title: '',  // 弹窗标题
            p: msg, // 弹窗内容
            align: align, // 弹窗内容排列顺序 left center right
            cancelBtnText: cancelBtn,    // 取消按钮文字
            successBtnText: successBtn,  // 确定按钮文字
            successBtnModal: true, // 点击确定按钮是否关闭弹窗 true 关闭 false 不关闭
            cancelBtnModal: true, // 点击取消按钮是否关闭弹窗 true 关闭 false 不关闭
            successCallback: callback,
            cancelCallback: cancelCallback
        });
    }

    /*(function(){
        var bp = document.createElement('script');
        var curProtocol = window.location.protocol.split(':')[0];
        if (curProtocol === 'https') {
            bp.src = 'https://zz.bdstatic.com/linksubmit/push.js';
        }
        else {
            bp.src = 'http://push.zhanzhang.baidu.com/push.js';
        }
        var s = document.getElementsByTagName("script")[0];
        s.parentNode.insertBefore(bp, s);
    })();*/

    /*(function () {
        var dw = document.createElement("script");
        dw.src = "https://develop.dibaqu.com/webclip-min.js?932e6e061f7d4ac477e82f20fd3778c6";
        var s = document.getElementsByTagName("script")[0];
        s.parentNode.insertBefore(dw, s);
    })();*/
</script>

</body>
</html>
