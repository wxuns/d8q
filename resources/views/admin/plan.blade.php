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
                        @include('public/ms-nav',['data'=>2])
                    </div>
                    <div class="col-sm-10">
                        <div class="aside-right">

                            <div class="table-list-wrap" style="min-height: 453px;">
                                <div class="table-list">
                                    <div class="a-top mb10 clearfix">

{{--                                        <div class="input-search fl">--}}
{{--                                            <input type="text" class="fl" placeholder="输入应用名称" name="search_input" id="keyword" value="">--}}
{{--                                            <span class="iconfont icon-search"></span>--}}
{{--                                        </div>--}}
                                        <div class="fr clearfix how-many">
                                            <button type="button" class="layui-btn layui-btn-normal" onclick="add()">添加套餐</button>

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
<script type="text/html" id="bar">
    <a class="layui-btn layui-btn-xs" lay-event="edit">编辑</a>
    <a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del">删除</a>
</script>
<script>
    layui.use('table', function(){
        var table = layui.table;

        //第一个实例
        table.render({
            elem: '#plan'
            ,height: 312
            ,url: '/admin/plan/get' //数据接口
            ,page: true //开启分页
            ,cols: [[ //表头
                {field: 'id', title: 'ID', width:80, sort: true, fixed: 'left'}
                ,{field: 'name', title: '套餐类型'}
                ,{field: 'info', title: '简介'}
                ,{field: 'month', title: '服务时长', width:100}
                ,{field: 'price', title: '价格', sort: true}
                ,{field: 'remark', title: '备注'}
                ,{fixed: 'right', title: '操作',width:178, align:'center', toolbar: '#bar'}
            ]]
        });
        table.on('tool(plan)', function(obj){
            var data = obj.data;
            if(obj.event === 'detail'){
                layer.msg('ID：'+ data.id + ' 的查看操作');
            } else if(obj.event === 'del'){
                layer.confirm('删除操作不可逆，是否继续？', function(index){
                    $.post('/admin/delplan/'+data.id,{'_token':'{{csrf_token()}}'},function (dd) {
                        if(dd.code == 0){
                            obj.del();
                            layer.msg(dd.message,{icon:1});
                            layer.close(index);
                        }
                    });
                });
            } else if(obj.event === 'edit'){
                layer.open({
                    type: 2,
                    title:'修改套餐',
                    area: ['700px', '450px'],
                    fixed: false, //不固定
                    maxmin: true,
                    content: '/admin/changeplan/'+data.id,
                    end:function () {
                        layui.use('table', function() {
                            var table = layui.table;
                            table.reload('plan', {
                                url: '/admin/plan/get'
                            });
                        });
                    }
                });
            }
        });

    });

    function add() {
        layui.use('layer', function() {
            var layer = layui.layer;
            layer.open({
                type: 2,
                title:'添加套餐',
                area: ['700px', '450px'],
                fixed: false, //不固定
                maxmin: true,
                content: '/admin/plan/add',
                end:function () {
                    layui.use('table', function() {
                        var table = layui.table;
                        table.reload('plan', {
                            url: '/admin/plan/get'
                        });
                    });
                }
            });
        });
    }
</script>
</html>
