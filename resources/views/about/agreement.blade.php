<!doctype html>
<html lang="zh">
<head>
    <title>关于我们--第八区</title>
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
    <link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css?20190611" />
    <link rel="stylesheet" type="text/css" href="/css/base.css?20190611" />
    <link rel="stylesheet" type="text/css" href="/css/main.css?20190611" />
    <link rel="stylesheet" type="text/css" href="/css/h5.css?20190611" />
    <script type="text/javascript" src="/js/jquery.min.js?20190611"></script>
    <script type="text/javascript" src="/js/bootstrap.min.js?20190611"></script>
    <script type="text/javascript" src="/js/vue.js?20190611"></script>
    <script type="text/javascript" src="/js/vue-router.js?20190611"></script>
    <link rel="shortcut icon" href="//dibaqu.com/favicon.ico?t=20190611" type="image/x-icon" />
    <script>
        isHideFooter = false;
        var static_version = 20190611;
    </script>
</head>
<body>
@include('public/header')
<div id="app">
    <About-us></About-us>
</div>
<template id="aboutUs">
    <div>
        <img src="/images/0.jpg" style="display: none;">
        <img src="/images/1.jpg" style="display: none;">
        <img src="/images/2.jpg" style="display: none;">
        <div class="about-banner-wrap" :style="'background-image: url(/images/'+ indexImg + '.jpg)'">
            <div class="container">
                <div class="about-banner">
                    <h1>@{{msg[index].text}}</h1>
                </div>
            </div>
        </div>
        <div class="about-tab-wrap">
            <div class="container">
                <div class="about-tab clearfix">
                    <router-link :to="'/about/' + item.router" :key="index" v-for="(item, index) in msg" :class="index == 0 && $route.path == '/about' ? 'router-link-active' : ''">
                        <span class="iconfont" :class="item.class"></span>@{{item.text}}
                    </router-link>
                </div>
            </div>
        </div>
        <us v-if="$route.path == '/about'"></us>
        <router-view></router-view>
    </div>
</template>
<template id="us">
    <div class="container">
        <div class="about-us">
            <div class="tab-1">
                <div class="common">
                    <h1>公司介绍</h1>
                    <p class="p2">
                        第八区（dibaqu.com）是福建喜佳宝网络科技有限公司旗下的产品，<br>
                        目前业务主要为开发者提供iOS APP、Android APP的开发、打包、封装、测试、分发等一系列的效率工具，<br>
                        秉承着“让开发更高效、更简单”的使命，<br>
                        将一系列的效率工具协同集成，免除繁杂的开发环境部署，降低开发和部署的成本，提升开发者开发效率，提高开发生产力。
                    </p>
                    <img class="img-responsive" src="/images/about-1.jpg?20190611">
                </div>
                <div class="common contact-us">
                    <h1>联系我们</h1>
                    <div class="contact-con">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="ms-thumbnail">
                                    <img src="/images/about-2.png?20190611" class="img-responsive">
                                    <div class="ms-caption">
                                        <div class="tit">技术支持</div>
                                        <p>使用疑问与解决方案咨询</p>
                                        <a href="http://wpa.qq.com/msgrd?v=3&uin=38695299&site=qq&menu=yes" class="hidden-xs p1">
                                            <span class="iconfont icon-qq"></span>
                                            <span>QQ：38695299</span>
                                        </a>
                                        <a href="http://wpa.qq.com/msgrd?v=3&uin=38695299&site=qq&menu=yes" class="visible-xs p1">
                                            <span class="iconfont icon-qq"></span>
                                            <span>QQ：38695299</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="ms-thumbnail">
                                    <img src="/images/about-3.png?20190611" class="img-responsive">
                                    <div class="ms-caption">
                                        <div class="tit">反馈意见</div>
                                        <p>您的建议是我们产品不断改进的动力</p>
                                        <div class="p1 clearfix">
                                            <span class="iconfont icon-feedback"></span>
                                            <span>有问题有建议</span>
                                            <a href="/feedback" target="_blank" class="ms-btn-default ms-btn feedback1">马上反馈</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="ms-thumbnail">
                                    <img src="/images/about-4.png?20190611" class="img-responsive">
                                    <div class="ms-caption">
                                        <div class="tit">商务合作</div>
                                        <p>商务合作 欢迎联系</p>
                                        <a class="p1" href="/cdn-cgi/l/email-protection#37555377535e555646421954585a">
                                            <span class="iconfont icon-youjian"></span>
                                            <span><span class="__cf_email__" data-cfemail="55373115313c373424207b363a38">[email&#160;protected]</span></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<template id="log">
    <div class="container">
        <div class="about-us">
            <div class="tab-2">
                <div class="update-log-wrap">
                    <div class="update-log">
                        <div class="con clearfix">
                            <div class="u-left fl">
                                <dl>
                                    <dt>2019.03.28</dt>
                                </dl>
                            </div>
                            <div class="u-right fl clearfix">
<span class="u-icon fl">
<span></span>
</span>
                                <dl>
                                    <dt>更新内容</dt>
                                    <dd>1. 优化我的签名和我的APP删除逻辑</dd>
                                    <dd>2. 增加企业签名1天免费试用功能</dd>
                                </dl>
                            </div>
                        </div>
                        <div class="con clearfix">
                            <div class="u-left fl">
                                <dl>
                                    <dt>2019.03.12</dt>
                                </dl>
                            </div>
                            <div class="u-right fl clearfix">
<span class="u-icon fl">
<span></span>
</span>
                                <dl>
                                    <dt>更新内容</dt>
                                    <dd>1. 在我的签名和我的封装中，增加套餐显示</dd>
                                    <dd>2. 优化封装中的上传图标和启动图的引导</dd>
                                    <dd>3. 封装中的启动图增加“不显示”选项</dd>
                                </dl>
                            </div>
                        </div>
                        <div class="con clearfix">
                            <div class="u-left fl">
                                <dl>
                                    <dt>2019.03.05</dt>
                                </dl>
                            </div>
                            <div class="u-right fl clearfix">
<span class="u-icon fl">
<span></span>
</span>
                                <dl>
                                    <dt>更新内容</dt>
                                    <dd>1. 新增无闪退封装苹果APP功能</dd>
                                </dl>
                            </div>
                        </div>
                        <div class="con clearfix">
                            <div class="u-left fl">
                                <dl>
                                    <dt>2019.03.02</dt>
                                </dl>
                            </div>
                            <div class="u-right fl clearfix">
<span class="u-icon fl">
<span></span>
</span>
                                <dl>
                                    <dt>更新内容</dt>
                                    <dd>1. 上线推广大使功能</dd>
                                </dl>
                            </div>
                        </div>
                        <div class="con clearfix">
                            <div class="u-left fl">
                                <dl>
                                    <dt>2019.02.22</dt>
                                </dl>
                            </div>
                            <div class="u-right fl clearfix">
<span class="u-icon fl">
<span></span>
</span>
                                <dl>
                                    <dt>更新内容</dt>
                                    <dd>1. 新增UA插件功能</dd>
                                    <dd>2. 新增插件在线更新功能（插件配置更新后，无需重新安装，除却图标、启动图、引导图）</dd>
                                    <dd>3. 优化企业签名更新流程</dd>
                                </dl>
                            </div>
                        </div>
                        <div class="con clearfix">
                            <div class="u-left fl">
                                <dl>
                                    <dt>2019.02.20</dt>
                                </dl>
                            </div>
                            <div class="u-right fl clearfix">
<span class="u-icon fl">
<span></span>
</span>
                                <dl>
                                    <dt>更新内容</dt>
                                    <dd>1. 发布/签名/封装详情页页面增加“添加备注”功能</dd>
                                    <dd>2. 发布详情页，增加“一键续期”功能</dd>
                                </dl>
                            </div>
                        </div>
                        <div class="con clearfix">
                            <div class="u-left fl">
                                <dl>
                                    <dt>2019.02.15</dt>
                                </dl>
                            </div>
                            <div class="u-right fl clearfix">
<span class="u-icon fl">
<span></span>
</span>
                                <dl>
                                    <dt>更新内容</dt>
                                    <dd>1. 新增下载页链接绑定指定域名功能</dd>
                                </dl>
                            </div>
                        </div>
                        <div class="con clearfix">
                            <div class="u-left fl">
                                <dl>
                                    <dt>2019.01.25</dt>
                                </dl>
                            </div>
                            <div class="u-right fl clearfix">
<span class="u-icon fl">
<span></span>
</span>
                                <dl>
                                    <dt>更新内容</dt>
                                    <dd>1. 新增SDK功能</dd>
                                    <dd>2. 优化价格页展现，增加详细套餐价格介绍</dd>
                                    <dd>3. 发布/签名/封装详情页优化</dd>
                                </dl>
                            </div>
                        </div>
                        <div class="con clearfix">
                            <div class="u-left fl">
                                <dl>
                                    <dt>2019.01.08</dt>
                                </dl>
                            </div>
                            <div class="u-right fl clearfix">
<span class="u-icon fl">
<span></span>
</span>
                                <dl>
                                    <dt>更新内容</dt>
                                    <dd>1. 优化首页展示</dd>
                                </dl>
                            </div>
                        </div>
                        <div class="con clearfix">
                            <div class="u-left fl">
                                <dl>
                                    <dt>2019.01.05</dt>
                                </dl>
                            </div>
                            <div class="u-right fl clearfix">
<span class="u-icon fl">
<span></span>
</span>
                                <dl>
                                    <dt>更新内容</dt>
                                    <dd>1. 优化大包上传逻辑</dd>
                                </dl>
                            </div>
                        </div>
                        <div class="con clearfix">
                            <div class="u-left fl">
                                <dl>
                                    <dt>2018.12.26</dt>
                                </dl>
                            </div>
                            <div class="u-right fl clearfix">
<span class="u-icon fl">
<span></span>
</span>
                                <dl>
                                    <dt>更新内容</dt>
                                    <dd>1. 上线封装APP一键签名功能</dd>
                                    <dd>2. 新增移动端价格页展示</dd>
                                    <dd>3. 图标启动图制作增加缓冲态</dd>
                                </dl>
                            </div>
                        </div>
                        <div class="con clearfix">
                            <div class="u-left fl">
                                <dl>
                                    <dt>2018.12.24</dt>
                                </dl>
                            </div>
                            <div class="u-right fl clearfix">
<span class="u-icon fl">
<span></span>
</span>
                                <dl>
                                    <dt>更新内容</dt>
                                    <dd>1. 优化价格页面</dd>
                                    <dd>2. 优化并统一了全站的弹框显示样式</dd>
                                </dl>
                            </div>
                        </div>
                        <div class="con clearfix">
                            <div class="u-left fl">
                                <dl>
                                    <dt>2018.12.20</dt>
                                </dl>
                            </div>
                            <div class="u-right fl clearfix">
<span class="u-icon fl">
<span></span>
</span>
                                <dl>
                                    <dt>更新内容</dt>
                                    <dd>1. 新增签名和发布详情页，历史版本显示签名证书名称</dd>
                                    <dd>2. 整合状态栏和标题栏成一个插件，方便用户操作配置</dd>
                                </dl>
                            </div>
                        </div>
                        <div class="con clearfix">
                            <div class="u-left fl">
                                <dl>
                                    <dt>2018.12.17</dt>
                                </dl>
                            </div>
                            <div class="u-right fl clearfix">
<span class="u-icon fl">
<span></span>
</span>
                                <dl>
                                    <dt>更新内容</dt>
                                    <dd>1. 启动图设置增加显示时间</dd>
                                    <dd>2. 引导页插件增加【立即体验】文字设置</dd>
                                    <dd>3. 第三方分享插件增加【分享内容】设置</dd>
                                </dl>
                            </div>
                        </div>
                        <div class="con clearfix">
                            <div class="u-left fl">
                                <dl>
                                    <dt>2018.12.15</dt>
                                </dl>
                            </div>
                            <div class="u-right fl clearfix">
<span class="u-icon fl">
<span></span>
</span>
                                <dl>
                                    <dt>更新内容</dt>
                                    <dd>1. 修复bug大包上传，更新链接会变化</dd>
                                    <dd>2. 修复安卓OPPO手机无法保存图片问题</dd>
                                    <dd>3. 修复封装苹果APP，标题栏无法读取颜色</dd>
                                </dl>
                            </div>
                        </div>
                        <div class="con clearfix">
                            <div class="u-left fl">
                                <dl>
                                    <dt>2018.12.13</dt>
                                </dl>
                            </div>
                            <div class="u-right fl clearfix">
<span class="u-icon fl">
<span></span>
</span>
                                <dl>
                                    <dt>更新内容</dt>
                                    <dd>1. 修复配置分享和标题栏显示逻辑，配置分享后，没有选择标题栏，则不显示标题栏</dd>
                                    <dd>2. 新增个人中心—上传资质功能</dd>
                                </dl>
                            </div>
                        </div>
                        <div class="con clearfix">
                            <div class="u-left fl">
                                <dl>
                                    <dt>2018.12.12</dt>
                                </dl>
                            </div>
                            <div class="u-right fl clearfix">
<span class="u-icon fl">
<span></span>
</span>
                                <dl>
                                    <dt>更新内容</dt>
                                    <dd>1. 新增封装-长按图片保存功能插件</dd>
                                    <dd>2. 新增封装-识别二维码插件</dd>
                                    <dd>3. 新增封装-网页缩放插件</dd>
                                    <dd>4. 修复封装-状态栏插件编辑时，未保存颜色设置的BUG</dd>
                                </dl>
                            </div>
                        </div>
                        <div class="con clearfix">
                            <div class="u-left fl">
                                <dl>
                                    <dt>2018.12.06</dt>

                                </dl>
                            </div>
                            <div class="u-right fl clearfix">
<span class="u-icon fl">
<span></span>
</span>
                                <dl>
                                    <dt>更新内容</dt>
                                    <dd>1. 新增了文档中心（常见问题FAQ）和建议反馈功能</dd>
                                    <dd>2. 工具箱页面改版，新增了安卓证书制作、Plist文件制作、在线制作APP图标功能</dd>
                                    <dd>3. 新增了通知中心的功能（第八区签名/封装等信息，可通过短信/邮件/站内信通知）</dd>
                                </dl>
                            </div>
                        </div>
                        <div class="con clearfix">
                            <div class="u-left fl">
                                <dl>
                                    <dt>2018.11.20</dt>

                                </dl>
                            </div>
                            <div class="u-right fl clearfix">
<span class="u-icon fl">
<span></span>
</span>
                                <dl>
                                    <dt>更新内容</dt>
                                    <dd>1. 新增了三期插件配置功能（侧边栏、在线制作启动图、在线制作APP图标）</dd>
                                    <dd>2. 优化了价格页面展示，增加不同套餐的，服务介绍内容。</dd>
                                    <dd>3. 增加了企业实名认证功能</dd>
                                    <dd>4. 新增了余额充值功能（可用于预付款项）</dd>
                                </dl>
                            </div>
                        </div>
                        <div class="con clearfix">
                            <div class="u-left fl">
                                <dl>
                                    <dt>2018.10.12</dt>

                                </dl>
                            </div>
                            <div class="u-right fl clearfix">
<span class="u-icon fl">
<span></span>
</span>
                                <dl>
                                    <dt>更新内容</dt>
                                    <dd>1. 新增了个人中心(账号设置、订单、发票管理)</dd>
                                    <dd>2. 新增了大包发布和购买功能</dd>
                                    <dd>3. 优化了发布/封装/签名的列表展示页面</dd>
                                    <dd>4. 新增二期插件（标题栏、状态栏、导航栏、引导页等插件）</dd>
                                </dl>
                            </div>
                        </div>
                        <div class="con clearfix">
                            <div class="u-left fl">
                                <dl>
                                    <dt>2018.09.18</dt>

                                </dl>
                            </div>
                            <div class="u-right fl clearfix">
<span class="u-icon fl">
<span></span>
</span>
                                <dl>
                                    <dt>更新内容</dt>
                                    <dd>1. 在线封装APP一期功能上线</dd>
                                    <dd>2. 支持多种插件配置（加载动画、清除缓存、极光推送、第三方分享）</dd>
                                    <dd>3. 新增价格页-封装价格介绍</dd>
                                </dl>
                            </div>
                        </div>
                        <div class="con clearfix">
                            <div class="u-left fl">
                                <dl>
                                    <dt>2018. 08.28</dt>

                                </dl>
                            </div>
                            <div class="u-right fl clearfix">
<span class="u-icon fl">
<span></span>
</span>
                                <dl>
                                    <dt>更新内容</dt>
                                    <dd>1. 在线签名功能上线</dd>
                                    <dd>2. 工具箱功能（提取IPA包和获取UDID）</dd>
                                    <dd>3. 新增价格页-签名价格介绍</dd>
                                </dl>
                            </div>
                        </div>
                        <div class="con clearfix">
                            <div class="u-left fl">
                                <dl>
                                    <dt>2018.08.17</dt>
                                    <dd>网站上线</dd>
                                </dl>
                            </div>
                            <div class="u-right fl clearfix">
<span class="u-icon fl">
<span></span>
</span>
                                <dl>
                                    <dt>更新内容</dt>
                                    <dd>1. 第八区网站全新上线</dd>
                                    <dd>2. APP发布功能、可上传生成下载链接和下载二维码功能</dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<template id="privacy">
    <div class="container">
        <div class="about-us">
            <div class="tab-3">
                <div class="service_content">

                    <p class="">欢迎使用第八区，这是一款面向企业和个人的应用内测平台。</p>
                    <p>第八区认可并尊重用户的隐私。因此，第八区致力于确保用户了解其个人信息的使用方式，并且保证这 些信息的安全。此隐私策略适用于第八区通过显示此隐私策略的网站、移动应用、产品和服务（包括可能
                        由第八区离线提供的产品和服务）收集的信息。此隐私策略适用于第八区当前提供的所有第八区产品和服务。</p>
                    <p>除非此隐私策略第 2 节、第 6 节、第 7 节和第 16 节另有规定，否则未经您同意， 第八区不会与第三方共享您的任何与个人、团队和项目有关的信息。</p>
                    <p>访问第八区的网站，或者使用或购买第八区提供的产品和服务，即表示您接受此隐私策略所述惯例，并同意第八区按照此隐私策略所述方式使用您的信息。</p>
                    <h3>第一条：第八区收集的信息</h3>
                    <p>第八区可能向您收集有关您的身份、您在第八区上创建/加入的团队信息，以及您对第八区产品的个人 喜好方面的信息。我们通常可能收集的个人信息包括：姓名、电子邮件地址、电话号码、IP
                        地址；团队信息包括：公司/团队名称、Logo（或商标、企业标识）、公司/团队介绍、公司/团队通讯地址、电话 号码、服务使用状态的相关信息，以及您在购买过程中可能会涉及到的帐户信息。</p>
                    <p>第八区可能会采用多种不同方式来接收和收集您的个人信息。这些方式可能包括：</p>
                    <p class="font-18 color-333">1. 来自您的信件</p>
                    <p class="height-24">您给我们发送电子邮件或写信时，可能会在邮件中提供您的公司/团队信息、您的姓名、联系详细信息以及其他个人信息。</p>
                    <p class="font-18 color-333">2. 用户支持</p>
                    <p class="height-24">您在打电话或发电子邮件给我们请求产品方面的技术帮助或索取有关我们产品的信息时，可能向我们提供企业/团队和个人信息。</p>
                    <p class="font-18 color-333">3. 产品注册</p>
                    <p class="height-24">注册第八区产品时，系统会要求您提供信息，以便我们将您记录为第八区产品的所有者，从而有助于我们为您提供服务和信息。</p>
                    <p class="font-18 color-333">4. 购买</p>
                    <p class="height-24">如果您希望通过我们的在线支付系统订购第八区产品，我们将需要足够的信息才能完成您的订购， 这些信息包括您企业/团队的银行账户信息或个人的信用卡信息。</p>
                    <h3>第二条：第八区收集信息的用途</h3>
                    <p>第八区可能将您的个人信息用于以下用途：</p>
                    <p class="font-18 color-333">1. 产品注册</p>
                    <p class="height-24">您注册时所提供的信息将用于创建您的第八区团队和项目，并且在您联系第八区用户服务部门时， 这些信息还将协助第八区为您提供支持。第八区
                        还将使用这些信息来通知您有关您可能感兴趣的任何升级、新产品、促销或其他信息。</p>
                    <p class="font-18 color-333">2. 产品的使用</p>
                    <p class="height-24">第八区可能将产品使用中收集的信息用于：定期验证您对产品的使用权利；
                        向您发送新产品/新功能升级的通知前，确认您是否正在使用该产品/功能的较早版本或者是否会对您使用第八区有所帮助； 以及，从第八区接收您请求获取的产品内部消息。</p>
                    <p class="font-18 color-333">3. 产品购买</p>
                    <p class="height-24">如果您通过第八区的在线支付系统购买产品，第八区 将使用您的信息来处理付款并将产品购买信息发送给您。</p>
                    <p class="font-18 color-333">4. 内部分析</p>
                    <p class="height-24">我们可能会使用您提供给我们的信息进行内部统计和分析，从而评估并增强您对第八区网站的体验，
                        包括通过识别您的喜好和购买意向，进行营销以及与运营和开发相关的活动。</p>
                    <h3>第三条：自动收集的信息</h3>
                    <p>无论何时，只要您通过第八区进入我们的网站或访问任何在线信息，我们的 Web 服务器就会自动收集和汇总有关您的访问的信息 （以下简称“自动信息”）。自动信息可能包括相关网站的 URL
                        或域、浏览器类型、操作系统、您所访问的页面以及访问日期和时间。</p>
                    <h3>第四条：用户文件</h3>
                    <p>第八区允许您存储、发送、接收、编辑、同步、共享或者以其他方式组织或管理文件和文件夹 （包括这些文件夹中存储的任何信息或数据）（以下统称“用户文件”）。
                        我们可能获得您在第八区上储存的所有用户文件的大小，因为我们需要了解您对第八区的实际使用情况， 但我们绝不会获取、储存、共享您的任何用户文件。</p>
                    <h3>第五条：与第三方共享信息</h3>
                    <p> 除非第 5 条、第 6 条另有特别规定，否则未经您同意，第八区 不会与第三方共享任何个人信息（例如，通过登录您的用户帐户并选择某选项）。 </p>
                    <p class="font-18 color-333">1. 内部运营</p>
                    <p class="height-24">我们可能与独立审计师共享您向我们提供的信息，实现与我们的内部业务运营相关的收入审计目的，前提是此类审计公司必须遵守此隐私策略。</p>
                    <p class="font-18 color-333">2. 服务提供商</p>
                    <p class="height-24">我们有时会雇用其他公司代表我们提供服务，比如处理交易、邮件的处理和寄送、提供用户支持、
                        托管网站或者针对我们的产品或服务进行统计分析。我们有时需要将您企业/团队和个人的信息与其他公司共享， 以便这些公司能够提供适用的服务。我们仅向这些公司提供其向您提供服务所需的信息，
                        但未授权这些公司将您的信息用于第八区之外的任何其他用途。</p>
                    <h3>第六条：法定披露</h3>
                    <p>虽然我们会尽最大努力保护用户隐私，但当我们有理由相信只有公开个人信息才能遵循现行司法程序、
                        法院指令或其他法律程序或者保护第八区、第八区用户或第三方的权利、财产或安全时，我们可能披露个人信息。</p>
                    <h3>第七条：安全</h3>
                    <p>我们会采取合理的实际及电子手段以及规程保障措施来保护您的企业/团队和个人信息。 虽然通过因特网信息传输数据并非100%
                        安全，但我们已经采取并将继续采取商业范畴内合理的努力来确保您的个人信息得到保护。</p>
                    <h3>第八条：加密</h3>
                    <p>第八区所有的数据都基于SSL/HTTPs传输，保证数据畅通且安全。严格的数据备份制度， 保证每小时、每天和每周都会执行严格的数据备份工作。</p>
                    <h3>第九条：COOKIE</h3>
                    <p>Cookie是仅限文本的信息字符串，网站会将这些字符串传输到计算机硬盘上浏览器的 Cookie 文件中， 以便网站能够记住您的身份信息以及其他详细信息。Cookie
                        可能由网站设置或来源自第三方，比如广告商。Cookie 本身不用于或意图用于从用户的计算机读取任何信息 （Cookie 本身的内容除外）。Cookie
                        只是网站所使用的最初将其放置在您硬盘上的标识符。同一台服务器可以检索到 Cookie 信息的实际内容， 从而标识计算机并进而根据主服务器上存储的信息自定义、跟踪或控制站点的使用情况。</p>
                    <p>我们可能会在第八区网站上使用 Cookie。使用 Cookie，我们便能进行自动访问和使用我们网站的数据输入功能，以及在网站（如果有）上根据您的喜好或兴趣定制网站，
                        或者自定义促销或营销活动时，关联您所进行的购买活动的在线订购信息。此外，我们还可以通过 Cookie
                        跟踪我们网站的使用情况，从而确定哪些功能有用或受欢迎，哪些功能并不能帮助我们有效地改进和更新我们的服务。 大多数网络浏览器都会向您发出有关使用 Cookie 的提醒，或者完全拒绝接受
                        Cookie。您可以通过修改浏览器设置， 接受或拒绝 Cookie。但是，如果禁用 Cookie，您就不能使用此网站的各项交互功能。</p>
                    <h3>第十条：链接</h3>
                    <p>我们网站上可能会提供某些链接， 这些链接可能指向我们选择提供共同品牌产品的第三方或者我们认为有助于您更好的使用第八区服务的其他网站。 第三方网站不受此隐私策略的约束，第八区
                        不对这些网站处理您的个人信息的相关做法进行任何说明。建议您在开始访问这些网站之前查阅其隐私策略，确定其隐私保护惯例。</p>
                    <h3>第十一条：有害信息的过滤和删除</h3>
                    <p>第八区禁止用户创建和储存一切有害信息，包括：</p>
                    <p>1. 违反中国宪法确定的基本原则的；</p>
                    <p>2. 危害国家安全，泄露国家秘密，颠覆国家政权，破坏国家统一的；</p>
                    <p>3. 损害国家荣誉和利益，攻击党和政府的；</p>
                    <p>4. 煽动民族仇恨、民族歧视，破坏民族团结的；</p>
                    <p>5. 破坏国家、地区间友好关系的；</p>
                    <p>6. 违背中华民族传统美德、社会公德、论理道德、以及社会主义精神文明的；</p>
                    <p>7. 破坏国家宗教政策，宣扬邪教和封建迷信的；</p>
                    <p>8. 散布谣言或不实消息，扰乱社会秩序 ，破坏社会稳定的；</p>
                    <p>9. 煽动、组织、教唆恐怖活动、非法集会、结社、游行、示威、聚众扰乱社会秩序的；</p>
                    <p>10. 散布淫秽、色情、赌博、暴力、恐怖或者教唆犯罪的；</p>
                    <p>11. 侮辱或诽谤他人，侵害他人合法权益的；</p>
                    <p>12. 侵犯他人肖像权、姓名权、名誉权、隐私权或其他人身权利的；</p>
                    <p>13. 使用漫骂、辱骂、中伤、恐吓、诅咒等不文明语言的；</p>
                    <p>14. 以非法民间组织名义活动的；</p>
                    <p>15. 侵犯他人著作权、信息网络传播权等合法权益的；</p>
                    <p>16. 含有法律、行政法规禁止的其他内容的。</p>
                    <p>第八区将针对以上信息制定过滤和屏蔽机制，如用户在第八区创建项目或储存文件时不能履行和遵守协议中的规定， 第八区有权对违反协议的用户做出关闭帐户处理，同时保留依法追究当事人法律责任的权利。
                        此外，第八区在采取移除等相应措施后不为此向原发布人承担违约责任或其他法律责任。 第八区依据本协议约定获得处理违法违规内容的权利，该权利不构成第八区的义务或承诺，
                        第八区不能保证及时发现违法行为或进行相应处理。</p>
                    <h3>第十二条：信息的访问、修改和准确性</h3>
                    <p>我们采取了一些合理步骤来确保我们从您那里收到的信息正确无误且始终为最新。您有权访问您的公司/团队和个人信息，
                        来验证其准确性，并纠正不准确的信息。您可以使用电子邮件地址和密码通过第八区网站登录您的帐户并单击个人设置”，
                        随时更改您的信息。您也可以通过<a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="b7c4d2c5c1ded4d2f7d3ded5d6c6c299d4d8da">[email&#160;protected]</a>与我们联系，访问并纠正个人信息中的错误。
                        如果您不想获得有关产品、服务或营销计划的信息，或者希望从任何直接营销计划、企业调查、电话营销、直邮或电子邮件列表中删除您的信息，
                        或者想限制我们对您的个人信息的使用或披露，请通过<a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="55263027233c363015313c373424207b363a38">[email&#160;protected]</a>与我们联系。</p>
                    <h3>第十三条：业务转让</h3>
                    <p>第八区收集的信息将被视作一项资产。如果第八区、任何附属公司、部门或部分资产被另一家公司收购，
                        则此类信息可能成为被转让资产之一。如果情况如此，收购方公司只能按照此隐私策略（或者向您收集信息时有效的任何后续策略）使用您的信息。
                        请注意，转让后提交或收集的信息可能必须遵守收购方公司所采用的新隐私策略。</p>
                    <h3>第十四条：国际传输</h3>
                    <p>您的信息可能被传送到或存储在您所在国家/地区、省/市/自治区或其他政府管辖区域以外的地方， 这些地方的隐私法律对您的个人信息的保护程度可能低于您所在的管辖区域。如果您位于中华人民共和国以外，
                        您应知悉，第八区可能将您的个人信息传输到中国并在中国进行处理。提交此类信息，即表示您同意此隐私策略， 进而表示您同意进行此类传输。</p>
                    <p>我们始终致力于改善我们的业务和运营。因此，我们的策略将不断完善。 鉴于此，第八区保留不时修改此隐私策略的权利。对此策略的更改将发布在www.dibaqu.com网站上。
                        我们欢迎您不时访问我们的隐私策略页面，来查看最新隐私策略。如果我们对此隐私策略进行实质性更改，
                        扩展了我们使用您的公司/团队和个人信息的权利，我们将通过电子邮件或者在我们网站上的显著位置告知您并征求您的同意。</p>
                    <h3>第十五条：与我们联系</h3>
                    <p>请将您对您的信息的任何访问请求、信息修改请求或有关此策略的问题发送至以下电子邮件地址：<a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="aeddcbdcd8c7cdcbeecac7cccfdfdb80cdc1c3">[email&#160;protected]</a>。</p></div>
            </div>
        </div>
    </div>
</template>
<template id="agreement">
    <div class="container">
        <div class="about-us">
            <div class="tab-4">
                <div class="service_content">

                    <p>第八区（除非特别说明，本服务协议所提及的第八区同时包括 dibaqu.com 网站、域名下的所有内容。使用第八区,
                        也就意味着您同意本服务协议及第八区对其不时所做的修订。</p>
                    <h3>第一条：使用之前提</h3>
                    <p>1. 通过使用第八区所提供的信息，工具以及其他功能，借助任何第八区的 API，或者经由第八区接口的任何软件、其它网站，或者它的
                        API（以上统称“服务”），都表示您同意遵守本服务协议，无论您是一个非注册用户还是一个注册用户。</p>
                    <p>2.
                        如果您想成为注册用户并使用第八区提供的服务，您必须阅读并接受本服务协议。只要您注册成为第八区的用户（无论是通过第八区还是通过其他第三方媒介，下同）就视为您接受了本服务协议。如果您接受本服务协议，则表示您有能力受其约束，或者，如果您代表了一个公司或实体，您有权使该实体受其约束。</p>
                    <h3>第二条：行为准则</h3>
                    <p>1. 一旦您接收了本服务协议项下的条款和条件，即表示您同意在使用服务时遵守以下规则。您理解并同意，如果您违反了以上规则，所出现的任何后果由您自行承担，第八区对此不负有任何责任。</p>
                    <ul>
                        <li> 1.1 不得利用第八区提供的服务从事任何非法活动，不发布违反国家相关法律法规及政策规定的内容；</li>
                        <li> 1.2 不得利用第八区危害国家安全，泄露国家秘密，颠覆国家政权，破坏国家统一；</li>
                        <li> 1.3 不得利用第八区损害国家荣誉和利益；</li>
                        <li> 1.4 不得利用第八区煽动民族仇恨、民族歧视，破坏民族团结；</li>
                        <li> 1.5 不得利用第八区破坏国家宗教政策，宣扬邪教和封建迷信；</li>
                        <li> 1.6 不得利用第八区散布谣言，扰乱社会秩序，破坏社会稳定；</li>
                        <li> 1.7 不得利用第八区散布淫秽、色情、赌博、暴力、凶杀、恐怖或者教唆犯罪；</li>
                        <li> 1.8 不得利用第八区侮辱或者诽谤他人，侵害他人合法权益；</li>
                        <li> 1.9 不得利用第八区侵害他人知识产权、商业秘密等合法权益；</li>
                        <li> 1.10 不得利用第八区恶意虚构事实、隐瞒真相以误导、欺骗他人；</li>
                        <li> 1.11 不得利用第八区发布、传送、传播垃圾信息；</li>
                        <li> 1.12 不得向第八区上传任何恶意代码、含有恶意行为的软件；</li>
                        <li> 1.13 不得滥用第八区所提供的资源或者服务，该等滥用包括但不限于重复应用、谋取不当利益等行为；</li>
                        <li> 1.14 不得转让或继受、售卖第八区的账号和密码，以谋取不当利益；</li>
                        <li> 1.15
                            不得公开展示或使用服务共享不当内容或材料（例如，涉及裸体、兽行、色情、暴力画面或犯罪活动）以及不符合适用法律或法规要求的内容或材料（例如，侵犯知识产权的软件或图片、文字、代码等）；
                        </li>
                        <li> 1.16 不得传播任何形式的游戏软件作品；</li>
                        <li> 1.17 不得从事虚假或误导性活动（例如编造虚假理由索要现金，假冒他人，操纵服务）或者中伤或诽谤活动；</li>
                        <li> 1.18 不得规避服务的任何访问或可用性限制；</li>
                        <li> 1.19 不得从事对服务或他人有害的活动（例如，传播病毒、跟踪、发布仇恨言论或宣扬针对他人的暴力行为）；</li>
                        <li> 1.20 不得利用第八区或其服务侵犯他人的合法权利；</li>
                        <li> 1.21 不得利用第八区从事侵犯他人隐私或数据保护权利的活动；</li>
                        <li> 1.22 不得利用第八区传播含有违反国家法律的金融、股票、理财、贷款、赌博等软件或App；</li>
                        <li> 1.22 其他法律法规禁止的行为；</li>
                        <li> 1.23 不得帮助他人违反上述规则。</li>
                    </ul>
                    <p>2.
                        强制执行。如果您违反本服务协议项下的条款和条件，第八区有权在不提前通知您的情况下采取合理且适当的措施以维护第八区以及其他用户的合法及正当利益，该等措施包括但不限于停止为您提供服务、关闭您的第八区账户、删除您在第八区上发布的内容和信息，并保存相关记录及向有关政府主管部门举报。在对涉嫌违反本服务协议项下条款和条件的行为进行调查时，
                        第八区将保留对您的内容进行审查以便解决问题的权利。</p>
                    <h3>第三条：版权</h3>
                    <p>1.
                        第八区包含的所有内容，包括但不限于文本，图形，徽标，按钮图标，图像，音频剪辑，数码下载，数据编译，软件以及内容汇编成一体的连贯的网站都属于第八区所有，并受中国和国际版权法的保护。严禁未经第八区书面允许即对其上述内容进行复制、使用或者进行其他非法利用。</p>
                    <p>2. 第八区的所有注册用户向第八区平台所提供的 App（手机应用程序）应当保证拥有完整独立的知识产权，包括但不限于外观设计，著作权。</p>
                    <h3>第四条：商标和服务标记</h3>
                    <p>第八区 ,
                        第八区标志和其他第八区图形、标识、网页标题、按钮图标、脚本和服务名称均为第八区或其子公司及关联公司的商标、证明商标、服务标记或其它商业外观。第八区的商标、证明商标、服务标记和商业外观由于它们的限制使用而具有固有的意义和重大价值。它们不会被用于未经第八区许可的任何有关产品或服务。</p>
                    <h3>第五条：访问许可</h3>
                    <p>考虑到访问第八区和其服务，第八区将授予您一个访问第八区和用于个人使用的有限许可。本服务协议禁止您下载
                        （页面缓存除外）或修改第八区的任何部分，除非得到第八区明确的书面同意。本服务协议不允许转售第八区的服务。在未经第八区明确书面同意的情况下，您不得使用第八区上的任何商标、标识或其它专有的信息(包括但不限于图像、文本、网页布局或表单)。任何未经授权的使用自动终止了第八区授予的允许或许可，并可能产生各种损害赔偿的法律责任。</p>
                    <h3>第六条：账户、密码、资质材料</h3>
                    <p>1.
                        如果您注册成为第八区的用户并因此创建了一个账户，您需自行负责维护您的账户和密码的机密性，并且您同意接受对在您的账户或密码下发生的所有活动负责。第八区无义务且没有办法对非法或未经您授权使用您账号和密码的行为进行识别，因此，第八区对前述行为所引起的一切责任及其他不利后果不承担任何责任。但第八区保留以下权利：自行裁定权、拒绝服务、暂停或终止账户或以其他方式限制访问第八区和接受第八区的其他任何服务。</p>
                    <p>2.
                        您保证：您具备使用本服务、接入和运营应用或提供相关服务等行为的相关合法资质或经过了相关政府部门的审核批准；您提供的主体资质材料、相关资质或证明以及其他任何文件等信息真实、准确、完整，并在信息发生变更后，及时进行更新；您具备履行本协议项下之义务、各种行为的能力；您履行相关义务、从事相关行为不违反任何对您有约束力的法律文件。否则，您应不使用第八区提供的相关服务，且应独自承担由此带来的一切责任及给用户、第八区造成的全部损失。</p>
                    <p>3. 您保证：您会依法及按照第八区要求提交使用本服务所必须的真实、准确的经过您签章确认的主体资质材料以及联系人姓名（名称）、地址、电子邮箱等相关资料。 </p>
                    <p>4. 您保证：您在第八区上通过您的应用提供的各种服务，依法已经具有相关的合法资质或获得了有关部门的许可或批准，并会向第八区提交相关资质或证明文件。 </p>
                    <p>5. 您保证：您在第八区上通过您的应用提供的各种服务，符合国家相关法规的规定，不违反任何相关法规及相关协议、规则，也不会侵犯任何人的合法权益，
                        同时，会依法、依约或按照第八区的要求提供版权、专利权等相关证明文件。</p>
                    <h3>第七条：隐私及数据信息安全</h3>
                    <p>1.
                        使用本服务，即表示您同意第八区合法收集和使用有关您及您所使用本服务的技术性或诊断性信息。收集到的些信息将用于改进网页的内容，提升我们的服务品质。第八区不会将您的信息和内容分享或出售给其他的组织。但以下情况除外：</p>
                    <ul>
                        <li> 1.1 您同意让第三方共享资料；</li>
                        <li> 1.2 第八区需要听从法庭传票、法律命令或遵循法律程序；</li>
                        <li> 1.3 您违反了本协议。</li>
                    </ul>
                    <p>2. 第八区会竭力保护您的数据信息安全与隐私，但如发生包括但不限于以下任一状况，第八区将不承担任何法律责任：</p>
                    <ul>
                        <li> 2.1 因第八区无法对非法的或未经用户授权的使用第八区帐号及密码的行为作出甄别，因此造成您在第八区的帐号及密码被窃取的；</li>
                        <li> 2.2 您发布的应用程序包括任何可链接到该应用程序的网址或其他在线服务侵犯到第三方知识产权的；</li>
                        <li> 2.3 您通过第八区收集到的任何用户信息（包括但不限于用户设备信息等），不仅只供内测使用，还提供给任何第三方或另作他用的；</li>
                        <li> 2.4 因不可抗力，计算机病毒或黑客攻击，系统不稳定，您所在位置无网络信号，关机，GSM网络、互联网络、通信线路原因等造成的服务中断或不能满足您的服务要求、造成您的数据丢失的。
                        </li>
                    </ul>
                    <h3>第八条：服务或软件更新以及条款变更</h3>
                    <p>1.
                        我们可能会随时变更本服务协议项下的条款和条件。如果您在该等条款和条件变更生效后使用服务，即表示您同意新的条款和条件。如果您不同意新的条款和条件，则必须停止访问第八区并停止使用其服务，并请关闭您的第八区帐户。</p>
                    <p>2.
                        有时，您可能需要软件更新，才能继续使用服务。我们会自动检查您的软件版本，并且下载软件更新或配置变更，包括那些可能会阻止您访问服务、或使用未经授权的硬件外围设备的配置变更，还可能要求您更新软件才能继续使用服务。此类更新受上述条款的约束，除非更新附带有其他条款，在这种情况下，其他条款应予适用。尽管有上述约定，第八区没有义务提供任何更新，也不保证第八区将针对您曾对软件进行许可的系统的版本提供支持。这种更新可能与由第三方提供的软件或服务不兼容。</p>
                    <p>3.
                        另外，有些时候，我们也许需要删除或更改服务的功能，或者停止提供一项服务，或者访问第三方应用程序和服务。除非适用的法律明确要求，否则我们无义务对已删除或更改之前的任何服务的功能或者服务提供重新下载或恢复。</p>
                    <h3>第九条：签约实体、法律选择和争议解决地</h3>
                    <p>1.
                        当您选择使用第八区服务时，您将与福建喜佳宝网络科技有限公司签订合同；本服务协议项下的条款将受中华人民共和国法律管辖。当您依照本服务协议的条款使用第八区服务时，对于由这些条款或服务引起的或与其相关的任何争议，包括与这些条款的存在、有效性或终止相关的任何问题，均应提交至中国陕西省西安市的仲裁机构仲裁，并按照中华人民共和国的法律进行仲裁。仲裁裁决将为最终裁决，对双方均具有约束力。</p>
                    <p>2. 本协议签订地为中华人民共和国陕西省西安市。 </p>
                    <h3>第十条：保证</h3>
                    <p>1.
                        第八区不提供与您使用服务相关的任何明示或默示的保证、保障或条件。您已了解，您应自行承担服务使用风险，我们按“现状”提供服务，服务可能存在各种缺陷，并且只提供服务的目前可用功能。第八区不保证服务中所提供的信息的准确性或时效性。根据适用法律，您可能享有某些权利，如果适用，本服务协议的条款中的任何规定均无意影响这些权利。您承认，计算机和电信系统可能会出现故障或偶尔会发生停机。我们不保证服务无中断、及时、安全、无错误、不发生内容丢失，也不会对与计算机网络的连接或传输作任何保证。</p>
                    <p>2. 在适用法律允许的范围内，我们排除有关适销性、质量满意度、特定用途的适用性、无技术问题和不侵权的任何默示保证。</p>
                    <h3>第十一条：责任限制</h3>
                    <p>1. 第八区仅对本协议中列明的责任承担范围负责。</p>
                    <p>2. 本协议约定服务之合作单位，所提供之服务品质及内容由该合作单位自行负责。</p>
                    <p>3.
                        在法律允许的情况下，第八区对于与本协议有关或由本协议引起的任何间接的、惩罚性的、特殊的、派生的损失（包括业务损失、收益损失、利润损失、使用数据或其他经济利益的损失），不论是如何产生的，也不论是由对本协议的违约（包括违反保证）还是由侵权造成的，均不负有任何责任，即使事先已被告知此等损失的可能性。另外即使本协议规定的排他性救济没有达到其基本目的，也应排除第八区对上述损失的责任。</p>
                    <p>4.
                        对于因超出第八区合理控制范围的情况（例如劳资纠纷、不可抗力、战争或恐怖主义行为、恶意破坏、意外事故或遵守任何适用法律或政府命令）而导致第八区无法履行或延迟履行其义务，第八区对此不承担任何责任或义务。第八区将尽最大努力降低这些事件的影响，并将尽最大努力履行未受影响的义务。</p>
                    <p>5.
                        第八区的服务是按照现有技术和条件所能达到的现状提供的。第八区会尽最大努力向您提供服务，确保服务的连贯性和安全性；但第八区不能保证其所提供的服务毫无瑕疵，也无法随时预见和防范法律、技术以及其他风险，包括但不限于不可抗力、病毒、木马、黑客攻击、系统不稳定、第三方服务瑕疵、政府行为等原因可能导致的服务中断、数据丢失以及其他的损失和风险。所以您也同意：即使第八区提供的服务存在瑕疵，但上述瑕疵是当时行业技术水平所无法避免的，其将不被视为第八区违约，同时，由此给您造成的数据或信息丢失等损失的，您同意放弃追究第八区的责任。</p>
                    <p>6.
                        您承诺您使用本服务及您的任何行为，不得违反任何相关法律法规、本协议及相关协议、规则等，不得侵犯任何主体的合法权益等。若第八区自行发现或根据相关部门的信息、权利人的投诉等发现您可能存在违反前述承诺情形的，第八区有权根据一般人的认识自己独立判断，以认定您是否存在违反前述承诺的情形。若第八区经过判断认为您存在违反前述承诺的情形，第八区有权随时单方采取以下一项或多项措施：</p>
                    <ul>
                        <li>6.1 要求您立即更换、修改侵犯他人合法权益的相关内容，在您更正前，暂停向您或您关联公司支付涉嫌违规应用或您以及您关联公司名下其他任何一款应用或全部应用的收益；</li>
                        <li>6.2 对涉嫌违规应用或您以及您关联公司名下的其他全部应用或任何一款应用采取封闭新用户入口、限制老用户登录等措施；</li>
                        <li>6.3 对涉嫌违规应用或您以及您关联公司名下的其他全部应用或任何一款应用采取下线措施，即终止应用在开放平台的运营；</li>
                        <li>6.4 暂停向您或您关联公司支付任何费用；</li>
                        <li>6.5 从应向您或您关联公司支付的任何款项中直接扣减第八区遭受的损失或者应由您承担的相应金额的违约金；</li>
                        <li>6.6 禁止您或您关联公司今后将任何新应用接入开放平台；</li>
                        <li>6.7 中止或终止涉嫌违规应用或您以及您关联公司名下的其他全部应用或任何一款应用，在第八区开放平台之外的平台、网站的宣传、推广、发布行为；</li>
                        <li>6.8 追究您的法律责任，或同时单方终止本协议；</li>
                        <li>6.9 将您的行为对外予以公告，向主管机关或投诉人、权利人提供您的有效信息；</li>
                        <li>6.10 其他第八区认为适合的处理措施。</li>
                    </ul>
                    <p>7.
                        在第八区告知您或您自行得知您存在侵犯他人合法权益情形后，您应根据第八区的审核或客服渠道向第八区提出反通知。但是，无论第八区是否告知您、您是否提出反通知或反通知是否符合相关法规、第八区要求等，均不影响第八区进行自己的独立判断和采取相关措施。</p>
                    <p>8.
                        若第八区按照上述条款、本协议的其他相关约定或因您违反相关法律的规定，对您或您的应用采取任何行为或措施，所引起的纠纷、责任等一概由您自行负责，造成您损失的，您应自行全部承担，造成第八区或他人损失的，您也应承担全部责任。</p>
                    <p>9.
                        若第八区按照上述条款、本协议的其他相关约定或因您违反相关法律的规定，对您或您的应用采取任何行为或措施后，导致您没有使用到相应服务但已经缴纳相应费用的，对该部分费用，第八区有权不予退还，而作为您违反约定的违约金予以没收。</p>
                    <p>10.
                        因您违约导致第八区终止本协议的，尚未结算的应用收益，第八区有权不予结算，而作为违约金归第八区所有。此外，因您违反本协议约定，所引起的纠纷、责任等一概由您自行负责，造成第八区损失的（包括但不限于被主管机关罚款、赔偿权利人损失、律师费、诉讼费等），您应在5个工作日内赔偿第八区全部损失。</p>
                    <p>11.
                        您同意并承诺，在您使用第八区所提供服务的过程中，您不得向第八区上传含有违反国家相关法律法规及政策规定内容，包括但不限于代码、软件、图片、视频、文字、App等。否则，出现的所有法律后果由您自行全部承担，第八区对此不负任何责任。</p>
                    <p>12.
                        第八区作为第三方中立平台，不具有对您上传至第八区的内容进行审查的义务，但第八区在认为有需要时，第八区有权利对您上传至第八区服务的内容进行审查，审查结果及审查后的进一步动作可由第八区进行自行裁定。您对此表示理解并同意，并愿意承担因审查出现的全部后果。</p>
                    <h3>第十二条：应用程序</h3>
                    <p>1. 许可范围。</p>
                    <p>
                        第八区提供的应用程序（包含网站、APP、SDK、API接口等，下同）只授予使用许可，而非出售。本协议只授予您使用应用程序的某些权利。除非适用的法律赋予您此项限制之外的更多权利，否则您仅可在本协议明示许可的范围内使用应用程序。为此，您必须遵守应用程序中的任何技术限制，这些限制只允许您以特定的方式使用应用程序。您不得：</p>
                    <ul>
                        <li> 1.1 绕过应用程序中的任何技术限制。</li>
                        <li> 1.2 对应用程序进行反向工程、反向编译或反汇编；尽管有此项限制，但如果适用法律明示允许上述活动，则在且仅在适用法律明示允许的范围内从事上述活动不在此限。</li>
                        <li> 1.3 制作超过本服务协议所规定或适用的法律所允许数量的应用程序副本。</li>
                        <li> 1.4 发布或以其他方式提供应用程序以便其他人复制。</li>
                        <li> 1.5 出租、租赁或出借应用程序。</li>
                        <li> 1.6 将应用程序或本服务协议转让给任何第三方。</li>
                    </ul>
                    <p>2. 下载。应用程序的下载可能会消耗网络流量，因此而产生的费用，将由您自行承担。</p>
                    <p>3.
                        第八区会随时清理其上含有包括但不限于色情内容、垃圾信息、积分墙、游戏私服、病毒、翻墙、反动、盗版软件、恶意扣费、破解软件等恶意应用程序，但您在下载应用程序前请自行甄别应用程序的质量，请勿因为垃圾短信、邮件内容随意下载来源不可靠的应用程序，请根据应用下载链接的来源自行判断并下载可信任的应用程序。</p>
                    <p>4. 文档。如果随应用程序提供文档，则您可以复制和使用该文档，但仅供您个人参考之用。</p>
                    <h3>第十三条：其他</h3>
                    <p>1. 本服务协议、任何适用的隐私政策、补充和更新条款以及您同意的任何隐私政策，构成第八区服务及其应用程序的完整的服务协议。</p>
                    <p>2. 本协议的成立、生效、履行、解释及纠纷解决，适用中华人民共和国大陆地区法律（不包括冲突法）。 </p></div>
            </div>
        </div>
    </div>
</template>
<template id="specification">
    <div class="container">
        <div class="about-us">
            <div class="tab-5">
                <div class="service_content">

                    <a name="01"></a>
                    <p class="item-title">1、介绍（Introduction）</p>
                    <p>
                        第八区（dibaqu.com）是一个创新的开发者服务平台，为开发者提供测试应用快速发布，提高应用内测分发效率。同时我们为开发者提供iOS
                        App、Android App 的开发、打包、封装、测试、分发上线等一系列效率工具，帮助开发者将精力集中在优化产品本身上。我们致力于打造一个服务于开发者的生态圈！<br>
                        这个文档会及时更新并完善，每一次的修改都是基于优化用户的体验、公平对待所有开发者出发。我们重视用户体验如同珍视生命一般，希望您也如我们一样。我们期望所有的开发者们要了解，第八区开发中服务平台中发布内测应用的一些原则
                    </p>
                    <a name="01"></a>
                    <p class="item-title">2、条款（Terms and conditions）</p>
                    <p class="font18">2.1 开发者应该遵守国家的法律法规，同时尊重其他开发者的劳动成果。以下的规则将可以帮助 您的应用第八区尽快内测发布</p>
                    <p class="font18">2.2 以下审核规范中提及的手机型号对应关系均为最新的系统版本或机型</p>
                    <a name="03"></a>
                    <p class="item-title">3、应用功能（Functionality）</p>
                    <p class="font18">3.1 应用无法正常运行或功能存在问题</p>
                    <p>3.1.1应用存在功能问题</p>
                    <p>3.1.2应用无法正常安装或安装时提示解析失败</p>
                    <p>3.1.3应用无法正常卸载或卸载报错</p>
                    <p>3.1.4应用在启动时崩溃</p>
                    <p>3.1.5应用在运行时崩溃</p>
                    <p>3.1.6应用中内容无法正常显示或无法获取</p>
                    <p>3.1.7应用内按钮点击无反应或点击报错</p>
                    <p>3.1.8应用内Tap无法切换或切换报错</p>
                    <p>3.1.9应用强制或诱导修改系统默认设置</p>
                    <p>3.1.10应用功能需要依赖于第三方应用才能实现</p>
                    <p>3.1.11应用描述中介绍的功能在应用内不具备或不一致</p>
                    <p>3.1.12应用需要登录，但应用内不提供注册通道，请在完善资处填写测试账号。</p>
                    <p>3.1.13注册账号功能不可用，审核时尝试3次都无法成功注册</p>
                    <p>3.1.14应用登录账号功能不可用，应用审核时尝试3次都无法成功登录</p>
                    <p>3.1.15应用界面模糊或拉伸</p>
                    <p class="font18">3.2应用描述和实际功能不符</p>
                    <p>3.2.1应用介绍或更新日志中介绍的功能在应用内不具备或不一致</p>
                    <p>3.2.2应用存在欺骗用户下载使用的行为</p>
                    <p class="font18">3.3申请危险权限或权限和功能不符</p>
                    <p>3.3.1应用申请的权限和其实际功能不符</p>
                    <p>3.3.2应用实际功能不需常驻通知栏却常驻通知栏</p>
                    <p>3.3.3应用无法关闭常驻通知提示</p>
                    <p>3.3.4通知栏显示图标与应用ICON不相同</p>
                    <p>3.3.5应用实际功能不需开机启动却开机启动</p>
                    <p>3.3.6应用在安装或者运行前提示用户重启设备</p>
                    <p>3.3.7应用在安装或者运行前强制重启设备</p>
                    <p class="font18">3.4应用功能存在使用限制</p>
                    <p>3.4.1应用功能仅供部分用户使用，比如限制用户的地域或仅供组织内部使用等，请在应用介绍内说明具体限制范围</p>
                    <p class="font18">3.5应用存在恶意行为</p>
                    <p>3.5.1应用存在恶意行为</p>
                    <p>3.5.2应用未经用户许可发送短信，建议使用返回验证码等方式</p>
                    <p>3.5.3应用存在病毒</p>
                    <p>3.5.4应用存在吸费行为</p>
                    <p>3.5.5应用消耗过多的网络流量</p>
                    <p>3.5.6应用未经用户许可拨打电话</p>
                    <p>3.5.7应用修改主叫号码，主要功能用于欺骗被叫用户</p>
                    <p>3.5.8应用未运行，但是仍会启动GPS、蓝牙等系统功能</p>
                    <a name="04"></a>
                    <p class="item-title">4、应用展示和广告（App Properties &amp; AD）</p>
                    <p class="font18">4.1应用闪屏界面（或启动引导界面）包含其他应用的图标、水印、文字等</p>
                    <p class="font18">4.2应用展示内容存在问题</p>
                    <p>4.2.1应用内容存在侵权行为</p>
                    <p>4.2.2应用名称+描述语不能超过8个汉字字符或16个英文字符</p>
                    <p>4.2.3应用名称本身就已经超过8个汉字或16个英文字符，只能使用应用的原名称，不能添加描述语</p>
                    <p>4.2.4应用名称存在占位符文本、大量空格等非法字符（如：#、*、&amp; 等）</p>
                    <p>4.2.5应用名称与线上已存在的应用的名称相同，请您修改名称；若拥有相应名称的商标权，请联系客服提交</p>
                    <p>4.2.6应用在商店中显示的名称和安装到设备中显示的名称差异较大</p>
                    <p>4.2.7应用名称包含非法内容</p>
                    <p>4.2.8应用名称存在侵权行为</p>
                    <p>4.2.9应用名称仅以类别词命名，如以壁纸、标签、电话、桌面、安全助手、wifi等名称做为应用的名称；</p>
                    <p>4.2.10应用介绍或更新说明包含非法内容</p>
                    <p> 4.2.11应用介绍或更新说明中包含侵权内容</p>
                    <p>4.2.12应用介绍或更新日志中存在占位符文本、大量空格空行、非法字符（如：@、#、*、&amp; 等）</p>
                    <p>4.2.13更新说明和旧版本的更新日志相同，请填写本次更新说明</p>
                    <p>4.2.14应用更新说明中包含其他应用市场名称或内容</p>
                    <p>4.2.15更新说明无效，请填写正确的更新说明</p>
                    <p>4.2.16应用简介中使用了极限词或虚假承诺等违反新广告法的内容（如“最”“第一”“唯一”“NO.1”“必备”“免费送”“100%” “全球”“顶尖”“首”等）；</p>
                    <p>4.2.17应用简介使用了疑问、反问等句式（请用陈述语句进行描述）</p>
                    <p>4.2.18应用简介中包含违规内容（如侵权、色情、恐怖暴力、反动等</p>
                    <p>4.2.19应用简介存在占位符文本、大量空格等非法字符（如：#、*、&amp; 等）</p>
                    <p class="font18">4.3应用展示的图片资源存在问题</p>
                    <p>4.3.1应用内容中的图片拉伸或模糊</p>
                    <p>4.3.2应用截图和应用实际的界面不符</p>
                    <p>4.3.3应用截图中存在重复</p>
                    <p>4.3.4应用截图存在黑边</p>
                    <p>4.3.5应用截图存在压缩</p>
                    <p>4.3.6应用截图模糊不清，无法分辨截图内容</p>
                    <p>4.3.7应用截图存在拉伸</p>
                    <p>4.3.8应用截图内容显示不完整</p>
                    <p>4.3.9应用截图存在非法内容</p>
                    <p>4.3.10应用截图存在侵权行为</p>
                    <p class="font18">4.4广告相关</p>
                    <p>4.4.1应用未经用户许可或默认勾选创建桌面快捷方式</p>
                    <p>4.4.2应用未经用户许可默认安装或默认勾选安装第三方应用</p>
                    <p>4.4.3应用未经用户许可修改系统默认设置</p>
                    <p>4.4.4应用存在诱导用户点击广告的行为</p>
                    <p>4.4.5应用内存在诱导用户评价功能，不得出现任何诱导用户进行评分、给应用好评的功能</p>
                    <p>4.4.6应用介绍中不得包含任何诱导用户进行评分、给应用好评的功能或文字描述</p>
                    <p>4.4.7应用存在通知栏广告</p>
                    <p>4.4.8应用多次发现存在通知栏广告行为，将不再收录</p>
                    <p>4.4.9应用存在强制积分墙，在启动时强制要求换取积分才能使用</p>
                    <p>4.4.10应用存在强制积分墙，在使用时强制要求换取积分</p>
                    <p>4.4.11应用具有诱导用户赚取积分兑换货币或奖品的功能</p>
                    <p>4.4.12暂不收录：赚取积分以兑换话费、现金等奖品的应用</p>
                    <p>4.4.13应用存在抢占锁屏的行为</p>
                    <p>4.4.14应用广告存在模仿系统通知或警告的行为</p>
                    <p>4.4.15应用的主要目的是展示广告或者市场营销</p>
                    <p>4.4.16应用使用过程中频繁弹出悬浮窗广告，中断用户操作，影响用户体验</p>
                    <p>4.4.17应用包含空广告栏位</p>
                    <p>4.4.18应用中的广告不能干扰第三方的应用的广告展示</p>
                    <p>4.4.19应用广告中包含不良或违法信息</p>
                    <p>4.4.20通过非正常渠道进行推广安装</p>
                    <p class="font18">4.5用户使用体验</p>
                    <p>4.5.1应用打开立即会提示更新，请确认您所上传的是否为最新版本</p>
                    <p>4.5.3应用功能、界面和应用商店中已收录应用非常类似</p>
                    <p>4.5.4应用功能、界面和应用商店中已收录应用完全雷同</p>
                    <p>4.5.5开发者应将当地官方语言的应用描述放在应用描述最前</p>
                    <p>4.5.6应用部分功能或内容需要访问调用其他应用获取</p>
                    <p>4.5.7应用内容不完整，部分功能待开发</p>
                    <p>4.5.8应用的用户界面过于复杂</p>
                    <a name="05"></a>
                    <p class="item-title">5、应用内容（Contents of App）</p>
                    <p class="font18">5.1应用存在暴力内容</p>
                    <p>5.1.1任何带有诽谤、人身攻击或者侮辱个人或者团体的应用</p>
                    <p>5.1.2应用存在人类或动物被杀、被虐待、被伤害等图片或内容</p>
                    <p>5.1.3应用过分描述暴力或虐待儿童</p>
                    <p>5.1.4应用对武器进行过于逼真的表述（如不能涉及武器的制造工艺和参数等），并鼓励违法或滥用武器</p>
                    <p class="font18">5.2应用存在色情内容</p>
                    <p>5.2.1应用包含色情内容或者过分展现性器官，但又不是旨在艺术审美或情感</p>
                    <p>5.2.2应用中存在允许用户提交色情内容，如允许用户发布色情照片、文字等</p>
                    <p>5.2.3情趣用品商城类应用禁止存在社区、论坛等允许用户发布帖子、信息和评论帖子等功能和模块</p>
                    <p>5.2.4应用介绍、应用截图、描述语等含有色情内容，详情如下：</p>
                    <p class="font18">5.3应用存在非法金钱交易或内容</p>
                    <p>5.3.1应用具有现金或者流通货币赌博功能</p>
                    <p class="font18">5.4政治问题</p>
                    <p>5.4.1应用不能包含对国家领导人诽谤、人身攻击或者侮辱性的内容</p>
                    <p>5.4.2应用包含反政府、反社会内容</p>
                    <p>5.4.3存在政治错误的应用，如VPN、翻墙、涉恐涉暴等</p>
                    <p class="font18">5.5用户使用感受</p>
                    <p>5.5.1第八区暂不收录：品类单一的主题、壁纸、锁屏类应用</p>
                    <p>5.5.2第八区暂不收录：短信收取服务费的应用</p>
                    <p>5.5.3第八区暂不收录：主要功能需要获取Root权限后才可使用的应用</p>
                    <p>5.5.4应用设计的功能主要是令用户厌恶、恐惧</p>
                    <p>5.5.5应用具有易引起用户不适或者比较粗俗的内容，如对血腥和色情场面的过分展现</p>
                    <p>5.5.6应用中所有的“敌人”角色，都不能针对任何一个现实的种族、文化、政府或公司，以及任何一个真实的个体</p>
                    <p>5.5.7应用中涉及的宗教内容都应该是翻译准确和使用恰当的，并且不存在误导行为。使用这些内容的目的应该是教育意义的而不是煽动性的</p>
                    <p>5.5.8存在针对某一宗教、文化或种族的诽谤、侮辱或攻击的内容，或有可能让这部分群体人们造成情感伤害的内容</p>
                    <p class="font18">5.6应用内抽奖、彩票相关功能及内容</p>
                    <p>5.6.1应用中的竞赛和抽奖活动必须由该应用开发者来发起</p>
                    <p>5.6.2竞赛和抽奖活动必须在应用的用户协议中有清晰详细的描述，且这些竞赛或抽奖活动第八区无关，不承担任何相关法律责任</p>
                    <p>5.6.3彩票类软件都必须符合国家的相关法律条款</p>
                    <p>5.6.4理财/彩票类软件请根据要求提交相关资质证明发送至 <a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="ee9d8b9c98878d8bae8a878c8f9f9bc08d8183">[email&#160;protected]</a></p>
                    <p>5.6.5理财应用提交的应用一句话简介，应用描述，更新日志，截图等需符合理财APP内容审核要求</p>
                    <p class="font18">5.7开发者行为不当</p>
                    <p>5.7.1开发者重复提交结构、功能、内容相似的应用，重复提交的应用将被驳回或下架,情节严重者将被封禁开发者账号</p>
                    <p>5.7.2开发者对已经明确版权归属的应用私自进行破解、汉化、反编译或重新打包，应用将被驳回且开发者将被封禁开发者账号</p>
                    <p>5.7.3开发者提交的应用存在问题或开发者自身原因，开发者主动申请驳回、删除或下架</p>
                    <a name="06"></a>
                    <p class="item-title">6、损坏设备（Damage to Device）</p>
                    <p class="font18">6.1 用户运行该应用有可能损坏设备</p>
                    <p class="font18">6.2 应用会迅速消耗电量或者造成设备过热</p>
                    <p> 6.2.1 应用未启动，但不断使用GPS等功能导致用户电量迅速消耗</p>
                    <p>6.2.2 应用未启动，但会长时间占用CPU、内存等导致设备过热</p>
                    <a name="07"></a>
                    <p class="item-title">7、法律要求（Legal Requirements）</p>
                    <p class="font18">7.1 违反国家法律法规</p>
                    <p class="font18">7.2 应用允许共享违法的文件或内容</p>
                    <p>7.2.1 应用怂恿或鼓励犯罪或暴力行为</p>
                    <p>7.2.2 应用鼓励酒驾或公布没有经过交通管理部门允许的酒驾检测点数据</p>
                    <p>7.2.3 应用过度宣传酒精或者危险物品（如毒药、爆炸物等），或者鼓励未成年人消费香烟和酒精饮料</p>
                    <p class="font18">7.3 应用存在侵犯版权行为</p>
                    <p>7.3.1 应用为破解、盗版或未获得版权所有者授权的应用</p>
                    <p>7.3.2 单本图书类应未提供版权证明 ，书城类应用未提供免责声明</p>
                    <p class="font18">7.4 应用存在欺诈行为</p>
                    <p>7.4.1 应用存在欺骗、伪造或者误导用户的行为</p>
                    <p class="font18">7.5 隐私保护</p>
                    <p>7.5.1 应用未提示用户或未经用户授权情况下搜集、传输或者使用用户的位置信息</p>
                    <p>7.5.2 应用未经用户许可且在用户不知情的情况下传输和使用用户的隐私数据，如通讯录、照片和短信记录等</p>
                    <p>7.5.3 应用强制要求用户共享其个人信息，如邮件地址或生日等信息</p>
                    <p>7.5.4 应用搜集未成年人信息数据</p>
                    <p>7.5.5 开发者的应用会窃取用户密码或者其他用户个人数据的将被封禁第八区账户</p>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    // 1.定义路由组件
    var Us            = {
        template: "#us"
    };
    var Log           = {
        template: "#log"
    };
    var Privacy       = {
        template: "#privacy"
    };
    var Agreement     = {
        template: "#agreement"
    };
    var Specification = {
        template: "#specification"
    };

    // 2.定义路由
    var routes = [
        // {path: '/', redirect: "/about"}, //history模式下，不再起作用
        {path: '/about/us', component: Us},
        {path: '/about/log', component: Log},
        {path: '/about/privacy', component: Privacy},
        {path: '/about/agreement', component: Agreement},
        {path: '/about/specification', component: Specification}
    ];

    // 3.创建 router 实例，然后传 `routes` 配置
    var router = new VueRouter({
        mode: 'history',
        scrollBehavior: function () {
            return {y: 0}
        },
        // base: __dirname,
        routes: routes
    });

    var AboutUs = {
        template: "#aboutUs",
        data: function () {
            return {
                index: 0,
                indexImg: 0,
                msg: [
                    {"class": "icon-msg1", "text": "关于我们", "router": "us"},
                    {"class": "icon-time1", "text": "更新日志", "router": "log"},
                    {"class": "icon-pwd1", "text": "隐私政策", "router": "privacy"},
                    {"class": "icon-doc1", "text": "服务协议", "router": "agreement"},
                    {"class": "icon-doc2", "text": "应用审核规范", "router": "specification"}
                ]
            }
        },
        components: {
            Us: Us
        },
        methods: {
            tab: function () {
                var This = this;
                $(".about-tab>a").click(function () {
                    var i      = $(this).index();
                    // console.log(i);
                    This.index = i;
                    i >= 2 ? This.indexImg = 2 : This.indexImg = i;
                });
            },
        },
        mounted: function () {
            this.tab();
        }
    };
    vm          = new Vue({
        el: "#app",
        components: {
            "AboutUs": AboutUs
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
</body>
</html>