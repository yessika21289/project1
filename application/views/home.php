<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Kawandasawolu</title>

	<?php
	echo link_tag('/assets/css/front.css');
	echo link_tag('/assets/css/bootstrap.min.v3.6.6.css');
	echo link_tag('/assets/css/font-awesome.min.css');
	?>
</head>
<body>
<div class="navbar" style="background-image:url('/assets/img/batik_back2.jpg'); background-size:contain;position:fixed; right:0; top:20%; z-index:1; opacity:0.7">
	<a class="page-scroll right-menu" href="#banner"><img src="/assets/img/icon/home.png"/></a>
	<a class="page-scroll right-menu" href="#about_us"><img src="/assets/img/icon/about.png"/></a>
	<a class="page-scroll right-menu" href="#news"><img src="/assets/img/icon/news.png"/></a>
	<a class="page-scroll right-menu" href="#song"><img src="/assets/img/icon/song.png"/></a>
	<a class="page-scroll right-menu" href="#video"><img src="/assets/img/icon/video.png"/></a>
	<a class="page-scroll right-menu" href="#merchandise"><img src="/assets/img/icon/hat.png"/></a>
	<a class="page-scroll right-menu" href="#member"><img src="/assets/img/icon/member.png"/></a>
	<a class="page-scroll right-menu" href="#contact_us"><img src="/assets/img/icon/contact.png"/></a>
</div>
<div id="skrollr-body">
	<section id="banner" style="position: relative; background-color:#CA292B; z-index:-2">
		<div style="height:30%">
			<img src="/assets/img/triangle_ornament.png" height="100%" />
		</div>
		<div class="col-xs-12" style="position: fixed; z-index:-1; text-align:center">
		<img src="/assets/img/logojawa2.png" height="100%" />
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
		<div class="bcg skrollable skrollable-between about-us-bg-home" 
		data-top-top="background-position: center 0px;"
		data-top-bottom="background-position: center 200px;"
		data-anchor-target="#about_us">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-sm-12">
						<h2>About Us</h2>
						<br/>
						<div class="col-lg-3 col-md-3 col-sm-4 col-xs-12" style="text-align:left; font-size:1.7em; margin-bottom:25px; border-right: 3px solid #555555">
							<i class="fa fa-quote-left" style="font-size:1.5em"></i>
							<?php echo $tagline;?>
						</div>
						<div class="col-lg-9 col-md-9 col-sm-8 col-xs-12">
							<?php echo $about_us;?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section id="news">
		<div class="bcg skrollable skrollable-between news-bg-home" 
		data-bottom-top="background-position: right 0px;"
		data-top-bottom="background-position: right -100px;"
		data-anchor-target="#news">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-sm-8">
						<h2>Berita</h2>
						<ol type="1">
						<?php foreach ($news as $key => $news_item) {
							echo '
							<li>
								<dl>
									<dt>'.$news_item->title.'</dt>
									<dd>'.nl2br(word_limiter($news_item->content,32)).' <a href="">[baca]</a></dd>
								</dl>
							</li>';

							if ($key == 1) break; //limit only max. 2 news
						}
						?>
						</ol>
						<h2>Events</h2>
						<ol type="1">
						<?php foreach ($news as $key => $news_item) {
							echo '
							<li>
								<dl>
									<dt>'.$news_item->title.'</dt>
									<dd>'.nl2br(word_limiter($news_item->content,32)).' <a href="">[baca]</a></dd>
								</dl>
							</li>';

							if ($key == 1) break; //limit only max. 2 events
						}
						?>
						</ol>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section id="song">
		<div class="container">
			<div class="row">
				<div class="col-sm-6 hidden-xs song-cover-home"
					data-bottom-top="margin-left:-500px; transform:rotate(-90deg);"
					data-center-center="margin-left:-100px; transform:rotate(0deg);">
					<img src="<?php print_r($songs[0]->song_cover_path);?>" alt="<?php print_r($songs[0]->title);?>" width="100%" />
				</div>
				<div class="col-xs-12 col-sm-6">
					<h2>Songs</h2>
					<ol type="1">
					<?php foreach ($songs as $key => $songs_item) {
						echo '
						<li>
							<dl>
								<dt>'.$songs_item->title.'</dt>
								<dd>'.$songs_item->artist.'</dd>
							</dl>
						</li>';

						if ($key == 4) break; //limit only max. 5 songs
					}
					?>
					</ol>
				</div>
			</div>
		</div>
	</section>

	<section id="video">
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