<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Kawandasawolu</title>

	<?php
	echo link_tag('assets/css/front.css');
	echo link_tag('assets/css/bootstrap.min.css');
	echo link_tag('assets/css/scrolling-nav.css');
	?>
</head>
<body style="background-image:url(assets/img/batik_grad.jpg); background-position:top right; background-size:cover">
<?php include('header_fixed.php');?>
<div class="container news-list" style="padding-top:120px;">
	<ol class="breadcrumb" style="margin-bottom: 5px;">
		<li><a href="/">Home</a></li>
		<li class="active">Member</li>
	</ol>
	<h1>Member Kawandasawolu</h1><br/>
	<div class="col-lg-2 col-md-3 col-sm-4 col-xs-6 member-list-item">
		<?php echo img(array('src'=>'assets/img/profile3.jpg','alt'=>'profile1','width'=>'100%','class'=>'img-profile'));?>
		<div class="member-item-info">
			<div>Willi Kristianto Febriana</div>
			<div>
				<?php echo img(array('src'=>'assets/img/fb.png','alt'=>'member social media'));?>
				<?php echo img(array('src'=>'assets/img/twitter.png','alt'=>'member social media'));?>
			</div>
		</div>
	</div>
	<div class="col-lg-2 col-md-3 col-sm-4 col-xs-6 member-list-item">
		<?php echo img(array('src'=>'assets/img/profile3.jpg','alt'=>'profile1','width'=>'100%','class'=>'img-profile'));?>
		<div class="member-item-info">
			<div>Nama</div>
			<div>
				<?php echo img(array('src'=>'assets/img/fb.png','alt'=>'member social media'));?>
				<?php echo img(array('src'=>'assets/img/twitter.png','alt'=>'member social media'));?>
			</div>
		</div>
	</div>
	<div class="col-lg-2 col-md-3 col-sm-4 col-xs-6 member-list-item">
		<?php echo img(array('src'=>'assets/img/profile3.jpg','alt'=>'profile1','width'=>'100%','class'=>'img-profile'));?>
		<div class="member-item-info">
			<div>Nama</div>
			<div>
				<?php echo img(array('src'=>'assets/img/fb.png','alt'=>'member social media'));?>
				<?php echo img(array('src'=>'assets/img/twitter.png','alt'=>'member social media'));?>
			</div>
		</div>
	</div>
	<div class="col-lg-2 col-md-3 col-sm-4 col-xs-6 member-list-item">
		<?php echo img(array('src'=>'assets/img/profile3.jpg','alt'=>'profile1','width'=>'100%','class'=>'img-profile'));?>
		<div class="member-item-info">
			<div>Nama</div>
			<div>
				<?php echo img(array('src'=>'assets/img/fb.png','alt'=>'member social media'));?>
				<?php echo img(array('src'=>'assets/img/twitter.png','alt'=>'member social media'));?>
			</div>
		</div>
	</div>
	<div class="col-lg-2 col-md-3 col-sm-4 col-xs-6 member-list-item">
		<?php echo img(array('src'=>'assets/img/profile3.jpg','alt'=>'profile1','width'=>'100%','class'=>'img-profile'));?>
		<div class="member-item-info">
			<div>Nama</div>
			<div>
				<?php echo img(array('src'=>'assets/img/fb.png','alt'=>'member social media'));?>
				<?php echo img(array('src'=>'assets/img/twitter.png','alt'=>'member social media'));?>
			</div>
		</div>
	</div>
	<div class="col-lg-2 col-md-3 col-sm-4 col-xs-6 member-list-item">
		<?php echo img(array('src'=>'assets/img/profile3.jpg','alt'=>'profile1','width'=>'100%','class'=>'img-profile'));?>
		<div class="member-item-info">
			<div>Nama</div>
			<div>
				<?php echo img(array('src'=>'assets/img/fb.png','alt'=>'member social media'));?>
				<?php echo img(array('src'=>'assets/img/twitter.png','alt'=>'member social media'));?>
			</div>
		</div>
	</div>
	<div class="col-lg-2 col-md-3 col-sm-4 col-xs-6 member-list-item">
		<?php echo img(array('src'=>'assets/img/profile3.jpg','alt'=>'profile1','width'=>'100%','class'=>'img-profile'));?>
		<div class="member-item-info">
			<div>Nama</div>
			<div>
				<?php echo img(array('src'=>'assets/img/fb.png','alt'=>'member social media'));?>
				<?php echo img(array('src'=>'assets/img/twitter.png','alt'=>'member social media','class'=>'img-profile'));?>
			</div>
		</div>
	</div>
	<div class="col-lg-2 col-md-3 col-sm-4 col-xs-6 member-list-item">
		<?php echo img(array('src'=>'assets/img/profile3.jpg','alt'=>'profile1','width'=>'100%','class'=>'img-profile'));?>
		<div class="member-item-info">
			<div>Nama</div>
			<div>
				<?php echo img(array('src'=>'assets/img/fb.png','alt'=>'member social media'));?>
				<?php echo img(array('src'=>'assets/img/twitter.png','alt'=>'member social media','class'=>'img-profile'));?>
			</div>
		</div>
	</div>
	<div class="col-lg-2 col-md-3 col-sm-4 col-xs-6 member-list-item">
		<?php echo img(array('src'=>'assets/img/profile3.jpg','alt'=>'profile1','width'=>'100%','class'=>'img-profile'));?>
		<div class="member-item-info">
			<div>Nama</div>
			<div>
				<?php echo img(array('src'=>'assets/img/fb.png','alt'=>'member social mÏedia'));?>
				<?php echo img(array('src'=>'assets/img/twitter.png','alt'=>'member social media'));?>
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