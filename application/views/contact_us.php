<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
	<title>Kawandasawolu</title>

	<?php
	echo link_tag('/assets/css/front.css');
	echo link_tag('/assets/css/bootstrap.min.css');
	echo link_tag('/assets/css/scrolling-nav.css');
	echo link_tag('/assets/css/font-awesome.min.css');
	echo link_tag('https://fonts.googleapis.com/css?family=Alex+Brush');

	?>
</head>
<body style="background-color:#EEEEEE">
<?php include('header_fixed.php');?>
<div class="container news-list" style="padding-top:120px;">
	<ol class="breadcrumb" style="margin-bottom: 5px;">
		<li><a href="/">Home</a></li>
		<li class="active">Contact Us</li>
	</ol>
	<h1 style="font-family:'Alex Brush'; font-size:60px;">Contact Kawandasawolu</h1>
	<div class="col-sm-7 col-xs-12" style="margin-bottom:25px;">
	Kami sangat menantikan Anda. Silakan isi form di bawah ini untuk menghubungi kami.
	<?php echo form_open(base_url().'contact/send');?>
		Nama<br/>
		<?php echo form_input($form_nama);?>
		Email<br/>
		<?php echo form_input($form_email);?>
		Subject<br/>
		<?php echo form_input($form_subject);?>
		Pesan<br/>
		<?php echo form_textarea($form_msg);?>
		<?php echo form_submit($form_submit);?>
	</div>
	<div class="col-sm-5 col-xs-12">
		<div style="margin-bottom:10px; text-align:right">
			<img src="/assets/img/fb_big.png" width="32" />&nbsp;&nbsp;&nbsp;
			<img src="/assets/img/twitter.png" width="32" />&nbsp;&nbsp;&nbsp;
			<img src="/assets/img/instagram.png" width="32" />

		</div>
		<div style="margin-bottom:10px; text-align:right">
			<div>
				<div style="color:#999999; margin-bottom:-10px;">Phone</div>
				+62 1234567578536
			</div>
			<div>
				<div style="color:#999999; margin-bottom:-10px;">Email</div>
				kawandasawolu@gmail.com
			</div>
		</div>
	</div>
</div>
<?php include('footer.php');?>
<script type="text/javascript" src="assets/js/jquery-2.2.0.min.js"></script>
<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="assets/js/skrollr.min.js"></script>
<script type="text/javascript" src="/assets/js/scrolling-nav.js"></script>
</body>
</html>