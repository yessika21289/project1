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
	echo link_tag('assets/css/bootstrap-ms.css');
	echo link_tag('assets/css/scrolling-nav.css');
	?>
</head>
<body style="background-image:url(/assets/img/batik_grad.jpg); background-position:top right; background-size:cover">
<?php include('header_fixed.php');?>
<div class="container news-list" style="height:1000px;padding-top:120px;">
	<ol class="breadcrumb" style="margin-bottom: 5px;">
		<li><a href="/">Home</a></li>
		<li class="active">Galeri</li>
	</ol>
	<h1>Galeri</h1><br/>
	<div class="col-md-6 col-sm-4 col-ms-6 col-xs-12 album-cover">
		<img src="/assets/img/kawandasawolu.jpg" width="100%">
		<div class="album-cover-desc">
			<div>
				asdfadfdasfds asdf
			</div>
		</div>
	</div>
	<div class="col-md-3 col-sm-4 col-ms-6 col-xs-12 album-cover">
		<img src="/assets/img/kawandasawolu.jpg" width="100%">
		<div class="album-cover-desc">
			<div>
				asdfadfdasfds asdfafad
			</div>
		</div>
	</div>
	<div class="col-md-3 col-sm-4 col-ms-6 col-xs-12 album-cover">
		<img src="/assets/img/kawandasawolu.jpg" width="100%">
	</div>
	<div class="col-md-3 col-sm-4 col-ms-6 col-xs-12 album-cover">
		<img src="/assets/img/kawandasawolu.jpg" width="100%">
	</div>
	<div class="col-md-3 col-sm-4 col-ms-6 col-xs-12 album-cover">
		<img src="/assets/img/kawandasawolu.jpg" width="100%">
	</div>
	<div class="col-md-3 col-sm-4 col-ms-6 col-xs-12 album-cover">
		<img src="/assets/img/kawandasawolu.jpg" width="100%">
	</div>
	<div class="col-md-3 col-sm-4 col-ms-6 col-xs-12 album-cover">
		<img src="/assets/img/kawandasawolu.jpg" width="100%">
	</div>
	<div class="col-md-3 col-sm-4 col-ms-6 col-xs-12 album-cover">
		<img src="/assets/img/kawandasawolu.jpg" width="100%">
	</div>
</div>
<script type="text/javascript" src="assets/js/jquery-2.2.0.min.js"></script>
<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="assets/js/skrollr.min.js"></script>
<script type="text/javascript" src="/assets/js/scrolling-nav.js"></script>
</body>
</html>