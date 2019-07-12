<!doctype html>
<html lang="zh">
<head>
    <title>服务价格--第八区</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="renderer" content="webkit">
    <meta name="keywords" content="">
    <meta property="og:url" content="https://www.dibaqu.com">
    <meta property="og:title" content="第八区">
    <meta name="baidu-site-verification" content="WDULFadCJ9" />
    <meta name="description" content="">
    <link rel="stylesheet" href="//at.alicdn.com/t/font_780494_fdjuk9baed7.css" />
    <script src="https://js.fundebug.cn/fundebug.1.5.1.min.js" apikey="366273526a484dab7a5373fb1288ef3a8d567f391c68f618d3968cacd4de5f71"></script>
    <link rel="stylesheet" type="text/css" href="/css/swiper.min.css?20190611" />
    <link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css?20190611" />
    <link rel="stylesheet" type="text/css" href="/css/base.css?20190611" />
    <link rel="stylesheet" type="text/css" href="/css/main.css?20190611" />
    <link rel="stylesheet" type="text/css" href="/css/h5.css?20190611" />
    <script type="text/javascript" src="/js/jquery.min.js?20190611"></script>
    <script type="text/javascript" src="/js/bootstrap.min.js?20190611"></script>
    <script type="text/javascript" src="/js/vue.js?20190611"></script>
    <script type="text/javascript" src="/js/js.js?20190611"></script>
    <script type="text/javascript" src="/js/swiper.min.js?20190611"></script>
    <link rel="shortcut icon" href="//dibaqu.com/favicon.ico?t=20190611" type="image/x-icon" />
    <script>
        isHideFooter = false;
        var static_version = 20190611;
    </script>
</head>
<body>
@include('public/header',['data'=>3])
<script>isHideFooter = false;</script>
<div id="app">
    <div>
        <Price v-show="$route.path == '/price'"></Price>
        <router-view></router-view>
    </div>
</div>

<template id="price">
    <div>
        <div class="hidden-xs">
            <div class="new-price-banner">
                <div class="container">
                    <div class="banner-con">
                        <h3>第八区价格与服务</h3>
                        <p>
                            开启高效的移动APP解决方案，全程自助服务
                        </p>
                    </div>
                </div>
            </div>
            <div class="container">
                <ul class="clearfix new-price-list">
                    <li>
                        <img src="/images/price-1.png?20190611">
                        <h3>封装APP</h3>
                        <p>
                            网站链接打包封装成原生APP<br>
                            多种插件任意搭配
                        </p>
                        <div class="amount">￥<span class="num">@{{price.pack}}</span>起</div>
                        <router-link to="/price/pack" class="more new-price-btn">查看更多</router-link>
                        <dl>
                            <dd>支持安卓、苹果</dd>
                            <dd>在线制作图标、启动图</dd>
                            <dd>返回、刷新、加载、清除缓存</dd>
                            <dd>状态栏、侧边栏</dd>
                            <dd>导航栏（底部）</dd>
                            <dd>标题栏（顶部）</dd>
                            <dd>分享到微信、微博、QQ等</dd>
                            <dd>极光推送、友盟统计</dd>
                            <dd>引导页</dd>
                            <dd>扫一扫</dd>
                            <dd>长按图片保存、识别二维码</dd>
                        </dl>
                    </li>
                    <li v-if="shanqing" class="active">
                        <img src="/images/price-3.png?20190611">
                        <h3>分发次数(大包)</h3>
                        <p>
                            上传APP获得下载链接和二维码<br>
                            下载次数包
                        </p>
                        <div class="amount">￥<span class="num">@{{price.publish}}</span>起</div>
                        <router-link :to="{path: '/price/publish', query: {id: 2}}" class="more new-price-btn">查看更多</router-link>
                        <dl>
                            <dd>免费每天赠送10次下载</dd>
                            <dd>CDN高速下载</dd>
                            <dd>支持安卓和苹果合并</dd>
                            <dd>下载页无广告</dd>
                            <dd>支持1.5G以内大小的包</dd>
                            <dd>下载页专享模板</dd>
                        </dl>
                    </li>
                    <li v-else class="active">
                        <img src="/images/price-2.png?20190611">
                        <h3>企业签名</h3>
                        <p>
                            无需越狱 无需上架 无限制安装<br>
                            多种套餐 任意选择
                        </p>
                        <div class="amount">￥<span class="num">@{{price.sign}}</span>起</div>
                        <router-link to="/price/sign" class="more new-price-btn">查看更多</router-link>
                        <dl>
                            <dd>1天免费</dd>
                            <dd>免费更新</dd>
                            <dd>证书分类签名</dd>
                            <dd>短信/邮件通知</dd>
                            <dd>赠送下载次数</dd>
                            <dd>技术支持</dd>
                            <dd>真机测试</dd>
                            <dd>IPA包检测信息（版本、大小等）</dd>
                            <dd>程序自动签名</dd>
                        </dl>
                    </li>
                    <li>
                        <img src="/images/price-3.png?20190611">
                        <h3 v-if="shanqing">分发次数(小包)</h3>
                        <h3 v-else>分发次数</h3>
                        <p>
                            上传APP获得下载链接和二维码<br>
                            下载次数包
                        </p>
                        <div class="amount">￥<span class="num">@{{price.publish}}</span>起</div>
                        <router-link to="/price/publish" class="more new-price-btn">查看更多</router-link>
                        <dl>
                            <dd>免费每天赠送1000次下载</dd>
                            <dd>CDN高速下载</dd>
                            <dd>支持安卓和苹果合并</dd>
                            <dd>下载页无广告</dd>
                            <dd v-if="shanqing">支持300M以内大小的包</dd>
                            <dd v-else>支持1.5G以内大小的包</dd>
                            <dd>下载页专享模板</dd>
                        </dl>
                    </li>
                </ul>
            </div>
        </div>
        <div class="visible-xs">
            <div class="mobile-price">
                <ul class="tab clearfix">
                    <li class="active"><a href="javascript:;">企业签名</a></li>
                    <li><a href="javascript:;">封装APP</a></li>
                    <li><a href="javascript:;">分发次数</a></li>
                </ul>
                <div class="m-price-banner">
                    <div class="swiper-container">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide" style="background-image: url(/images/m-price-1.jpg?20190611)">
                                <div class="tit">iOS企业证书签名</div>
                                <p>无需越狱，无需上架，无限制安装<br>长久稳定</p>
                            </div>
                            <div class="swiper-slide" style="background-image: url(/images/m-price-2.jpg?20190611)">
                                <div class="tit">封装APP</div>
                                <p>网站链接快速封装成移动APP<br>多功能插件任意搭配使用</p>
                            </div>
                            <div class="swiper-slide" style="background-image: url(/images/m-price-3.jpg?20190611)">
                                <div class="tit">发布上传</div>
                                <p>上传自动生成下载链接和二维码<br> 支持1.5G以内的APP CDN高速下载</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-con">
                    <div style="display: block;">
                        <div class="container">
                            <div class="m-price-common">
                                <div class="tit-wrap">
                                    <ul class="tit clearfix">
                                        <li class="left"><img src="/images/m-price-4.png?20190611"></li>
                                        <li class="center">套餐介绍</li>
                                        <li class="right"><img src="/images/m-price-5.png?20190611"></li>
                                    </ul>
                                </div>
                                <div class="row">
                                    <div class="col-xs-4" v-for="(item, index) in sign">
                                        <div class="con" :class="'con' + index">
                                            <div class="level">@{{item.level}}</div>
                                            <div class="img-wrap"><img src="/images/m-price-7.png?20190611"></div>
                                            <div class="msg">@{{item.msg}}</div>
                                            <div class="num"><span>@{{item.title}}</span>/@{{item.unit}}</div>
                                            <span class="recommended" v-show="item.is_recommended == 1">推荐</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="bg-f3">
                            <div class="container">
                                <div class="m-price-common">
                                    <div class="tit-wrap">
                                        <ul class="tit clearfix">
                                            <li class="left"><img src="/images/m-price-4.png?20190611"></li>
                                            <li class="center">价格介绍</li>
                                            <li class="left"><img src="/images/m-price-5.png?20190611"></li>
                                        </ul>

                                    </div>
                                    <table class="table price-table">
                                        <tr>
                                            <th></th>
                                            <th>基础版</th>
                                            <th>高级版</th>
                                            <th>独立版</th>
                                        </tr>
                                        <tr v-for="item in signPrice">
                                            <td>@{{item.time}}</td>
                                            <td><span class="num">@{{item.base_price}}</span>元</td>
                                            <td><span class="num">@{{item.senior_price}}</span>元</td>
                                            <td><span class="num">@{{item.independent_price}}</span>元</td>
                                        </tr>
                                        <tr>
                                            <td>更新</td>
                                            <td>免费</td>
                                            <td>免费</td>
                                            <td>免费</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="bg-f3">
                            <div class="container">
                                <div class="m-price-common">
                                    <div class="tit-wrap">
                                        <ul class="tit clearfix">
                                            <li class="left"><img src="/images/m-price-4.png?20190611"></li>
                                            <li class="center">服务介绍</li>
                                            <li class="right"><img src="/images/m-price-5.png?20190611"></li>
                                        </ul>
                                    </div>
                                    <ul class="tab-level clearfix">
                                        <li class="active">
                                            <span class="level">基础版<span class="stable stable0">最稳定</span></span>
                                        </li>
                                        <li>
                                            <span class="level">高级版<span class="stable stable1">最稳定</span></span>
                                        </li>
                                        <li>
                                            <span class="level">独立版<span class="stable stable2">最稳定</span></span>
                                        </li>
                                    </ul>
                                    <div class="tab-level-con">

                                        <div class="row" style="display: block;">
                                            <div class="col-xs-4">
                                                <div class="level-con">
                                                    <div class="img-wrap"><img src="/images/m-price-8.png?20190611"></div>
                                                    <div class="p1">证书分类签名</div>
                                                </div>
                                            </div>
                                            <div class="col-xs-4">
                                                <div class="level-con">
                                                    <div class="img-wrap"><img src="/images/m-price-9.png?20190611"></div>
                                                    <div class="p1">短信/邮件通知</div>
                                                </div>
                                            </div>
                                            <div class="col-xs-4">
                                                <div class="level-con">
                                                    <div class="img-wrap"><img src="/images/m-price-10.png?20190611"></div>
                                                    <div class="p1">自动签名</div>
                                                </div>
                                            </div>
                                            <div class="col-xs-4">
                                                <div class="level-con">
                                                    <div class="img-wrap"><img src="/images/m-price-11.png?20190611"></div>
                                                    <div class="p1">检测IPA信息</div>
                                                </div>
                                            </div>
                                            <div class="col-xs-4">
                                                <div class="level-con">
                                                    <div class="img-wrap"><img src="/images/m-price-12.png?20190611"></div>
                                                    <div class="p1">真机测试</div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-xs-4">
                                                <div class="level-con">
                                                    <div class="img-wrap"><img src="/images/m-price-8.png?20190611"></div>
                                                    <div class="p1">证书分类签名</div>
                                                </div>
                                            </div>
                                            <div class="col-xs-4">
                                                <div class="level-con">
                                                    <div class="img-wrap"><img src="/images/m-price-9.png?20190611"></div>
                                                    <div class="p1">短信/邮件通知</div>
                                                </div>
                                            </div>
                                            <div class="col-xs-4">
                                                <div class="level-con">
                                                    <div class="img-wrap"><img src="/images/m-price-10.png?20190611"></div>
                                                    <div class="p1">自动签名</div>
                                                </div>
                                            </div>
                                            <div class="col-xs-4">
                                                <div class="level-con">
                                                    <div class="img-wrap"><img src="/images/m-price-11.png?20190611"></div>
                                                    <div class="p1">检测IPA信息</div>
                                                </div>
                                            </div>
                                            <div class="col-xs-4">
                                                <div class="level-con">
                                                    <div class="img-wrap"><img src="/images/m-price-12.png?20190611"></div>
                                                    <div class="p1">真机测试</div>
                                                </div>
                                            </div>
                                            <div class="col-xs-4">
                                                <div class="level-con">
                                                    <div class="img-wrap"><img src="/images/m-price-30.png?20190611"></div>
                                                    <div class="p1">网络代理</div>
                                                </div>
                                            </div>
                                            <div class="col-xs-4">
                                                <div class="level-con">
                                                    <div class="img-wrap"><img src="/images/m-price-31.png?20190611"></div>
                                                    <div class="p1">计步器</div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-xs-4">
                                                <div class="level-con">
                                                    <div class="img-wrap"><img src="/images/m-price-8.png?20190611"></div>
                                                    <div class="p1">证书分类签名</div>
                                                </div>
                                            </div>
                                            <div class="col-xs-4">
                                                <div class="level-con">
                                                    <div class="img-wrap"><img src="/images/m-price-9.png?20190611"></div>
                                                    <div class="p1">短信/邮件通知</div>
                                                </div>
                                            </div>
                                            <div class="col-xs-4">
                                                <div class="level-con">
                                                    <div class="img-wrap"><img src="/images/m-price-10.png?20190611"></div>
                                                    <div class="p1">自动签名</div>
                                                </div>
                                            </div>
                                            <div class="col-xs-4">
                                                <div class="level-con">
                                                    <div class="img-wrap"><img src="/images/m-price-11.png?20190611"></div>
                                                    <div class="p1">检测IPA信息</div>
                                                </div>
                                            </div>
                                            <div class="col-xs-4">
                                                <div class="level-con">
                                                    <div class="img-wrap"><img src="/images/m-price-12.png?20190611"></div>
                                                    <div class="p1">真机测试</div>
                                                </div>
                                            </div>
                                            <div class="col-xs-4">
                                                <div class="level-con">
                                                    <div class="img-wrap"><img src="/images/m-price-30.png?20190611"></div>
                                                    <div class="p1">网络代理</div>
                                                </div>
                                            </div>
                                            <div class="col-xs-4">
                                                <div class="level-con">
                                                    <div class="img-wrap"><img src="/images/m-price-31.png?20190611"></div>
                                                    <div class="p1">计步器</div>
                                                </div>
                                            </div>
                                            <div class="col-xs-4">
                                                <div class="level-con">
                                                    <div class="img-wrap"><img src="/images/m-price-14.png?20190611"></div>
                                                    <div class="p1">消息推送</div>
                                                </div>
                                            </div>
                                            <div class="col-xs-4">
                                                <div class="level-con">
                                                    <div class="img-wrap"><img src="/images/m-price-15.png?20190611"></div>
                                                    <div class="p1">提供备用证书</div>
                                                </div>
                                            </div>
                                            <div class="col-xs-4">
                                                <div class="level-con">
                                                    <div class="img-wrap"><img src="/images/m-price-16.png?20190611"></div>
                                                    <div class="p1">技术支持</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="bg-f3">
                            <div class="container">
                                <div class="m-price-common">
                                    <div class="tit-wrap">
                                        <ul class="tit clearfix">
                                            <li class="left"><img src="/images/m-price-4.png?20190611"></li>
                                            <li class="center">常见问题</li>
                                            <li class="right"><img src="/images/m-price-5.png?20190611"></li>
                                        </ul>
                                    </div>
                                    <div class="help">
                                        <dl>
                                            <dt class="clearfix">
                                                <span class="left">Q ：</span>
                                                <span class="right">苹果APP必须要做企业签名吗？</span>
                                            </dt>
                                            <dd class="clearfix">
                                                <span class="left">A ：</span>
                                                <span class="right">是的，如果不做企业签名，无法安装到苹果设备上。</span>
                                            </dd>
                                        </dl>
                                        <dl>
                                            <dt class="clearfix">
                                                <span class="left">Q ：</span>
                                                <span class="right">做完签名后，限制安装吗？</span>
                                            </dt>
                                            <dd class="clearfix">
                                                <span class="left">A ：</span>
                                                <span class="right">不限制，无限制安装。</span>
                                            </dd>
                                        </dl>
                                        <dl>
                                            <dt class="clearfix">
                                                <span class="left">Q ：</span>
                                                <span class="right">做完签名后，可以在苹果商店搜索到吗？</span>
                                            </dt>
                                            <dd class="clearfix">
                                                <span class="left">A ：</span>
                                                <span class="right">搜索不到，必须要提交苹果商店后才能被搜到。</span>
                                            </dd>
                                        </dl>
                                        <dl>
                                            <dt class="clearfix">
                                                <span class="left">Q ：</span>
                                                <span class="right">企业签名的步骤是什么？</span>
                                            </dt>
                                            <dd class="clearfix">
                                                <span class="left">A ：</span>
                                                <span class="right">
1. 点击导航栏【签名】，将需要签的APP上传；<br>
2. 填写信息（联系方式、测试账号等）；<br>
3. 选择所需套餐进行购买；<br>
4. 等待10分钟程序签名；<br>
5. 签名完成，下载签名包。<br>
</span>
                                            </dd>
                                        </dl>
                                        <dl>
                                            <dt class="clearfix">
                                                <span class="left">Q ：</span>
                                                <span class="right">什么是检测IPA信息？</span>
                                            </dt>
                                            <dd class="clearfix">
                                                <span class="left">A ：</span>
                                                <span class="right">APP做完签名后，即可检测到APP的大小，版本、适合的iOS系统、签名证书等信息。</span>
                                            </dd>
                                        </dl>
                                        <dl>
                                            <dt class="clearfix">
                                                <span class="left">Q ：</span>
                                                <span class="right">什么是真机测试？</span>
                                            </dt>
                                            <dd class="clearfix">
                                                <span class="left">A ：</span>
                                                <span class="right">APP签名完成后，将会用主流苹果机型进行测试安装，安装无误后进行发出。</span>
                                            </dd>
                                        </dl>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="bg-f3">
                            <div class="container">
                                <div class="understand-more">
                                    <div class="p1">如需企业签名，建议您登录第八区网站，进行签名操作</div>
                                    <a href="/sign" class="ms-btn ms-btn-primary">了解更多企业签名相关信息</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="container">
                            <div class="m-price-common m-pack-price">
                                <div class="tit-wrap">
                                    <ul class="tit clearfix">
                                        <li class="left"><img src="/images/m-price-4.png?20190611"></li>
                                        <li class="center">套餐介绍</li>
                                        <li class="right"><img src="/images/m-price-5.png?20190611"></li>
                                    </ul>
                                </div>
                                <div class="row">
                                    <div class="col-xs-4" v-for="(item, index) in pack">
                                        <div class="con" :class="'con' + index">
                                            <div class="level">@{{item.level}}</div>
                                            <div class="img-wrap"><img src="/images/m-price-7.png?20190611"></div>
                                            <div class="msg">@{{item.msg}}</div>
                                            <div class="num"><span>@{{item.title}}</span>/@{{item.unit}}</div>
                                            <span class="recommended" v-show="item.is_recommended == 1">限时特惠</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="bg-f3">
                            <div class="container">
                                <div class="m-price-common pack-level">
                                    <div class="tit-wrap">
                                        <ul class="tit clearfix">
                                            <li class="left"><img src="/images/m-price-4.png?20190611"></li>
                                            <li class="center">价格介绍</li>
                                            <li class="left"><img src="/images/m-price-5.png?20190611"></li>
                                        </ul>
                                        <div class="p2">活动期间，基础版和高级版暂时同样价格</div>
                                    </div>
                                    <table class="table price-table">
                                        <tr>
                                            <th></th>
                                            <th>基础版</th>
                                            <th>高级版</th>
                                        </tr>
                                        <tr v-for="item in packPrice">
                                            <td>@{{item.time}}</td>
                                            <td><span class="num">@{{item.base_price}}</span>元</td>
                                            <td><span class="num">@{{item.senior_price}}</span>元</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="bg-f3">
                            <div class="container">
                                <div class="m-price-common pack-level">
                                    <div class="tit-wrap">
                                        <ul class="tit clearfix">
                                            <li class="left"><img src="/images/m-price-4.png?20190611"></li>
                                            <li class="center">服务介绍</li>
                                            <li class="right"><img src="/images/m-price-5.png?20190611"></li>
                                        </ul>
                                    </div>
                                    <ul class="tab-level clearfix">
                                        <li class="active">
                                            <span class="level">基础版</span>
                                        </li>
                                        <li>
                                            <span class="level">高级版</span>
                                        </li>

                                    </ul>
                                    <div class="tab-level-con">

                                        <div class="row" style="display: block;">
                                            <div class="col-xs-4">
                                                <div class="level-con">
                                                    <div class="img-wrap"><img src="/images/m-pack-1.png?20190611"></div>
                                                    <div class="p1">制作图标</div>
                                                    <div class="hot"><span>HOT</span></div>
                                                </div>
                                            </div>
                                            <div class="col-xs-4">
                                                <div class="level-con">
                                                    <div class="img-wrap"><img src="/images/m-pack-2.png?20190611"></div>
                                                    <div class="p1">制作启动图</div>
                                                    <div class="hot"><span>HOT</span></div>
                                                </div>
                                            </div>
                                            <div class="col-xs-4">
                                                <div class="level-con">
                                                    <div class="img-wrap"><img src="/images/m-pack-3.png?20190611"></div>
                                                    <div class="p1">加载动画</div>
                                                    <div class="hot"><span>HOT</span></div>
                                                </div>
                                            </div>
                                            <div class="col-xs-4">
                                                <div class="level-con">
                                                    <div class="img-wrap"><img src="/images/m-pack-4.png?20190611"></div>
                                                    <div class="p1">清理缓存</div>
                                                    <div class="hot show"><span>HOT</span></div>
                                                </div>
                                            </div>
                                            <div class="col-xs-4">
                                                <div class="level-con">
                                                    <div class="img-wrap"><img src="/images/m-pack-5.png?20190611"></div>
                                                    <div class="p1">浏览器内核</div>
                                                    <div class="hot"><span>HOT</span></div>
                                                </div>
                                            </div>
                                            <div class="col-xs-4">
                                                <div class="level-con">
                                                    <div class="img-wrap"><img src="/images/m-pack-6.png?20190611"></div>
                                                    <div class="p1">退出提示</div>
                                                    <div class="hot"><span>HOT</span></div>
                                                </div>
                                            </div>
                                            <div class="col-xs-4">
                                                <div class="level-con">
                                                    <div class="img-wrap"><img src="/images/m-pack-7.png?20190611"></div>
                                                    <div class="p1">下拉刷新</div>
                                                    <div class="hot show"><span>HOT</span></div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row senior">
                                            <div class="col-xs-4">
                                                <div class="level-con">
                                                    <div class="img-wrap"><img src="/images/m-pack-8.png?20190611"></div>
                                                    <div class="p1">极光推送</div>
                                                    <div class="hot"><span>HOT</span></div>
                                                </div>
                                            </div>
                                            <div class="col-xs-4">
                                                <div class="level-con">
                                                    <div class="img-wrap"><img src="/images/m-pack-9.png?20190611"></div>
                                                    <div class="p1">友盟统计</div>
                                                    <div class="hot"><span>HOT</span></div>
                                                </div>
                                            </div>
                                            <div class="col-xs-4">
                                                <div class="level-con">
                                                    <div class="img-wrap"><img src="/images/m-pack-10.png?20190611"></div>
                                                    <div class="p1">导航栏</div>
                                                    <div class="hot show"><span>HOT</span></div>
                                                </div>
                                            </div>
                                            <div class="col-xs-4">
                                                <div class="level-con">
                                                    <div class="img-wrap"><img src="/images/m-pack-11.png?20190611"></div>
                                                    <div class="p1">标题栏</div>
                                                    <div class="hot show"><span>HOT</span></div>
                                                </div>
                                            </div>
                                            <div class="col-xs-4">
                                                <div class="level-con">
                                                    <div class="img-wrap"><img src="/images/m-pack-12.png?20190611"></div>
                                                    <div class="p1">状态栏</div>
                                                    <div class="hot"><span>HOT</span></div>
                                                </div>
                                            </div>
                                            <div class="col-xs-4">
                                                <div class="level-con">
                                                    <div class="img-wrap"><img src="/images/m-pack-13.png?20190611"></div>
                                                    <div class="p1">侧边栏</div>
                                                    <div class="hot"><span>HOT</span></div>
                                                </div>
                                            </div>
                                            <div class="col-xs-4">
                                                <div class="level-con">
                                                    <div class="img-wrap"><img src="/images/m-pack-14.png?20190611"></div>
                                                    <div class="p1">引导页</div>
                                                    <div class="hot"><span>HOT</span></div>
                                                </div>
                                            </div>
                                            <div class="col-xs-4">
                                                <div class="level-con">
                                                    <div class="img-wrap"><img src="/images/m-pack-15.png?20190611"></div>
                                                    <div class="p1">分享</div>
                                                    <div class="hot show"><span>HOT</span></div>
                                                </div>
                                            </div>
                                            <div class="col-xs-4">
                                                <div class="level-con">
                                                    <div class="img-wrap"><img src="/images/m-pack-16.png?20190611"></div>
                                                    <div class="p1">URL拉起APP</div>
                                                    <div class="hot"><span>HOT</span></div>
                                                </div>
                                            </div>
                                            <div class="col-xs-4">
                                                <div class="level-con">
                                                    <div class="img-wrap"><img src="/images/m-pack-17.png?20190611"></div>
                                                    <div class="p1">网页缩放</div>
                                                    <div class="hot"><span>HOT</span></div>
                                                </div>
                                            </div>
                                            <div class="col-xs-4">
                                                <div class="level-con">
                                                    <div class="img-wrap"><img src="/images/m-pack-18.png?20190611"></div>
                                                    <div class="p1">识别二维码</div>
                                                    <div class="hot show"><span>HOT</span></div>
                                                </div>
                                            </div>
                                            <div class="col-xs-4">
                                                <div class="level-con">
                                                    <div class="img-wrap"><img src="/images/m-pack-19.png?20190611"></div>
                                                    <div class="p1">长按保存图片</div>
                                                    <div class="hot"><span>HOT</span></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="bg-f3">
                            <div class="container">
                                <div class="m-price-common">
                                    <div class="tit-wrap">
                                        <ul class="tit clearfix">
                                            <li class="left"><img src="/images/m-price-4.png?20190611"></li>
                                            <li class="center">常见问题</li>
                                            <li class="right"><img src="/images/m-price-5.png?20190611"></li>
                                        </ul>
                                    </div>
                                    <div class="help">
                                        <dl>
                                            <dt class="clearfix">
                                                <span class="left">Q ：</span>
                                                <span class="right">封装好的APP，可以直接安装吗？</span>
                                            </dt>
                                            <dd class="clearfix">
                                                <span class="left">A ：</span>
                                                <span class="right">封装好的安卓APP，可以直接在手机上安装；封装的iOS APP，必须要做企业签名，或者上架商店，才可以进行安装。</span>
                                            </dd>
                                        </dl>
                                        <dl>
                                            <dt class="clearfix">
                                                <span class="left">Q ：</span>
                                                <span class="right">封装APP，需要提供哪些材料？</span>
                                            </dt>
                                            <dd class="clearfix">
                                                <span class="left">A ：</span>
                                                <span class="right">网站链接、APP名称、APP图标、APP启动图即可。</span>
                                            </dd>
                                        </dl>
                                        <dl>
                                            <dt class="clearfix">
                                                <span class="left">Q ：</span>
                                                <span class="right">封装APP，需要多长时间？</span>
                                            </dt>
                                            <dd class="clearfix">
                                                <span class="left">A ：</span>
                                                <span class="right">2分钟就可以完成封装。</span>
                                            </dd>
                                        </dl>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="bg-f3">
                            <div class="container">
                                <div class="understand-more">
                                    <div class="p1">如需封装APP，建议您登录第八区网站，进行封装操作</div>
                                    <a href="/zhizuo" class="ms-btn ms-btn-primary">了解更多封装APP相关信息</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="container">
                            <div class="m-price-common m-publish">
                                <div class="tit-wrap">
                                    <ul class="tit clearfix">
                                        <li class="left"><img src="/images/m-price-4.png?20190611"></li>
                                        <li class="center">小包分发</li>
                                        <li class="right"><img src="/images/m-price-5.png?20190611"></li>
                                    </ul>
                                    <div class="p2">实名认证后，每天免费赠送<span>1000</span>次</div>
                                    <div class="publish-angle">1~300M</div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-4" v-for="(item, index) in small">
                                        <div class="con">
                                            <div class="level">@{{item.nums}}<span>次</span></div>
                                            <div class="msg">累计下载次数</div>
                                            <div class="num"><span>@{{item.price}}</span>元</div>
                                            <span class="recommended" v-show="item.is_recommended == 1">推荐</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="bg-f3">
                            <div class="container">
                                <div class="m-price-common m-publish">
                                    <div class="tit-wrap">
                                        <ul class="tit clearfix">
                                            <li class="left"><img src="/images/m-price-4.png?20190611"></li>
                                            <li class="center">大包分发</li>
                                            <li class="right"><img src="/images/m-price-5.png?20190611"></li>
                                        </ul>
                                        <div class="p2">购买分发次数后，才可上传</div>
                                        <div class="publish-angle">300~1.5G</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-4" v-for="(item, index) in big">
                                            <div class="con big-package">
                                                <div class="level">@{{item.nums}}<span>次</span></div>
                                                <div class="msg">累计下载次数</div>
                                                <div class="num"><span>@{{item.price}}</span>元</div>
                                                <span class="recommended" v-show="item.is_recommended == 1">推荐</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="bg-f3">
                            <div class="container">
                                <div class="m-price-common m-publish">
                                    <div class="tit-wrap">
                                        <ul class="tit clearfix">
                                            <li class="left"><img src="/images/m-price-4.png?20190611"></li>
                                            <li class="center">服务介绍</li>
                                            <li class="right"><img src="/images/m-price-5.png?20190611"></li>
                                        </ul>
                                    </div>
                                    <table class="table introduce-table">
                                        <tr>
                                            <th>小包<br>1000次</th>
                                            <td rowspan="2">
                                                <dl class="clearfix">
                                                    <dt class="fl iconfont icon-duihao"></dt>
                                                    <dd class="fl">默认模板使用</dd>
                                                </dl>
                                                <dl class="clearfix">
                                                    <dt class="fl iconfont icon-duihao"></dt>
                                                    <dd class="fl">下载次数不受时间限制</dd>
                                                </dl>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>大包<br>100次</th>
                                        </tr>
                                    </table>
                                    <table class="table introduce-table">
                                        <tr>
                                            <th>小包<br>10000次</th>
                                            <td rowspan="2">
                                                <dl class="clearfix">
                                                    <dt class="fl iconfont icon-duihao"></dt>
                                                    <dd class="fl">CDN加速下载</dd>
                                                </dl>
                                                <dl class="clearfix">
                                                    <dt class="fl iconfont icon-duihao"></dt>
                                                    <dd class="fl">下载页无广告</dd>
                                                </dl>
                                                <dl class="clearfix">
                                                    <dt class="fl iconfont icon-duihao"></dt>
                                                    <dd class="fl">下载次数不受时间限制</dd>
                                                </dl>
                                                <dl class="clearfix">
                                                    <dt class="fl iconfont icon-duihao"></dt>
                                                    <dd class="fl">下载页专享模板</dd>
                                                </dl>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>大包<br>1000次</th>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="bg-f3">
                            <div class="container">
                                <div class="m-price-common">
                                    <div class="tit-wrap">
                                        <ul class="tit clearfix">
                                            <li class="left"><img src="/images/m-price-4.png?20190611"></li>
                                            <li class="center">常见问题</li>
                                            <li class="right"><img src="/images/m-price-5.png?20190611"></li>
                                        </ul>
                                    </div>
                                    <div class="help">
                                        <dl>
                                            <dt class="clearfix">
                                                <span class="left">Q ：</span>
                                                <span class="right">APP保存90天是什么意思？</span>
                                            </dt>
                                            <dd class="clearfix">
                                                <span class="left">A ：</span>
                                                <span class="right">如果APP在90天，没有更新过，到期后将会自动下架。将APP重新更新一下链接即可恢复，链接地址不会变化。</span>
                                            </dd>
                                        </dl>
                                        <dl>
                                            <dt class="clearfix">
                                                <span class="left">Q ：</span>
                                                <span class="right">大包有免费下载次数吗？</span>
                                            </dt>
                                            <dd class="clearfix">
                                                <span class="left">A ：</span>
                                                <span class="right">只有300M以内的包，才有免费下载次数。大于300M的包，没有免费次数。</span>
                                            </dd>
                                        </dl>
                                        <dl>
                                            <dt class="clearfix">
                                                <span class="left">Q ：</span>
                                                <span class="right">是每个APP赠送1000次，还是每个账户？</span>
                                            </dt>
                                            <dd class="clearfix">
                                                <span class="left">A ：</span>
                                                <span class="right">每个账户下赠送1000次，账户下所有APP共享
1000次免费下载。（大包不参与）。</span>
                                            </dd>
                                        </dl>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="bg-f3">
                            <div class="container m-publish">
                                <div class="understand-more">
                                    <div class="p1">如需发布APP，建议您电脑登录第八区网站，进行上传发布</div>
                                </div>
                            </div>
                        </div>
                        <div class="m-publish-buy clearfix">
                            <a href="/issue/price?id=1003" class="small1"><span class="iconfont icon-gouwuche"></span>购买小包</a>
                            <a href="/large/price?id=20004" class="big1"><span class="iconfont icon-gouwuche"></span>购买大包</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>


<template id="pack">
    <div class="hidden-xs">
        <div class="container">
            <div class="crumbs"><a href="/price">价格</a><span>/</span>封装APP</div>
            <div class="new-price-meal new-pack-meal">
                <h1>封装APP套餐介绍</h1>
                <p>活动期间，基础版和高级版暂时同样价格</p>
                <a href="/pack" class="new-price-btn">立即封装</a>
                <div class="table-responsive">
                    <table class="table price-table">
                        <tr>
                            <th></th>
                            <th>基础版</th>
                            <th>
                                <div class="recommend-wrap1">高级版<span class="recommended">限时特惠</span></div>
                            </th>
                        </tr>
                        <tr>
                            <td>3天试用</td>
                            <td><span class="num">0</span>元</td>
                            <td><span class="num">0</span>元</td>
                        </tr>
                        <tr v-for="item in packPrice">
                            <td>@{{item.time}}</td>
                            <td><span class="num">@{{item.base_price}}</span>元</td>
                            <td><span class="num">@{{item.senior_price}}</span>元</td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="new-pack-price new-price-details">
                <h1>封装APP</h1>
                <p>为您提供移动APP开发快速解决方案，选择最适合您的套餐</p>
                <div class="table-responsive">
                    <table class="table">
                        <tr>
                            <th>服务内容</th>
                            <th>简介</th>
                            <th v-for="(item, index) in pack">
                                <div class="th-con level" :class="'level' + index">
                                    <div class="tit">@{{item.title}}<span class="unit" v-show="item.unit != ''">/@{{item.unit}}</span><span v-show="item.is_recommended == 1" class="recommended">限时特惠</span></div>
                                    <div class="level">@{{item.level}}</div>
                                </div>
                            </th>
                        </tr>
                        <tr>
                            <td>更新</td>
                            <td>封装好的APP支持再次重新编辑</td>
                            <td>免费</td>
                            <td>免费</td>
                            <td>免费</td>
                        </tr>
                        <tr>
                            <td>支持安卓、苹果</td>
                            <td>安卓、苹果都支持</td>
                            <td><div class="icon-wrap"><span class="iconfont icon-duihao"></span></div></td>
                            <td><div class="icon-wrap"><span class="iconfont icon-duihao"></span></div></td>
                            <td><div class="icon-wrap"><span class="iconfont icon-duihao"></span></div></td>
                        </tr>
                        <tr>
                            <td>在线制作图标</td>
                            <td>在线制作APP图标</td>
                            <td><div class="icon-wrap"><span class="iconfont icon-duihao"></span></div></td>
                            <td><div class="icon-wrap"><span class="iconfont icon-duihao"></span></div></td>
                            <td><div class="icon-wrap"><span class="iconfont icon-duihao"></span></div></td>
                        </tr>
                        <tr>
                            <td>在线制作启动图</td>
                            <td>在线制作APP启动图</td>
                            <td><div class="icon-wrap"><span class="iconfont icon-duihao"></span></div></td>
                            <td><div class="icon-wrap"><span class="iconfont icon-duihao"></span></div></td>
                            <td><div class="icon-wrap"><span class="iconfont icon-duihao"></span></div></td>
                        </tr>
                        <tr>
                            <td>加载动画</td>
                            <td>显示网页正在加载</td>
                            <td><div class="icon-wrap"><span class="iconfont icon-duihao"></span></div></td>
                            <td><div class="icon-wrap"><span class="iconfont icon-duihao"></span></div></td>
                            <td><div class="icon-wrap"><span class="iconfont icon-duihao"></span></div></td>
                        </tr>
                        <tr>
                            <td>清理缓存</td>
                            <td>可以清理浏览器之前访问过的网页数据</td>
                            <td><div class="icon-wrap"><span class="iconfont icon-duihao"></span></div></td>
                            <td><div class="icon-wrap"><span class="iconfont icon-duihao"></span></div></td>
                            <td><div class="icon-wrap"><span class="iconfont icon-duihao"></span></div></td>
                        </tr>
                        <tr>
                            <td>浏览器内核</td>
                            <td>用于加载网页的核心组件</td>
                            <td><div class="icon-wrap"><span class="iconfont icon-duihao"></span></div></td>
                            <td><div class="icon-wrap"><span class="iconfont icon-duihao"></span></div></td>
                            <td><div class="icon-wrap"><span class="iconfont icon-duihao"></span></div></td>
                        </tr>
                        <tr>
                            <td>下拉刷新</td>
                            <td>用于网页刷新最新内容</td>
                            <td><div class="icon-wrap"><span class="iconfont icon-duihao"></span></div></td>
                            <td><div class="icon-wrap"><span class="iconfont icon-duihao"></span></div></td>
                            <td><div class="icon-wrap"><span class="iconfont icon-duihao"></span></div></td>
                        </tr>
                        <tr>
                            <td>极光推送</td>
                            <td>给各个移动平台推送消息通知</td>
                            <td><div class="icon-wrap"><span class="iconfont icon-duihao"></span></div></td>
                            <td></td>
                            <td><div class="icon-wrap"><span class="iconfont icon-duihao"></span></div></td>
                        </tr>
                        <tr>
                            <td>友盟统计</td>
                            <td>采集APP中各种相关的数据</td>
                            <td><div class="icon-wrap"><span class="iconfont icon-duihao"></span></div></td>
                            <td></td>
                            <td><div class="icon-wrap"><span class="iconfont icon-duihao"></span></div></td>
                        </tr>
                        <tr>
                            <td>状态栏</td>
                            <td>显示运营商、时间、电池的一栏</td>
                            <td><div class="icon-wrap"><span class="iconfont icon-duihao"></span></div></td>
                            <td></td>
                            <td><div class="icon-wrap"><span class="iconfont icon-duihao"></span></div></td>
                        </tr>
                        <tr>
                            <td>导航栏（底部）</td>
                            <td>在手机底部展现的常用导航设置</td>
                            <td><div class="icon-wrap"><span class="iconfont icon-duihao"></span></div></td>
                            <td></td>
                            <td><div class="icon-wrap"><span class="iconfont icon-duihao"></span></div></td>
                        </tr>
                        <tr>
                            <td>标题栏（顶部）</td>
                            <td>在状态栏下显示APP名称、以及 一些常用操作按钮等</td>
                            <td><div class="icon-wrap"><span class="iconfont icon-duihao"></span></div></td>
                            <td></td>
                            <td><div class="icon-wrap"><span class="iconfont icon-duihao"></span></div></td>
                        </tr>
                        <tr>
                            <td>引导页</td>
                            <td>安装APP后，首次打开将会出现 1-4张图，用于介绍APP</td>
                            <td><div class="icon-wrap"><span class="iconfont icon-duihao"></span></div></td>
                            <td></td>
                            <td><div class="icon-wrap"><span class="iconfont icon-duihao"></span></div></td>
                        </tr>
                        <tr>
                            <td>分享</td>
                            <td>可以将APP相关的内容，分享到 微信、QQ、微博等</td>
                            <td><div class="icon-wrap"><span class="iconfont icon-duihao"></span></div></td>
                            <td></td>
                            <td><div class="icon-wrap"><span class="iconfont icon-duihao"></span></div></td>
                        </tr>
                        <tr>
                            <td>URL拉起APP</td>
                            <td>使用URL Scheme拉起其他APP</td>
                            <td><div class="icon-wrap"><span class="iconfont icon-duihao"></span></div></td>
                            <td></td>
                            <td><div class="icon-wrap"><span class="iconfont icon-duihao"></span></div></td>
                        </tr>
                        <tr>
                            <td>侧边栏</td>
                            <td>可通过标题栏左侧或者右侧， 打开侧边栏</td>
                            <td><div class="icon-wrap"><span class="iconfont icon-duihao"></span></div></td>
                            <td></td>
                            <td><div class="icon-wrap"><span class="iconfont icon-duihao"></span></div></td>
                        </tr>
                        <tr>
                            <td>长按图片保存</td>
                            <td>长按图片，可以保存到手机</td>
                            <td><div class="icon-wrap"><span class="iconfont icon-duihao"></span></div></td>
                            <td></td>
                            <td><div class="icon-wrap"><span class="iconfont icon-duihao"></span></div></td>
                        </tr>
                        <tr>
                            <td>识别二维码</td>
                            <td>长按二维码，可以识别</td>
                            <td><div class="icon-wrap"><span class="iconfont icon-duihao"></span></div></td>
                            <td></td>
                            <td><div class="icon-wrap"><span class="iconfont icon-duihao"></span></div></td>
                        </tr>
                        <tr>
                            <td>网页缩放</td>
                            <td>可通过手势放大缩小网页</td>
                            <td><div class="icon-wrap"><span class="iconfont icon-duihao"></span></div></td>
                            <td></td>
                            <td><div class="icon-wrap"><span class="iconfont icon-duihao"></span></div></td>
                        </tr>
                    </table>
                </div>
                <div class="help">
                    <h1>常见问题</h1>
                    <dl>
                        <dt class="clearfix">
                            <span class="left">Q ：</span>
                            <span class="right">封装好的APP，可以直接安装吗？</span>
                        </dt>
                        <dd class="clearfix">
                            <span class="left">A ：</span>
                            <span class="right">
封装好的安卓APP，可以直接在手机上安装；封装的iOS APP，必须要做企业签名，或者上架商店，才可以进行安装。
</span>
                        </dd>
                    </dl>
                    <dl>
                        <dt class="clearfix">
                            <span class="left">Q ：</span>
                            <span class="right">封装APP，需要提供哪些材料？</span>
                        </dt>
                        <dd class="clearfix">
                            <span class="left">A ：</span>
                            <span class="right">网站链接、APP名称、APP图标、APP启动图即可。</span>
                        </dd>
                    </dl>
                    <dl>
                        <dt class="clearfix">
                            <span class="left">Q ：</span>
                            <span class="right">封装APP，需要多长时间？</span>
                        </dt>
                        <dd class="clearfix">
                            <span class="left">A ：</span>
                            <span class="right">2分钟就可以完成封装。</span>
                        </dd>
                    </dl>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
</template>


<template id="sign">
    <div class="hidden-xs">
        <div class="container">
            <div class="crumbs"><a href="/price">价格</a><span>/</span>企业签名</div>
            <div class="new-price-meal">
                <h1>企业签名套餐介绍</h1>

                <a href="/sign" class="new-price-btn">立即签名</a>
                <div class="table-responsive">
                    <table class="table price-table">
                        <tr>
                            <th></th>
                            <th>基础版</th>
                            <th>
                                <div class="recommend-wrap1">高级版<span class="recommended">推荐</span></div>
                            </th>
                            <th>独立版</th>
                        </tr>
                        <tr>
                            <td>1天</td>
                            <td>免费</td>
                            <td>免费</td>
                            <td>免费</td>
                        </tr>
                        <tr v-for="item in signPrice">
                            <td>@{{item.time}}</td>
                            <td><span class="num">@{{item.base_price}}</span>元</td>
                            <td><span class="num">@{{item.senior_price}}</span>元</td>
                            <td><span class="num">@{{item.independent_price}}</span>元</td>
                        </tr>
                        <tr>
                            <td>更新</td>
                            <td>免费</td>
                            <td>免费</td>
                            <td>免费</td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="new-sign-price new-price-details">
                <h1>企业签名价格&服务</h1>
                <p>无需提交APP Store，无需越狱，不限制设备，解决iOS安装问题</p>
                <div class="table-responsive">
                    <table class="table">
                        <tr>
                            <th>服务内容</th>
                            <th>简介</th>
                            <th v-for="(item, index) in sign">
                                <div class="level th-con" :class="'level' + index">
                                    <div class="tit">
                                        @{{item.title}}<span class="unit">/@{{item.unit}}</span><span v-show="item.is_recommended == 1" class="recommended">推荐</span>
                                    </div>
                                    <div class="level">@{{item.level}}</div>
                                </div>
                            </th>
                        </tr>
                        <tr>
                            <td>更新</td>
                            <td>购买签名后，再次更新APP</td>
                            <td>免费</td>
                            <td>免费</td>
                            <td>免费</td>
                        </tr>
                        <tr>
                            <td>适用于</td>
                            <td>不同套餐适用的场景</td>
                            <td>小规模测试运营</td>
                            <td>中短期运营</td>
                            <td>安全稳定运营</td>
                        </tr>
                        <tr>
                            <td>程序自动签名</td>
                            <td>提交签名后，10分钟内自动完成</td>
                            <td><div class="icon-wrap"><span class="iconfont icon-duihao"></span></div></td>
                            <td><div class="icon-wrap"><span class="iconfont icon-duihao"></span></div></td>
                            <td><div class="icon-wrap"><span class="iconfont icon-duihao"></span></div></td>
                        </tr>
                        <tr>
                            <td>IPA包检测</td>
                            <td>检测IPA包的版本、大小、适合系统</td>
                            <td><div class="icon-wrap"><span class="iconfont icon-duihao"></span></div></td>
                            <td><div class="icon-wrap"><span class="iconfont icon-duihao"></span></div></td>
                            <td><div class="icon-wrap"><span class="iconfont icon-duihao"></span></div></td>
                        </tr>
                        <tr>
                            <td>真机测试</td>
                            <td>签名后，用真实机器测试，签名是否成功</td>
                            <td><div class="icon-wrap"><span class="iconfont icon-duihao"></span></div></td>
                            <td><div class="icon-wrap"><span class="iconfont icon-duihao"></span></div></td>
                            <td><div class="icon-wrap"><span class="iconfont icon-duihao"></span></div></td>
                        </tr>
                        <tr>
                            <td>证书分类签名</td>
                            <td>根据所购买的套餐类型，用不同的证书签名</td>
                            <td><div class="icon-wrap"><span class="iconfont icon-duihao"></span></div></td>
                            <td><div class="icon-wrap"><span class="iconfont icon-duihao"></span></div></td>
                            <td><div class="icon-wrap"><span class="iconfont icon-duihao"></span></div></td>
                        </tr>
                        <tr>
                            <td>短信/邮件通知</td>
                            <td>签名完成后，将通过邮件和短信，进行通知</td>
                            <td><div class="icon-wrap"><span class="iconfont icon-duihao"></span></div></td>
                            <td><div class="icon-wrap"><span class="iconfont icon-duihao"></span></div></td>
                            <td><div class="icon-wrap"><span class="iconfont icon-duihao"></span></div></td>
                        </tr>
                        <tr>
                            <td>网络代理（Packet Tunnel）</td>
                            <td>用于Shadowsocks，HTTP代理等服务，需要证书进行特殊配置才支持</td>
                            <td></td>
                            <td><div class="icon-wrap"><span class="iconfont icon-duihao"></span></div></td>
                            <td><div class="icon-wrap"><span class="iconfont icon-duihao"></span></div></td>
                        </tr>
                        <tr>
                            <td>计步器（HealthKit）</td>
                            <td>用于从苹果手机健康APP中获取计步数据的框架，需要证书特殊配置</td>
                            <td></td>
                            <td><div class="icon-wrap"><span class="iconfont icon-duihao"></span></div></td>
                            <td><div class="icon-wrap"><span class="iconfont icon-duihao"></span></div></td>
                        </tr>
                        <tr>
                            <td>技术支持</td>
                            <td>专业技术人员提供技术咨询</td>
                            <td></td>
                            <td></td>
                            <td><div class="icon-wrap"><span class="iconfont icon-duihao"></span></div></td>
                        </tr>

                    </table>
                </div>
                <div class="help">
                    <h1>常见问题</h1>
                    <dl>
                        <dt class="clearfix">
                            <span class="left">Q ：</span>
                            <span class="right">苹果APP必须要做企业签名吗？</span>
                        </dt>
                        <dd class="clearfix">
                            <span class="left">A ：</span>
                            <span class="right">是的，如果不做企业签名，无法安装到苹果设备上。</span>
                        </dd>
                    </dl>
                    <dl>
                        <dt class="clearfix">
                            <span class="left">Q ：</span>
                            <span class="right">做完签名后，限制安装吗？</span>
                        </dt>
                        <dd class="clearfix">
                            <span class="left">A ：</span>
                            <span class="right">不限制，无限制安装。</span>
                        </dd>
                    </dl>
                    <dl>
                        <dt class="clearfix">
                            <span class="left">Q ：</span>
                            <span class="right">做完签名后，可以在苹果商店搜索到吗？</span>
                        </dt>
                        <dd class="clearfix">
                            <span class="left">A ：</span>
                            <span class="right">搜索不到，必须要提交苹果商店后才能被搜到。</span>
                        </dd>
                    </dl>
                    <dl>
                        <dt class="clearfix">
                            <span class="left">Q ：</span>
                            <span class="right">企业签名的步骤是什么？</span>
                        </dt>
                        <dd class="clearfix">
                            <span class="left">A ：</span>
                            <span class="right">
1. 点击导航栏【签名】，将需要签的APP上传；
2. 填写信息（联系方式、测试账号等）；
3. 选择所需套餐进行购买；
4. 等待10分钟程序签名；
5. 签名完成，下载签名包。
</span>
                        </dd>
                    </dl>
                    <dl>
                        <dt class="clearfix">
                            <span class="left">Q ：</span>
                            <span class="right">什么是检测IPA信息？</span>
                        </dt>
                        <dd class="clearfix">
                            <span class="left">A ：</span>
                            <span class="right">APP做完签名后，即可检测到APP的大小，版本、适合的iOS系统、签名证书等信息。</span>
                        </dd>
                    </dl>
                    <dl>
                        <dt class="clearfix">
                            <span class="left">Q ：</span>
                            <span class="right">什么是真机测试？</span>
                        </dt>
                        <dd class="clearfix">
                            <span class="left">A ：</span>
                            <span class="right">APP签名完成后，将会用主流苹果机型进行测试安装，安装无误后进行发出。</span>
                        </dd>
                    </dl>
                </div>
            </div>
        </div>
    </div>
</template>


<template id="publish">
    <div class="hidden-xs">
        <div class="container">
            <div class="crumbs"><a href="/price">价格</a><span>/</span>分发次数</div>
            <div class="new-publish-price">
                <ul class="tab clearfix">
                    <li :class="$route.query.id != 2 ? 'active' : ''">1~300M的包</li>
                    <li :class="$route.query.id == 2 ? 'active' : ''">300M~1.5G的包</li>
                </ul>
                <div class="tab-con">
                    <div class="small-package">
                        <h1>小包分发次数</h1>
                        <div class="p1">实名认证后，可获得每天1000次免费下载，如超过免费次数，可购买分发次数包</div>
                        <div class="con-wrap">
                            <div class="row clearfix">
                                <div class="col-sm-4">
                                    <div class="con">
                                        <span class="recommended" style="display: none;"><img src="/images/icon-17.png?20190611"></span>
                                        <div class="gradient gradient1"></div>
                                        <div class="downloads">
                                            <div class="text">累计下载</div>
                                            <div class="num">@{{small[0].nums}}<span>次</span></div>
                                        </div>
                                        <div class="instructions">
                                            <dl>
                                                <dd><span class="iconfont icon-gou"></span>默认模板使用</dd>
                                                <dd><span class="iconfont icon-gou"></span>下载次数不受时间限制</dd>
                                            </dl>
                                        </div>
                                        <div class="p-price"><span>@{{small[0].price}}</span>元</div>
                                        <div class="p-pay">
                                            <a :href="'/issue/price?id=' + small[0].id" class="btn-buy ms-btn-secondary ms-btn">购买</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="con">
                                        <span class="recommended" style="display: none;"><img src="/images/icon-17.png?20190611"></span>
                                        <div class="gradient gradient2"></div>
                                        <div class="downloads">
                                            <div class="text">累计下载</div>
                                            <div class="num">@{{small[1].nums}}<span>次</span></div>
                                        </div>
                                        <div class="instructions">
                                            <dl>
                                                <dd><span class="iconfont icon-gou"></span>CDN加速下载</dd>
                                                <dd><span class="iconfont icon-gou"></span>下载页无广告</dd>
                                                <dd><span class="iconfont icon-gou"></span>下载次数不受时间限制</dd>
                                                <dd><span class="iconfont icon-gou"></span>下载页专享模板</dd>
                                            </dl>
                                        </div>
                                        <div class="p-price"><span>@{{small[1].price}}</span>元</div>
                                        <div class="p-pay">
                                            <a :href="'/issue/price?id=' + small[1].id" class="btn-buy ms-btn-secondary ms-btn">购买</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="con">
                                        <div class="gradient gradient3"></div>
                                        <div class="downloads">
                                            <div class="text">累计下载</div>
                                            <div class="num">@{{small[2].nums}}<span>次</span></div>
                                            <span class="recommended" style="display: none;"><img src="/images/icon-17.png?20190611"></span>
                                        </div>
                                        <div class="instructions">
                                            <dl>
                                                <dd><span class="iconfont icon-gou"></span>CDN加速下载</dd>
                                                <dd><span class="iconfont icon-gou"></span>下载页无广告</dd>
                                                <dd><span class="iconfont icon-gou"></span>下载次数不受时间限制</dd>
                                                <dd><span class="iconfont icon-gou"></span>下载页专享模板</dd>
                                            </dl>
                                        </div>
                                        <div class="p-price"><span>@{{small[2].price}}</span>元</div>
                                        <div class="p-pay">
                                            <a :href="'/issue/price?id=' + small[2].id" class="btn-buy ms-btn-secondary ms-btn">购买</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="big-package">
                        <h1>大包分发次数</h1>
                        <div class="p1">实名认证后，可获得每天10次免费下载，如超过免费次数，可购买分发次数包</div>
                        <div class="con-wrap">
                            <div class="row clearfix">
                                <div class="col-sm-4">
                                    <div class="con">
                                        <span class="recommended" style="display: none;"><img src="/images/icon-17.png?20190611"></span>
                                        <div class="gradient gradient1"></div>
                                        <div class="downloads">
                                            <div class="text">累计下载</div>
                                            <div class="num">@{{big[0].nums}}<span>次</span></div>
                                        </div>
                                        <div class="instructions">
                                            <dl>
                                                <dd><span class="iconfont icon-gou"></span>默认模板使用</dd>
                                                <dd><span class="iconfont icon-gou"></span>下载次数不受时间限制</dd>
                                            </dl>
                                        </div>
                                        <div class="p-price"><span>@{{big[0].price}}</span>元</div>
                                        <div class="p-pay">
                                            <a :href="'/large/price?id=' + big[0].id" class="btn-buy ms-btn-secondary ms-btn">购买</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="con">
                                        <span class="recommended" style="display: none;"><img src="/images/icon-17.png?20190611"></span>
                                        <div class="gradient gradient2"></div>
                                        <div class="downloads">
                                            <div class="text">累计下载</div>
                                            <div class="num">@{{big[1].nums}}<span>次</span></div>
                                        </div>
                                        <div class="instructions">
                                            <dl>
                                                <dd><span class="iconfont icon-gou"></span>CDN加速下载</dd>
                                                <dd><span class="iconfont icon-gou"></span>下载页无广告</dd>
                                                <dd><span class="iconfont icon-gou"></span>下载次数不受时间限制</dd>
                                                <dd><span class="iconfont icon-gou"></span>下载页专享模板</dd>
                                            </dl>
                                        </div>
                                        <div class="p-price"><span>@{{big[1].price}}</span>元</div>
                                        <div class="p-pay">
                                            <a :href="'/large/price?id=' + big[1].id" class="btn-buy ms-btn-secondary ms-btn">购买</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="con">
                                        <div class="gradient gradient3"></div>
                                        <div class="downloads">
                                            <div class="text">累计下载</div>
                                            <div class="num">@{{big[2].nums}}<span>次</span></div>
                                            <span class="recommended" style="display: none;"><img src="/images/icon-17.png?20190611"></span>
                                        </div>
                                        <div class="instructions">
                                            <dl>
                                                <dd><span class="iconfont icon-gou"></span>CDN加速下载</dd>
                                                <dd><span class="iconfont icon-gou"></span>下载页无广告</dd>
                                                <dd><span class="iconfont icon-gou"></span>下载次数不受时间限制</dd>
                                                <dd><span class="iconfont icon-gou"></span>下载页专享模板</dd>
                                            </dl>
                                        </div>
                                        <div class="p-price"><span>@{{big[2].price}}</span>元</div>
                                        <div class="p-pay">
                                            <a :href="'/large/price?id=' + big[2].id" class="btn-buy ms-btn-secondary ms-btn">购买</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="help">
                    <h1>常见问题</h1>
                    <dl>
                        <dt class="clearfix">
                            <span class="left">Q ：</span>
                            <span class="right">APP在平台上，是否有保存期限？</span>
                        </dt>
                        <dd class="clearfix">
                            <span class="left">A ：</span>
                            <span class="right">有。未实名账号下的APP，可以在平台上保存24小时，每天下载5次；实名认证后账户下的APP，可以在平台上保存90天，300M以内的包，每天享受免费1000次下载；300M~1.5G的包，每天享受免费10次下载。</span>
                        </dd>
                    </dl>
                    <dl>
                        <dt class="clearfix">
                            <span class="left">Q ：</span>
                            <span class="right">小包有免费下载次数吗？</span>
                        </dt>
                        <dd class="clearfix">
                            <span class="left">A ：</span>
                            <span class="right">小包实名认证通过后，每天免费赠送1000次下载。</span>
                        </dd>
                    </dl>
                    <dl>
                        <dt class="clearfix">
                            <span class="left">Q ：</span>
                            <span class="right">大包有免费下载次数吗？</span>
                        </dt>
                        <dd class="clearfix">
                            <span class="left">A ：</span>
                            <span class="right">实名认证通过后，大包每天免费10次下载。</span>
                        </dd>
                    </dl>
                    <dl>
                        <dt class="clearfix">
                            <span class="left">Q ：</span>
                            <span class="right">是每个APP赠送免费次数，还是每个账户？</span>
                        </dt>
                        <dd class="clearfix">
                            <span class="left">A ：</span>
                            <span class="right">每个账户赠送，该账户下所有APP共享免费赠送的次数。</span>
                        </dd>
                    </dl>
                    <dl>
                        <dt class="clearfix">
                            <span class="left">Q ：</span>
                            <span class="right">如果未实名，有免费下载次数吗？</span>
                        </dt>
                        <dd class="clearfix">
                            <span class="left">A ：</span>
                            <span class="right">有，每个账户在24小时内，只可以下载5次。</span>
                        </dd>
                    </dl>
                </div>
            </div>
        </div>
    </div>
</template>

<script src="/js/vue.js"></script>
<script src="/js/vue-router.js"></script>
<script>
    // 组件Price
    var Price = {
        template: "#price",
        data: function () {
            return {
                price: {},
                sign: [],
                pack: [],
                small: [],
                big: [],
                shanqing: false,
                signPrice: '',
                packPrice: ''
            };
        },
        methods: {
            ajax: function () {
                var This = this;
                $.ajax({
                    type: "get",
                    url: "/api/services-initial-charge",
                    dataType: "json",
                    success: function (res) {
                        This.price = res.data;
                    },
                    error: function () {
                        console.log("错误");
                    }
                });
                $.ajax({
                    type: "get",
                    url: "/api/pack-service-price",
                    dataType: "json",
                    success: function (res) {
                        // console.log(res);
                        var pack = [];
                        $.each(res.data, function (index,item) {
                            var msg = ["可使用所有插件", "可使用基础版插件", "可使用所有插件"];
                            item.msg = msg[index];
                            var windowWidth = $(window).width();
                            if (windowWidth <= 750) {
                                if (item.unit == "") {
                                    item.unit = "3天";
                                    item.title = "免费"
                                }
                            }
                            if (item.unit == "year") {
                                item.unit = "年";
                                pack.push(item);
                            } else {
                                pack.push(item);
                            }
                        });
                        // console.log(pack);
                        This.pack = pack;
                    }
                });
                $.ajax({
                    type: "get",
                    url: "/api/sign-service-price",
                    dataType: "json",
                    success: function (res) {
                        // console.log(res);
                        var sign = [];
                        $.each(res.data, function (index,item) {
                            var msg = ["小规模测试运营", "中短期运营", "安全稳定运营"];
                            item.msg = msg[index];
                            if (item.unit == "month") {
                                item.unit = "月";
                                sign.push(item);
                            } else {
                                sign.push(item);
                            }
                        });
                        This.sign = sign;
                    }
                });
                $.ajax({
                    type: "get",
                    url: "/api/publish-service-price",
                    dataType: "json",
                    success: function (res) {
                        // console.log(res);
                        This.small = res.data.small || {};
                        This.big = res.data.big || {};
                    }
                });
                $.ajax({
                    type: "get",
                    url: "/api/price/signPrice",
                    dataType: "json",
                    success: function (res) {
                        // console.log(res);
                        This.signPrice = res.data || {};
                    }
                });
                $.ajax({
                    type: "get",
                    url: "/api/price/packPrice",
                    dataType: "json",
                    success: function (res) {
                        // console.log(res);
                        This.packPrice = res.data || {};
                    }
                });
            },
            liHover: function () {
                $(".new-price-list li").hover(function () {
                    $(this).addClass("active").siblings().removeClass("active");
                }, function () {
                    var $parent = $(this).parents(".new-price-list");
                    $("li", $parent).eq(1).addClass("active").siblings().removeClass("active");
                })
            },
            serviceTab: function () {
                $(".mobile-price .tab-level>li").click(function () {
                    var i = $(this).index();
                    var $parent = $(this).parents(".m-price-common");
                    console.log(i);
                    $(this).addClass("active").siblings().removeClass("active");
                    $(".tab-level-con>div", $parent).eq(i).show().siblings().hide();
                });
            },
            shanqingFun: function () {
                var host = window.location.host;
                if (host == "shanqing.com" || host == "www.shanqing.com") {
                    // if (host == "wangyg.dibaqu.com") {
                    this.shanqing = true;
                } else {
                    this.shanqing = false;
                }
            }
        },
        created: function () {
            this.ajax();
        },
        mounted: function () {
            var mySwiper = new Swiper('.m-price-banner .swiper-container', {
                // slidesPerView: "auto",
                spaceBetween: 10,
                on: {
                    slideChangeTransitionStart: function () {
                        var i = this.activeIndex;
                        $(".mobile-price .tab li").eq(i).addClass("active").siblings().removeClass("active");
                        $(".mobile-price>.tab-con>div").eq(i).show().siblings().hide();
                    }
                }
            });
            $(".mobile-price .tab>li").click(function () {
                var i = $(this).index();
                $(this).addClass("active").siblings().removeClass("active");
                $(".mobile-price>.tab-con>div").eq(i).show().siblings().hide();
                mySwiper.slideTo(i);
                if (i == 2) {
                    $("body").css("padding-bottom", "50px");
                } else {
                    $("body").css("padding-bottom", 0);
                }
            });
            this.liHover();
            this.serviceTab();
            this.shanqingFun();
        }
    };

    // 1.定义 (路由) 组件
    var Pack = {
        template: "#pack",
        data: function () {
            return {
                pack: [],
                packPrice: ""
            }
        },
        methods: {
            ajax: function () {
                var This = this;
                $.ajax({
                    type: "get",
                    url: "/api/pack-service-price",
                    dataType: "json",
                    success: function (res) {
                        // console.log(res);
                        var pack = [];
                        $.each(res.data, function (index,item) {
                            if (item.unit == "year") {
                                item.unit = "年";
                                pack.push(item);
                            } else {
                                pack.push(item);
                            }
                        });
                        // console.log(pack);
                        This.pack = pack;
                    }
                });
                $.ajax({
                    type: "get",
                    url: "/api/price/packPrice",
                    dataType: "json",
                    success: function (res) {
                        // console.log(res);
                        This.packPrice = res.data || {};
                    }
                });
            },
        },
        mounted: function () {
            this.ajax();
        }
    };
    var Sign = {
        template: "#sign",
        data: function () {
            return {
                sign: [],
                signPrice: ''
            }
        },
        methods: {
            ajax: function () {
                var This = this;
                $.ajax({
                    type: "get",
                    url: "/api/sign-service-price",
                    dataType: "json",
                    success: function (res) {
                        // console.log(res);
                        var sign = [];
                        $.each(res.data, function (index,item) {
                            if (item.unit == "month") {
                                item.unit = "月";
                                sign.push(item);
                            } else {
                                sign.push(item);
                            }
                        });
                        This.sign = sign;
                    }
                });
                $.ajax({
                    type: "get",
                    url: "/api/price/signPrice",
                    dataType: "json",
                    success: function (res) {
                        // console.log(res);
                        This.signPrice = res.data || {};
                    }
                });
            }
        },
        mounted: function () {
            this.ajax();
        }
    };
    var Publish = {
        template: "#publish",
        data: function () {
            return {
                small: [{"nums": "", "price": "", "id": ""},{"nums": "", "price": "", "id": ""},{"nums": "", "price": "", "id": ""}],
                big: [{"nums": "", "price": "", "id": ""},{"nums": "", "price": "", "id": ""},{"nums": "", "price": "", "id": ""}]
            }
        },
        methods: {
            tab: function () {
                $(".new-publish-price .tab li").click(function () {
                    var index = $(this).index();
                    $(this).addClass("active").siblings().removeClass("active");

                    $(".new-publish-price .tab-con>div").eq(index).show().siblings().hide();
                });
            },
            ajax: function () {
                var This = this;
                $.ajax({
                    type: "get",
                    url: "/api/publish-service-price",
                    dataType: "json",
                    success: function (res) {
                        // console.log(res);
                        This.small = res.data.small || {};
                        This.big = res.data.big || {};
                    }
                })
            }
        },
        mounted: function () {
            this.tab();
            this.ajax();
            $("[data-toggle='popover']").popover();
            if (this.$route.query.id == 2) {
                $(".new-publish-price .tab-con .big-package").show();
            } else {
                $(".new-publish-price .tab-con .small-package").show();
            }
        }
    };

    // 2.定义路由
    var routes = [
        // {path: '/', redirect: '/price'}, //history模式下，不再起作用
        {path: '/price/pack', component: Pack},
        {path: '/price/sign', component: Sign},
        {path: '/price/publish', component: Publish}
    ];

    // 3.创建 router 实例，然后传 `routes` 配置
    var router = new VueRouter({
        mode: 'history',
        scrollBehavior: function () {
            return { y: 0}
        },
        // base: __dirname,
        routes: routes
    });

    // 4.创建和挂载根实例。
    // 记得要通过 router 配置参数注入路由，
    // 从而让整个应用都有路由功能
    var vm = new Vue({
        el: "#app",
        components: {
            Price: Price
        },
        router: router
    })
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

<script>
    window.ga = window.ga || function () {
        (ga.q = ga.q || []).push(arguments)
    };
    ga.l = +new Date;
    ga('create', 'UA-128185075-1', 'auto');
    ga('send', 'pageview');
</script>
<script async src='https://www.google-analytics.com/analytics.js'></script>








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
