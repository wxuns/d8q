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
    <link rel="stylesheet" href="//at.alicdn.com/t/font_780494_fdjuk9baed7.css" />
    <script src="https://js.fundebug.cn/fundebug.1.5.1.min.js" apikey="366273526a484dab7a5373fb1288ef3a8d567f391c68f618d3968cacd4de5f71"></script>
    <link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css?20190611" />
    <link rel="stylesheet" href="/layui/css/layui.css">
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
<link rel="stylesheet" href="/css/font-awesome.css?20190611" />
<script src="/dist/js/bootstrap-paginator.js?20190611"></script>
<div class="release-app-wrap">
    <div class="container">
        <div class="signature1">

            <div class="crumbs"><a href="/sign">企业签名</a><span>/</span>我的签名</div>


            <div class="con">
                <div class="row">
                    <div class="col-sm-2">
                        <div class="left">
                            <ul>
                                <li>
                                    <a href="/sign/upload">
                                        <span class="iconfont icon-upload1"></span>
                                        上传苹果应用
                                    </a>
                                </li>
                                <li class="active">
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
                            <div class="table-list-wrap">
                                <div class="table-list">
                                    <div class="a-top mb10 clearfix">

                                        <div class="input-search fl">
                                            <input type="text" class="fl" placeholder="输入应用名称" name="search_input" id="keyword" value="">
                                            <span class="iconfont icon-search" id="seach"></span>
                                        </div>

                                    </div>
                                    <div class="app-table-wrap">
                                        <div class="table-wrap">
                                            <div class="table-responsive">
                                                <table id="plan" lay-filter="plan"></table>
                                            </div>
                                        </div>
                                        <div style="text-align: center">
                                            <ul id="pager"></ul>
                                        </div>
                                    </div>


                                    <div style="text-align: center">
                                        <ul id="pager"></ul>
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


<script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="/js/clipboard.js?20190611"></script>
<script src="/js/common.min.js?20190611"></script>
<script src="/layui/layui.js"></script>
<script type="text/html" id="bar">
    <a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del">删除</a>
</script>
<script type="text/html" id="downTpl">
    <a href="@{{ d.cospath?d.cospath:'' }}">@{{ d.cospath?d.cospath:'等待中' }}</a>
</script>
<script>
    layui.use('table', function(){
        var table = layui.table;

        //第一个实例
        table.render({
            elem: '#plan'
            ,height: 312
            ,url: '/sign/getlists' //数据接口
            ,page: true //开启分页
            ,cols: [[ //表头
                {field: 'name', title: '名称'}
                ,{field: 'filename', title: '包名'}
                ,{field: 'planname', title: '套餐', width:75}
                ,{field: 'time', title: '到期时间', sort: true}
                ,{fixed: 'right', title: '操作',width:80, align:'center', toolbar: '#bar'}
            ]]
        });
        table.on('tool(plan)', function(obj){
            var data = obj.data;
            if(obj.event === 'download'){
                $.get('/admin/geturl?key='+data.cospath,function (data) {
                    window.open(data)
                })
            } else if(obj.event === 'del'){
                layer.prompt({title: '请输入密码，并确认', formType: 1}, function(pass, index){
                    $.post('/sign/delcert/'+data.logid,{'_token':'{{csrf_token()}}','password':pass},function (dd) {
                        if(dd.code == 0){
                            obj.del();
                            layer.msg(dd.message,{icon:1});
                            layer.close(index);
                        }else{
                            layer.msg(dd.message,{icon:2});
                            layer.close(index);
                        }
                    });
                });
            }
        });

    });

    $('#seach').click(function () {
        var keyword = $('#keyword');
        if (keyword.val()){
            layui.use('table', function() {
                var table = layui.table;
                table.reload('plan', {
                    url: '/sign/getlists?key='+keyword.val()
                });
            });
        } else {
            keyword.focus();
        }
    });
</script>
</body>
</html>
