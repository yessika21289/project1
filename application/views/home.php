<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Kawandasawolu</title>

	<?php
	echo link_tag('/assets/css/front.css');
	echo link_tag('/assets/css/bootstrap.min.css');
	echo link_tag('/assets/css/font-awesome.min.css');
	?>
</head>
<body>
<div style="background-color:grey; position:fixed; right:0; top:30%; z-index:1">
	
		<a class="page-scroll right-menu" href="#banner"><img src="/assets/img/home.png"/></a>
		<a class="page-scroll right-menu" href="#about_us">home</a>
		<a class="page-scroll right-menu" href="#news"><img src="/assets/img/news.png"/></a>
		<a class="page-scroll right-menu" href="#songs"><img src="/assets/img/song.png"/></a>
		<a class="page-scroll right-menu" href="#videos">home</a>
		<a class="page-scroll right-menu" href="#merchandise">home</a>
		<a class="page-scroll right-menu" href="#member">home</a>
		<a class="page-scroll right-menu" href="#contact_us">home</a>
	
	

</div>
<div id="skrollr-body">
	<section id="banner" style="position: relative; background-color:#CA292B; z-index:-2">
		<div style="height:30%">
			<img src="/assets/img/triangle_ornament.png" height="100%" />
		</div>
		<div style="position: fixed; top: 20%; left:35%; z-index:-1">
		<img src="/assets/img/logojawa.png" height="100%" />
		</div>
		<div 
		data-top-bottom="left:-200px;"
		data-bottom-bottom="left:0px;"
		style="height:40%; width:80%; position: absolute; bottom: 0; right:0">
		<img src="/assets/img/clouds.png" height="100%" />
		</div>
		<div 
		data-top-bottom="left:300px;"
		data-bottom-bottom="left:0px;"
		style="height: 30%; width:80%; position: absolute; bottom: 0;">
		<img src="/assets/img/becak_tugu_pohon.png" height="100%" />
		</div>
	</section>

	<section id="about_us">
		<div class="bcg skrollable skrollable-between" 
		data-bottom-top="background-position: center -400px;"
		data-top-bottom="background-position: center -200px;"
		data-anchor-target="#about_us" style="background-image: url(assets/img/kawandasaWow.jpg); background-size:cover; height: 100%; width:100%">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-sm-12">
						<h2>About Us</h2>
						<br/>
						<div class="col-lg-3 col-md-3 col-sm-4 col-xs-12" style="text-align:left; font-size:1.7em; margin-bottom:25px;">
							<i class="fa fa-quote-left" style="font-size:3em"></i>
							Lorem ipsum dolor sit amet, consectetur adipiscing elit,sdfdafaf af adsfsafsafas
						</div>
						<div class="col-lg-9 col-md-9 col-sm-8 col-xs-12">
							"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section id="news">
		<div class="bcg skrollable skrollable-between" 
		data-bottom-top="background-position: 10px 0px;"
		data-top-bottom="background-position: -100px 0px;"
		data-anchor-target="#news" style="background-image: url(assets/img/about.jpg); background-size:cover; height: 100%; width:100%">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-sm-8">
						<h2>News</h2>
						<br/>
						<ol type="1">
						<li>
							<dl>
								<dt>Berita 1</dt>
								<dd>asdfdfdafadfad asdfa faafasfa asfa fadfsafdas fdasfasfas fasfas fafaf afa fafa faf asfaf afads fasdfa sfasfd asdfas dfasdf asfda sfdasfd asdf asdfas dfasdf asdfa sfdasdf af asdf asdfa sfasf asfda fa fadf afa fa fdads</dd>
							</dl>
						</li>
						<li>
							<dl>
								<dt>Berita 1</dt>
								<dd>asdfdfdafadfad</dd>
							</dl>
						</li>
						<li>
							<dl>
								<dt>Berita 1</dt>
								<dd>asdfdfdafadfad</dd>
							</dl>
						</li>
						</ol>

						<h2>Events</h2>
						<br/>
						<ol type="1">
						<li>
							<dl>
								<dt>Berita 1</dt>
								<dd>asdfdfdafadfad asdfa faafasfa asfa fadfsafdas fdasfasfas fasfas fafaf afa fafa faf asfaf afads fasdfa sfasfd asdfas dfasdf asfda sfdasfd asdf asdfas dfasdf asdfa sfdasdf af asdf asdfa sfasf asfda fa fadf afa fa fdads</dd>
							</dl>
						</li>
						<li>
							<dl>
								<dt>Berita 1</dt>
								<dd>asdfdfdafadfad</dd>
							</dl>
						</li>
						<li>
							<dl>
								<dt>Berita 1</dt>
								<dd>asdfdfdafadfad</dd>
							</dl>
						</li>
						</ol>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section id="songs">
		<div class="container">
			<div class="row">
				<div class="col-sm-6 hidden-xs"
					data-bottom-top="margin-left:-500px; transform:rotate(0deg);"
					data-center-center="margin-left:-100px; transform:rotate(90deg);"
					style="height:400px; width:400px; background-color:red;">
				</div>
				<div class="col-xs-12 col-sm-6">
					<h2>Songs</h2>
					<br/>
					"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."
				</div>
			</div>
		</div>
	</section>

	<section id="videos">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<h2>Video</h2>
					<br/>
					"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."
				</div>
				<div class="col-lg-4 col-sm-6 col-xs-12">
					<div class="videoWrapper">
						<iframe width="100%" src="https://www.youtube.com/embed/QI9rPwl1KuM?showinfo=0" frameborder="0" allowfullscreen></iframe>
					</div>
				</div>
				<div class="col-lg-4 col-sm-6 col-xs-12">
					<div class="videoWrapper">
						<iframe width="100%" src="https://www.youtube.com/embed/QI9rPwl1KuM?showinfo=0" frameborder="0" allowfullscreen></iframe>
					</div>
				</div>
				<div class="col-lg-4 col-sm-6 col-xs-12">
					<div class="videoWrapper">
						<iframe width="100%" src="https://www.youtube.com/embed/QI9rPwl1KuM?showinfo=0" frameborder="0" allowfullscreen></iframe>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section id="merchandise">
		<div class="bcg skrollable skrollable-between" 
		data-bottom-top="background-position: 0px -400px;"
		data-top-bottom="background-position: 0px -100px;"
		data-anchor-target="#merchandise" style="background-image: url(assets/img/merchandise.jpg); background-size:cover; height: 200px; width:100%">
			<div class="container">
				<div class="row">
					<div class="col-xs-12">
						<h2>Merchandise</h2>
						<br/>
						"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."
					</div>
				</div>
			</div>
		</div>
	</section>

	<section id="member">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<h2>Member</h2>
				</div>
				<div class="col-xs-6 col-sm-2">
					<img src="/assets/img/profile.png" alt="" width="100%"/>
				</div>
				<div class="col-xs-6 col-sm-2">
					<img src="/assets/img/profile.png" alt="" width="100%"/>
				</div>
				<div class="col-xs-6 col-sm-2">
					<img src="/assets/img/profile.png" alt="" width="100%"/>
				</div>
				<div class="col-xs-6 col-sm-2">
					<img src="/assets/img/profile.png" alt="" width="100%"/>
				</div>
				<div class="col-xs-6 col-sm-2 hidden-xs">
					<img src="/assets/img/profile.png" alt="" width="100%"/>
				</div>
				<div class="col-xs-6 col-sm-2 hidden-xs">
					<img src="/assets/img/profile.png" alt="" width="100%"/>
				</div>
				<div class="col-xs-12">
					See more >>>
				</div>
				
			</div>
		</div>
	</section>

	<section id="contact_us">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<h2>Contact Us</h2>
					<br/>
					Phone Number<br/>
					Email<br/>
					BBM<br/><br/>
					If you have any inquiry, please click here to fill the form.<br/><br/>
				</div>
			</div>
		</div>
	</section>
</div>

<script type="text/javascript" src="/assets/js/jquery-2.2.0.min.js"></script>
<script type="text/javascript" src="/assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/assets/js/skrollr.min.js"></script>
<script type="text/javascript" src="/assets/js/jquery.easing.min.js"></script>
<script type="text/javascript" src="/assets/js/scrolling-nav.js"></script>
<script type="text/javascript">
    var s = skrollr.init();

    // Find all YouTube videos
var $allVideos = $("iframe[src^='//www.youtube.com']"),

    // The element that is fluid width
    $fluidEl = $("body");

	// Figure out and save aspect ratio for each video
	$allVideos.each(function() {

	  $(this)
	    .data('aspectRatio', this.height / this.width)

	    // and remove the hard coded width/height
	    .removeAttr('height')
	    .removeAttr('width');

	});

	// When the window is resized
	$(window).resize(function() {

	  var newWidth = $fluidEl.width();

	  // Resize all videos according to their own aspect ratio
	  $allVideos.each(function() {

	    var $el = $(this);
	    $el
	      .width(newWidth)
	      .height(newWidth * $el.data('aspectRatio'));

	  });

	// Kick off one resize to fix all videos on page load
	}).resize();
</script>
</body>
</html>