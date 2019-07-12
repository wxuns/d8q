<!DOCTYPE html>
<html lang="zh"><head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <title>管理员后台</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="renderer" content="webkit">
    <meta name="keywords" content="iOS企业签名_苹果IPA签名_IPA企业签名_iOS企业证书打包签名_ios稳定签名_app签名证书服务_免越狱无需上架_稳定的app签名证书_ipa打包代签名_第八区">
    <meta name="description" content="提供高效,快速,稳定不掉的IOS企业签名服务:包含苹果企业签名,IPA企业签名,IOS企业签名质量第一无需越狱,无需上架苹果商店独立企业证书,长期稳定不掉线">
    <link rel="stylesheet" href="/layui/css/layui.css">
    <link rel="stylesheet" href="/css/font_780494_fdjuk9baed7.css">
    <link rel="stylesheet" href="//at.alicdn.com/t/font_1267384_gyc07k981vd.css">
    <script type="text/javascript" async="" src="/js/analytics.js"></script>
    <link rel="stylesheet" type="text/css" href="/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="/css/base.css">
    <link rel="stylesheet" type="text/css" href="/css/main.css">
    <link rel="stylesheet" type="text/css" href="/css/h5.css">
    <script type="text/javascript" src="/js/jquery_003.js"></script>
    <script type="text/javascript" src="/js/bootstrap.js"></script>
    <link rel="shortcut icon" href="/favicon.ico?t=20190611" type="image/x-icon">
</head>
<body class="">

@include('public/header')

<div id="mark_mask" style="display:none;position:fixed;top:40px;left:0;z-index:99999999;height:1000px;width:100%;background:rgba(0,0,0,0.4);"></div><script src="/js/jquery.js"></script>
<div class="release-app-wrap">
    <div class="container">
        <div class="signature1">

            <div class="crumbs"><a href="/admin">控制台</a><span>/</span></div>


            <div class="con">
                <div class="row">
                    <div class="col-sm-2">
                        @include('public/ms-nav')
                    </div>
                    <div class="col-sm-10">
                        <div class="aside-right">
                            <div class="layui-fluid">
                                <div class="layui-row layui-col-space15">
                                    <div class="layui-col-md8">
                                        <div class="layui-card">
                                            <div class="layui-card-header">
                                                代办事项
                                            </div>
                                            <div class="layui-card-body">
                                                <div class="layui-row layui-col-space10">
                                                    <div class="layui-col-xs12 layui-col-sm4">
                                                        <div class="layuiadmin-card-text">
                                                            <div class="layui-text-top"><i class="layui-icon layui-icon-water"></i>
                                                                <a href="/admin/application">待处理订单</a></div>
                                                            <p class="layui-text-center">{{$count['sign']}}</p>
                                                        </div>
                                                    </div>
                                                    <div class="layui-col-xs12 layui-col-sm4">
                                                        <div class="layuiadmin-card-text">
                                                            <div class="layui-text-top"><i class="layui-icon layui-icon-upload-circle"></i>
                                                                <a href="/admin/recharge">待处理充值</a></div>
                                                            <p class="layui-text-center">{{$count['blancecard']}}</p>
                                                        </div>
                                                    </div>
                                                    <div class="layui-col-xs12 layui-col-sm4">
                                                        <div class="layuiadmin-card-text">
                                                            <div class="layui-text-top"><i class="layui-icon layui-icon-rmb"></i>
                                                                <a href="#">总流水</a></div>
                                                            <p class="layui-text-center">{{$count['order']+$count['blance']}}</p>
                                                        </div>
                                                    </div>
                                                    <div class="layui-col-xs12 layui-col-sm4">
                                                        <div class="layuiadmin-card-text">
                                                            <div class="layui-text-top"><i class="layui-icon layui-icon-form"></i>
                                                                <a href="/admin/application">今日订单个数</a></div>
                                                            <p class="layui-text-center">{{$count['todyorder']}}</p>
                                                        </div>
                                                    </div>
                                                    <div class="layui-col-xs12 layui-col-sm4">
                                                        <div class="layuiadmin-card-text">
                                                            <div class="layui-text-top"><i class="layui-icon layui-icon-form"></i>
                                                                <a href="#">交易总额</a></div>
                                                            <p class="layui-text-center">{{$count['order']}}</p>
                                                        </div>
                                                    </div>
                                                    <div class="layui-col-xs12 layui-col-sm4">
                                                        <div class="layuiadmin-card-text">
                                                            <div class="layui-text-top"><i class="layui-icon layui-icon-username"></i>
                                                                <a href="/admin/user">总用户数</a></div>
                                                            <p class="layui-text-center">{{$count['user']}}</p>
                                                        </div>
                                                    </div>
                                                    <div class="layui-col-xs12 layui-col-sm4">
                                                        <div class="layuiadmin-card-text">
                                                            <div class="layui-text-top"><i class="layui-icon layui-icon-form"></i>
                                                                <a href="/admin/user?time=1">今日新增用户数</a></div>
                                                            <p class="layui-text-center">{{$count['newuser']}}</p>
                                                        </div>
                                                    </div>
                                                    <div class="layui-col-xs12 layui-col-sm4">
                                                        <div class="layuiadmin-card-text">
                                                            <div class="layui-text-top"><i class="layui-icon layui-icon-form"></i>
                                                                <a href="/admin/application?day=1">已过期app数量</a></div>
                                                            <p class="layui-text-center">{{$count['out']}}</p>
                                                        </div>
                                                    </div>
                                                    <div class="layui-col-xs12 layui-col-sm4">
                                                        <div class="layuiadmin-card-text">
                                                            <div class="layui-text-top"><i class="layui-icon layui-icon-form"></i>
                                                                <a href="/admin/application?day=7">7天内到期app数量</a></div>
                                                            <p class="layui-text-center">{{$count['seven']}}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="layui-col-md4">
                                        <div class="layui-card">
                                            <div class="layui-card-header">快速开始/便捷导航</div>
                                            <div class="layui-card-body">
                                                <div class="layuiadmin-card-link">
                                                    <button class="layui-btn layui-btn-primary" id="site">
                                                        <i class="layui-icon layui-icon-add-1" style="position: relative; top: -1px;"></i>系统配置修改
                                                    </button>
                                                </div>
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

</body>

<script src="/layui/layui.js"></script>
<script>
    $('#site').click(function () {
        layui.use('layer', function () {
            layer.ready(function() {
                var layer = layui.layer;

                layer.open({
                    type: 2,
                    title: 'env',
                    area: ['65%', '100%'],
                    fixed: false, //不固定
                    maxmin: true,
                    content: '/admin/site'
                });
            });
        })
    });
</script>
</html>
