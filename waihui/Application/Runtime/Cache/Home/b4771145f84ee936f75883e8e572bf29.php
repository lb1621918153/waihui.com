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
        <div class="reset">
            <form method="post" id="form1">
                <div class="from_group">
                    <span class="mrr"> 新密码 </span><input class="reset_input" type="password" id="oldpwd_"
                                                       placeholder="输入旧密码">
                </div>
                <div class="from_group">
                    <span class="mrr"> 新密码 </span><input class="reset_input" type="password" id="newpwd1_"
                                                       placeholder="输入新密码">
                </div>
                <div class="from_group">
                    <span>确认密码</span><input class="reset_input" type="password" id="newpwd2_"
                                            placeholder="重复新密码">
                </div>
                <input class="submit" type="button" onclick="update();" value="确定修改">
            </form>
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
<script>
    function update() {
        var oldPwd = $("#oldpwd_").val();
        var newPwd1 = $("#newpwd1_").val();
        var newPwd2 = $("#newpwd2_").val();
        if (!oldPwd) {
            layer.open({
                icon: 2,
                content: '请输入旧密码' + oldPwd
            });
            return false;
        }
        if (newPwd1.length < 6 || newPwd2.length < 6) {
            layer.open({
                icon: 2,
                content: '新密码长度不能小于6位'
            });
            return false;
        }
        if (newPwd1 !== newPwd2) {
            layer.open({
                icon: 2,
                content: '两次输入的密码不一致'
            });
            return false;
        }

        var data = {
            oldPwd: oldPwd,
            newPwd: newPwd1
        };
        $.post('/Home/User/updatePwd', data, function (res) {
            if (res.code === 0) {
                layer.open({
                    icon: 1,
                    content: res.msg
                });
            } else {
                layer.open({
                    icon: 2,
                    content: res.msg
                });
            }
        }).error(function (err) {
            layer.open({
                icon: 2,
                content: '请求失败'
            })
        })
    }
</script>
</body>
</html>