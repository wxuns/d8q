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
        <label class="layui-form-label">权限</label>
        <div class="layui-input-block">
            <input type="radio" name="role" value="0" title="超级管理员"{{$role==0?'checked':''}}>
            <input type="radio" name="role" value="1" title="管理员" {{$role==1?'checked':''}}>
            <input type="radio" name="role" value="2" title="普通用户" {{$role==2?'checked':''}}>
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
