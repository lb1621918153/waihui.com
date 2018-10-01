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
    .my-btn {
        padding: 10px 15px;
        border-radius: 5px;
        text-align: center;
    }

    .my-btn:hover {
        cursor: pointer;
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
<!-- 主体 -->
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
    <div class="playmain cpjy">
        <input type="hidden" id="productId" value="<?php echo ($product["id"]); ?>">
        <!-- k线图 -->
        <div class="trade-content">
            <header>
                <section id="productCurrent" class="ng-binding rise data-price" style=""><?php echo ($product["current"]); ?></section>
                <section>
                    <p class="kaipan">开盘</p>
                    <p id="productOpen" class="ng-binding rise data-open" style=""><?php echo ($product["open"]); ?></p>
                </section>
                <section>
                    <p class="zuidi">最低</p>
                    <p id="productLowest" class="ng-binding rise data-low" style=""><?php echo ($product["lowest"]); ?></p>
                </section>
                <section>
                    <p class="zuigao">最高</p>
                    <p id="productHighest" class="ng-binding rise data-high" style=""><?php echo ($product["highest"]); ?></p>
                </section>
            </header>
            <a href="<?php echo ($product["url"]); ?>">
                <iframe id="kurl" height="500" width="100%" src="<?php echo ($product["url"]); ?>"></iframe>
            </a>
        </div>
        <!-- 底部 -->
        <div class="fooertab trade_bar">
            <ul class="footer">
                <li>
                    <div class="my-btn btn_1" onclick="toggle_history_order_panel()">
                        持仓
                    </div>
                </li>
                <li>
                    <div class="my-btn btn_2" onclick="toggle_order_confirm_panel('lookup')">
                        买涨
                    </div>
                </li>
                <li>
                    <div class="my-btn btn_3" onclick="toggle_order_confirm_panel('lookdown')">
                        买跌
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- 确认订单开始 -->
<div class="pro_mengban trade-view ">
    <div class="message_box right_box order-confirm-panel" style="margin-top: 0.7rem;">
        <!-- 顶部通栏 -->
        <div class="close_icon" onclick="toggle_order_close_panel()"></div>
        <!-- 到期时间 -->
        <div class="ul_title"><span></span>到期时间</div>
        <ul class="tabs shou">
            <li class="period-widget  active " data-sen="30" data-shouyi="88">
                <div class="shou1"><span>收益88%</span><i></i></div>
                <div class="big">
                    <span class="miao">30</span>
                    <span>秒</span>
                </div>
            </li>
            <li class="period-widget " data-sen="60" data-shouyi="90">
                <div class="shou1"><span>收益90%</span><i></i></div>
                <div class="big">
                    <span class="miao">60</span>
                    <span>秒</span>
                </div>
            </li>
            <li class="period-widget " data-sen="180" data-shouyi="92">
                <div class="shou1"><span>收益92%</span><i></i></div>
                <div class="big">
                    <span class="miao">180</span>
                    <span>秒</span>
                </div>
            </li>
            <li class="period-widget " data-sen="300" data-shouyi="93">
                <div class="shou1"><span>收益93%</span><i></i></div>
                <div class="big">
                    <span class="miao">300</span>
                    <span>秒</span>
                </div>
            </li>
        </ul>
        <!-- 投资金额 -->
        <div class="ul_title"><span></span>投资金额
            <!-- <span  class=" no-money">投资金额余额不足，请充值！</span>
            <span  class="ng-hide no-max">单笔投资金额不超过10000</span>
            <span   class="ng-hide no-min">单笔投资金额不少于100</span> -->
        </div>

        <ul class="tabs tou">
            <li class="amount-box  active " data-price="100">
                <i></i>
                <span class="small">￥100</span>
            </li>
            <li class="amount-box " data-price="200">
                <i></i>
                <span class="small">￥200</span>
            </li>
            <li class="amount-box " data-price="500">
                <i></i>
                <span class="small">￥500</span>
            </li>
            <li class="amount-box " data-price="1000">
                <i></i>
                <span class="small">￥1000</span>
            </li>
            <li class="amount-box " data-price="2000">
                <i></i>
                <span class="small">￥2000</span>
            </li>
            <li class="amount-box " data-price="3000">
                <i></i>
                <span class="small">￥3000</span>
            </li>
            <li class="amount-box " data-price="5000">
                <i></i>
                <span class="small">￥5000</span>
            </li>
            <li id="price" class="amount-box">
                <i></i>
                <span class="small other-amount">
                    <input id="number" type="number" placeholder="其他金额" ng-init="onfocus=false"
                                                         ng-focus="onfocus==true" ng-model="order_params.other_amount"
                                                         ng-keydown="min_money()"
                                                         class="ng-pristine ng-untouched ng-valid ng-empty">
                </span>
            </li>
        </ul>

        <div class="shouxu">
            <div class="fl">余额：￥<?php echo ($_SESSION['user']['money']); ?></div>
            <div class="fr">手续费：<?php echo ($product["handing_fee"]); ?>%</div>
        </div>

        <table class="kinds">
            <tbody>
            <tr>
                <td>名称</td>
                <td>方向</td>
                <td>现价</td>
                <td>金额</td>
            </tr>
            <tr>
                <td class="goodstitle"><?php echo ($product["product_name"]); ?></td>
                <td class="order_type" id="kind"></td>
                <td class="now_price rise col-nowprice" id="buyPrice"><?php echo ($product["current"]); ?></td>
                <td id="money">100</td>
            </tr>
            </tbody>
        </table>

        <input class="submit" type="button" data-dataes="" onclick="addorders()" name="submit" value="确认下单">

        <div class="other">
            <div class="fl">预期收益：￥<span id="yuqi">185.00</span></div>
        </div>
    </div>
</div>

<!-- 确认订单结束 -->
<div class="trade-view">
    <div class="order_mengban" id="div2" style="width:100%;height:100%;">
        <div>
            <div>
                <div class="order-state-panel">
                    <div class="panel-header">
                        <div class="ng-binding goodstitle">

                            <div class="close" onclick="close_order() ">
                                <i class="icon ion-ios-close-empty "></i>
                            </div>
                        </div>
                    </div>

                    <div class="panel-body ">
                        <div class="paysuccess ng-hide " ng-show="order_result.status=='SUCCESS' ">
                            <div class="circle_wrapper " ng-show="order_params.cycle.time.indexOf( '-')==- 1 ">
                                <div class="right_circle ">
                                    <img class="img_circle_right " style="-webkit-animation: run 60s linear; "
                                         src="/Public/home/static/index/img/right_circle1.png ">
                                </div>
                                <div class="left_circle ">
                                    <img class="img_circle_lift " style="-webkit-animation: runaway 60s linear; "
                                         src="/Public/home/static/index/img/left_circle1.png ">
                                </div>
                            </div>
                            <div class="row remaining count_remaining "
                                 ng-show="order_params.cycle.time.indexOf( '-')==- 1 ">
                                <div class="col ">
                                    <div class="ng-binding pay_order_sen "></div>
                                    <div>现价</div>
                                    <div class="ng-binding newprice "></div>
                                </div>
                            </div>
                            <div class="pupil_success ng-hide " ng-show="order_params.cycle.time.indexOf( '-')>= 0">
                                <p>交易成功，等待结算</p>
                                <p class="ng-binding">
                                    <span>剩余时间：</span> 天Invalid Date
                                </p>
                            </div>
                            <div class="row info_list">
                                <div class="col col-15 first_info">
                                    <p>方向</p>
                                    <p class="ng-binding pay_order_type"></p>
                                </div>
                                <div class="col col-30">
                                    <p>金额</p>
                                    <p class="ng-binding">￥<span class="pay_order_price"></span></p>
                                </div>
                                <div class="col col-30">
                                    <p>执行价</p>
                                    <p class="ng-binding pay_order_buypricee"></p>
                                </div>
                                <div class="col col-25 last_info">
                                    <p>预测结果</p>
                                    <p class="ng-binding yuce"> ￥ </p>
                                </div>
                            </div>
                        </div>

                        <div class="wait" ng-show="order_result.status == 'POST'">
                            <div class="row">
                                <div class="col ng-binding">
                                    <i class="ion-paper-airplane iconfont icon-jijianfasong"></i> 请稍后……
                                </div>
                            </div>
                        </div>
                        <div class="fail ng-hide" ng-show="order_result.status == 'FAIL'">
                            <div class="row">
                                <div class="col ng-binding">
                                    <i class="ion-close-circled"></i> 正在提交订单
                                </div>
                            </div>
                        </div>

                        <div class="fail ng-hide order_fail" ng-show="order_result.status == 'FAIL'" style="">
                            <div class="row">
                                <div class="col ng-binding">
                                    <i class="ion-close-circled iconfont icon-close-circle-fill"></i>
                                    <span class="fail-info" style="font-size: 18px;color: #fff"></span>
                                </div>
                            </div>
                        </div>


                        <div class="ordersuccess ng-hide" style="">
                            <div class="row remaining finish_remaining">
                                <div class="col">
                                    <div class="result_profit ng-binding " style="">￥180</div>
                                    <div class="expired_statements">到期结算完成</div>
                                </div>
                            </div>
                            <div class="row info_list">
                                <div class="col col-15 first_info">
                                    <p>方向</p>
                                    <p class="ng-binding pay_order_type"></p>
                                </div>
                                <div class="col col-30">
                                    <p>金额</p>
                                    <p class="ng-binding">￥<span class="pay_order_price"></span></p>
                                </div>
                                <div class="col col-30">
                                    <p>执行价</p>
                                    <p class="ng-binding pay_order_buypricee"></p>
                                </div>

                                <div class="col col-25 last_info">
                                    <p>成交价</p>
                                    <p class="ng-binding rise endprice" style=""></p>
                                </div>
                            </div>
                        </div>


                        <div class="row button_row">
                            <div class="col">
                                <button class="button" onclick="continue_order()">继续下单</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- chichangmingxi -->
    <div class="trade-view">
        <div class="history-panel ng-hide" ng-include="1">
            <div class="panel-header chicangmingxi">
                <div class="close" onclick="toggle_history_order_panel()">
                    <i class="icon ion-ios-close-empty"></i>
                </div>
            </div>
            <div class="trade_history_list">
                <ion-scroll style="height: 100%" class="scroll-view ionic-scroll scroll-y">
                    <div class="scroll" style="transform: translate3d(0px, 0px, 0px) scale(1);">
                        <ul>
                            
                        </ul>
                        <!-- ngIf: has_more_order -->
                    </div>
                    <div class="scroll-bar scroll-bar-v">
                        <div class="scroll-bar-indicator scroll-bar-fade-out"
                             style="transform: translate3d(0px, 0px, 0px) scaleY(1); height: 0px;"></div>
                    </div>
                </ion-scroll>
            </div>
        </div>
    </div>
    <!-- chichangmingxi---end -->

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
    <script type="text/javascript" src="/Public/home/asset/js/lodash.min.js"></script>
    <script src="/Public/home/asset/js/chardata.js?2017"></script>
    <script src="/Public/home/asset/js/echarts.js"></script>
    <!--<script src="/Public/home/asset/js/m.js"></script>-->
</div>
<script>
    const SCOPE = {
        getProductUrl: '/Home/Product/getProduct',
        addOrder:"/Home/Order/add"
    };
    var order_type = 0;
    var order_pid = 12;
    var order_price = 100;
    var order_sen = 30;
    var order_shouyi = 88;
    var newprice = <?php echo ($product["current"]); ?>; //实时价格
    var rawData_data = [];
    var my_money = 0.00;
    var order_min_price = 100;
    var order_max_price = 10000;
</script>
<script>
    function addorders() {
        var buy_time=$(".active .miao").html();
        var data={
            "buy_time":buy_time,
            "product_id": $("#productId").val(),
            "price":$("#money").html(),
            "buy_price":$("#buyPrice").html(),
            "kind":$("#kind").html()
        };
        $.post(SCOPE.addOrder,data,function (res) {
            layer.alert(res.msg,{icon:res.icon},function () {
                location.reload();
            });
        },"json")
            .error(function (err) {
                layer.alert("异常错误",{icon:3});
            });
    }
</script>
</body>
</html>