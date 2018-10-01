<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

<head>
    <title>鑫洋交易中心</title>
    <link rel="stylesheet" href="/Public/home/asset/css/wapstyle.css" />
    <link rel="stylesheet" type="text/css" href="/Public/home/asset/css/pc.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
</head>

<body>
    <!-- 头部 -->
    <div class="header">
        <div class="header_inner login">
            <div class="brand">
                <a href="/"><img alt="logo1" class="logo1" src="/Public/home/static/79752b2431804d984ecf76dc70324903.png"></a>
                <a href="/"><img alt="logo2" class="logo2" src="/Public/home/static/logo2.png"></a>
            </div>
            <ul id="lang" class="jsSelect">
                <i class="icon icon-filter-arrow"></i>
                <li><a href="#" class="s"><i class="en"></i>中文</a></li>
                <li><a href="#"><i class="zh-cn"></i>English</a></li>
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
        <form class="login" method="post" id="formid">
            <div class="text">帐号</div>
            <input type="text" class="username" id="phone" name="phone" placeholder="输入手机" value="15505952138">
            <div class="text">密码</div>
            <input type="password" class="password" id="password" name="password" placeholder="输入密码" value="123456">
            <!--<div class="text">验证码</div>
          <input type="text" name = "verify"><img style="position: absolute;left: 46%;" id="verify_img" src="/captcha.html" alt="验证码" onclick="refreshVerify()">-->


            <div class="submit" onclick="checkForm()">登录</div>
            <div class="forget">
                <a href="/index/login/respass.html" style="color: #fff;">
                    <div class="forget_password">忘记密码？</div>
                </a>
                <div class="register" style="float:right;"><a href="/Home/Login/register">没有账号？注册</a></div>
            </div>
        </form>
    </div>
    <!-- 中间主体 -->
    <!--
<div class="loginmain">
<div class="part_right">
    <div class="right_title"><i></i><span>市场数据</span></div>
    <ul class="right">
        <li>
            <div class="left fl">
                <i></i>
                <div class="time">10:21:09</div>
            </div>
            <div class="right" style="line-height: 33px;">
                <a href="/index/user/cjxw_detail?nid=11">
                    <p>据港交所：将于2018年7月9日推出小米集团股票期货合约和股票期权合约。</p>
                </a>
            </div>
        </li>
        <li>
            <div class="left fl">
                <i></i>
                <div class="time">10:21:33</div>
            </div>
            <div class="right" style="line-height: 33px;">
                <a href="/index/user/cjxw_detail?nid=12">
                    <p>据港交所：将于2018年7月9日推出小米集团股票期货合约和股票期权合约。</p>
                </a>
            </div>
        </li>
        <li>
            <div class="left fl">
                <i></i>
                <div class="time">10:21:54</div>
            </div>
            <div class="right" style="line-height: 33px;">
                <a href="/index/user/cjxw_detail?nid=13">
                    <p>据港交所：将于2018年7月9日推出小米集团股票期货合约和股票期权合约。</p>
                </a>
            </div>
        </li>


    </ul>
</div>
</div>
<div style="clear :both;"></div>
-->
    <!-- 页脚 -->
    <div class="footer">
        <div class="footerinner">
            <p>Copyright © 2018 - 2018 Jin10.com All Rights Reserved</p>
            <p>粤公网安备 4480701111454</p>
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
    <script type="text/javascript">
        var Base64 = new Base64();

    </script>
    <script type="text/javascript" src="/Public/home/asset/js/pc.js"></script>
    <script>
        function checkForm() {
            var phone = $("#phone").val();
            var password = $("#password").val();
            if (!phone) {
                layer.msg('请输入手机');
                return false;
            }
            if (!password) {
                layer.msg('请输入密码');
                return false;
            }
            $.post('/Home/Login/login', {
                    phone: phone,
                    password: password
                }, function(res) {
                    layer.msg(res.msg);
                    if (res.code === 0) {
                        location.href = '/Home/Index';
                    }
                }, 'json')
                .error(function(err) {
                    layer.msg('请求失败');
                });
            return false;
        }

    </script>
</body>

</html>