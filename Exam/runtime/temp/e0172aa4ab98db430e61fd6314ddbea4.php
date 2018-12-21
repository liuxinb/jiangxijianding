<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:106:"D:\phpStudy\PHPTutorial\WWW\JiangXiJianDing\Exam\public/../application/examinee\view\center\indexbase.html";i:1545017019;}*/ ?>
<style>
    .stars {
        width: 20px;
        height: 20px;
        display: inline-block;
        vertical-align: middle;
        text-align: center;
        line-height: 32px;
        font-size: 25px;
        color: #f00;
    }
</style>
<div>
<span class="title" data-value="<?php echo $title; ?>"></span>
<div class="header_title"><span>个人信息</span>
    <a class="kong_btn margin_right rightfloat" onclick="XiuGai();">完善或修改信息</a>
</div>
<div class="gerenxinxi layui-form">
    <div class="gerenxinxi_main">
        <div class="layui-col-xs5 layui-col-md5">
            <p>姓名：<?php echo (isset($datas->info['username']) && ($datas->info['username'] !== '')?$datas->info['username']:''); ?></p>
            <p>联系方式：<?php echo (isset($datas['mobile']) && ($datas['mobile'] !== '')?$datas['mobile']:''); ?></p>
            <p>邮政编号：<?php echo (isset($datas->info['zip_code']) && ($datas->info['zip_code'] !== '')?$datas->info['zip_code']:''); ?></p>
            <p>籍贯：<?php echo (isset($datas->info['native_place']) && ($datas->info['native_place'] !== '')?$datas->info['native_place']:''); ?></p>
        </div>
        <div class="layui-col-xs4 layui-col-md4">
            <p>性别:<?php echo (isset($datas->info['gender']) && ($datas->info['gender'] !== '')?$datas->info['gender']:''); ?></p>
            <p><?php echo (isset($datas->id_type) && ($datas->id_type !== '')?$datas->id_type:''); ?>：<?php echo (isset($datas['id_card']) && ($datas['id_card'] !== '')?$datas['id_card']:''); ?></p>
            <p>工作单位：<?php echo (isset($datas->info['company']) && ($datas->info['company'] !== '')?$datas->info['company']:''); ?> </p>

        </div>
        <div class="layui-col-xs3 layui-col-md3" style="height: 140px;">
            <p>出生日期：<?php echo (isset($datas->info['birthday']) && ($datas->info['birthday'] !== '')?$datas->info['birthday']:''); ?></p>
            <p>文化程度：<?php echo (isset($datas->info->education) && ($datas->info->education !== '')?$datas->info->education:''); ?></p>
            <p>邮箱：<?php echo (isset($datas->info['email']) && ($datas->info['email'] !== '')?$datas->info['email']:''); ?></p>
        </div>
        <p>通讯地址：<?php echo (isset($datas->info['address']) && ($datas->info['address'] !== '')?$datas->info['address']:''); ?> </p>
    </div>
    <div class="layui-col-xs12 layui-col-md12 photo_main">
        <div class="layui-form-item">
            <div class="layui-input-inline photo_upimg">
                <div class="layui-upload-list">
                    <input type="hidden" name="avatar" id="preview_input" lay-verify="required" value="<?php echo (isset($datas->info['avatar']) && ($datas->info['avatar'] !== '')?$datas->info['avatar']:''); ?>">
                    <img class="layui-upload-img"  src="<?php echo !empty($datas->info['avatar'])?$datas->info['avatar']:'/static/img/buddha.jpg'; ?>" id="preview_image"  style="    width: 140px">
                    <p id="preview_text"></p>
                </div>
                <button type="button"  name="avatar" style="margin-left: 10px; width: 120px" class="looks_btn borderwid" id="preview_btn"><i class="layui-icon">&#xe67c;</i>上传照片</button>
            </div>
            <div class="photo_zhuyi">
                <p class="redcolor" style="font-size: 16px;">注意*</p>
                <p>1. 照片须为近期、头部正面、无帽饰、单色背景的证件照。生活照、风景照等均不符合要求;</p>
                <p>2. 照片的规格为：<b style="color: red;"> 宽90像素，高120像素*.jpg格式;</b></p>
                <p>3.要求上传的照片文件大小在<b style="color: red;">40K以下;</b></p>

            </div>
        </div>
    </div>
    <div class="double_btn double_xinxi_btn">
        <button type="submit" class="dayin_btn payments borderwid " lay-submit lay-filter="formDemo">立即提交</button>
    </div>

    <!--<div class="double_btn double_xinxi_btn">-->
        <!--<div class="double_btn double_xinxi_btns">-->
            <!--<button type="submit" class="dayin_btn payments borderwid " lay-submit lay-filter="formDemo">立即提交</button>-->
            <!--&lt;!&ndash;<button type="reset" class="layui-btn layui-btn-primary">重置</button>&ndash;&gt;-->
        <!--</div>-->
    <!--</div>-->
</div>
</div>

<form class="XiuGai layui-form" style="display: none;">
    <h2>信息修改</h2>
    <div class="layui-form-item">
        <label class="layui-form-label">籍&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;贯</label>
            <div class="layui-input-inline">
                <span class="current" data-value="<?php echo $datas->info['native_place']; ?>"></span>
                <select name="provid" id="provid" lay-filter="provid" required lay-verify="required" >
                    <option data-aaa="<?php echo $datas->info['native_place']; ?>" value=""></option>
                </select>
            </div>
            <span class="stars">*</span>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">邮&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;箱</label>
        <div class="layui-input-inline">
            <input type="text" id="email"  value="<?php echo (isset($datas->info['email']) && ($datas->info['email'] !== '')?$datas->info['email']:''); ?>" name="email" required lay-verify="required|email" placeholder="请输入邮箱" autocomplete="off" class="layui-input">
        </div> <span class="stars">*</span>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">文化程度</label>
        <div class="layui-input-inline">
            <select name="education"  id="education" lay-filter="education" lay-verify="required|education">
                <option value=""></option>
                <option value="1"  <?php if($datas->info['education'] == '1'): ?>selected<?php endif; ?>>博士</option>
                <option value="2"  <?php if($datas->info['education'] == '2'): ?>selected<?php endif; ?>>硕士</option>
                <option value="3"  <?php if($datas->info['education'] == '3'): ?>selected<?php endif; ?>>研究生</option>
                <option value="4"  <?php if($datas->info['education'] == '4'): ?>selected<?php endif; ?>>专科</option>
                <option value="5"  <?php if($datas->info['education'] == '5'): ?>selected<?php endif; ?>>本科</option>
                <option value="6"  <?php if($datas->info['education'] == '6'): ?>selected<?php endif; ?>>高职</option>
                <option value="7"  <?php if($datas->info['education'] == '7'): ?>selected<?php endif; ?>>中专</option>
                <option value="8"  <?php if($datas->info['education'] == '8'): ?>selected<?php endif; ?>>技校</option>
                <option value="9"  <?php if($datas->info['education'] == '9'): ?>selected<?php endif; ?>>高中</option>
                <option value="10" <?php if($datas->info['education'] == '10'): ?>selected<?php endif; ?>>初中</option>
                <option value="11" <?php if($datas->info['education'] == '11'): ?>selected<?php endif; ?>>小学</option>
            </select>
        </div><span class="stars">*</span>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">邮政编号</label>
        <div class="layui-input-inline">
            <input type="text" id="zip_code"  value="<?php echo (isset($datas->info['zip_code']) && ($datas->info['zip_code'] !== '')?$datas->info['zip_code']:''); ?>" name="zip_code" required lay-verify="required|zip_code" placeholder="请输入邮政编号" autocomplete="off" class="layui-input">
        </div><span class="stars">*</span>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">工作单位</label>
        <div class="layui-input-inline">
            <input type="text" id="company" value="<?php echo (isset($datas->info['company']) && ($datas->info['company'] !== '')?$datas->info['company']:''); ?>" name="company" required lay-verify="required" placeholder="请输入工作单位" autocomplete="off" class="layui-input">
        </div><span class="stars">*</span>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">通讯地址</label>
        <div class="layui-input-inline">
            <input type="text" id="address" value="<?php echo (isset($datas->info['address']) && ($datas->info['address'] !== '')?$datas->info['address']:''); ?>" name="address" required lay-verify="required" placeholder="请输入通讯地址" autocomplete="off" class="layui-input">
        </div><span class="stars">*</span>
    </div>
    <div class="double_btn double_qx">
        <!--<div class="dayin_btn payment margin_right_15">确定</div>-->
        <!--<div class="gray_btn payment">取消</div>-->
        <button type="submit" class="dayin_btn payments borderwid " lay-submit lay-filter="formEdit">提交</button>
        <!--<button type="submit" class="dayin_btn payments reset">取消</button>-->
        <button type="reset" class="dayin_btn  payments layui-btn-primary reset">重置</button>
    </div>
</form>

<script type="text/javascript" src="/static/layui/assets/data.js"></script>
<script type="text/javascript" src="/static/layui/assets/province.js"></script>

<script>
    layui.use('element', function(){
        var element = layui.element;
    });
    function XiuGai() {
        layer.open({
            type: 1,
            title: false,
            shadeClose: false,
            shade: 0.8,
            area: ['500px', '550px'],
            content: $('.XiuGai'),
            cancel: function(index, layero) {
                $(".XiuGai").css('display', 'none');
            },
//            end: function () {
//                location.reload();
//            }
        });
    }

    //JavaScript代码区域
    layui.use(['form', 'layer','jquery','upload'], function () {
        var form = layui.form,$ = layui.jquery,current = $(".current").data('value');
        $('title').html($('.title').data('value'));
        $('.layui-form-select').find('input').val(current);

            $('.layui-anim-upbit:first dd').each(function (index,item) {
                if ($(item).html() === current){
                    $(item).click();
                }
            });




//        var select = 'dd[lay-value=1234]';
//        $('#edit_exam_school').siblings("div.layui-form-select").find('dl').find(select).click();

        //添加表单监听事件
        form.on('submit(formDemo)', function (data) {
            data = data.field;
            $.post("/api/UserInfo/updataInfo", data, function (data) {
                if (data.code == 1) {
                    layer.msg(data.msg, {icon: 1});
                    window.parent.$(".avatarimg").attr('src',data.data);
                    wanshan();
                } else {
                    layer.msg(data.msg, {icon: 5});
                }
            });
            //防止页面跳转
            return false;
        });



        form.verify({
            email: [/^[_a-z0-9A-Z-]+(\.[_a-z0-9A-Z-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/, '邮箱格式错误,请重新输入!'],
            zip_code: [/^[0-9]{6}$/, '邮编格式不正确,请输入6位数字'],
            native_place:[/^[\u4e00-\u9fa5]+$/,'籍贯格式不正确,请输入汉字!']
        });

        //修改个人信息
        form.on('submit(formEdit)', function (data) {
            data = data.field;
            data.native_place = $("#provid").find("option:selected").html();
            $.post("/api/UserInfo/updataInfoEdit", data, function (data) {
                if (data.code == 1) {
                    layer.msg(data.msg,{
                        icon: 1,//提示的样式
                        time:  2000, //2秒关闭（如果不配置，默认是3秒）//设置后不需要自己写定时关闭了，单位是毫秒
                        end: function () {
                            $.get("<?php echo url('/examinee/Center/indexbase'); ?>", function(data) {
                                window.parent.$("#iframeContent").html(data); //初始化加载界面
                                //取消遮罩的时候
                                $(".layui-layer-shade").hide();
                             wanshan();
                            });
                        }
                    });
                } else {
                    layer.msg(data.msg,{
                        icon: 5,//提示的样式
                        time:  2000, //2秒关闭（如果不配置，默认是3秒）//设置后不需要自己写定时关闭了，单位是毫秒
                        end: function () {
                            $.get("<?php echo url('/examinee/Center/indexbase'); ?>", function(data) {
                                window.parent.$("#iframeContent").html(data); //初始化加载界面
                                //取消遮罩的时候
                                $(".layui-layer-shade").hide();
                            });
                        }
                    });
                }
            });
            //防止页面跳转
            return false;
        });
    });
    function wanshan() {
        if($.cookie('examplan_id')!==undefined){
            $.get('/examinee/center/selectplan?id='+$.cookie('examplan_id'), function(data) {
                if (data == "error"){
                    layer.msg('请先完善信息!',{icon:5});
                    $.get('/examinee/Center/indexbase', function(data) {
                        $("#iframeContent").html(data);
                    });
                }else{
                    $(".avatarimg").attr('src')
                    $("#iframeContent").html(data);

                }

            });
        }
    }
    function simpleUpload(name) {
        var upload = layui.upload;
        var form = layui.form;
        var uploadBtn = name + '_btn';
        var inputId = name + "_input";
        var imageId = name + "_image";
        var textId = name + "_text";

        upload.render({
            elem: ('#' + uploadBtn),
            url: '/api/UserInfo/upload',
            accept: 'file',
            auto: false,
            exts: "jpg",
            before: function (obj) {
                layer.load();
            },
            choose: function (obj) {

                var flag = true;
                obj.preview(function (index, file, result) {
//                    load_index = layer.load(2, {
//                        time : 20 * 1000
//                    });
//                    if(file.size<40 || file.size>80){
//                        layer.msg("您上传的图片大小必须是40~80KB!");
//                    }else{
                    var img = new Image();
                    img.src = result;
                    img.onload = function () {
                        if (img.width == 90 && img.height == 120) {
                            obj.upload(index, file); //满足条件调用上传方法
//                                $('#' + imageId).attr('src', result);
//                                $('#' + inputId).val(result);
                        } else {
                            flag = false;
                            layer.msg("您上传的图片宽高必须是90*120尺寸!");
                        }
                    }
                    return flag;
//                    }
                });
            },
            done: function (res) {
                if (res == 404) {
                    return layer.msg('上传失败');
                } else {
                    $('#' + imageId).attr('src', res);
                    $('#' + inputId).val(res);
                    layer.closeAll('loading');
                }
            },
            error: function () {
                //演示失败状态，并实现重传
                layer.close(load_index);
                var demoText = $('#' + textId);
                demoText.html('<span style="color: #FF5722;">上传失败</span> <a class="layui-btn layui-btn-mini demo-reload">重试</a>');
                demoText.find('.demo-reload').on('click', function () {
                    uploadInst.upload();
                });
            }
        });
    }

    simpleUpload("preview");
</script>