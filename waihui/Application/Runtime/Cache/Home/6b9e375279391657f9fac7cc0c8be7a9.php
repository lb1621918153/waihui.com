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
            <a href="/index.php/Home/Index"><img alt="logo1" class="logo1"
                                            src="/Public/home/upload/img/00f31142bc2000691edb709244e29d89.jpg" width="60"></a>
            <a href="/index.php/Home/Index"><img alt="logo2" class="logo2" src="/Public/home/static/logo2.png"></a>
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
        <li><a href="/index.php/Home">首页<i class="icon_right"></i></a></li>
        <li <?php if(ACTION_NAME == 'Index'): ?>class="active2"<?php endif; ?>><a href="/index.php/Home/User/Index">个人中心<i class="icon_right"></i></a></li>
        <li <?php if(ACTION_NAME == 'Recharge'): ?>class="active2"<?php endif; ?>><a href="/index.php/Home/User/Recharge">充值<i class="icon_right"></i></a></li>
        <li <?php if(ACTION_NAME == 'Withdrawal'): ?>class="active2"<?php endif; ?>><a href="">提现<i class="icon_right"></i></a></li>
        <li <?php if(ACTION_NAME == 'index'): ?>class="active2"<?php endif; ?>><a href="/index/user/zxkf.html">留言板<i class="icon_right"></i></a></li>
        <li <?php if(ACTION_NAME == 'index'): ?>class="active2"<?php endif; ?>><a href="/index/user/editinfo.html">修改信息<i class="icon_right"></i></a></li>
        <li <?php if(ACTION_NAME == 'index'): ?>class="active2"<?php endif; ?>><a href="javascript:;" onclick="app_exit()">退出<i class="icon_right"></i></a></li>
    </ul>
</div>
    <!-- 中间主体 -->
    <div class="usermain right_userpay">
        <div class="chongzhi">
            <div class="ul_title"><span></span>请选择充值金额</div>
            <form action="/index/user/qswlpay.html" method="post" id="postform">
                <input class="number" type="text" id="ylcode" name="ylcode" placeholder="银联支付时，请输入银行卡号"><br/>
                <input class="number" type="text" id="price" name="price" readonly="readonly">

                <input type="hidden" name="user" id="user" value="3942">
                <span class="input_tips">*选择下方要充值的金额</span>

                <ul class="chong">
                    <li>
                        <span class="small">100元</span>
                    </li>
                    <li>
                        <span class="small">200元</span>
                    </li>
                    <li>
                        <span class="small">500元</span>
                    </li>
                    <li>
                        <span class="small">1000元</span>
                    </li>
                    <li>
                        <span class="small">2000元</span>
                    </li>
                    <li>
                        <span class="small">3000元</span>
                    </li>
                    <li>
                        <span class="small">5000元</span>
                    </li>
                    <li>
                        <span class="small">8000元</span>
                    </li>
                    <li>
                        <span class="small">10000元</span>
                    </li>
                    <li>
                        <span class="small">20000元</span>
                    </li>
                    <li>
                        <span class="small">50000元</span>
                    </li>
                </ul>
                <div class="ul_title"><span></span>选择充值方式</div>
                <ul class="pay">
                    <li>
                        <i class="zfb"></i>
                        <div class="detail">
                            <div class="name">支付宝钱包</div>
                            <div class="info">支持支付宝余额和银行卡充值</div>
                        </div>
                        <input class="radio" type="radio" name="type" value="alipay">
                    </li>
                    <li>
                        <i class="wx"></i>
                        <div class="detail">
                            <div class="name">微信支付</div>
                            <div class="info">支持微信余额和银行卡充值</div>
                        </div>
                        <input class="radio" group="type" type="radio" name="type" value="wxpay">
                    </li>
                </ul>
                <input class="submit" type="submit" value="确定">
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
</body>
</html>