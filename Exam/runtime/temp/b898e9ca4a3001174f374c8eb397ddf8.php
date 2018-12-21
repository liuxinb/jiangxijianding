<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:120:"D:\phpStudy\PHPTutorial\WWW\JiangXiJianDing\Exam\public/../application/examinee\view\center\question_list_appraisal.html";i:1545274892;}*/ ?>
<style type="text/css">
    .header_title a:hover {
        color: #ffffff;
    }

    .layui-form-radio {
        margin: 0px 10px 0 0;
    }

    .double_qx2 {
        width: 115px;
        margin: auto;
        margin-top: 30px;
    }

    .layui-tab-brief>.layui-tab-title .layui-this {
        color: red !important;
    }
    .layui-tab-brief>.layui-tab-more li.layui-this:after, .layui-tab-brief>.layui-tab-title .layui-this:after {
        border: none;
        border-radius: 0;
        border-bottom: 2px solid #ed1e1e;
    }
    .baom_titles {
    }

    .noimg {
        width: 141px;
        height: 94px;
        margin: 20px auto;
    }
</style>
<div>
    <div class="layui-tab layui-tab-brief" lay-filter="docDemoTabBrief">
        <ul class="layui-tab-title baom_titles">
            <li class="layui-this">在线答题</li>
            <li>历史记录</li>

        </ul>
        <div class="layui-tab-content" style="height: 100px;">
            <div class="layui-tab-item layui-show">
                <div class="baoming_main">
                    <table class="layui-table myorder_table" lay-skin="line">
                        <colgroup>
                            <col>
                            <col>
                            <col>
                            <col width="200">
                        </colgroup>
                        <thead>
                        <tr>
                            <th>报名工种</th>
                            <th>方向</th>
                            <th>等级</th>
                            <th>操作</th>
                        </tr>
                        </thead>
                        <tbody>

                        <tr>
                            <td>无</td>
                            <td>无</td>
                            <td>无</td>
                            <td class="double_btn">
                                <div class="blue_btn margin_right_10 ajax-linkk" rel="<?php echo url('/examinee/center/questionDetail'); ?>?learningPaperHistoryId=0&work_id=0&work_direction_id=0&level_id=0&type=1&work_name=无&work_direction_name=无&level_name=无">开始刷题</div>
                            </td>
                        </tr>

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="layui-tab-item">
                <div class="baoming_main">
                    <table class="layui-table myorder_table" lay-skin="line">
                        <thead>
                        <tr>
                            <th>报名工种</th>
                            <th>方向</th>
                            <th>等级</th>
                            <th>答对</th>
                            <th>答错</th>
                            <th>答题时间</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if(is_array($historyList) || $historyList instanceof \think\Collection || $historyList instanceof \think\Paginator): $i = 0; $__LIST__ = $historyList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                        <tr>
                            <td>无</td>
                            <td>无</td>
                            <td>无</td>
                            <td><?php echo $vo['correct_count']; ?></td>
                            <td><?php echo $vo['error_count']; ?></td>
                            <td><?php echo $vo->start_time; ?></td>
                        </tr>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>
<div class="JiaoFei_main" style="display: none;">
    <h2 class="tanchuang_title">报考费明细</h2>
    <div class="mingxi_main">
        <div class="layui-col-xs6 layui-col-md6">
            <p>报考工种：焊工</p>
            <p>等 级：二级</p>
            <p>理 论：100元</p>
            <p>综 合：100元</p>
        </div>
        <div class="layui-col-xs6 layui-col-md6">
            <p>方 向：电焊</p>
            <br />
            <p>实 操：50元</p>
            <p>论文评审：50元</p>
        </div>
    </div>
    <div class="double_btn double_qx">
        <div class="dayin_btn payment margin_right_15">确定</div>
        <div class="gray_btn payment">取消</div>
    </div>
</div>

<div class="WoYaoBaoMing layui-form" style="display: none;">
    <h2 class="tanchuang_title">报名表</h2>
    <p style="margin: 20px 0 10px 80px;">您可以报名以下鉴定计划：</p>
    <div style="margin-left: 100px;">
        <div><input type="radio" name="sex" value="2018秋季A类鉴定1" title="2018秋季A类鉴定">
            <a href="WoDeBaoMing.html">详情</a>
        </div>
        <div><input type="radio" name="sex" value="2018秋季A类鉴定2" title="2018秋季A类鉴定">
            <a href="###">详情</a>
        </div>
        <div><input type="radio" name="sex" value="2018秋季A类鉴定3" title="2018秋季A类鉴定">
            <a href="###">详情</a>
        </div>
        <div><input type="radio" name="sex" value="2018秋季A类鉴定4" title="2018秋季A类鉴定" checked>
            <a href="###">详情</a>
        </div>
    </div>

    <div class="double_btn double_qx2">
        <div class="dayin_btn margin_right_15">填写报名信息</div>
    </div>
</div>
<script type="text/javascript">
    layui.use(['form', 'laypage', 'laydate'], function() {
        var form = layui.form,
            $ = layui.jquery;
        form.render();
        var laydate = layui.laydate;
        $ = layui.jquery;
        $('.layui-layer-shade').hide();
        form.render();

        var laypage = layui.laypage;

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