<!DOCTYPE html>
<html lang="en">
<head>
    <meta name=”robots” content=”noindex,nofollow”>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Kawandasawolu Admin">
    <meta name="author" content="Willi Kristianto, Yessika Naftali Budiono">
    <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
    <link rel="shortcut icon" href="<?php echo base_url(); ?>img/favicon.png">

    <title>Kawandasawolu Admin</title>

    <!-- Bootstrap CSS -->
    <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.v3.0.0.css" rel="stylesheet">
    <!-- bootstrap theme -->
    <link href="<?php echo base_url(); ?>assets/css/bootstrap-theme.css" rel="stylesheet">
    <!--external css-->
    <!-- font icon -->
    <link href="<?php echo base_url(); ?>assets/css/elegant-icons-style.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>assets/css/font-awesome.min.css" rel="stylesheet" />
    <!-- full calendar css-->
    <link href="<?php echo base_url(); ?>assets/fullcalendar/fullcalendar/bootstrap-fullcalendar.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>assets/fullcalendar/fullcalendar/fullcalendar.css" rel="stylesheet" />
    <!-- easy pie chart-->
    <link href="<?php echo base_url(); ?>assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen"/>
    <!-- owl carousel -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/owl.carousel.css" type="text/css">
    <link href="<?php echo base_url(); ?>assets/css/jquery-jvectormap-1.2.2.css" rel="stylesheet">
    <!-- Custom styles -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/fullcalendar.css">

    <link href="<?php echo base_url(); ?>assets/css/widgets.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/style-responsive.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>assets/css/xcharts.min.css" rel=" stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/jquery-ui-1.10.4.min.css" rel="stylesheet">
    <!-- Bootstrap Date Picker-->
    <link href="<?php echo base_url(); ?>assets/css/bootstrap-datepicker3.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/admin.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 -->
    <!--[if lt IE 9]>
    <script src="<?php echo base_url(); ?>assets/js/html5shiv.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/respond.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/lte-ie7.js"></script>
    <![endif]-->
</head>

<body>
<?php date_default_timezone_set('Asia/Jakarta');?>
<!-- container section start -->
<section id="container" class="">
    <header class="header dark-bg">
        <div class="toggle-nav">
            <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom">
                <i class="icon_menu"></i>
            </div>
        </div>

        <!--logo start-->
        <a href="<?php echo base_url(); ?>Admin" class="logo">
            <img src="<?php echo base_url() ?>assets/img/logo_header.png">
            <span class="lite"> Admin</span></a>
        <!--logo end-->


        <div class="top-nav notification-row">
                    <span class="username">Welcome, Admin!</span>
                    <a href="<?php echo base_url(); ?>myadminkw/logout" class="username pull-right">
                    <small>(Log Out)</small></a>
        </div>
    </header>
    <!--header end-->