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
<style>
    .now_order_item:hover {
        color: #000;
        cursor: pointer;
    }
    
    .now_order_item {
        color: #555;
        line-height: 80px;
        font-size: 20px;
    }

</style>

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
        <div class="ordermain">
            <div class="time_line2">
                <ion-content class="trade_history scroll-content ionic-scroll scroll-content-false  has-header has-tabs" scroll="false">
                    <header>
                        <article class="left-table" onclick="change_category(0)">
                            <p class="lishimingxi">历史明细</p>
                        </article>
                        <article class="right-table active" onclick="change_category(1)">
                            <p class="chicangmingxi">持仓明细</p>
                        </article>
                    </header>
                    <div class="trade_history_list slider" style="visibility: visible;overflow:scroll">
                        <div class="slider-slides" ng-transclude="">
                            <ion-slide class="slider-slide slider-left" data-index="0" style="left: 0px; transition-duration: 300ms; transform: translate(-100%, 0px) translateZ(0px);">
                                <ul>
                                    <?php if(is_array($orders)): $i = 0; $__LIST__ = $orders;if( count($__LIST__)==0 ) : echo "$empty" ;else: foreach($__LIST__ as $key=>$order): $mod = ($i % 2 );++$i;?><li class="text-center"><span onclick="detail(this)" data-id="<?php echo ($order["order_id"]); ?>" class="now_order_item">您在<?php echo ($order["create_time"]); echo ($order["kind"]); echo ($order["product_name"]); echo ($order["price"]); ?>元</span></li><?php endforeach; endif; else: echo "$empty" ;endif; ?>
                                </ul>
                                <?php if($orders): ?><div class="text-center">
                                        <div class="pages">
                                            <?php echo ($page); ?>
                                        </div>
                                    </div><?php endif; ?>
                            </ion-slide>
                            <ion-slide class="slider-slide slider-right" data-index="1" style="left: 0px; top: -100%; transition-duration: 300ms; transform: translate(0px, 0px) translateZ(0px);">
                                <ul class="uls">
                                </ul>
                            </ion-slide>
                        </div>
                    </div>
                </ion-content>
            </div>
        </div>

        <!-- 右侧栏 -->
        <div class="right_side">
            <div class="ad_header">
                <h2>官方推荐</h2>
                <div class="line"></div>
            </div>
            <ul class="ad_list">
                <li>
                    <a href="">
                        <img width="310" height="189" src="/Public/home/upload/img/00f31142bc2000691edb709244e29d89.jpg" alt="" class="ad">
                        <div class="ad_title">鑫洋交易中心</div>
                        <div class="ad_tag">广告</div>
                    </a>
                </li>


            </ul>
        </div>
    </div>



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

    <script src="/Public/Home/asset/js/hold.js"></script>
    <script type="text/javascript">
        change_category(0)
        const SCOPE = {
            detailOrder: '/Home/Order/detail'
        };

    </script>
    <script>
        function detail(obj) {
            var id = $(obj).attr("data-id");
            var data = {
                "order_id": id
            };
            $.post(SCOPE.detailOrder, data, function(res) {
                    var data = res[0];
                    data['sellprice'] = data['sellprice'] ? data['sellprice'] : '未结算';
                    data['ploss'] = data['ploss'] ? data['ploss'] : '未结算';
                    data['selltime'] = data['selltime'] == "1970-01-01 08:00:00" ? '未结算' : data['selltime'];
                    layer.open({
                        type: 1,
                        content: "<table class=\"kinds\">\n" +
                            "                                <tbody>\n" +
                            "                                <tr>\n" +
                            "                                    <td>名称</td>\n" +
                            "                                    <td>详情</td>\n" +
                            "                                </tr>\n" +
                            "                                <tr>\n" +
                            "                                    <td>商品</td>\n" +
                            "                                    <td class=\"ptitle\">" + res[0]["product_name"] + "</td>\n" +
                            "                                </tr>\n" +
                            "                                <tr>\n" +
                            "                                    <td>成交价</td>\n" +
                            "                                    <td class=\"buyprice\">" + res[0]["buy_price"] + "</td>\n" +
                            "                                </tr>\n" +
                            "                                <tr>\n" +
                            "                                    <td>结算价</td>\n" +
                            "                                    <td class=\"sellprice\">" + res[0]["sellprice"] + "</td>\n" +
                            "                                </tr>\n" +
                            "                                <tr>\n" +
                            "                                    <td>手续费</td>\n" +
                            "                                    <td>" + res[0]["handing_fee"] + "%</td>\n" +
                            "                                </tr>\n" +
                            "                                <tr>\n" +
                            "                                    <td>盈亏</td>\n" +
                            "                                    <td class=\"ploss\">" + res[0]["ploss"] + "</td>\n" +
                            "                                </tr>\n" +
                            "                                <tr>\n" +
                            "                                    <td>成交时间</td>\n" +
                            "                                    <td class=\"buytime\">" + res[0]["create_time"] + "</td>\n" +
                            "                                </tr>\n" +
                            "                                <tr>\n" +
                            "                                    <td>结算时间</td>\n" +
                            "                                    <td class=\"selltime\">" + res[0]["selltime"] + "</td>\n" +
                            "                                </tr>\n" +
                            "                                </tbody>\n" +
                            "                            </table>"
                    });
                }, "json")
                .error(function(err) {
                    layer.alert("异常错误", {
                        icon: 3
                    })
                })
        }

    </script>
</body>

</html>