<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <title>鑫洋交易中心</title>
    <link rel="stylesheet" href="/Public/home/asset/css/wapstyle.css"/>
    <link rel="stylesheet" type="text/css" href="/Public/home/asset/css/pc.css">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <style>
        form.login .verify {
            width: 220px;
        }
        #verifyImg:hover {
            cursor: pointer;
        }
        #verifyImg{
            left: 72% !important;
            position: inherit !important;
        }
    </style>
</head>
<body>
<!-- 头部 -->
<div class="header">
    <div class="header_inner login">
        <div class="brand">
            <a href="/"><img alt="logo1" class="logo1"
                             src="http://houtai.xinyang2018.com//public/uploads/20180820/79752b2431804d984ecf76dc70324903.png"></a>
            <a href="/"><img alt="logo2" class="logo2" src="/Public/home/static/logo2.png"></a>
        </div>
        <ul id="lang" class="jsSelect">
            <i class="icon icon-filter-arrow"></i>
            <li><a href="#" class="s"><i class="en"></i>中文</a></li>
            <li><a href="#"><i class="other"></i>한국어</a></li>
        </ul>
    </div>
</div>
<!-- 轮播 -->
<div class="banner">
    <ul class="banner_list">
        <li class="banner_item show">
            <img src="/Public/home/static/mainbg_0.png">
            <!--                <div class="login_title">双重安全保障机制1</div>-->
        </li>
        <ul class="index login" id="login">
        </ul>
    </ul>
</div>
<!-- 登录表单 -->
<div class="login_box">
    <form class="login" id="formid">
        <div class="text">帐号</div>
        <input type="text" class="username" id="phone" name="phone" placeholder="输入手机">
        <div class="text">密码</div>
        <input type="password" class="password" id="password" name="password" placeholder="输入密码">

        <div class="text">重复密码</div>
        <input type="password" class="password" id="repassword" name="password" placeholder="再次输入密码">

        <div class="text">验证码</div>
        <input id="verifyCode" type="text" name = "verify" class="verify">
        <img id="verifyImg" style="position: absolute;left: 46%;" src="/Home/Login/captcha" alt="验证码" onclick="refreshVerify(this)" title="更换验证码">

        <div class="submit" onclick="checkForm()">注册</div>
        <div class="forget">
            <div class="register" style="float:right;"><a href="/Home/Login">已有账号，前往登陆</a></div>
        </div>
    </form>
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
<script src="/Public/home/asset/js/jquery-1.9.1.min.js"></script>
<script src="/Public/home/asset/layer/layer.js"></script>
<script src="/Public/home/asset/js/function.js"></script>
<script src="/Public/home/asset/js/base64.js"></script>
<script type="text/javascript" src="/Public/home/asset/js/pc.js"></script>
<script>
    function checkForm() {
        var phone = $("#phone").val();
        var password = $("#password").val();
        var repassword = $("#repassword").val();
        var verifyCode = $("#verifyCode").val();
        if (!phone) {
            layer.msg('请输入手机');
            return false;
        }
        if (password.length < 6 || repassword.length < 6) {
            layer.msg('密码长度不能小于6位');
            return false;
        }
        if (password !== repassword) {
            layer.msg('两次输入的密码不一致');
            return false;
        }
        if (verifyCode.length !== 4) {
            layer.msg('验证码格式不正确');
            return false;
        }
        $.post('/Home/Login/doregister', {phone: phone, password: password, verifyCode: verifyCode}, function (res) {
            if (res.code === 0) {
                layer.msg(res.msg);
                location.href = '/Home/Index';
            } else {
                layer.open({
                    icon: 2,
                    content: res.msg
                })
            }
        }, 'json')
            .error(function (err) {
                layer.open({
                    icon: 2,
                    content: '请求失败'
                })
            });
        return false;
    }


    function refreshVerify(ref) {
        var img = $(ref).attr('src');
        $(ref).attr('src', img + '?' + new Date());
    }
</script>
</body>
</html>