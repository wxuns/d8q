<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>layui</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="/layui/css/layui.css">
    <script type="text/javascript" src="/js/jquery.js"></script>
    <!-- 注意：如果你直接复制所有代码到本地，上述css路径需要改成你本地的 -->
</head>
<body>

<form class="layui-form" action="" style="padding: 10px">
    <blockquote class="layui-elem-quote layui-text">
        <div>
            <span>APP_URL：网站域名</span>&ensp;&ensp;
            <span>DB_xx：数据库相关</span>&ensp;&ensp;
            <span>MAIL_xx：邮箱相关</span>&ensp;&ensp;
            <span>YMQ_xx：云免签相关</span>&ensp;&ensp;
            <span>QUEUE_CONNECTION：队列的存储方式</span>&ensp;&ensp;
        </div>
        <div>
            <span>SecretId：cosSecretId</span>&ensp;&ensp;
            <span>SecretKey：cosSecretKey</span>&ensp;&ensp;
            <span>Bucket：cos存储桶</span>&ensp;&ensp;
            <span>Region：cos地区</span>&ensp;&ensp;
            <span>extension：允许上传的后缀</span>&ensp;&ensp;
            <span>APP_MAX：上传的最大size</span>&ensp;&ensp;
        </div>
    </blockquote>
    <div class="layui-form-item layui-form-text">
        <textarea placeholder="请输入内容" class="layui-textarea" name="env" style="width: 100%; margin: 0px auto; line-height: 1.8; position: relative; top: 10px; height: 689.3px;">{{$env}}
        </textarea>
    </div>

    <div class="layui-form-item">
        <div class="layui-input-block">
            <button class="layui-btn" lay-submit="" lay-filter="demo1">立即提交</button>
        </div>
    </div>
</form>

<script src="/layui/layui.js" charset="utf-8"></script>
<!-- 注意：如果你直接复制所有代码到本地，上述js路径需要改成你本地的 -->
<script>
    layui.use('form', function(){
        var form = layui.form;

        //监听提交
        form.on('submit(demo1)', function(data){
            $.post('',{env:data.field.env,'_token':'{{csrf_token()}}'},function (dd) {
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
