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
<body style="background-image:url(/assets/img/batik_grad.jpg); background-position:top right; background-size:cover">
<?php include('header_fixed.php');?>
<div class="container news-list" style="height:1000px;padding-top:120px;">
	<ol class="breadcrumb" style="margin-bottom: 5px;">
		<li><a href="/">Home</a></li>
		<li class="active">Song</li>
	</ol>
	<h1>Song</h1><br/>
	<div class="col-lg-4 col-md-6 col-sm-6 col-xs-12" style="margin-bottom:20px">
		<div class="song-cover" style="width:100px">
			<img src="/assets/img/scene.jpeg" width="100" height="100" />
		</div>
		<div class="song-desc">
			<h4>Judul</h4>
			Tahun:<br/>
			Lirik
		</div>
	</div>
	<div class="col-lg-4 col-md-6 col-sm-6 col-xs-12" style="margin-bottom:20px">
		<div class="song-cover" style="width:100px">
			<img src="/assets/img/scene.jpeg" width="100" height="100" />
		</div>
		<div class="song-desc">
			<h4>Judul</h4>
			Tahun:<br/>
			Lirik
		</div>
	</div>
	<div class="col-lg-4 col-md-6 col-sm-6 col-xs-12" style="margin-bottom:20px">
		<div class="song-cover" style="width:100px">
			<img src="/assets/img/scene.jpeg" width="100" height="100" />
		</div>
		<div class="song-desc">
			<h4>Judul</h4>
			Tahun:<br/>
			Lirik
		</div>
	</div>
</div>
<script type="text/javascript" src="/assets/js/jquery-2.2.0.min.js"></script>
<script type="text/javascript" src="/assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/assets/js/skrollr.min.js"></script>
<script type="text/javascript" src="/assets/js/scrolling-nav.js"></script>
</body>
</html>