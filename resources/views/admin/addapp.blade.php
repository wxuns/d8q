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
    <div class="layui-form-item" id="type">
        <div class="layui-inline">
            <label class="layui-form-label">邮箱</label>
            <div class="layui-input-inline">
                <input type="text" name="email" lay-verify="required|email" autocomplete="off" class="layui-input" placeholder="输入用户邮箱" value="{{isset($sign)?$sign->email:''}}">
            </div>
            <button type="button" class="layui-btn layui-btn-normal" onclick="check()">检测</button>
        </div>

    </div>
    @csrf
    <div class="layui-form-item">
        <div class="layui-inline">
            <label class="layui-form-label">QQ</label>
            <div class="layui-input-inline">
                <input type="text" name="qq" lay-verify="required|number" autocomplete="off" class="layui-input" placeholder="QQ" value="{{isset($sign)?$sign->qq:''}}">
            </div>
        </div>
    </div>
    <div class="layui-form-item" id="type">
        <div class="layui-inline">
            <label class="layui-form-label">套餐类型</label>
            <div class="layui-input-inline">
                <select name="planid" lay-verify="required">
                    <option value="">请选择</option>
                    @foreach($plan as $t)
                        <option value="{{$t->id}}" {{isset($sign)&&$sign->planid == $t->id?'selected':''}}>{{$t->name . ' - ' .$t->month . '月'}}</option>
                    @endforeach
                </select>
            </div>
        </div>

    </div>
    <div class="layui-form-item">
        <div class="layui-inline">
            <label class="layui-form-label">应用名</label>
            <div class="layui-input-inline">
                <input type="text" name="fliename" lay-verify="required" autocomplete="off" class="layui-input" placeholder="应用名" value="{{isset($sign)?$sign->filename:''}}">
            </div>
        </div>
    </div>
    <div class="layui-form-item">
        <div class="layui-inline">
            <label class="layui-form-label">应用</label>
            <div class="layui-input-inline">
                <button type="button" class="layui-btn layui-btn-danger" id="app"><i class="layui-icon"></i>上传签名包</button>
                <div class="layui-inline layui-word-aux">限制 {{env('APP_MAX')/1024}}M
                </div>
            </div>
        </div>
    </div>
    <div class="layui-form-item" id="type">
        <div class="layui-inline">
            <label class="layui-form-label">分配证书</label>
            <div class="layui-input-inline">
                <select name="certid" lay-verify="required">
                    <option value="">请选择</option>
                    @foreach($cert as $t)
                        <option value="{{$t->id}}">{{$t->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>

    </div>

    <div class="layui-form-item layui-form-text">
        <label class="layui-form-label">备注</label>
        <div class="layui-input-block">
            <input type="text" name="remarks" autocomplete="off" class="layui-input" placeholder="请输入备注(可选)">
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
    function check(){
        var email = $("input[name='email']").val();
        if (IsEmail(email)){
            $.post('/admin/checkemail',{'_token':$("input[name='_token']").val(),email:email},function (data) {
                if (data.code == 0 ){
                    layer.msg(data.message,{icon:1});
                }else {
                    layer.msg('不存在',{icon:2});
                }
            });
        }else{
            layer.msg('邮箱格式不正确',{icon:2})
        }
    }
    function IsEmail(str) {
        var reg=/^([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/;
        return reg.test(str);
    }
    layui.use(['form', 'upload', 'laydate'], function(){
        var form = layui.form
            ,layer = layui.layer
            ,upload = layui.upload;

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
            data.field.sign = localStorage.getItem('signtoken');
            $.post('',data.field,function (dd) {
                if(dd.code == 0){
                    localStorage.removeItem('signtoken')
                    parent.layer.closeAll();
                    parent.layer.msg(dd.message,{icon:1});
                }else if (dd.code == 5) {
                    layer.msg(dd.message,{icon:2});
                }
            });
            return false;
        });

        var uploadInst = upload.render({
            elem: '#app' //绑定元素
            ,url: '/sign/uploadapi/{{isset($sign)?$sign->id:''}}' //上传接口
            ,accept: 'file'
            ,size:{{env('APP_MAX')}}
            ,exts:'{{env('extension')}}'
            ,headers:{
                'X-CSRF-TOKEN': $("input[name='_token']").val()
            }
            ,xhr:xhrOnProgress
            ,before: function(obj){
                layer.load();
            }
            ,done: function(res){
                //上传完毕回调
                layer.closeAll('loading');
                localStorage.setItem('signtoken',res.data.id)
                layer.msg(res.msg,{icon:1});
            }
            ,error: function(){
                //请求异常回调
            }
        });
    });
    //创建监听函数
    var xhrOnProgress=function(fun) {
        xhrOnProgress.onprogress = fun; //绑定监听
        //使用闭包实现监听绑
        return function() {
            //通过$.ajaxSettings.xhr();获得XMLHttpRequest对象
            var xhr = $.ajaxSettings.xhr();
            //判断监听函数是否为函数
            if (typeof xhrOnProgress.onprogress !== 'function')
                return xhr;
            //如果有监听函数并且xhr对象支持绑定时就把监听函数绑定上去
            if (xhrOnProgress.onprogress && xhr.upload) {
                xhr.upload.onprogress = xhrOnProgress.onprogress;
            }
            return xhr;
        }
    }
</script>

</body>
</html>
