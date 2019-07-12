<header>
    <div class="container">
        <div class="header clearfix">
            <a class="header-left block fl" href="/">
                <img src="/images/logo-top.png" class="img-responsive hidden-xs">
                <img src="/images/phone-logo.png" class="img-responsive visible-xs">
            </a>
            <div class="phone-nav-wrap">
                <a class="header-left block fl" href="/">
                    <img src="/images/phone-logo.png" class="img-responsive visible-xs">
                </a>
                <ul class="ms-nav fl clearfix">
                    <li @if(!isset($data))class="active"@endif>
                        <a href="/" title="第八区">首页</a>
                    </li>
                    @if(session('user_id'))
                        <li @if(isset($data)&&$data == 1)class="active"@endif>
                            <a href="/apps" title="我的应用">我的应用</a>
                        </li>
                        @else
                    <li>
                        <a href="/apps" title="app内测发布">发布</a>
                    </li>
                    @endif
                    <li @if(isset($data)&&$data == 2)class="active"@endif>
                        <a href="/sign{{session('user_id')?'/lists':''}}" title="苹果企业签名">企业签名</a>
                    </li>
                    <li @if(isset($data)&&$data == 3)class="active"@endif>
                        <a href="/price" title="服务价格">价格</a>
                    </li>
                </ul>
                @if(session('user_id'))
                <div class="login-in clearfix" style="display: block;">
                    <a href="/notice/lists" class="notification fl">
                        <span class="iconfont icon-msg"></span>
                        <span class="ms-badge" @if(getMsg())style="display: inline-block;"@endif></span>
                    </a><div class="n-drop-down"><a href="/notice/lists" class="notification fl">
                        </a><div class="n-con"><a href="/notice/lists" class="notification fl">

                                <div class="no" style="display: none;">
                                    <span class="iconfont icon-lingdang"></span>
                                    <div>暂无任何消息</div>
                                </div>

                                <div class="yes" style="/*display: none;*/">
                                    <div class="y-tit">消息通知</div>
                                    <ul class="msg-list">
                                    </ul>
                                </div>
                            </a><a href="/notice/lists" class="m-more">查看所有消息</a>
                        </div>
                    </div>

                    <div class="login-user clearfix fl">
<span class="fl">
{{session('user_name')}} </span>
                        <a class="visible-xs fl logout1" href="/user/logout">退出</a>
                        <span class="iconfont icon-arrow-bottom fl hidden-xs"></span>
                        <div class="user-wrap">
                            <dl>
                                @if(session('user_role') < 2)
                                <dd><a href="/admin">管理员后台</a></dd>
                                @endif
                                <dd><a href="/balance/price">余额充值</a></dd>
                                <dd><a href="/user/order">我的订单</a></dd>
                                <dd><a href="/user/profile">账号设置</a></dd>
                                <dt><a href="/user/login"><span class="iconfont icon-sign-out"></span>退出</a></dt>
                            </dl>
                        </div>
                    </div>
                </div>
                    @else
                <ul class="login clearfix fr">
                    <li><a href="/user/login" class="ms-btn ms-btn-default">登录</a></li>
                    <li><a href="/user/register" class="ms-btn ms-btn-primary ml10">注册</a></li>
                </ul>
                @endif
            </div>
            <span class="icon-menu iconfont phone-menu visible-xs"></span>
            <div class="phone-shadow"></div>
        </div>
    </div>
</header>
