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
                <h3 class="page-title">用户管理</h3>
                <div class="panel panel-profile">
                    <div class="clearfix">
                        <!-- LEFT COLUMN -->
                        <div class="profile-left">
                            <!-- PROFILE HEADER -->
                            <div class="profile-header">
                                <div class="overlay"></div>
                                <div class="profile-main">
                                    <img src="/Public<?php echo ($user["head_img"]); ?>" class="img-circle" alt="Avatar" width="80" height="80">
                                    <h3 class="name"><?php echo ($user["username"]); ?></h3>
                                </div>
                                <div class="profile-stat">
                                    <div class="row">
                                        <div class="col-md-6 stat-item">
                                            <span>金额</span>
                                            ￥<?php echo ($user["money"]); ?>
                                        </div>
                                        <div class="col-md-6 stat-item">
                                            <span>保证金</span>
                                            ￥<?php echo ($user["margin"]); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END PROFILE HEADER -->
                            <!-- PROFILE DETAIL -->
                            <div class="profile-detail">
                                <div class="profile-info">
                                    <h4 class="heading">详细信息</h4>
                                    <ul class="list-unstyled list-justify">
                                        <li>手机号 <span><?php echo ($user["phone"]); ?></span></li>
                                        <li>银行卡号 <span><?php echo (showUserMsg($user["bank_card_num"])); ?></span></li>
                                        <li>真实姓名 <span><?php echo (showUserMsg($user["true_name"])); ?></span></li>
                                        <li>身份证号 <span><?php echo (showUserMsg($user["true_id"])); ?></span></li>
                                        <li>注册时间 <span><?php echo (showDateTime($user["create_time"])); ?></span></li>
                                        <li>最后登陆时间 <span><?php echo (showDateTime($user["login_time"])); ?></span></li>
                                    </ul>
                                </div>
                            </div>
                            <!-- END PROFILE DETAIL -->
                        </div>
                        <!-- END LEFT COLUMN -->
                        <!-- RIGHT COLUMN -->
                        <div class="profile-right">
                            <h4 class="heading">交易记录</h4>
                            <!-- AWARDS -->
                            <div class="awards">
                                <div class="row">
                                    <div class="col-md-3 col-sm-6">
                                        <div class="award-item">
                                            <div class="hexagon">
                                                <span class="lnr lnr-sun award-icon"></span>
                                            </div>
                                            <span>Most Bright Idea</span>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-6">
                                        <div class="award-item">
                                            <div class="hexagon">
                                                <span class="lnr lnr-clock award-icon"></span>
                                            </div>
                                            <span>Most On-Time</span>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-6">
                                        <div class="award-item">
                                            <div class="hexagon">
                                                <span class="lnr lnr-magic-wand award-icon"></span>
                                            </div>
                                            <span>Problem Solver</span>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-6">
                                        <div class="award-item">
                                            <div class="hexagon">
                                                <span class="lnr lnr-heart award-icon"></span>
                                            </div>
                                            <span>Most Loved</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center"><a href="#" class="btn btn-default">See all awards</a></div>
                            </div>
                            <!-- END AWARDS -->
                            <!-- TABBED CONTENT -->
                            <div class="custom-tabs-line tabs-line-bottom left-aligned">
                                <ul class="nav" role="tablist">
                                    <li class="active"><a href="#tab-bottom-left1" role="tab" data-toggle="tab">充值记录</a></li>
                                    <li><a href="#tab-bottom-left2" role="tab" data-toggle="tab">提现记录</a></li>
                                </ul>
                            </div>
                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="tab-bottom-left1">
                                    <div class="table-responsive">
                                        <table class="table project-table">
                                            <thead>
                                            <tr>
                                                <th>充值单号</th>
                                                <th>汇款信息</th>
                                                <th>充值金额</th>
                                                <th>创建时间</th>
                                                <th>状态</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php if(is_array($recharges)): $i = 0; $__LIST__ = $recharges;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$recharge): $mod = ($i % 2 );++$i;?><tr>
                                                    <td><?php echo ($recharge["recharge_id"]); ?></td>
                                                    <td title="<?php echo ($recharge["detail"]); ?>"><?php echo (showLimitMsg($recharge["detail"])); ?></td>
                                                    <td class="text-danger">￥<?php echo ($recharge["money"]); ?></td>
                                                    <td><?php echo (showDateTime($recharge["create_time"])); ?></td>
                                                    <td <?php if($recharge["status"] == -1): ?>title="<?php echo ($recharge["msg"]); ?>"<?php endif; ?>><?php echo (showRechargeStatus($recharge["status"])); ?></td>
                                                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                                            </tbody>
                                        </table>
                                        <div class="pages">
                                            <?php echo ($rechargePage); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="tab-bottom-left2">
                                    <div class="table-responsive">
                                        <table class="table project-table">
                                            <thead>
                                            <tr>
                                                <th>提现单号</th>
                                                <th>提现金额</th>
                                                <th>创建时间</th>
                                                <th>状态</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php if(is_array($withdrawals)): $i = 0; $__LIST__ = $withdrawals;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$withdrawal): $mod = ($i % 2 );++$i;?><tr>
                                                    <td><?php echo ($withdrawal["withdrawal_id"]); ?></td>
                                                    <td class="text-danger">￥<?php echo ($withdrawal["money"]); ?></td>
                                                    <td><?php echo (showDateTime($withdrawal["create_time"])); ?></td>
                                                    <td <?php if($withdrawal["status"] == -1): ?>title="<?php echo ($withdrawal["msg"]); ?>"<?php endif; ?>><?php echo (showWithdrawalStatus($withdrawal["status"])); ?></td>
                                                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                                            </tbody>
                                        </table>
                                        <div class="pages">
                                            <?php echo ($withdrawalPage); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END TABBED CONTENT -->
                        </div>
                        <!-- END RIGHT COLUMN -->
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
<div class="load-tip"></div>
<!-- END WRAPPER -->
<!-- Javascript -->
<script src="/Public/admin/vendor/jquery/jquery.min.js"></script>
<script src="/Public/admin/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="/Public/admin/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="/Public/admin/scripts/klorofil-common.js"></script>
<script src="/Public/admin/scripts/main.js"></script>
<script>
    const SCOPE = {
        updatePwdUrl: '/Admin/admin/update',
    };
</script>
</body>
</html>