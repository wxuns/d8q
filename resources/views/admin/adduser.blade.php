<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>layui</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="/layui/css/layui.css">
    <script type="text/javascript" src="/js/jquery_003.js"></script>
    <!-- 注意：如果你直接复制所有代码到本地，上述css路径需要改成你本地的 -->
</head>
<body>


<form class="layui-form" action="" style="padding: 10px">
    <div class="layui-form-item"></div>
    @csrf
    <div class="layui-form-item">
        <div class="layui-inline">
            <label class="layui-form-label">用户名</label>
            <div class="layui-input-inline">
                <input type="text" name="name" lay-verify="required" autocomplete="off" class="layui-input" placeholder="输入用户名" value="{{isset($user)?$user->name:''}}">
            </div>
        </div>
    </div>
    <div class="layui-form-item">
        <div class="layui-inline">
            <label class="layui-form-label">邮箱</label>
            <div class="layui-input-inline">
                <input type="text" name="email" lay-verify="required|email" autocomplete="off" class="layui-input" placeholder="请输入邮箱" value="{{isset($user)?$user->email:''}}">
            </div>
        </div>
    </div>
    <div class="layui-form-item">
        <div class="layui-inline">
            <label class="layui-form-label">电话</label>
            <div class="layui-input-inline">
                <input type="text" name="mobile" autocomplete="off" class="layui-input" placeholder="请输入手机号" value="{{isset($user)?$user->mobile:''}}">
            </div>
        </div>
    </div>
    <div class="layui-form-item">
        <div class="layui-inline">
            <label class="layui-form-label">密码</label>
            <div class="layui-input-inline">
                <input type="password" name="password" lay-verify="required" autocomplete="off" class="layui-input" placeholder="请输入密码" value="{{isset($user)?$user->password:''}}">
            </div>
        </div>
    </div>
    <div class="layui-form-item">
        <div class="layui-inline">
            <label class="layui-form-label">折扣</label>
            <div class="layui-input-inline">
                <input type="text" name="discount" autocomplete="off" class="layui-input" placeholder="请输入折扣" value="{{isset($user)?$user->discount:''}}">
            </div>
        </div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label">状态</label>
        <div class="layui-input-block">
            <input type="checkbox" name="status" lay-skin="switch"  {{isset($user)&&$user->status == 1?'checked':''}}>
        </div>
    </div>

    <div class="layui-form-item">
        <div class="layui-input-block">
            <button class="layui-btn" lay-submit lay-filter="formDemo">立即提交</button>
            <button type="reset" class="layui-btn layui-btn-primary">重置</button>
        </div>
    </div>
</form>
<script src="/layui/layui.js" charset="utf-8"></script>
<!-- 注意：如果你直接复制所有代码到本地，上述js路径需要改成你本地的 -->
<script>
    layui.use(['form', 'layedit', 'laydate'], function(){
        var form = layui.form
            ,layer = layui.layer
            ,laydate = layui.laydate;

        //自定义验证规则
        form.verify({
            name: function(value){
                if(value.length < 2){
                    return '套餐类型至少得2个字符';
                }
            }
        });

        //监听提交
        form.on('submit(formDemo)', function(data){
            $.post('',data.field,function (dd) {
                if(dd.code == 0){
                    parent.layer.closeAll();
                    parent.layer.msg(dd.message,{icon:1});
                }else if (dd.code == 1){
                    layer.msg(dd.message,{icon:2});
                }
            });
            return false;
        });


    });
</script>

</body>
</html>
