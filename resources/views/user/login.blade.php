<!doctype html>
<html lang="zh">
<head>
    <title>用户登录</title>
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
    <script>
        isHideFooter = false;
        var static_version = 20190611;
    </script>
</head>
<body>

@include('public.header')
<script type="text/javascript" src="/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="/js/jquery.cookie.js"></script>

<div class="login-common">
    <div class="login-logo">
        <img src="/images/login-logo.png" class="img-responsive">
        <div class="slogan-wrap">
            <div class="slogan clearfix">
                <div class="fl"><img src="/images/login-l.png"></div>
                <div class="text fl">领先的移动应用服务平台</div>
                <div class="fl"><img src="/images/login-r.png"></div>
            </div>
        </div>
    </div>
    <form role="form"  class="layui-form">
        @csrf
        <div class="form-group">
            <label class="iconfont icon-email" for="user"></label>
            <input type="email" class="form-control input-lg" name="email" autocomplete="off"  placeholder="请输入邮箱" lay-verify="required|email">
            <span class="help-block">请输入正确的邮箱</span>
        </div>
        <div class="form-group">
            <label class="iconfont icon-pwd" for="password"></label>
            <input class="form-control input-lg"  autocomplete="off" name="password" placeholder="请输入密码" type="password" lay-verify="required|pass">
            <span class="help-block">请输入正确的密码</span>
        </div>
        <div class="checkbox"><input type="checkbox" id="remember-me" checked><span>记住我</span></div>
        <button type="button" class="ms-btn ms-btn-primary input-lg mt20" lay-submit lay-filter="login">登录</button>
        <div class="clearfix mt15">
            <a href="/user/register" class="fl">免费注册</a>
            <a href="/user/find-password" class="fr">忘记密码</a>
        </div>
    </form>
</div>

<script src="/layui/layui.js"></script>
<script>
    layui.use('form', function(){
        var form = layui.form
            ,layer = layui.layer;
        form.verify({
            pass: [
                /^[\S]{6,12}$/
                ,'密码必须6到12位，且不能出现空格'
            ]
        });
        //监听提交
        form.on('submit(login)', function(data){
            $.post('/user/login',data.field,function (dds) {
                if(dds.code == 0){
                    window.location.href = '/sign/upload';
                }else if (dds.code == 2) {
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


</body>
</html>
