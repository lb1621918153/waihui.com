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
<link rel="stylesheet" href="/Public/admin/vendor/chartist/css/chartist-custom.css">
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
                <!-- OVERVIEW -->
                <div class="panel panel-headline">
                    <div class="panel-heading">
                        <h3 class="panel-title">站点详情</h3>
                        <p class="panel-subtitle">2018/09/10 - <?php echo ($today); ?></p>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="metric">
                                    <span class="icon"><i class="fa fa-user"></i></span>
                                    <p>
                                        <span class="number"><?php echo (num_format($userCount)); ?></span>
                                        <span class="title">用户</span>
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="metric">
                                    <span class="icon"><i class="fa fa-shopping-bag"></i></span>
                                    <p>
                                        <span class="number"><?php echo ($orderCount); ?></span>
                                        <span class="title">订单</span>
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="metric">
                                    <span class="icon"><i class="lnr lnr-linearicons"></i></span>
                                    <p>
                                        <span class="number"><?php echo (num_format($rechargeCount)); ?></span>
                                        <span class="title">充值</span>
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="metric">
                                    <span class="icon"><i class="fa fa-university"></i></span>
                                    <p>
                                        <span class="number"><?php echo (num_format($withdrawalCount)); ?></span>
                                        <span class="title">提现</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div>
                            <h3 class="text-center">近一周本网站的用户登陆情况</h3>
                            <br>
                            <!-- 近一周用户登陆情况 -->
                            <div id="headline-chart" class="ct-chart"></div>
                        </div>
                    </div>
                </div>
                <!-- END OVERVIEW -->
                <div class="row">
                    <div class="col-md-6">
                        <!-- RECENT PURCHASES -->
                        <div class="panel">
                            <div class="panel-heading">
                                <h3 class="panel-title">近期充值请求</h3>
                                <div class="right">
                                    <button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i>
                                    </button>
                                    <button type="button" class="btn-remove"><i class="lnr lnr-cross"></i></button>
                                </div>
                            </div>
                            <div class="panel-body no-padding">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>充值单号</th>
                                        <th>用户</th>
                                        <th>充值金额</th>
                                        <th>时间</th>
                                        <th>状态</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php if(is_array($recharges)): $i = 0; $__LIST__ = $recharges;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$recharge): $mod = ($i % 2 );++$i;?><tr>
                                            <td><?php echo ($recharge["recharge_id"]); ?></td>
                                            <td><a href="/Admin/User/detail?id=<?php echo ($recharge["user_id"]); ?>"><?php echo ($recharge["username"]); ?></a></td>
                                            <td>￥<?php echo ($recharge["money"]); ?></td>
                                            <td><?php echo (showDateTime($recharge["create_time"])); ?></td>
                                            <td <?php if($recharge["status"] == -1): ?>title="<?php echo ($recharge["msg"]); ?>"<?php endif; ?>><?php echo (showRechargeStatus($recharge["status"])); ?></td>
                                        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="panel-footer">
                                <div class="row">
                                    <div class="col-md-6"></span>
                                    </div>
                                    <div class="col-md-6 text-right"><a href="/Admin/Recharge" class="btn btn-primary">查看所有充值信息</a></div>
                                </div>
                            </div>
                        </div>
                        <!-- END RECENT PURCHASES -->
                    </div>
                    <div class="col-md-6">
                        <!-- MULTI CHARTS -->
                        <div class="panel">
                            <div class="panel-heading">
                                <h3 class="panel-title">近期提现请求</h3>
                                <div class="right">
                                    <button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i>
                                    </button>
                                    <button type="button" class="btn-remove"><i class="lnr lnr-cross"></i></button>
                                </div>
                            </div>
                            <div class="panel-body no-padding">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>提现单号</th>
                                        <th>用户</th>
                                        <th>提现金额</th>
                                        <th>时间</th>
                                        <th>状态</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php if(is_array($withdrawals)): $i = 0; $__LIST__ = $withdrawals;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$withdrawal): $mod = ($i % 2 );++$i;?><tr>
                                            <td><?php echo ($recharge["recharge_id"]); ?></td>
                                            <td><a href="/Admin/User/detail?id=<?php echo ($withdrawal["user_id"]); ?>"><?php echo ($withdrawal["username"]); ?></a></td>
                                            <td>￥<?php echo ($withdrawal["money"]); ?></td>
                                            <td><?php echo (showDateTime($withdrawal["create_time"])); ?></td>
                                            <td <?php if($withdrawal["status"] == -1): ?>title="<?php echo ($withdrawal["msg"]); ?>"<?php endif; ?>><?php echo (showWithdrawalStatus($withdrawal["status"])); ?></td>
                                        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="panel-footer">
                                <div class="row">
                                    <div class="col-md-6"></span>
                                    </div>
                                    <div class="col-md-6 text-right"><a href="/Admin/Withdrawal" class="btn btn-primary">查看所有提现信息</a></div>
                                </div>
                            </div>
                        </div>
                        <!-- END MULTI CHARTS -->
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
<!-- END WRAPPER -->
<!-- Javascript -->
<script src="/Public/admin/vendor/jquery/jquery.min.js"></script>
<script src="/Public/admin/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="/Public/admin/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="/Public/admin/scripts/klorofil-common.js"></script>
<script src="/Public/admin/scripts/main.js"></script>
<script src="/Public/admin/vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js"></script>
<script src="/Public/admin/vendor/chartist/js/chartist.min.js"></script>
<script>
    $(function () {
        var data, options;
        // headline charts
        data = {
            // labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
            labels: [<?php if(is_array($loginMsg["label"])): $i = 0; $__LIST__ = $loginMsg["label"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$label): $mod = ($i % 2 );++$i;?>'<?php echo ($label); ?>',<?php endforeach; endif; else: echo "" ;endif; ?>],
            series: [
                [<?php if(is_array($loginMsg["data"])): $i = 0; $__LIST__ = $loginMsg["data"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?>'<?php echo ($data); ?>',<?php endforeach; endif; else: echo "" ;endif; ?>]
            ]
        };

        options = {
            height: "300px",
            showPoint: true,
            axisX: {
                showGrid: false
            },
            lineSmooth: false,
        };
        new Chartist.Line('#headline-chart', data, options);
    });
</script>
</body>
</html>