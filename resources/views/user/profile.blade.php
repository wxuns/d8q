
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
                            <li>
                                <a href="/user/order">
                                    <span class="iconfont icon-028"></span>我的订单
                                </a>
                            </li>
                            <li class="active">
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
                        <div class="account-management">
                            <ul class="clearfix">
                                <li class="active" id="profile">个人资料</li>
                                <li id="modifyPassword">修改密码</li>
                            </ul>
                            <div class="tab">
                                <div class="data" style="display: block;">
                                    <div class="row">
                                        <div class="col-sm-8">
                                            <div class="table-responsive">
                                                <table class="table table1">
                                                    <tbody><tr>
                                                        <th>用户名</th>
                                                        <td>{{$user->name}}</td>
                                                        <td>
                                                            <button class="ms-btn ms-btn-default" onclick="window.location.href='/user/nickname'">修改
                                                            </button>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>手机号码</th>
                                                        <td>{{$user->mobile}}</td>
                                                        <td>
                                                            <button class="ms-btn ms-btn-default" onclick="window.location.href='/user/phone'">修改
                                                            </button>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>邮箱地址</th>
                                                        <td>{{$user->email}}</td>
                                                        <td>
                                                            <button class="ms-btn ms-btn-default" onclick="window.location.href='/user/email'">修改
                                                            </button>
                                                        </td>
                                                    </tr>
                                                    </tbody></table>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <hr>
                                        </div>
                                    </div>
                                </div>
                                <div class="pwd">
                                    <div class="row clearfix">
                                        <div class="col-sm-7">
                                            <form action="" method="post" class="layui-form">
                                                <div class="form-group">
                                                    <label>原密码</label>
                                                    <input type="password" name="old_password" class="form-control" placeholder="请输入您的密码">
                                                    <span class="iconfont icon-eye-no pwd-toggle"></span>
                                                    <div class="error">密码错误</div>
                                                </div>
                                                <div class="form-group">
                                                    <label>新密码</label>
                                                    <input type="password" name="password" class="form-control" placeholder="请输入您的新密码">
                                                    <span class="iconfont icon-eye-no pwd-toggle"></span>
                                                    <div class="error">请输入密码,数量至少6位</div>
                                                </div>
                                                <div class="form-group">
                                                    <label>确认新密码</label>
                                                    <input type="password" name="repassword" class="form-control" placeholder="请再次输入您的新密码">
                                                    <span class="iconfont icon-eye-no pwd-toggle"></span>
                                                    <div class="error">请输入密码/两次密码不一致</div>
                                                </div>
                                                <button type="button" class="ms-btn ms-btn-primary submit" id="submitButton">保存
                                                </button>
                                            </form>
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
</div>

<!--底部-->

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

<script crossorigin="anonymous" integrity="sha384-Ysr53n0PIGi7rAduJ+BAMGbxA9RFQwIQfPh2bD9pf1x3vrnDsdX4SlwCNpxmrPIi" src="https://lib.baomitu.com/layer/3.1.1/layer.js"></script>
<script>
    var old_password = $("input[name='old_password']");
    var password = $("input[name='password']");
    var repassword = $("input[name='repassword']");

    $('#submitButton').click(function () {
        if (old_password.val()&&password.val()&&repassword.val()){
            $.post('',{
                old_password:old_password.val()
                ,password:password.val()
                ,repassword:repassword.val()
                ,_token:'{{csrf_token()}}'
            },function(data){
                if (data.code == 0){
                    layer.msg(data.message);
                    $('#nick').html(mobile.val())
                }else {
                    layer.msg(data.message);
                }
            })
        }else {
            old_password.focus()
        }
    });
</script>

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
