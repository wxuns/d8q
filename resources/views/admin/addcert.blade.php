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
            <label class="layui-form-label">名称</label>
            <div class="layui-input-inline">
                <input type="text" name="name" lay-verify="required" autocomplete="off" class="layui-input" placeholder="输入证书名称.sh" value="{{isset($cert)?$cert->name:''}}">
            </div>
        </div>
    </div>
    <div class="layui-form-item">
        <div class="layui-inline">
            <label class="layui-form-label">过期时间</label>
            <div class="layui-input-inline">
                <input type="text" name="time" id="data" lay-verify="required" autocomplete="off" class="layui-input" placeholder="请输入过期时间">
            </div>
        </div>
    </div>

    <div class="layui-form-item">
        <div class="layui-input-block">
            <button class="layui-btn" lay-submit lay-filter="formDemo">立即提交</button>
            <button type="reset" class="layui-btn layui-btn-primary">重置</button>
        </div>
    </div>
</form>

<div id="other" hidden>
    <div class="layui-form-item layui-form-text">
        <label class="layui-form-label">简介</label>
        <div class="layui-input-block">
            <input type="text" name="info" lay-verify="required" autocomplete="off" class="layui-input" placeholder="请输入简介">
        </div>
    </div>
</div>
<script src="/layui/layui.js" charset="utf-8"></script>
<!-- 注意：如果你直接复制所有代码到本地，上述js路径需要改成你本地的 -->
<script>
    function addtype(e){
        $(e).parent().html('<label class="layui-form-label">套餐类型</label><div class="layui-input-inline"><input type="text" name="name" lay-verify="required|name" autocomplete="off" class="layui-input" placeholder="请输入套餐名"></div>');
        $('#type').after($('#other').html());
    }
    layui.use(['form', 'layedit', 'laydate'], function(){
        var form = layui.form
            ,layer = layui.layer
            ,laydate = layui.laydate;

        laydate.render({
            elem: '#data' //指定元素
            ,type: 'datetime'
            ,min: '{{date('Y-m-d H:i:s')}}'
            ,value:new Date({{isset($cert)?$cert->time:time()}}000)
        });
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
                }
            });
            return false;
        });


    });
</script>

</body>
</html>
