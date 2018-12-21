<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:97:"D:\phpStudy\PHPTutorial\WWW\JiangXiJianDing\Exam\public/../application/admin\view\menu\index.html";i:1545017008;s:91:"D:\phpStudy\PHPTutorial\WWW\JiangXiJianDing\Exam\application\common\view\layout\layout.html";i:1545212656;s:94:"D:\phpStudy\PHPTutorial\WWW\JiangXiJianDing\Exam\application\common\view\navigation\index.html";i:1545017016;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>权限管理</title>
    <link rel="stylesheet" href="/static/layui/css/layui.css">


    <link rel="stylesheet" type="text/css" href="/static/css/common/page.css" />
    <style>
        .layui-input-inline {
            width: 180px !important;
            padding-left: 10px;
        }

        .layui-card-header {
            padding-left: 0;
        }

        .layui-form-label {
            width: auto;
            padding: 9px 0 10px !important;
        }

        .layui-inline {
            margin-right: 0 !important;
        }
    </style>
    
</head>
<body class="layui-layout-body">
<div class="layui-layout layui-layout-admin">
    <div class="layui-header">
        <div class="layui-logo">
            <img src="/static/img/logo.png" width="50" alt="">
        </div>
        <?php if(!(empty($count) || (($count instanceof \think\Collection || $count instanceof \think\Paginator ) && $count->isEmpty()))): ?>
        <ul class="layui-nav layui-layout-left" style="margin-left: 1459px;">
            <li class="layui-nav-item"><a href="/cms/notice/index">未读消息<span class="layui-badge"><?php echo $count; ?></span></a>
            </li>
        </ul>
        <?php endif; ?>
        <ul class="layui-nav layui-layout-right">
            <li class="layui-nav-item">
                <a href="javascript:void(0);"><?php echo \think\Session::get('adminuser.username'); ?></a>
                <dl class="layui-nav-child">
                    <!--<dd><a href="javascript:;" id="userInfo">基本信息</a></dd>-->
                    <dd><a href="javascript:;" id="checkOut">退出</a></dd>
                </dl>
            </li>
        </ul>
    </div>

    <div class="layui-side layui-bg-black">
        <div class="layui-side-scroll">
            <!-- 左侧导航区域（可配合layui已有的垂直导航） -->
            <ul class="layui-nav layui-nav-tree jx-left-nav" lay-filter="test">
                <?php if(is_array($menuData) || $menuData instanceof \think\Collection || $menuData instanceof \think\Paginator): $i = 0; $__LIST__ = $menuData;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;if(!(empty($vo['son']) || (($vo['son'] instanceof \think\Collection || $vo['son'] instanceof \think\Paginator ) && $vo['son']->isEmpty()))): ?>
                <li class="layui-nav-item">
                    <a class="" href="<?php echo $vo['url']=='#'?'javascript:void(0);':'/'.$vo['url']; ?>"><?php echo $vo['title']; ?></a>
                    <dl class="layui-nav-child">
                        <?php if(is_array($vo['son']) || $vo['son'] instanceof \think\Collection || $vo['son'] instanceof \think\Paginator): $i = 0; $__LIST__ = $vo['son'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$voo): $mod = ($i % 2 );++$i;?>
                        <dd><a class="check"
                               href="<?php echo $voo['url']=='#'?'javascript:void(0);':'/'.$voo['url']; ?>"><?php echo $voo['title']; ?></a></dd>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </dl>
                </li>
                <?php else: ?>
                <li class="layui-nav-item"><a class="check" href='<?php echo $vo['url']==' #'?'javascript:void(0);':'/'.$vo['url']; ?>'><?php echo $vo['title']; ?></a></li>
                <?php endif; endforeach; endif; else: echo "" ;endif; ?>
            </ul>
        </div>
    </div>

    <div class="layui-body" style="background: green;">
        <!-- 内容主体区域 -->
        <div class="layui-tab-content">
            <div class="layui-card" style="padding: 15px;">
                <?php if(isset($Navigation)): ?>
                <span class="layui-breadcrumb" lay-separator="">
    <i class="layui-icon layui-icon-home"></i>
        <a href="/admin" class="county">
            首页
        </a>
</span>
<?php if(is_array($Navigation) || $Navigation instanceof \think\Collection || $Navigation instanceof \think\Paginator): $i = 0; $__LIST__ = $Navigation;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
<span class="layui-breadcrumb" lay-separator="">
    <i class="layui-icon">-</i>
        <a href="<?php echo $vo['url']; ?>" class="county">
            &nbsp;      <?php echo $vo['title']; ?>
        </a>
</span>
<?php endforeach; endif; else: echo "" ;endif; endif; ?>
                
<span class="layui-breadcrumb" lay-separator="">
  <a href="/admin" class="county">
    <i class="layui-icon layui-icon-home"></i>
    &nbsp;首页
  </a>
  <a><cite>权限管理</cite></a>
</span>

                
<div style="width: 95%;margin-left: 30px;">
    <button class="layui-btn addMenu" data-value="0" style="margin: 10px;float: right;">
        <i class="layui-icon">&#xe654;</i>添加权限
    </button>
    <table class="layui-table" lay-even lay-size='sm' lay-skin="nob">
        <colgroup>
            <col width="10">
            <col width=55">
            <col width="">
            <col width="">
            <col width="200">
        </colgroup>
        <thead>
        <tr>
            <th></th>
            <th>排序</th>
            <th>名称</th>
            <th>地址</th>
            <th>操作</th>
        </tr>
        </thead>
        <tbody>
        <?php if(is_array($data) || $data instanceof \think\Collection || $data instanceof \think\Paginator): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
        <tr>
            <td><?php echo $i; ?></td>
            <td>
                <input data-value="<?php echo $vo['id']; ?>" type="text" name="sort" value="<?php echo $vo['sort']; ?>" class="layui-input sort">
            </td>
            <td><?php echo $vo['_name']; ?></td>
            <td><?php echo $vo['url']; ?></td>
            <td>
                <button data-value="<?php echo $vo['id']; ?>" class="layui-btn layui-btn-warm layui-btn-xs addMenu">添加子权限</button>
                <button data-value="<?php echo $vo['id']; ?>" class="layui-btn layui-btn-xs editMenu">修改</button>
                <button data-value="<?php echo $vo['id']; ?>" class="layui-btn layui-btn-danger layui-btn-xs deleteMenu">删除</button>
            </td>
        </tr>
        <?php endforeach; endif; else: echo "" ;endif; ?>
        </tbody>
    </table>
</div>

            </div>
        </div>
    </div>

    <div class="layui-footer">
        <!-- 底部固定区域 -->
        <a href="http://www.etlchina.net">© www.etlchina.net - 博奥教育</a>
    </div>
</div>
</body>
</html>
<script type="text/javascript" src="/static/js/urladdr/urladdr.js"></script>
<script type="text/javascript" src="/static/layui/layui.js"></script>
<script type="text/javascript" src="/static/layui/lay/modules/code.js"></script>
<script type="text/javascript" src="/static/js/admin/layout.js"></script>
<script type="text/javascript" src="/static/js/common/must.js"></script>
<script type="text/javascript" src="/static/js/jquery.min.js"></script>
<script type="text/javascript" src="/static/js/jquery.cookie.js"></script>
<script type="text/javascript">
    //点亮当前
    $(function () {
        $(".check[href='" + $.cookie('menu') + "']").addClass('layui-this');
    });
    layui.use(['layer', 'element', 'form', 'jquery'], function () {
        var element = layui.element, $ = layui.jquery, form = layui.form;
        $('.check').on('click', function () {
            var menu = $(this).attr('href');
            $.cookie('menu', menu, {expires: 1, path: '/admin'});


        });
        $("#userInfo").click(function () {
            layer.open({
                type: 2,
                anim: 1,
                skin: 'layui-layer-molv',
                area: ['60%', '60%'], //宽高
                title: "基本信息",
                content: "/admin/index/infopage",  //详细信息页面 修改详细信息
                yes: function (index, layero) {
                    layer.close(index); //如果设定了yes回调，需进行手工关闭
                }
            });
        });
        $("#checkOut").click(function () {
            layer.open({
                title: ['温馨提示'],
                content: '<div style="color:#767676">确定要退出当前账号吗？</div>',
                btn: ['确定', '取消'],
                shadeClose: true,
                //回调函数
                yes: function (index, layero) {
                    $.ajax({
                        url: '/api/admin/loginOut',
                        dataType: 'json',
                        //判断注册状态
                        success: function (data) {
                            if (data == 1) {
                                layer.msg("退出成功", {
                                    icon: 1,//提示的样式
                                    time: 1000, //1秒关闭（如果不配置，默认是3秒）//设置后不需要自己写定时关闭了，单位是毫秒
                                    end: function () {
                                        window.location.href = '/cms/index/admin';
                                    }
                                })
                            } else {
                                layer.msg(data)
                            }
                        }
                    });
                    //防止页面跳转
                    return false;
                },
                btn2: function (index, layero) {
                    layer.close(index);
                },
                cancel: function (index, layero) { //按右上角“X”按钮
                    layer.close(index);
                },
            });
        });
    });
</script>

<script>

    layui.use('form', function () {
        var $ = layui.jquery;
        //添加子菜单
        $('.addMenu').on('click', function () {
            id = $(this).data('value');
            layer.open({
                type: 2,
                anim: 1,
                skin: 'layui-layer-molv',
                area: ['500px', '400px'], //宽高
                title: "添加权限",
                content: urladdr.addMenu + id,  //调到新增页面
            });
        });
        //删除菜单
        $('.deleteMenu').on('click', function () {
            id = $(this).data('value');
            layer.confirm('是否确认该操作？', {btn: ['确定', '取消'], title: "提示"}, function () {
                $.post(urladdr.deleteMenu, {'id': id}, function (res) {
                    if (res.code === 1) {
                        layer.msg(res.msg, {time: 500, icon: 1}, function () {
                            location.reload();
                        });
                    } else {
                        layer.msg(res.msg, {icon: 5});
                    }
                });
            });
        });
        //修改菜单
        $('.editMenu').on('click', function () {
            id = $(this).data('value');
            layer.open({
                type: 2,
                anim: 1,
                skin: 'layui-layer-molv',
                area: ['500px', '400px'], //宽高
                title: "修改菜单",
                content: urladdr.editMenu + id,  //调到新增页面
            });
        });
        //修改权限
        $('.sort').on('blur', function () {
            var id = $(this).data('value'), sort = $(this).val();
            $.post(urladdr.doeditMenu, {'id': id, 'sort': sort}, function (res) {
                if (res.code === 1) {
                    layer.msg(res.msg, {time: 500, icon: 1}, function () {
                        location.reload();
                    });
                } else {
                    layer.msg(res.msg, {icon: 5});
                }
            });
        });
    });

</script>
