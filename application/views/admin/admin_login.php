<!DOCTYPE html>
<html lang="en">
<head>
    <meta name=”robots” content=”noindex,nofollow”>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
    <meta name="author" content="GeeksLabs">
    <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
    <link rel="shortcut icon" href="assets/img/favicon.png">

    <title>Admin Login</title>

    <!-- Bootstrap CSS -->    
    <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.v3.0.0.css" rel="stylesheet">
    <!-- bootstrap theme -->
    <link href="<?php echo base_url(); ?>assets/css/bootstrap-theme.css" rel="stylesheet">
    <!--external css-->
    <!-- font icon -->
    <link href="<?php echo base_url(); ?>assets/css/elegant-icons-style.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>assets/css/font-awesome.css" rel="stylesheet" />
    <!-- Custom styles -->
    <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/style-responsive.css" rel="stylesheet" />

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 -->
    <!--[if lt IE 9]>
    <script src="<?php echo base_url(); ?>assets/js/html5shiv.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/respond.min.js"></script>
    <![endif]-->
</head>

  <body>
    <div id="banner" style="z-index: 0;">
        <div style="height:30%">
            <img src="<?php echo base_url(); ?>assets/img/triangle_ornament.png" height="100%" />
        </div>
        <div class="col-xs-12" style="position: absolute; top:0; text-align: center">
            <img src="<?php echo base_url(); ?>assets/img/logojawa2.png" height="100%" />
        </div>
        <div style="height:40%; position: absolute; bottom: 0; left:0; z-index: -1;">
            <img src="<?php echo base_url(); ?>assets/img/clouds.png" height="100%" style="z-index: -2;" />
        </div>
        <div style="height: 30%; position: absolute; bottom: 0; left: 0">
            <img src="<?php echo base_url(); ?>assets/img/becak_tugu_pohon.png" height="100%" style="z-index: -3;" />
        </div>
    <div class="container">

      <form class="login-form" action="<?php echo base_url(); ?>myadminkw/login" enctype="multipart/form-data" method="post">
        <div class="login-wrap">
            <p class="login-img"><i class="icon_lock_alt"></i></p>
            <div class="input-group">
              <span class="input-group-addon"><i class="icon_profile"></i></span>
              <input type="text" class="form-control" placeholder="Username" name="username" autofocus>
            </div>
            <div class="input-group">
                <span class="input-group-addon"><i class="icon_key_alt"></i></span>
                <input type="password" class="form-control" placeholder="Password" name="password">
            </div>
            <?php
            if(isset($msg))
            {
                echo $msg;
            }
            ?>
            <label class="checkbox">
                <input type="checkbox" value="1" name="remember_me"> Remember me
                <span class="pull-right"> <a href="#"> Forgot Password?</a></span>
            </label>
            <button class="btn btn-primary btn-lg btn-block" type="submit">Login</button>
        </div>
      </form>

    </div>
    </div>

  </body>
</html>