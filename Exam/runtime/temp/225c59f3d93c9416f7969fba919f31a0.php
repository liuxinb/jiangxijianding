<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:112:"D:\phpStudy\PHPTutorial\WWW\JiangXiJianDing\Exam\public/../application/examinee\view\center\question_detail.html";i:1545017019;}*/ ?>
<style>
    .tijiao_main{     padding: 45px 30px 10px 138px;}
    .tijiao_main p{line-height: 25px;}
</style>
<div>
    <div class="header_title">
        <p class="margin_right" style="margin-left: 30px;font-size: 18px;">当前位置：<?php echo $map['work_name']; ?>/<?php echo $map['work_direction_name']; ?>/<?php echo $map['level_name']; ?>><a class="redcolor">在线答题</a></p>
    </div>
    <div class="layui-tab layui-tab-brief" lay-filter="docDemoTabBrief">

        <ul class="layui-tab-title">
            <li class="layui-this click-question-single">单选题</li>
            <li class="click-question-more">多选题</li>
            <li class="click-question-judge">判断题</li>
            <li class="click-question-jane">简答题</li>
            <li class="click-question-narrate">论述题</li>
        </ul>


        <div class="shitileibiao">
            <div class="kong_btn margin_right_15 leftfloat question_list_onclick" style="margin-left: 9%;">试题列表</div>
            <div class="dayin_btn margin_right_15 rightfloat form_submit">提交</div>
        </div>

        <!--start-->
        <div class="layui-tab-content" style="height: 100px;">


                <div id="start_time" style="display: none"><?=time()?></div>
                <!--题型列表-->
                <div class="layui-tab-item layui-show">
                    <?php if(is_array($single) || $single instanceof \think\Collection || $single instanceof \think\Paginator): $i = 0; $__LIST__ = $single;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                        <div id="maodian<?php echo $vo['id']; ?>" class="layui-col-xs12 layui-col-md12 tileixing_main" <?php echo $i==1?"" : "style='display:none '"; ?>>
                        <span class="leftfloat margin_right_15" style="margin-top: -36px;">单选题<?php echo $i; ?>/<?=count($single)?></span>
                        <form class="layui-form" method="post" >
                            <input type="hidden" name="id" value="<?php echo $vo['id']; ?>">
                            <ul class="layui-form shiti" >
                                <li><?php echo $i; ?>、<?php echo $vo['topic_name']; ?></li>
                                <li class="xti"><input type="radio" name="answer" value="0" title="A、<?php echo $vo['option_a']; ?>"  <?php if($vo['user_answer']==='0'): ?> checked <?php endif; if(!is_null($vo['user_answer'])): ?>disabled="disabled"<?php endif; ?>"}></li>
                                <li class="xti"><input type="radio" name="answer" value="1" title="B、<?php echo $vo['option_b']; ?>" <?php if($vo['user_answer']==='1'): ?> checked <?php endif; if(!is_null($vo['user_answer'])): ?>disabled="disabled"<?php endif; ?>></li>
                                <li class="xti"><input type="radio" name="answer" value="2" title="C、<?php echo $vo['option_c']; ?>" <?php if($vo['user_answer']==='2'): ?> checked <?php endif; if(!is_null($vo['user_answer'])): ?>disabled="disabled"<?php endif; ?>></li>
                                <li class="xti"><input type="radio" name="answer" value="3" title="D、<?php echo $vo['option_d']; ?>" <?php if($vo['user_answer']==='3'): ?> checked <?php endif; if(!is_null($vo['user_answer'])): ?>disabled="disabled"<?php endif; ?>></li>
                            </ul>
                            <div class="double_btn_box updowndouble">
                                <div class="kong_btn margin_right_15 <?php echo $i==1?'': 'prev'; ?>">上一题</div>
                                <?php if(!is_null($vo['user_answer'])): ?>
                                <div class="kong_btn margin_right_15 <?php echo $i==count($single)?'': 'next'; ?>">下一题</div>
                                <?php else: ?>
                                <div type="submit" lay-submit lay-filter="formSubmit" data-value="<?php echo $i==count($single)?'last': ''; ?>" class="kong_btn margin_right_15">确定</div>
                                <?php endif; ?>
                            </div>
                        </form>
                        </div>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </div>

                <div class="layui-tab-item">
                    <?php if(is_array($more) || $more instanceof \think\Collection || $more instanceof \think\Paginator): $i = 0; $__LIST__ = $more;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                    <div id="maodian<?php echo $vo['id']; ?>" class="layui-col-xs12 layui-col-md12 tileixing_main" <?php echo $i==1?"" : "style='display:none '"; ?>>
                    <span class="leftfloat margin_right_15" style="margin-top: -36px;">多选题<?php echo $i; ?>/<?=count($single)?></span>
                    <form class="layui-form" method="post">
                        <input type="hidden" name="id" value="<?php echo $vo['id']; ?>">
                            <ul class="layui-form shiti">
                                <li><?php echo $i; ?>、<?php echo $vo['topic_name']; ?></li>
                                <li class="xti"><input type="checkbox" name="answer[]" value="0" title="A、<?php echo $vo['option_a']; ?>" lay-skin="primary" <?php if(strpos($vo['user_answer'],'0') !== false): ?> checked <?php endif; if(!is_null($vo['user_answer'])): ?>disabled="disabled"<?php endif; ?>> </li>
                                <li class="xti"><input type="checkbox" name="answer[]" value="1" title="B、<?php echo $vo['option_b']; ?>" lay-skin="primary" <?php if(strpos($vo['user_answer'],'1') !== false): ?> checked <?php endif; if(!is_null($vo['user_answer'])): ?>disabled="disabled"<?php endif; ?>> </li>
                                <li class="xti"><input type="checkbox" name="answer[]" value="2" title="C、<?php echo $vo['option_c']; ?>" lay-skin="primary" <?php if(strpos($vo['user_answer'],'2') !== false): ?> checked <?php endif; if(!is_null($vo['user_answer'])): ?>disabled="disabled"<?php endif; ?>> </li>
                                <li class="xti"><input type="checkbox" name="answer[]" value="3" title="D、<?php echo $vo['option_d']; ?>" lay-skin="primary" <?php if(strpos($vo['user_answer'],'3') !== false): ?> checked <?php endif; if(!is_null($vo['user_answer'])): ?>disabled="disabled"<?php endif; ?>> </li>
                            </ul>
                            <div class="double_btn_box updowndouble">
                                <div class="kong_btn margin_right_15 <?php echo $i==1?'': 'prev'; ?>">上一题</div>
                                <?php if(!is_null($vo['user_answer'])): ?>
                                <div class="kong_btn margin_right_15 <?php echo $i==count($more)?'': 'next'; ?>">下一题</div>
                                <?php else: ?>
                                <div type="submit" lay-submit lay-filter="formSubmit" data-value="<?php echo $i==count($more)?'last': ''; ?>" class="kong_btn margin_right_15">确定</div>
                                <?php endif; ?>
                            </div>
                    </form>
                        </div>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </div>

                <div class="layui-tab-item">
                    <?php if(is_array($judge) || $judge instanceof \think\Collection || $judge instanceof \think\Paginator): $i = 0; $__LIST__ = $judge;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                    <div id="maodian<?php echo $vo['id']; ?>" class="layui-col-xs12 layui-col-md12 tileixing_main" <?php echo $i==1?"" : "style='display:none '"; ?>>
                    <span class="leftfloat margin_right_15" style="margin-top: -36px;">判断题<?php echo $i; ?>/<?=count($single)?></span>
                    <form class="layui-form" method="post">
                        <input type="hidden" name="id" value="<?php echo $vo['id']; ?>">
                            <ul class="layui-form shiti">
                                <li><?php echo $i; ?>、<?php echo $vo['topic_name']; ?></li>
                                <li class="xti"><input type="radio" name="answer" value="0" title="A、对" <?php if($vo['user_answer']==='0'): ?> checked <?php endif; if(!is_null($vo['user_answer'])): ?>disabled="disabled"<?php endif; ?>></li>
                                <li class="xti"><input type="radio" name="answer" value="1" title="B、错" <?php if($vo['user_answer']==='1'): ?> checked <?php endif; if(!is_null($vo['user_answer'])): ?>disabled="disabled"<?php endif; ?>></li>
                            </ul>
                            <div class="double_btn_box updowndouble">
                                <div class="kong_btn margin_right_15 <?php echo $i==1?'': 'prev'; ?>">上一题</div>
                                <?php if(!is_null($vo['user_answer'])): ?>
                                <div class="kong_btn margin_right_15 <?php echo $i==count($judge)?'': 'next'; ?>">下一题</div>
                                <?php else: ?>
                                <div type="submit" lay-submit lay-filter="formSubmit" data-value="<?php echo $i==count($judge)?'last': ''; ?>" class="kong_btn margin_right_15">确定</div>
                                <?php endif; ?>
                            </div>
                    </form>
                        </div>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </div>

                <div class="layui-tab-item">
                    <?php if(is_array($jane) || $jane instanceof \think\Collection || $jane instanceof \think\Paginator): $i = 0; $__LIST__ = $jane;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                    <div id="maodian<?php echo $vo['id']; ?>" class="layui-col-xs12 layui-col-md12 tileixing_main" <?php echo $i==1?"" : "style='display:none '"; ?>>
                    <span class="leftfloat margin_right_15" style="margin-top: -36px;">简答题<?php echo $i; ?>/<?=count($single)?></span>
                    <form class="layui-form" method="post">
                        <input type="hidden" name="id" value="<?php echo $vo['id']; ?>">
                            <ul class="layui-form shiti">
                                <li><?php echo $i; ?>、<?php echo $vo['topic_name']; ?></li>
                                <li class="xti">
                                    <textarea style="width: 500px;" name="answer" placeholder="请输入内容" class="layui-textarea"></textarea>
                                </li>
                            </ul>
                            <div class="double_btn_box updowndouble">
                                <div class="kong_btn margin_right_15 <?php echo $i==1?'': 'prev'; ?>">上一题</div>
                                <?php if(!is_null($vo['user_answer'])): ?>
                                <div class="kong_btn margin_right_15 <?php echo $i==count($jane)?'': 'next'; ?>">下一题</div>
                                <?php else: ?>
                                <div type="submit" lay-submit lay-filter="formSubmit" data-value="<?php echo $i==count($jane)?'last': ''; ?>" class="kong_btn margin_right_15">确定</div>
                                <?php endif; ?>
                            </div>
                    </form>
                         </div>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </div>

                <div class="layui-tab-item">
                    <?php if(is_array($narrate) || $narrate instanceof \think\Collection || $narrate instanceof \think\Paginator): $i = 0; $__LIST__ = $narrate;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                    <div id="maodian<?php echo $vo['id']; ?>" class="layui-col-xs12 layui-col-md12 tileixing_main" <?php echo $i==1?"" : "style='display:none '"; ?>>
                    <span class="leftfloat margin_right_15" style="margin-top: -36px;">论述题<?php echo $i; ?>/<?=count($single)?></span>
                    <form class="layui-form" method="post">
                        <input type="hidden" name="id" value="<?php echo $vo['id']; ?>">
                            <ul class="layui-form shiti">
                                <li><?php echo $i; ?>、<?php echo $vo['topic_name']; ?></li>
                                <li class="xti">
                                    <textarea style="width: 500px;" name="answer" placeholder="请输入内容" class="layui-textarea"></textarea>
                                </li>
                            </ul>
                            <div class="double_btn_box updowndouble">
                                <div class="kong_btn margin_right_15 <?php echo $i==1?'': 'prev'; ?>">上一题</div>
                                <?php if(!is_null($vo['user_answer'])): ?>
                                <div class="kong_btn margin_right_15 <?php echo $i==count($narrate)?'': 'next'; ?>">下一题</div>
                                <?php else: ?>
                                <div type="submit" lay-submit lay-filter="formSubmit" data-value="<?php echo $i==count($narrate)?'last': ''; ?>" class="kong_btn margin_right_15">确定</div>
                                <?php endif; ?>
                            </div>
                    </form>
                        </div>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </div>

            </form>
        </div>
        <!--stop-->

    </div>
</div>

<div class="TiJiao_main" style="display: none;">
    <h2 class="tanchuang_title">答题详情</h2>
    <div class="tijiao_main hjk">
    </div>
    <div style="width: 70px;margin:20px auto;">
        <div class="dayin_btn payment margin_right_15 layui-layer-close layui-layer-close2 ajax-linkk" rel="<?php echo url('/examinee/center/questionList'); ?>">确定</div>
    </div>
</div>
<div class="question_list" style="display: none;">
    <div class="header_title"><span>答题详情</span>
    </div>
    <div class="layui-col-xs8 layui-col-md8   biaoti">
        <h3>单选题</h3>
        <div class="biaoti_main">
            <ul>
                <?php if(is_array($single) || $single instanceof \think\Collection || $single instanceof \think\Paginator): $i = 0; $__LIST__ = $single;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;if(!is_null($vo['user_answer'])): if($vo['user_answer'] == $vo['answer']): ?>
                            <li id="maodian<?php echo $vo['id']; ?>"  data-type="single" class="li_close bg_green"><?php echo $i; ?></li>
                        <?php else: ?>
                            <li id="maodian<?php echo $vo['id']; ?>"  data-type="single" class="li_close bg_red"><?php echo $i; ?></li>
                        <?php endif; else: ?>
                        <li id="maodian<?php echo $vo['id']; ?>"  data-type="single" class="li_close"><?php echo $i; ?></li>
                    <?php endif; endforeach; endif; else: echo "" ;endif; ?>
            </ul>
        </div>
        <h3>多选题</h3>
        <div class="biaoti_main">
            <ul>
                <?php if(is_array($more) || $more instanceof \think\Collection || $more instanceof \think\Paginator): $i = 0; $__LIST__ = $more;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;if(!is_null($vo['user_answer'])): if($vo['user_answer'] == $vo['answer']): ?>
                <li id="maodian<?php echo $vo['id']; ?>" data-type="more" class="li_close bg_green"><?php echo $i; ?></li>
                <?php else: ?>
                <li id="maodian<?php echo $vo['id']; ?>" data-type="more" class="li_close bg_red"><?php echo $i; ?></li>
                <?php endif; else: ?>
                <li id="maodian<?php echo $vo['id']; ?>" data-type="more" class="li_close"><?php echo $i; ?></li>
                <?php endif; endforeach; endif; else: echo "" ;endif; ?>
            </ul>
        </div>
        <h3>判断题</h3>
        <div class="biaoti_main">
            <ul>
                <?php if(is_array($judge) || $judge instanceof \think\Collection || $judge instanceof \think\Paginator): $i = 0; $__LIST__ = $judge;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;if(!is_null($vo['user_answer'])): if($vo['user_answer'] == $vo['answer']): ?>
                <li id="maodian<?php echo $vo['id']; ?>" data-type="judge" class="li_close bg_green"><?php echo $i; ?></li>
                <?php else: ?>
                <li id="maodian<?php echo $vo['id']; ?>" data-type="judge" class="li_close bg_red"><?php echo $i; ?></li>
                <?php endif; else: ?>
                <li id="maodian<?php echo $vo['id']; ?>" data-type="judge" class="li_close"><?php echo $i; ?></li>
                <?php endif; endforeach; endif; else: echo "" ;endif; ?>
            </ul>
        </div>
        <h3>简答题</h3>
        <div class="biaoti_main">
            <ul>
                <?php if(is_array($jane) || $jane instanceof \think\Collection || $jane instanceof \think\Paginator): $i = 0; $__LIST__ = $jane;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;if(!is_null($vo['user_answer'])): if($vo['user_answer'] == $vo['answer']): ?>
                <li id="maodian<?php echo $vo['id']; ?>" data-type="jane" class="li_close bg_green"><?php echo $i; ?></li>
                <?php else: ?>
                <li id="maodian<?php echo $vo['id']; ?>" data-type="jane" class="li_close bg_red"><?php echo $i; ?></li>
                <?php endif; else: ?>
                <li id="maodian<?php echo $vo['id']; ?>" data-type="jane" class="li_close"><?php echo $i; ?></li>
                <?php endif; endforeach; endif; else: echo "" ;endif; ?>
            </ul>
        </div>
        <h3>论述题</h3>
        <div class="biaoti_main">
            <ul>
                <?php if(is_array($narrate) || $narrate instanceof \think\Collection || $narrate instanceof \think\Paginator): $i = 0; $__LIST__ = $narrate;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;if(!is_null($vo['user_answer'])): if($vo['user_answer'] == $vo['answer']): ?>
                <li id="maodian<?php echo $vo['id']; ?>" data-type="narrate" class="li_close bg_green"><?php echo $i; ?></li>
                <?php else: ?>
                <li id="maodian<?php echo $vo['id']; ?>" data-type="narrate" class="li_close bg_red"><?php echo $i; ?></li>
                <?php endif; else: ?>
                <li id="maodian<?php echo $vo['id']; ?>" data-type="narrate" class="li_close"><?php echo $i; ?></li>
                <?php endif; endforeach; endif; else: echo "" ;endif; ?>
            </ul>
        </div>
        <div class="dayin_btn fanhui layui-layer-close">返回</div>
    </div>

</div>

<script type="text/javascript">
    layui.use(['form', 'table', 'laypage', 'laydate'], function() {
        var form = layui.form,
            $ = layui.jquery;
        form.render();
        var laydate = layui.laydate;
        $ = layui.jquery;

        var laypage = layui.laypage;
        var table = layui.table;

        table.init('demo', {
            limit: 10 //注意：请务必确保 limit 参数（默认：10）是与你服务端限定的数据条数一致
            //支持所有基础参数
        });
        //试题列表
        $('.question_list_onclick').click(function () {
            layer.open({
                type: 1,
                title: false,
                shadeClose: false,
                shade: 0.8,
                area: ['98%', '95%'],
                content: $('.question_list'),
                cancel: function(index, layero) {
                    $(".question_list").css('display', 'none');
                }
            });
        });
        //关闭事件
        $(".li_close").click(function () {
            var type = $(this).data('type');
            var id = $(this).attr('id');
            if (type == 'more') {
                $('.click-question-more').click();
            } else if(type == 'judge') {
                $('.click-question-judge').click();
            } else if(type == 'single') {
                $('.click-question-single').click();
            } else if(type == 'jane') {
                $('.click-question-jane').click();
            } else if(type == 'narrate') {
                $('.click-question-narrate').click();
            }
            $('#'+id).siblings().hide();
            $('#'+id).show();
            $(".question_list").css('display', 'none');
            layer.closeAll();
        });
        //下一题
        $(document).on("click",".next",function(){
            $(this).parent().parent().parent().hide().each(function () {
                $(this).find('input').attr("disabled",'');
            });
            $(this).parent().parent().parent().hide().next().show();
        });
        //上一题
        $('.prev').click(function () {
            $(this).parent().parent().parent().hide().prev().show();
        });
        //点击'确定'返回当前答案
        answer = new Array();
        form.on('submit(formSubmit)', function (data) {
            data=data.field;
            var last = $(this).data('value');
            answer.push(data);
            var self = $(this);
            //获取数组最后一个元素
            var lastAnswer = answer[answer.length-1];
            //获取元素最后一个key
            for( var key in lastAnswer ){
                var endKey = key;
            }
            if (endKey == "answer") {
                if (typeof(lastAnswer.answer) == "undefined") {
                    layer.msg('请选择答案!');
                    return false;
                }
            }  else {
                if (typeof(lastAnswer['answer[1]']) == "undefined" && typeof(lastAnswer['answer[2]']) == "undefined" && typeof(lastAnswer['answer[3]']) == "undefined" && typeof(lastAnswer['answer[4]']) == "undefined") {
                    layer.msg('请选择答案!');
                    return false;
                }
            }
            //改变按钮
            if (last == 'last') {
                self.remove();
            } else {
                self.html("下一题");
                self.attr('class','kong_btn margin_right_15 next');
                self.removeAttr('type');
                self.removeAttr('lay-submit');
                self.removeAttr('lay-filter');
            }

            $.ajax({
                url: '/api/LearningTopicOfficial/selectAnswer',
                type: 'post',
                data: lastAnswer,
                dataType: 'json',
                success: function (data) {
                    if (data.code == 1) {
                        layer.open({
                            title: '答案解析'
                            , content: data.data
                            , yes: function (index, layero) {
                                self.parent().parent().parent().hide().each(function () {
                                    $(this).find('input').attr("disabled", '');
                                });
                                layer.close(index);
                            }
                        });
                    } else {
                        self.parent().parent().parent().hide().each(function () {
                            $(this).find('input').attr("disabled", '');
                        });
                        self.parent().parent().parent().hide().next().show();
                        layer.close(index);
                    }
                }
            });
            return false;
        });

        //提交数据
        $('.form_submit').click(function () {

            var jsonObj = JSON.stringify(answer);
            var start_time = $('#start_time').html();
            $.ajax({
                url:'/api/LearningTopicOfficial/submitAnswer',
                type:'post',
                data:{
                    'answer':jsonObj,
                    'test_type':1,
                    'start_time':start_time,
                    'work_id':'<?php echo $map['work_id']; ?>',
                    'level_id':'<?php echo $map['level_id']; ?>',
                    'work_direction_id':'<?php echo $map['work_direction_id']; ?>',
                    'duration':120
                },
                dataType:'json',
                success:function (data) {
                    if (data.code==1){
                        //清空标签
                        var main = document.getElementsByClassName('hjk');
                        $(main).html("");
                        //创建p标签
                        var p1 = document.createElement("p");
                        var p2 = document.createElement("p");
                        var p3 = document.createElement("p");
                        p1.innerText = '答对：'+data.data.correct_count+'道';
                        p2.innerText = '答错：'+data.data.error_count+'道';
                        p3.innerText = '得分：'+data.data.score+'';
                        $(main).append(p1);
                        $(main).append(p2);
                        $(main).append(p3);
                        layer.open({
                            type: 1,
                            title: false,
                            shadeClose: false,
                            shade: 0.8,
                            area: ['350px', '250px'],
                            content: $('.TiJiao_main'),
                            cancel: function(index, layero) {
                                $(".TiJiao_main").css('display', 'none');

                            },
                            yes: function(index, layero){
                                //do something
                                layer.close(index); //如果设定了yes回调，需进行手工关闭
                            }
                        });
                    }else{
                        layer.msg(data.msg);
                    }
                }
            });
            return false;
        });
    });
    $(function() {
        var libb = $('.tileixing div');
        var li_cbb = $('.tileixing_main ul');
        var ZhuanJiaImg = $('.zhuanjiaImg')
        libb.click(function() {
            $(this).addClass('dayin_btn').siblings().removeClass('dayin_btn');
            var h = $(this).index();
            li_cbb.eq(h).show().siblings().hide();
        });
    });
    function TiJiao() {
        layer.open({
            type: 1,
            title: false,
            shade: 0,
            area: ['350px', '250px'],
            content: $('.TiJiao_main'),
            cancel: function(index, layero) {
                $(".TiJiao_main").css('display', 'none');
            }

        });

    }
    $(".queren").click(function(){
        $(".daanjiexi").show()
    });
    $(".ajax-linkk").each(function() {

        $(this).click(function() {
            var diZhi = $(this).attr("rel");
            htmlobj = $.ajax({
                url: diZhi,
                async: false
            });
            $(".ajax-Box").html(htmlobj.responseText);
        });
    });
</script>