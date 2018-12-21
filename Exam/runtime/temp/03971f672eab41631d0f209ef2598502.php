<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:102:"D:\phpStudy\PHPTutorial\WWW\JiangXiJianDing\Exam\public/../application/learning\view\topic\volume.html";i:1545017021;}*/ ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="/static/layui/css/layui.css">
</head>
<body>
<div class="layui-body">
    <!-- 内容主体区域 -->
    <div>
        <form class="layui-form">
            <div class="layui-form-item">
                <div class="layui-col-lg6">
                    <label class="layui-form-label">组卷套数：</label>
                    <div class="layui-input-block">
                        <input type="text" name="num" lay-verify="required" placeholder="" autocomplete="off" class="layui-input">
                    </div>
                </div>
            </div>
            <div class="layui-form-item">
                <div class="layui-input-block">
                    <button type="submit" class="layui-btn" lay-submit lay-filter="formSubmit">立即提交</button>
                </div>
            </div>
        </form>
    </div>
</div>
</body>
</html>
<script type="text/javascript" src="/static/layui/layui.js"></script>
<script type="text/javascript" src="/static/layui/lay/modules/code.js"></script>
<script type="text/javascript" src="/static/js/jquery.min.js"></script>
<script>

    layui.use(['form', 'layer','jquery'], function () {
        var form = layui.form;
        var $ = layui.jquery;

        //添加表单监听事件
        form.on('submit(formSubmit)', function (data) {
            data=data.field;
            var layerMsg = layer.load(1,{
                icon: 0,
                shade: [0.5,'white']
            });
            $.ajax({
                url:'/api/LearningTopicOfficial/volumeAdd',
                type:'post',
                data:data,
                dataType:'json',
                success:function (data) {
                    if (data.code=='1'){
                        layer.close(layerMsg);
                        layer.msg(data.msg,{
                            icon: 1,
                            time:  2000,
                            end: function () {
                                //当你在iframe页面关闭自身时
                                var index = parent.layer.getFrameIndex(window.name); //先得到当前iframe层的索引
                                parent.layer.close(index); //再执行关闭
                                parent.location.reload();
                            }
                        });
                    }else{
                        layer.close(layerMsg);
                        layer.msg(data.msg);
                    }
                }
            });
            //防止页面跳转
            return false;
        });
    });
</script>