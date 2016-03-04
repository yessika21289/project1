<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
	<title>Kawandasawolu</title>

	<?php
	echo link_tag('assets/css/front.css');
	echo link_tag('assets/css/bootstrap.min.css');
	echo link_tag('assets/css/scrolling-nav.css');
	echo link_tag('/assets/css/font-awesome.min.css');
	?>
</head>
<body style="background-image:url(assets/img/batik_grad.jpg); background-position:top right; background-size:cover">
<?php include('header_fixed.php');?>
<div class="container news-list" style="padding-top:120px;">
	<ol class="breadcrumb" style="margin-bottom: 5px;">
		<li><a href="/">Home</a></li>
		<li class="active">About Us</li>
	</ol>
	<h1>About Kawandasawolu</h1><br/>
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="text-align:left; font-size:1.7em; margin-bottom:25px;">
		<i class="fa fa-quote-left" style="font-size:3em"></i>
		Lorem ipsum dolor sit amet, consectetur adipiscing elit,sdfdafaf af adsfsafsafas
	</div>
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."
	</div>
</div>
<?php include('footer.php');?>
<script type="text/javascript" src="assets/js/jquery-2.2.0.min.js"></script>
<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="assets/js/skrollr.min.js"></script>
<script type="text/javascript" src="/assets/js/scrolling-nav.js"></script>
</body>
</html>