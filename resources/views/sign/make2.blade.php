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
    <link rel="stylesheet" type="text/css" href="/css/base.css?20190611" />
    <link rel="stylesheet" type="text/css" href="/css/main.css?20190611" />
    <link rel="stylesheet" type="text/css" href="/css/h5.css?20190611" />
    <script type="text/javascript" src="/js/jquery.min.js?20190611"></script>
    <script type="text/javascript" src="/js/bootstrap.min.js?20190611"></script>
    <script type="text/javascript" src="/js/vue.js?20190611"></script>
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
                                <li><span>3</span>选择套餐</li>
                                <li><span>4</span>等待处理</li>
                                <li><span>5</span>下载签名包</li>
                            </ul>

                            <div class="step2 step-common">
                                <div class="tit">请填写APP签名信息</div>
                                <form class="form-submitInfo form-horizontal layui-form" method="post" action="/sign/info">
                                    <div class="form-group clearfix app-name">
                                        <div class="col-sm-2 control-label">APP名称</div>
                                        <div class="col-sm-4">{{$appname}}</div>
                                    </div>
                                    <div class="form-group clearfix">
                                        <label class="control-label col-sm-2"><span>*</span>Q Q号</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" rows="5" placeholder="请填写真实有效的QQ，方便客服联系" name="qq" lay-verify="required|number|qq">
                                            <span class="error-prompt">请填写真实有效的QQ号</span>
                                        </div>
                                    </div>
                                    <div class="form-group clearfix">
                                        <label class="control-label col-sm-2"><span>*</span>常用邮箱</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" rows="5" placeholder="请填写真实有效的邮箱地址，方便客服联系" name="email" lay-verify="email">
                                            <span class="error-prompt">请输入正确的邮箱</span>
                                        </div>
                                    </div>
                                    <div class="form-group clearfix">
                                        <label class="control-label col-sm-2">备注说明</label>
                                        <div class="col-sm-6">
                                            <textarea class="form-control" rows="5" placeholder="" name="remark"></textarea>
                                        </div>
                                    </div>
                                    <input type="hidden" name="id" value="{{$token}}">
                                    @csrf
                                    <div class="form-group clearfix mt40">
                                        <label class="control-label col-sm-2"></label>
                                        <div class="col-sm-6">
                                            <a href="javascript:history.go(-1);" class="ms-btn color-hover">上一步</a>
                                            <button type="button" class="ms-btn ms-btn-primary w140 submitInfo" lay-submit lay-filter="submit">
                                                下一步
                                            </button>
                                        </div>
                                    </div>
                                </form>
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


<script src="/layui/layui.js"></script>
<script>
    layui.use('form', function(){
        var form = layui.form;
        form.verify({
            qq: function(value){
                if(value.length < 5){
                    return 'QQ至少得5个数字';
                }
            }
        });
        //监听提交
        form.on('submit(submit)', function(data){
            $.post('/sign/info',data.field,function (dds) {
                if(dds.code == 0){
                    window.location.href = '/sign/plan/{{$token}}';
                }else if (dds.code == 4) {
                    layer.msg(dds.message,{icon:0});
                }
            });
            return false;
        });
    });
</script>
</body>
</html>
