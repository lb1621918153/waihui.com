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
    <div class="newsmain">
        <div class="now_news_list" style="height: 340px;">
            <ul class="now_news1">
                <?php if(is_array($newses)): $i = 0; $__LIST__ = $newses;if( count($__LIST__)==0 ) : echo "$empty" ;else: foreach($__LIST__ as $key=>$news): $mod = ($i % 2 );++$i;?><li><a href="/Home/News/detail/id/<?php echo ($news["news_id"]); ?>" class="now_news_item"><?php echo (showLimitMsg($news["news_title"],20)); ?><span><?php echo (showDateTime($news["create_time"])); ?></span></a></li><?php endforeach; endif; else: echo "$empty" ;endif; ?>
            </ul>
        </div>
        <?php if($newses): ?><div class="text-center">
                <div class="pages">
                    <?php echo ($page); ?>
                </div>
            </div><?php endif; ?>
    </div>
    <!-- 右侧栏 -->
    <div class="right_side">
        <div class="ad_header">
            <h2>官方推荐</h2>
            <div class="line"></div>
        </div>
        <ul class="ad_list">
            <li>
                <a href="/index/user/cjxw_detail?nid=14">
                    <img width="310" height="189" src="/Public/home/upload/img/00f31142bc2000691edb709244e29d89.jpg" alt=""
                         class="ad">
                    <div class="ad_title">鑫洋交易中心</div>
                    <div class="ad_tag">广告</div>
                </a>
            </li>
        </ul>
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