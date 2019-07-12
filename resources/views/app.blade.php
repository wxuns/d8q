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
@include('public/header',['data'=>1])
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
                                    <a href="/apps">
                                        <span class="iconfont icon-qianming"></span>
                                        应用列表
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

<script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="/js/clipboard.js?20190611"></script>
<script src="/js/common.min.js?20190611"></script>
<script src="/layui/layui.js"></script>
<script type="text/html" id="closeTpl">
    @{{# if(!d.subid){ }} 待付款
    @{{# }else if(!d.certid){ }}待分配
    @{{# }else{ }}已完成
    @{{# } }}
</script>
<script type="text/html" id="cospathTpl">
    <a href="@{{ d.cospath?d.cospath:'' }}">@{{ d.cospath?d.cospath:'等待中' }}</a>
</script>
<script type="text/html" id="bar">
    <a class="layui-btn layui-btn-warm layui-btn-xs" href="/sign/renew/@{{d.key}}">续费</a>
    @{{# if(d.subid){ }}
    <a class="layui-btn layui-btn-normal layui-btn-xs" href="/sign/update/@{{ d.key }}">更新</a>
    @{{# if(d.cospath){ }}
    <a class="layui-btn layui-btn-warm layui-btn-xs" href="/sign/down/@{{ d.key }}">详情</a>
    @{{# } }}
    @{{# }else{ }}
    <a class="layui-btn layui-btn-xs" href="/sign/plan/@{{ d.key }}">去付款</a>
    @{{# } }}
    <a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del">删除</a>
</script>
<script>
    layui.use('table', function(){
        var table = layui.table;

        //第一个实例
        table.render({
            elem: '#plan'
            ,height: 312
            ,url: 'getapps' //数据接口
            ,page: true //开启分页
            ,cols: [[ //表头
                {field: 'id', title: 'ID', sort: true, width:50, fixed: 'left'}
                ,{field: 'filename', title: '应用名'}
                ,{field: 'day', title: '剩余时长/天'}
                ,{field: 'cospath', title: '下载链接', templet: '#cospathTpl'}
                ,{field: 'isclosed', title: '状态', templet: '#closeTpl', width:75}
                ,{fixed: 'right', title: '操作',width:200, align:'center', toolbar: '#bar'}
            ]]
        });
        table.on('tool(plan)', function(obj){
            var data = obj.data;
            if(obj.event === 'del'){
                layer.prompt({title: '请输入密码，并确认', formType: 1}, function(pass, index){
                    $.post('/delapp/'+data.key,{'_token':'{{csrf_token()}}','password':pass},function (dd) {
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
                    url: '/getapps?key='+keyword.val()
                });
            });
        } else {
            keyword.focus();
        }
    });
</script>
</body>
</html>
