<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:114:"D:\phpStudy\PHPTutorial\WWW\JiangXiJianDing\Exam\public/../application/learning\view\topic\official_add_brief.html";i:1545017021;}*/ ?>
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
    <div style="padding: 15px;">
        <form class="layui-form" action="" id="addform">
            <input type="hidden" name="id" value="<?php echo (isset($datas['id']) && ($datas['id'] !== '')?$datas['id']:''); ?>">
            <div class="layui-form-item">
                <label class="layui-form-label">题目</label>
                <div class="layui-input-block">
                    <textarea class="layui-textarea" name="topic_name" id="build_name" style="display: none">
                        <?php echo (isset($datas['topic_name']) && ($datas['topic_name'] !== '')?$datas['topic_name']:''); ?>
                    </textarea>
                    <div class="layui-form-mid layui-word-aux">提示： 这里填写题目描述</div>
                </div>
            </div>

            <div class="layui-form-item layui-form-text">
                <label class="layui-form-label">正确答案</label>
                <div class="layui-input-block">
                    <textarea class="layui-textarea" name="answer" id="build_answer" style="display: none">
                        <?php echo (isset($datas['answer']) && ($datas['answer'] !== '')?$datas['answer']:''); ?>
                    </textarea>
                </div>
            </div>

            <div class="layui-form-item">
                <label class="layui-form-label">归属题库</label>
                <div class="layui-input-block b">
                    <input type="radio" name="range" value="1" <?php echo $datas['range']=='1'?'checked': '';; ?> title="在线练习">
                    <input type="radio" name="range" value="2" <?php echo $datas['range']=='2'?'checked': '';; ?> title="模拟题库">
                </div>
            </div>

            <div class="layui-form-item">
                <label class="layui-form-label">难易程度</label>
                <div class="layui-input-block c">
                    <input type="radio" name="topic_level" value="1" title="易" <?php echo $datas['topic_level']=='易'?'checked': '';; ?>>
                    <input type="radio" name="topic_level" value="2" title="偏易" <?php echo $datas['topic_level']=='偏易'?'checked': '';; ?>>
                    <input type="radio" name="topic_level" value="3" title="适中" <?php echo $datas['topic_level']=='适中'?'checked': '';; ?>>
                    <input type="radio" name="topic_level" value="4" title="偏难" <?php echo $datas['topic_level']=='偏难'?'checked': '';; ?>>
                    <input type="radio" name="topic_level" value="5" title="难" <?php echo $datas['topic_level']=='难'?'checked': '';; ?>>
                </div>
            </div>

            <div class="layui-form-item layui-form-text">
                <label class="layui-form-label">答案解析</label>
                <div class="layui-input-block">
                    <textarea class="layui-textarea" name="answer_explain" id="build_answer_explain" style="display: none">
                        <?php echo (isset($datas['answer_explain']) && ($datas['answer_explain'] !== '')?$datas['answer_explain']:''); ?>
                    </textarea>
                </div>
            </div>

            <div class="layui-form-item">
                <div class="layui-input-block">
                    <button type="submit" class="layui-btn" lay-submit lay-filter="formSubmit">立即提交</button>
                    <button type="reset" class="layui-btn layui-btn-primary">重置</button>
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
<!-- 注意：如果你直接复制所有代码到本地，上述js路径需要改成你本地的 -->
<script>
    layui.use(['form', 'layedit','jquery'], function(){
        var form = layui.form
            ,layer = layui.layer
            ,layedit = layui.layedit
            ,$ = layui.jquery;

        layedit.set({
            uploadImage: {
                url: '/api/LearningTopicOfficial/imgUpload', //接口url
                type: 'post', //默认post
            }
        });
        build_name = layedit.build('build_name', {
            height: 200
        });
        build_answer_explain = layedit.build('build_answer_explain', {
            height: 200
        });
        build_answer = layedit.build('build_answer', {
            height: 200
        });
        var active = {
            content: function(){
                return layedit.getContent(this);
            }
            ,text: function(){
                return layedit.getText(this);
            }
            ,selection: function(){
                return layedit.getSelection(index);
            }
        };


        //添加表单监听事件
        form.on('submit(formSubmit)', function (data) {
            var topic_answer_explain = active['text'].call(build_answer_explain);
            var topic_answer = active['text'].call(build_answer);
            var topic_name = active['text'].call(build_name);
            data=data.field;
            data.topic_name = topic_name;
            data.answer_explain = topic_answer_explain;
            data.answer = topic_answer;

            $.ajax({
                url:'/api/LearningTopicOfficial/officialAddBrief',
                type:'post',
                data:data,
                dataType:'json',
                success:function (data) {
                    if (data.status==1){
                        layer.msg(data.msg,{
                            icon: 1,//提示的样式
                            time:  2000, //2秒关闭（如果不配置，默认是3秒）//设置后不需要自己写定时关闭了，单位是毫秒
                            end: function () {
                                //当你在iframe页面关闭自身时
                                var index = parent.layer.getFrameIndex(window.name); //先得到当前iframe层的索引
                                parent.layer.close(index); //再执行关闭
                                parent.location.reload();
                            }
                        });
                    }else{
                        layer.msg(data.msg);
                    }
                }
            });
            //防止页面跳转
            return false;
        });
    });

</script>