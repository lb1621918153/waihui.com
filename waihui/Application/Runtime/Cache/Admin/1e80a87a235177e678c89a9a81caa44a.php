<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <title>外汇学习管理中心</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <!-- VENDOR CSS -->
    <link rel="stylesheet" href="/Public/admin/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/Public/admin/vendor/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="/Public/admin/vendor/linearicons/style.css">
    <!-- MAIN CSS -->
    <link rel="stylesheet" href="/Public/admin/css/main.css">
    <!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
    <link rel="stylesheet" href="/Public/admin/css/demo.css">
    <link rel="stylesheet" href="/Public/admin/css/custom.css">
    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
    <!-- ICONS -->
    <link rel="apple-touch-icon" sizes="76x76" href="/Public/admin/img/apple-icon.png">
    <link rel="icon" type="image/png" sizes="96x96" href="/Public/admin/img/favicon.png">
</head>

<body>
    <!-- WRAPPER -->
    <div id="wrapper">
        <!-- NAVBAR -->
        <nav class="navbar navbar-default navbar-fixed-top">
    <div class="brand">
        <a href="/Admin"><img src="/Public/admin/img/logo-dark.png" alt="WaiHui Logo" class="img-responsive logo"></a>
    </div>
    <div class="container-fluid">
        <div class="navbar-btn">
            <button type="button" class="btn-toggle-fullwidth"><i class="lnr lnr-arrow-left-circle"></i></button>
        </div>
        <div id="navbar-menu">
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <span><?php echo ($_SESSION['admin']['account']); ?></span> <i class="icon-submenu lnr lnr-chevron-down"></i>
                    </a>
                    <ul class="dropdown-menu">
                        <li data-target="#updatePwd" data-toggle="modal"><a href="javascript:;"><i class="lnr lnr-cog"></i> <span>修改密码</span></a></li>
                        <li><a href="/Admin/login/logout"><i class="lnr lnr-exit"></i> <span>注销</span></a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
        <!-- END NAVBAR -->
        <!-- LEFT SIDEBAR -->
        <div id="sidebar-nav" class="sidebar">
    <div class="sidebar-scroll">
        <nav>
            <ul class="nav">
                <li><a href="/Admin/Index"
                    <?php if(CONTROLLER_NAME == 'Index'): ?>class="active"<?php endif; ?>><i class="lnr lnr-home"></i> <span>仪表盘</span></a></li>
                <li><a href="/Admin/BankCard"
                    <?php if(CONTROLLER_NAME == 'BankCard'): ?>class="active"<?php endif; ?>><i class="fa fa-credit-card"></i> <span>银行卡号管理</span></a></li>
                <li><a href="/Admin/Calendar"
                    <?php if(CONTROLLER_NAME == 'Calendar'): ?>class="active"<?php endif; ?>><i class="lnr lnr-calendar-full"></i> <span>财经日历管理</span></a></li>
                <li><a href="/Admin/News"
                    <?php if(CONTROLLER_NAME == 'News'): ?>class="active"<?php endif; ?>><i class="lnr lnr-file-empty"></i> <span>新闻管理</span></a></li>
                <li><a href="/Admin/Product"
                    <?php if(CONTROLLER_NAME == 'Product'): ?>class="active"<?php endif; ?>><i class="lnr lnr-inbox"></i> <span>产品管理</span></a></li>
                <li><a href="/Admin/Order"
                    <?php if(CONTROLLER_NAME == 'Order'): ?>class="active"<?php endif; ?>><i class="fa fa-file-text"></i> <span>订单管理</span></a></li>
                <li><a href="/Admin/Withdrawal"
                    <?php if(CONTROLLER_NAME == 'Withdrawal'): ?>class="active"<?php endif; ?>><i class="lnr lnr-text-format"></i> <span>提现管理</span></a></li>
                <li><a href="/Admin/Recharge"
                    <?php if(CONTROLLER_NAME == 'Recharge'): ?>class="active"<?php endif; ?>><i class="lnr lnr-linearicons"></i> <span>充值管理</span></a></li>
                <li><a href="/Admin/User"
                    <?php if(CONTROLLER_NAME == 'User'): ?>class="active"<?php endif; ?>><i class="lnr lnr-users"></i> <span>用户管理</span></a></li>
                <li><a href="/Admin/Admin"
                    <?php if(CONTROLLER_NAME == 'Admin'): ?>class="active"<?php endif; ?>><i class="lnr lnr-user"></i> <span>管理员管理</span></a></li>
            </ul>
        </nav>
    </div>
</div>
        <!-- END LEFT SIDEBAR -->
        <!-- MAIN -->
        <div class="main">
            <!-- MAIN CONTENT -->
            <div class="main-content">
                <div class="container-fluid">
                    <h3 class="page-title">订单管理</h3>
                    <div>
                        <!-- BORDERED TABLE -->
                        <div class="panel">
                            <div class="panel-heading">
                                <h3 class="panel-title">订单信息表</h3>
                            </div>
                            <div class="panel-body">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>订单号</th>
                                            <th>用户名</th>
                                            <th>商品名</th>
                                            <th>充值价格</th>
                                            <th>涨|跌</th>
                                            <th>状态</th>
                                            <th>创建时间</th>
                                            <th>交易时长</th>
                                            <th width="200">操作</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if(is_array($orders)): $i = 0; $__LIST__ = $orders;if( count($__LIST__)==0 ) : echo "$empty" ;else: foreach($__LIST__ as $key=>$order): $mod = ($i % 2 );++$i;?><tr class="user-table-font-size">
                                                <td><?php echo ($order["order_id"]); ?></td>
                                                <td><?php echo ($order["username"]); ?></td>
                                                <td><?php echo ($order["product_name"]); ?></td>
                                                <td><?php echo ($order["price"]); ?></td>
                                                <td><?php echo ($order["kind"]); ?></td>
                                                <!--<td><?php echo ($order["sellprice"]); ?></td>-->
                                                <td><?php echo (showOrderStatus($order["status"])); ?></td>
                                                <td><?php echo ($order["create_time"]); ?></td>
                                                <td style="text-align:right;"><?php echo ($order["buy_time"]); ?>秒</td>
                                                <td>
                                                    <button <?php if($order["status"] != 0): ?>disabled<?php endif; ?> type="button" class="btn btn-default order_id" data-id="<?php echo ($order["order_id"]); ?>" data-toggle="modal" data-target="#writeIntro" onclick="refuse(this)">
                                           结算
                                            </button>
                                                    <button type="button" id="order" data-id=<?php echo ($order["order_id"]); ?> class="btn btn-primary" onclick="showOrder(this)">
                                            查看
                                            </button>
                                                </td>
                                            </tr><?php endforeach; endif; else: echo "$empty" ;endif; ?>
                                    </tbody>
                                </table>

                                <div class="pages">
                                    <?php echo ($page); ?>
                                </div>
                            </div>
                            <!-- END BORDERED TABLE -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- END MAIN CONTENT -->
        </div>
        <!-- END MAIN -->
            <div class="clearfix"></div>
    <footer>
        <div class="container-fluid">
            <p class="copyright">Copyright &copy; 2018.Company name All rights reserved. 外汇学习中心 - Collect
                from</p>
        </div>
    </footer>
</div>
<div id="updatePwd" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="updatePwd">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">修改密码</h4>
            </div>
            <div class="modal-body">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-lock" aria-hidden="true"></i></span>
                    <input id="oldPwd" class="form-control" placeholder="原密码" type="password">
                </div>
                <br>
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-lock" aria-hidden="true"></i></span>
                    <input id="newPwd1" class="form-control" placeholder="新密码" type="password">
                </div>
                <br>
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-lock" aria-hidden="true"></i></span>
                    <input id="newPwd2" class="form-control" placeholder="确认密码" type="password">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                <button type="button" class="btn btn-primary" onclick="updatePwd()" data-dismiss="modal">修改</button>
            </div>
        </div>
    </div>
</div>
<div class="load-tip"></div>
    </div>
    <div id="writeIntro" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="writeIntro">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">填写结算价格</h4>
                    <span>注意:该结算价格为已经扣除手续费的价格</span>
                </div>
                <input type="hidden" id="order_id1">
                <div class="modal-body">
                    结算价:<input class="sellprice" type="text">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                    <button id="refuseBtn" type="button" class="btn btn-primary" data-id="<?php echo ($order["order_id"]); ?>" onclick="sell(this)">确认</button>
                </div>
            </div>
        </div>
    </div>
    <!-- END WRAPPER -->
    <!-- Javascript -->
    <script src="/Public/admin/vendor/jquery/jquery.min.js"></script>
<script src="/Public/admin/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="/Public/admin/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="/Public/admin/scripts/klorofil-common.js"></script>
<script src="/Public/admin/scripts/main.js"></script>
    <script src="/Public/home/asset/layer/layer.js"></script>
    <script>
        const SCOPE = {
            showDataUrl: '/Admin/Order/detail/id/',
            sellDataUrl: '/Admin/Order/sell'
        };

        function refuse(obj) {
            var id = $(obj).attr("data-id");
            $("#order_id1").val(id);
        }

        function showOrder(obj) {
            var id = $(obj).attr("data-id");
            location.href = SCOPE.showDataUrl + id;
        }

        function sell(obj) {
            var id = $("#order_id1").val();
            var sellprice = $(".sellprice").val();
            var data = {
                "id": id,
                "sellprice": sellprice
            };
            $.post(SCOPE.sellDataUrl, data, function(res) {
                    layer.alert(res["msg"], {
                        icon: res["icon"]
                    }, function() {
                        location.reload();
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