<div class="left">
    <ul>
        <li @if(isset($data)&&$data == 0)class="active"@endif>
            <a href="/admin/application">
                <span class="iconfont icon-yingyong"></span>
                应用管理
            </a>
        </li>
        <li @if(isset($data)&&$data == 1)class="active"@endif>
            <a href="/admin/cert">
                <span class="iconfont icon-zhengshu"></span>
                证书管理
            </a>
        </li>
        <li @if(isset($data)&&$data == 2)class="active"@endif>
            <a href="/admin/plan">
                <span class="iconfont icon-navicon-tcda"></span>
                套餐管理
            </a>
        </li>
        <li @if(isset($data)&&$data == 3)class="active"@endif>
            <a href="/admin/user">
                <span class="iconfont icon-yonghu"></span>
                用户管理
            </a>
        </li>
{{--        <li @if(isset($data)&&$data == 4&&session('user_role')==0)class="active"@endif>--}}
{{--            <a href="/admin/role">--}}
{{--                <span class="iconfont icon-guanliyuan"></span>--}}
{{--                管理员--}}
{{--            </a>--}}
{{--        </li>--}}
        <li @if(isset($data)&&$data == 5)class="active"@endif>
            <a href="/admin/recharge">
                <span class="iconfont icon-chongzhi"></span>
                充值审核
            </a>
        </li>
    </ul>
</div>
