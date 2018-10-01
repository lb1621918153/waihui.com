<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <title>鑫洋交易中心</title>
    <link rel="stylesheet" href="/Public/home/asset/css/pcstyle.css"/>
    <link rel="stylesheet" href="/Public/home/asset/css/pcmy.css"/>
    <link rel="stylesheet" type="text/css" href="/Public/home/asset/css/pc.css">
    <link rel="stylesheet" href="/Public/home/asset/css/font_593216_6icj22flqa.css"/>
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
</head>

<body class="me">
<!-- 头部 -->
<div class="header">
    <div class="header_inner">
        <div class="brand">
            <a href="/Home/Index"><img alt="logo1" class="logo1"
                                            src="/Public/home/upload/img/00f31142bc2000691edb709244e29d89.jpg" width="60"></a>
            <a href="/Home/Index"><img alt="logo2" class="logo2" src="/Public/home/static/logo2.png"></a>
        </div>

        <div class="user">
            <div class="user_info">
                <div class="account">￥ <?php echo ($_SESSION['user']['money']); ?></div>
                <div class="user_name"><?php echo ($_SESSION['user']['username']); ?></div>
            </div>
            <img src="/Public<?php echo ($_SESSION['user']['head_img']); ?>" alt="user_icon" class="user_icon" width="40">
        </div>
    </div>
</div>
<div class="main_box">
    <!-- 左侧栏 -->
    <div class="left_side me userleft">
    <ul>
        <li><a href="/Home">首页<i class="icon_right"></i></a></li>
        <li <?php if(ACTION_NAME == 'Index'): ?>class="active2"<?php endif; ?>><a href="/Home/User/Index">个人中心<i class="icon_right"></i></a></li>
        <li <?php if(ACTION_NAME == 'Recharge'): ?>class="active2"<?php endif; ?>><a href="/Home/User/Recharge">充值<i class="icon_right"></i></a></li>
        <li <?php if(ACTION_NAME == 'Withdrawal'): ?>class="active2"<?php endif; ?>><a href="/Home/User/Withdrawal">提现<i class="icon_right"></i></a></li>
        <li <?php if(ACTION_NAME == 'Userverify'): ?>class="active2"<?php endif; ?>><a href="/Home/User/Userverify">实名认证<i class="icon_right"></i></a></li>
        <li <?php if(ACTION_NAME == 'Passwordedit'): ?>class="active2"<?php endif; ?>><a href="/Home/User/Passwordedit">修改密码<i class="icon_right"></i></a></li>
        <li <?php if(ACTION_NAME == 'Useredit'): ?>class="active2"<?php endif; ?>><a href="/Home/User/Useredit">修改信息<i class="icon_right"></i></a></li>
        <li><a href="/Home/Login/logout">退出<i class="icon_right"></i></a></li>
    </ul>
</div>
    <!-- 中间主体 -->
    <div class="usermain">
        <div class="my_info">
            <div class="my_info_inner">
                <img class="my_icon" id="my_icon" src="/Public<?php echo ($_SESSION['user']['head_img']); ?>" alt="我的头像">
                <div class="revise" onclick="f.click()"><i class="revise"></i>修改头像</div>
                <input type="file" id="f" name="f" onchange="sc(this);" style="display:none"/>
                <div class="my_name">ID: <?php echo ($_SESSION['user']['id']); ?></div>
                <div class="my_name">当前昵称：<?php echo ($_SESSION['user']['username']); ?></div>
                <div class="my_name">手机号码：<?php echo ($_SESSION['user']['phone']); ?></div>
                <div class="my_name">余额：<?php echo ($_SESSION['user']['money']); ?> (保证金：<?php echo ($_SESSION['user']['margin']); ?>)</div>
                <div class="my_name">实名认证：<?php echo (userVerify($_SESSION['user']['status'])); ?></div>
            </div>
        </div>
    </div>
</div>
<!-- 页脚 -->
<div class="footer">
    <div class="footerinner">
        <p>Copyright © 2018 - 2018 xinyang2018.com All Rights Reserved</p>
        <p>鑫洋科技技术支持</p>
    </div>
    <div class="footerinner">
        <div class="beian">
            <img src="/Public/home/static/beian1.png" alt="备案信息">
            <img src="/Public/home/static/beian2.png" alt="备案信息">
        </div>
    </div>
</div>

<script src="/Public/home/asset/js/wpauto.js"></script>
<script src="/Public/home/asset/js/jquery-1.9.1.min.js"></script>
<script src="/Public/home/asset/js/order.js"></script>
<script src="/Public/home/asset/layer/layer.js"></script>
<script src="/Public/home/asset/js/function.js"></script>
<script src="/Public/home/asset/js/base64.js"></script>
<script type="text/javascript">
    var Base64 = new Base64();
</script>
<script type="text/javascript" src="/Public/home/asset/js/pc.js"></script>

<script type="text/javascript">
    function sc() {
        var file = $('#f').get(0).files[0];
        var data = new FormData();
        data.append('area_img', file);
        $.ajax({
            url: "/Admin/Image/userUpload",
            type: 'POST',
            data: data,
            dataType: 'JSON',
            cache: false,
            processData: false,
            contentType: false,
            error: function (err) {
                layer.msg('请求失败');
            }
        }).done(function (res) {
            if (res.code === 0) {
                $('#my_icon').attr('src', '/Public' + res.url);
                $.post('/Home/User/updateHeadImg', {headImg: res.url}, function (res) {
                    if (res.code === 0) {
                        layer.msg(res.msg);
                    } else {
                        layer.msg(res.msg);
                    }
                }, 'json')
                    .error(function (err) {
                        layer.msg('请求失败');
                    });
            } else {
                layer.msg(res.msg);
            }
        });
        return false;
    }
</script>
</body>
</html>