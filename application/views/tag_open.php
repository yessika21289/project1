<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
	<title><?php echo $title;?> | Kawandasawolu</title>

	<?php
	echo link_tag('/assets/css/front.css');
	echo link_tag('/assets/css/bootstrap.min.css');
	echo link_tag('/assets/css/scrolling-nav.css');
	echo link_tag('/assets/css/font-awesome.min.css');
	echo link_tag('https://fonts.googleapis.com/css?family=Alex+Brush');
	?>
</head>
<body>
<?php include('header_fixed.php');?>