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
<link rel="stylesheet" href="/Public/admin/css/bootstrap.min.css">

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
        <div class="usermain right_userpay">
            <div class="chongzhi">

                <div class="ul_title"><span></span>请向以下任一银行卡转账，转账成功后，输入转账信息</div>
                <br>
                <div class="bank">
                    <?php if(is_array($bankCards)): $i = 0; $__LIST__ = $bankCards;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$bankCard): $mod = ($i % 2 );++$i;?><input value="<?php echo ($bankCard["bank_card_num"]); ?>" /><?php endforeach; endif; else: echo "" ;endif; ?>
                </div>

                <br>
                <br>
                <form id="form">
                    <div class="ul_title"><span></span>充值金额</div>
                    <br>
                    <div class="form-inline">
                        <input type="number" name="money" class="form-control" value="0">
                    </div>
                    <br>
                    <div class="ul_title"><span></span>汇款信息</div>
                    <br>
                    <textarea name="detail" class="form-control" rows="3"></textarea>
                    <br>
                    <div class="text-center">
                        <button class="btn btn-primary" type="button" onclick="dorecharge()">提交审核</button>
                    </div>
                    <br>
                    <div class="text-right">
                        <button class="btn btn-info" type="button" onclick="location.href = '/Home/User/allrecharge'">查看充值记录</button>
                    </div>
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
        function dorecharge() {
            var formData = new FormData(document.getElementById('form'));
            $.ajax({
                url: '/Home/User/dorecharge',
                type: 'post',
                data: formData,
                dataType: 'json',
                processData: false,
                contentType: false,
                success: function(res) {
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
                },
                error: function(err) {
                    layer.open({
                        icon: 2,
                        content: '请求失败'
                    });
                }
            });
        }

//        function copyit(obj) { // obj.select(); // document.execCommand("Copy"); // alert("复制成功"); // }

    </script>
</body>

</html>