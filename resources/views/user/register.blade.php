<!doctype html>
<html lang="zh">
<head>
    <title>注册-第八区-领先的应用服务平台</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="renderer" content="webkit">
    <meta name="keywords" content="">
    <meta property="og:url" content="https://www.dibaqu.com">
    <meta property="og:title" content="第八区">
    <meta name="baidu-site-verification" content="WDULFadCJ9" />
    <meta name="description" content="">
    <link rel="stylesheet" href="/css/font_780494_fdjuk9baed7.css" />
    <script src="/js/fundebug.1.5.1.min.js" apikey="366273526a484dab7a5373fb1288ef3a8d567f391c68f618d3968cacd4de5f71"></script>
    <link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="/css/base.css" />
    <link rel="stylesheet" type="text/css" href="/css/main.css" />
    <link rel="stylesheet" type="text/css" href="/css/h5.css" />
    <script type="text/javascript" src="/js/jquery.min.js"></script>
    <script type="text/javascript" src="/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/js/vue.js"></script>
    <script type="text/javascript" src="/js/js.js"></script>
    <link rel="shortcut icon" href="//dibaqu.com/favicon.ico?t=20190611" type="image/x-icon" />
</head>
<body>
@include('public.header')
<div class="login-common">
    <div class="login-logo registered-logo">
        <img src="/images/login-logo.png" class="img-responsive">
        <div class="slogan-wrap">
            <div class="slogan clearfix">
                <div class="fl"><img src="/images/login-l.png"></div>
                <div class="text fl">领先的移动应用服务平台</div>
                <div class="fl"><img src="/images/login-r.png"></div>
            </div>
        </div>
    </div>
    <form action="" method="post" class="layui-form">
        @csrf
        <div class="form-group">
            <label class="iconfont icon-user" for="a"></label>
            <input type="text" class="form-control input-lg" name="name" autocomplete="off" placeholder="请输入您的用户名(中文、英文、数字皆可)" lay-verify="required|name">
        </div>
        <div class="form-group">
            <label class="iconfont icon-email" for="b"></label>
            <input class="form-control input-lg" placeholder="请输入邮箱" autocomplete="off" type="email" name="email" lay-verify="required|email">
        </div>
        <div class="form-group">
            <label class="iconfont icon-pwd" for="c"></label>
            <input class="form-control input-lg" name="password" autocomplete="off" placeholder="请输入密码，密码长度不能少于6位" type="password" lay-verify="required|pass">
        </div>
        <div class="form-group">
            <label class="iconfont icon-email"></label>
            <div class="clearfix verification-code">
                <input name="captcha" type="text" class="form-control input-lg fl" placeholder="请输入验证码"lay-verify="required">
                <div class=" fr">@captcha</div>
            </div>
            <span class="help-block">请输入正确的验证码</span>
        </div>
        <div class="checkbox"><input type="checkbox" checked><span>我已阅读并同意<a href="/about/agreement" target="_blank" class="color-hover">《服务协议》</a>及<a href="/about/privacy" target="_blank" class="color-hover">《隐私政策》</a></span>
        </div>
        <button type="button" lay-submit lay-filter="register" class="ms-btn ms-btn-primary input-lg mt20">注册</button>
        <div class="mt15 text-center">
            已有账号，<a href="/user/login" class="color-hover">点击登录</a>
        </div>
    </form>
</div>
<div id="c1"></div>
<script src="/layui/layui.js"></script>
<script src="/js/index.js"></script>
<script>
    layui.use('form', function(){
        var form = layui.form
        ,layer = layui.layer;
        form.verify({
            name: function(value){
                if(value.length < 5){
                    return '用户名至少得5个字符';
                }
            }
            ,pass: [
                /^[\S]{6,12}$/
                ,'密码必须6到12位，且不能出现空格'
            ]
            ,content: function(value){
                layedit.sync(editIndex);
            }
        });
        //监听提交
        form.on('submit(register)', function(data){
            $.post('/user/register',data.field,function (dds) {
                if(dds.code == 0){
                    window.location.href = '/sign/upload';
                }else if (dds.code == 1) {
                    layer.msg(dds.message,{icon:0});
                }
            });
            return false;
        });
    });
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
                <img src="/images/weixin.png" alt="">
            </div>
        </a>
    </li>
    <li class="go-top">
        <a href="javascript:;"><span class="iconfont icon-go-top"></span></a>
    </li>
</ul>


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

<script data-cfasync="false" src="/js/email-decode.min.js"></script><script src="/js/clipboard.js"></script>
<script src="/js/common.min.js"></script>

<script async src="/js/91fedab8e96141c0bc4c87215f082e2e.js"></script>
<script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }

    gtag('js', new Date());
    gtag('config', 'UA-128185075-1');
</script>

<script>
    window.ga = window.ga || function () {
        (ga.q = ga.q || []).push(arguments)
    };
    ga.l = +new Date;
    ga('create', 'UA-128185075-1', 'auto');
    ga('send', 'pageview');
</script>
<script async src='/js/analytics.js'></script>








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
