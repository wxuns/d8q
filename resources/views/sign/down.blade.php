<!DOCTYPE html>
<html lang="zh"><head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <title>iOS企业签名_苹果IPA签名_IPA企业签名_iOS企业证书打包签名_ios稳定签名_app签名证书服务_第八区</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="renderer" content="webkit">
    <meta name="keywords" content="iOS企业签名_苹果IPA签名_IPA企业签名_iOS企业证书打包签名_ios稳定签名_app签名证书服务_免越狱无需上架_稳定的app签名证书_ipa打包代签名_第八区">
    <meta property="og:url" content="https://www.dibaqu.com">
    <meta property="og:title" content="第八区">
    <meta name="baidu-site-verification" content="WDULFadCJ9">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="提供高效,快速,稳定不掉的IOS企业签名服务:包含苹果企业签名,IPA企业签名,IOS企业签名质量第一无需越狱,无需上架苹果商店独立企业证书,长期稳定不掉线">
    <link rel="stylesheet" href="/layui/css/layui.css">
    <link rel="stylesheet" href="/css/font_780494_fdjuk9baed7.css">
    <script type="text/javascript" async="" src="/js/analytics.js"></script>
    <link rel="stylesheet" type="text/css" href="/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="/css/base.css">
    <link rel="stylesheet" type="text/css" href="/css/main.css">
    <link rel="stylesheet" type="text/css" href="/css/h5.css">
    <script type="text/javascript" src="/js/jquery_003.js"></script>
    <script type="text/javascript" src="/js/bootstrap.js"></script>
    <script type="text/javascript" src="/js/vue.js"></script>
    <link rel="shortcut icon" href="/favicon.ico?t=20190611" type="image/x-icon">
    <script>
        isHideFooter = false;
        var static_version = 20190611;
    </script>
</head>
<body class="">
@include('public/header',['data'=>2])
<div id="mark_mask" style="display:none;position:fixed;top:40px;left:0;z-index:99999999;height:1000px;width:100%;background:rgba(0,0,0,0.4);"></div><script src="/js/jquery.js"></script>
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
                                <li class="active"><span>4</span>等待处理</li>
                                <li class="active"><span>5</span>下载签名包</li>
                            </ul>

                            <div class="app-details app-details2">
                                <div class="details-top clearfix">
                                    <dl class="information fl">
                                        <dt>
                                        <span class="i-tit">
                                            <span class="text">{{$sign->filename}}</span>

                                        <span class="iconfont icon-iphone"></span>
                                        </span>
                                        </dt>
                                        <dd>
                                            <span>适用于iOS7.0系统以上的设备</span>
                                        </dd>
                                        <dd class="clearfix">
                                            <span class="add-notes-wrap fl">
                                                <span class="add-notes clearfix" data-container="body" data-toggle="popover" data-placement="bottom" data-content="" data-trigger="hover" data-original-title="" title="">
                                                    <span class="text fl"></span>
                                                </span>
                                                <input type="text" class="form-control" name="remark" value="">
                                                <input type="hidden" name="id" value="390794945234993152">
                                            </span>
                                        </dd>
                                    </dl>
                                    <div class="fr d-right">
                                        <a href="{{$sign->cospath}}" class="ms-btn details-upload-new-version">
                                            <span class="iconfont icon-download"></span><span class="text">下载签名包</span></a>
                                        <a href="/sign/update/{{$key}}" class="ms-btn ml10 details-preview">更新</a>

                                        <a class="ms-btn ml10 details-preview btn-success" data-toggle="modal" href="/sign/renew/{{$key}}">
                                            续费
                                        </a>
                                    </div>
                                </div>
                                <div class="app-information">
                                    <hr>
                                    <div class="details-bottom">
                                        <div class="d-table-wrap">
                                            <div class="table-responsive">
                                                <table>
                                                    <tbody><tr>
                                                        <th><span class="th-line">套餐</span></th>
                                                        <th><span class="th-line">到期时间</span></th>
                                                        <th>
                                                        <span class="th-line">
                                                            签名状态
                                                                                                                    </span>
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <span id="copy" class="bundle-length bundle-length1" data-container="body" data-toggle="popover" data-placement="bottom" data-content="{{$sign->planname}}" data-trigger="hover" data-original-title="" title="">{{$sign->planname}}</span>
                                                        </td>
                                                        <td>
                                                            <div>{{date('Y-m-d H:i:s',$sign->time+$sign->month*30*24*60*60)}}</div>
                                                            <!--/到期 显示-->
                                                        </td>
                                                        <td>
                                                            <div>正常</div>
                                                            <!--/到期 显示-->
                                                        </td>
                                                    </tr>
                                                    </tbody></table>
                                                <table>
                                                    <tbody><tr>
                                                        <th>
                                                            <!--内测版-->
                                                            <span class="th-line" title="内测设备">证书名称</span>
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="bundle-length bundle-length2" data-container="body" data-toggle="popover" data-placement="bottom" data-content="" data-trigger="hover" data-original-title="" title="">
                                                                {{$sign->certname}}
                                                            </div>
                                                        </td>

                                                    </tr>
                                                    </tbody></table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="table-list">
                                    <div class="version-tit"><span class="iconfont icon-jilu"></span>发布版本记录</div>
                                    <div class="table-responsive">
                                        <table class="table version-history-table">
                                            <tbody><tr>
                                                <th>版本</th>
                                                <th>证书名称</th>
                                                <th>更新说明</th>
                                                <th>签名时间</th>
                                                <!--<th>下载次数</th>-->
                                            </tr>
                                            @foreach($cretlog as $k=>$c)
                                            <tr>
                                                <td class="angle-parent">
                                                    @if($k+1 == count($cretlog))
                                                    <img class="angle" src="//pic.dibaqu.com/static/img/angle-1.png?20190125?20190611">
                                                @endif
                                                {{$k+1}}
                                                <td>
                                                    <div class="bundle-length" data-container="body" data-toggle="popover" data-placement="bottom" data-content="" data-trigger="hover" data-original-title="" title="">
                                                        {{$c->name}}
                                                    </div>
                                                </td>
                                                <td>
                                                    -- --
                                                </td>
                                                <td>{{date('Y-m-d H:i:s',$c->time)}}</td>
                                            </tr>
                                                @endforeach
                                            </tbody></table>
                                    </div>
                                    <!--分页-->
                                    <!--/分页-->
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


    <div class="modal fade ms-modal" id="myModal5" tabindex="-1" role="dialog" style="display: none;">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">用户签名协议</h4>
                </div>
                <div class="modal-body">
                    <div class="con">
                        请在使用企业签名服务前，仔细阅读并充分理解以下内容及条款：<br>
                        1.您知晓并同意，您提交给第八区（包括第八区旗下所有产品）的
                        App，不包括任何违反中国境内相关法律的内容，也不会用于违反中国境内相关法律的任何用途。否则，由此而出现的任何法律风险和后果，将由您自行全部承担；<br>
                        2.您知晓并同意，您并不会将第八区网站上所提供的任何一项服务用于违反中国相关法律的用途，否则，由此而出现的所有法律后果，将由您自行全部承担；<br>
                        3.您知晓并同意，您购买此服务的用途需符合苹果企业签名的所有规定，若违反相关规定产生的法律后果由您自行全部承担，我们只提供软件签名的技术服务；<br>
                        4.您知晓并同意，您没有向第八区网站提交任何的虚假信息或材料，也没有故意隐瞒您的 App 中可能存在的违法内容。否则，由此出现的所有后果，将由您自行全部承担；<br>
                        5.您知晓并同意，苹果企业签名因受到苹果政策影响，在未来可能会存在被苹果撤销从而导致应用出现无法安装或闪退等情况，您同意并愿意独立承担该风险以及该风险导致的的后续一切损失，并接受我们在后续为此而做出的补签等措施；<br>
                        6.您知晓并同意，您向我们提供的
                        App（手机应用程序）保证您拥有完整独立的知识产权，包括但不限于外观设计、著作权、文本，图形，徽标，按钮图标，图像，音频剪辑，且不会被用于未经许可的任何有关产品或服务；<br>
                        7.我们作为第三方中立平台，不具有对您上传的内容进行审查的义务，但我们在认为有需要时，我们有权利对您上传的内容进行审查，审查结果及审查后的进一步动作可由我们进行自行裁定。您对此表示理解并同意，并愿意承担因审查出现的全部后果；<br>
                        8.金融类App需提供金融资质才可以进行企业证书签名，如无资质请勿购买；<br>
                        9.签名属于工具服务，一旦签名完成，非服务问题，概不退款，购买前请知晓；<br>
                        10.您已仔细阅读并同意《第八区网站服务协议》。
                        <p class="mt15">点击<span class="color-hover">“同意”</span>代表已仔细阅读并同意以上所有内容。</p>
                    </div>
                    <div class="btn-merge text-center mt30">
                        <a href="/sign/lists" class="ms-btn">取消</a>
                        <button id="agree_btn" class="ms-btn ms-btn-primary ml20 w120" aria-label="Close">同意
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script type="text/javascript" src="/js/plupload.js"></script>
    <script type="text/javascript" src="/js/qiniu.js"></script>


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




</body></html>
