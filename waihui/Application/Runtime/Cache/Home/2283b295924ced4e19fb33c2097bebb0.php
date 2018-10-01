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

<body>
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
    <div class="left_side">
    <ul>
        <li <?php if(CONTROLLER_NAME == 'Index'): ?>class="active"<?php endif; ?>><a href="/Home/Index"><i class="list_icon1"></i><span>首页</span></a></li>
        <li <?php if(CONTROLLER_NAME == 'Product'): ?>class="active"<?php endif; ?>><a href="/Home/Product"><i class="list_icon2"></i><span>产品交易</span></a></li>
        <li <?php if(CONTROLLER_NAME == 'News'): ?>class="active"<?php endif; ?>><a href="/Home/News"><i class="list_icon3"></i><span>财经新闻</span></a></li>
        <li <?php if(CONTROLLER_NAME == 'Calendar'): ?>class="active"<?php endif; ?>><a href="/Home/Calendar"><i class="list_icon4"></i><span>财经日历</span></a></li>
        <li <?php if(CONTROLLER_NAME == 'Order'): ?>class="active"<?php endif; ?>><a href="/Home/Order"><i class="list_icon5"></i><span>交易记录</span></a></li>
        <li <?php if(CONTROLLER_NAME == 'User'): ?>class="active"<?php endif; ?>><a href="/Home/User"><i class="list_icon6"></i><span>我的</span></a></li>
    </ul>
</div>
    <!-- 中间主体 -->
    <div class="changemain">
        <table class="cpjy">
            <?php if(is_array($products)): $i = 0; $__LIST__ = $products;if( count($__LIST__)==0 ) : echo "$empty" ;else: foreach($__LIST__ as $key=>$product): $mod = ($i % 2 );++$i;?><tr id="<?php echo ($product["id"]); ?>">
                    <td class="ng-binding prtitle"><?php echo ($product["product_name"]); ?></td>
                    <td class="up_number">
                        <a href="javascript:;" class="ng-binding rise-value now-value"><?php echo ($product["current"]); ?></a>
                    </td>

                    <td style="text-align: left;padding-left: 30px;">
                        <p>最低<span class="table_number rise-low"><?php echo ($product["lowest"]); ?></span></p>
                        <p>最高<span class="table_number rise-high"><?php echo ($product["highest"]); ?></span></p>
                    </td>
                    <td style="text-align: left;padding-left: 30px;">
                        <p>开盘<span class="table_number"><?php echo ($product["open"]); ?></span></p>
                        <p>昨收<span class="table_number"><?php echo ($product["income"]); ?></span></p>
                    </td>
                    <td>
                        <div class="buy">
                            <a href="/Home/Product/detail/id/<?php echo ($product["id"]); ?>">我要交易</a>
                        </div>
                    </td>
                </tr><?php endforeach; endif; else: echo "$empty" ;endif; ?>
        </table>
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
    // var order_list;
    // var order_index = 0;
    // var max_rand = 50;
    //
    // function order_show() {
    //     if (order_list != null && $("#J_order").is(":hidden")) {
    //         if (order_index >= max_rand) {
    //             order_index = 0;
    //         }
    //         $("#J_order").find(".order-phone").html(order_list[order_index]['phone']);
    //         $("#J_order").find(".order-rs").html('赢利+' + order_list[order_index]['price'] + '元');
    //         $("#J_order").show();
    //         window.setTimeout(function () {
    //             $("#J_order").hide();
    //         }, 1500);
    //         order_index++;
    //     }
    // }
    //
    // function order_start() {
    //     var rand = Math.ceil(Math.random() * 100);
    //     if (rand >= 80) {
    //         if (order_list != null) {
    //             order_show();
    //         }
    //     }
    // }
    //
    // $(document).ready(function () {
    //     $.ajax({
    //         type: "GET",
    //         contentType: "application/json;charset=utf-8",
    //         url: "/index/index/ajax_order",
    //         data: null,
    //         dataType: "json",
    //         complete: function () {
    //         },
    //         success: function (result) {
    //             order_list = result;
    //         },
    //         error: function (result, status) {
    //         }
    //     });
    //     /*
    //     $.get("/index/index/ajax_order",null,function(data){
    //         order_list = data;
    //     });
    //     */
    //     window.setInterval(order_start, 1000);
    // });
</script>
</body>
</html>