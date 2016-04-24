<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta name=”robots” content=”noindex,nofollow”>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
	<title><?php echo $title;?> | Kawandasawolu</title>
	<link rel="icon" href="/assets/img/faviconkw.ico?" type="image/x-icon">
	<?php
	echo link_tag('/assets/css/front.css');
	echo link_tag('/assets/css/bootstrap.min.v3.6.6.css');
	echo link_tag('/assets/css/bootstrap-ms.css');
	echo link_tag('/assets/css/scrolling-nav.css');
	echo link_tag('/assets/css/font-awesome.min.css');
	echo link_tag('/assets/jquery-fancybox/jquery.fancybox.css');
	//echo link_tag('https://fonts.googleapis.com/css?family=Alex+Brush');
	?>
	<script type="text/javascript" src="/assets/js/jquery-2.2.0.min.js"></script>
</head>
<body>
<?php include('header_fixed.php');?>