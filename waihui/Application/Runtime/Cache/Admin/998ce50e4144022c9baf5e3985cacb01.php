<?php if (!defined('THINK_PATH')) exit();?>    <!DOCTYPE html>
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
                <h3 class="page-title">产品管理</h3>
                <div>
                    <!-- BORDERED TABLE -->
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">产品信息编辑</h3>
                        </div>
                        <div class="panel-body">
                            <form id="form" action="/Admin/Product/update" method="post">
                                <input type="hidden" name="id" value="<?php echo ($product["id"]); ?>">
                                <div class="row row-height">
                                    <div class="col-sm-2 text-right">产品名称：</div>
                                    <div class="col-sm-10 form-inline"><input name="product_name" class="form-control" type="text" value="<?php echo ($product["product_name"]); ?>"></div>
                                </div>
                                <div class="row row-height">
                                    <div class="col-sm-2 text-right">当前值：</div>
                                    <div class="col-sm-10 form-inline"><input name="current" class="form-control" type="text" value="<?php echo ($product["current"]); ?>"></div>
                                </div>
                                <div class="row row-height">
                                    <div class="col-sm-2 text-right">最低值：</div>
                                    <div class="col-sm-10 form-inline"><input name="lowest" class="form-control" type="text" value="<?php echo ($product["lowest"]); ?>"></div>
                                </div>
                                <div class="row row-height">
                                    <div class="col-sm-2 text-right">最高值：</div>
                                    <div class="col-sm-10 form-inline"><input name="highest" class="form-control" type="text" value="<?php echo ($product["highest"]); ?>"></div>
                                </div>
                                <div class="row row-height">
                                    <div class="col-sm-2 text-right">开盘：</div>
                                    <div class="col-sm-10 form-inline"><input name="open" class="form-control" type="text" value="<?php echo ($product["open"]); ?>"></div>
                                </div>
                                <div class="row row-height">
                                    <div class="col-sm-2 text-right">昨收：</div>
                                    <div class="col-sm-10 form-inline"><input name="income" class="form-control" type="text" value="<?php echo ($product["income"]); ?>"></div>
                                </div>
                                <div class="row row-height">
                                    <div class="col-sm-2 text-right">手续费：</div>
                                    <div class="col-sm-10 form-inline form-group">
                                        <div class="input-group">
                                            <input name="handing_fee" type="text" class="form-control" id="handle" aria-describedby="handle" value="<?php echo ($product["handing_fee"]); ?>" size="14">
                                            <span class="input-group-addon">%</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row row-height">
                                    <div class="col-sm-2 text-right">实时图外链：</div>
                                    <div class="col-sm-10"><input name="url" class="form-control" type="text" value="<?php echo ($product["url"]); ?>"></div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-2 text-right">前台是否可见：</div>
                                    <div class="col-sm-10">
                                        <label class="radio-inline">
                                            <input type="radio" name="enable" value="1" <?php if($product["enable"] == 1): ?>checked<?php endif; ?>> 显示
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="enable" value="0" <?php if($product["enable"] == 0): ?>checked<?php endif; ?>> 隐藏
                                        </label>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-sm-2"></div>
                                    <div class="col-sm-10">
                                        <input type="submit" class="btn btn-primary" value="确认修改">
                                    </div>
                                </div>
                            </form>
                        </div>
                        <br><br><br><br><br><br>
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
<div id="imageSelect" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="imageSelect">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">图片选择</h4>
            </div>
            <div class="modal-body">
                <?php if(is_array($images)): $i = 0; $__LIST__ = $images;if( count($__LIST__)==0 ) : echo "服务器当前没有图片" ;else: foreach($__LIST__ as $key=>$image): $mod = ($i % 2 );++$i;?><a class="image-select text-center" onclick="selectImg(this)">
                        <img src="/Public<?php echo ($image); ?>" alt="" width="60">
                    </a><?php endforeach; endif; else: echo "服务器当前没有图片" ;endif; ?>
                <div class="clearfix"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                <button type="button" class="btn btn-primary" data-dismiss="modal">确认</button>
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
<script>
    const SCOPE = {
        updatePwdUrl: '/Admin/admin/update',
        deleteDataUrl: '/Admin/Product/del',
        showDataUrl: '/Admin/Product/detail',
        imageUploadUrl: '/Admin/image/upload'
    };

    function openFileSelect() {
        $("#btn_file").click();
    }

    function selectImg(ref) {
        var imgSrc = $(ref).children('img').attr('src');
        $("#preview").attr('src', imgSrc);
        var pub = "Public";
        $("#area").val(imgSrc.substr(imgSrc.indexOf(pub) + pub.length));
    }

    $("#btn_file").on("change", function () {
        var img = this.files[0];
        if (img) {
            var formData = new FormData();
            formData.append("area_img", img);
            $.ajax({
               url: SCOPE.imageUploadUrl,
                type: 'post',
                data: formData,
                dataType: 'json',
                processData: false,
                contentType: false,
                success: function (res) {
                    showTip(res.msg);
                    if (res.code === 0) {
                        $("#preview").attr('src', '/Public' + res.url);
                        $("#area").val(res.url);
                    }
                },
                error: function (err) {
                    showTip('请求失败');
                }
            });
        } else {
            alert('请选择图片');
        }
    })
</script>
</body>
</html>