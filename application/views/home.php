<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="<?php echo $meta_description;?>">
	<title>Kawandasawolu</title>
	<link rel="icon" href="/assets/img/faviconkw.ico?" type="image/x-icon">
	<?php
	echo link_tag('/assets/css/front.css');
	echo link_tag('/assets/css/bootstrap.min.v3.6.6.css');
	echo link_tag('/assets/css/bootstrap-ms.css');
	echo link_tag('/assets/css/font-awesome.min.css');
	echo link_tag('/assets/slick/slick.css');
	echo link_tag('/assets/slick/slick-theme.css');
	/*echo link_tag('https://fonts.googleapis.com/css?family=Alex+Brush');*/
	?>
	<style type="text/css">
		.navbar-home .navbar-nav>li {
			float: none;
		    display: inline-block;
		}
		/*.navbar-home-fixed>.navbar-nav>li{
			float: left;
			display: block;
		}*/
		.navbar-fixed-top{
			display: none;
		}
		.nav>li>a:hover{
			background-color: #AF2022 !important;
		}
	</style>
</head>
<body>

<!-- <div class="navbar hidden-xs" style="background-image:url('/assets/img/batik_back2.jpg'); background-size:contain;position:fixed; right:0; top:0; z-index:1; opacity:0.7; width: 55px; height:100%"> -->

<!-- <div class="navbar hidden-xs" style="background-image:url('/assets/img/batik_back2.jpg'); background-size:contain;position:fixed; right:0; top:20%; z-index:1; opacity:0.7">
	<a class="page-scroll right-menu" href="#banner"><img src="/assets/img/icon/home.png"/></a>
	<a class="page-scroll right-menu" href="#about_us"><img src="/assets/img/icon/about.png"/></a>
	<a class="page-scroll right-menu" href="#news"><img src="/assets/img/icon/news.png"/></a>
	<a class="page-scroll right-menu" href="#song"><img src="/assets/img/icon/song.png"/></a>
	<a class="page-scroll right-menu" href="#video"><img src="/assets/img/icon/video.png"/></a>
	<a class="page-scroll right-menu" href="#gallery"><img src="/assets/img/icon/album.png"/></a>
	<a class="page-scroll right-menu" href="#merchandise"><img src="/assets/img/icon/hat.png"/></a>
	<a class="page-scroll right-menu" href="#member"><img src="/assets/img/icon/member.png"/></a>
	<a class="page-scroll right-menu" href="#contact_us"><img src="/assets/img/icon/contact.png"/></a>
</div> -->
<!-- </div> -->

<?php include('header_fixed_home.php');?>

<div id="up">
	<a class="page-scroll" href="#banner"><img src="/assets/img/arrow_up.png"/></a>
</div>

	<div id="skrollr-body"><div class="hidden-xs navbar-home" style="position:relative">
	    <ul class="nav navbar-nav" style="width:100%">
	        <li>
	            <a class="page-scroll menu-header" href="#about_us">Tentang Kami</a>
	        </li>
	        <li>
	            <a class="page-scroll menu-header" href="#news">Berita</a>
	        </li>
	        <li>
	            <a class="page-scroll menu-header" href="#news">Event</a>
	        </li>
	        <li>
	            <a class="page-scroll menu-header" href="#song">Lagu</a>
	        </li>
	        <li>
	            <a class="page-scroll menu-header" href="#video">Video</a>
	        </li>
	        <li>
	            <a class="page-scroll menu-header" href="#gallery">Galeri</a>
	        </li>
	        <li>
	            <a class="page-scroll menu-header" href="#merchandise">Merchandise</a>
	        </li>
	        <li>
	            <a class="page-scroll menu-header" href="#member">Anggota</a>
	        </li>
	        <li>
	            <a class="page-scroll menu-header" href="#contact_us">Kontak Kami</a>
	        </li>
	    </ul>
	</div>
	<section id="banner" style="position: relative; background-color:#CA292B; z-index:-2; padding:0px;">
		
		<div style="height:30%; position: absolute;">
			<img src="/assets/img/triangle_ornament.png" height="100%" />
		</div>

		<div class="col-xs-12" style="position: fixed; z-index:-1; text-align:center; top:30%;">
		<img src="/assets/img/logojawa2.png" height="100%" />
		</div>
		<div 
		data-top-bottom="left:-200px;"
		data-bottom-bottom="left:0px;"
		style="height:40%; position: absolute; bottom: 0; right:0">
		<img src="/assets/img/clouds.png" height="100%" />
		</div>
		<div 
		data-top-bottom="left:300px;"
		data-bottom-bottom="left:0px;"
		style="height: 30%; position: absolute; bottom: 0;">
		<img src="/assets/img/becak_tugu_pohon.png" height="100%" />
		</div>
	</section>

	<section id="about_us">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-12">
					<h2>Tentang Kami</h2>
					<?php if(!empty($about_us)):?>
					<div style="text-align:center">
						<?php echo word_limiter($about_us,64);?>
					</div>
					<div class="col-xs-12 btn-wrapper">
						<a href="/about"><span class="red-btn">Read more</span></a>
					</div>
					<?php endif;?>
				</div>
			</div>
		</div>
	</section>

	<section id="gap">
		<div class="bcg skrollable skrollable-between gap-bg-home"
		data-anchor-target="#gap">
		</div>
	</section>

	<section id="news">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-6" style="margin-bottom:10px">
					<div style="background-color:#F2BF48">
						<h2><a href="/news">Berita</a></h2>
					</div>
					<div class="news-cont-left">
				<?php if(!empty($news)):?>
					<?php foreach ($news as $key => $news_item) {
						echo '
							<dl>
								<dt><a href="/news/news_detail/'.$news_item->id.'">'.$news_item->title.'</a></dt>
								<dd>'.nl2br(word_limiter($news_item->content,32)).' <a href="/news/news_detail/'.$news_item->id.'">&laquo;baca</a></dd>
							</dl>';

						if ($key == 1) break; //limit only max. 2 news
					}
					?>
				<?php else:?>
					<div>Tidak ada berita saat ini.</div>
				<?php endif;?>
					</div>
				</div>

				<div class="col-xs-12 col-sm-6">
					<div style="background-color:#F17731">
						<h2><a href="/event">Event</a></h2>
					</div>
					<div class="news-cont-right">
				<?php if(!empty($events)):?>
					<?php foreach ($events as $key => $events_item) {
						echo '
							<dl>
								<dt><a href="/event/event_detail/'.$events_item->id.'">'.$events_item->title.'</a></dt>
								<dd>'.date('d F Y',$events_item->start_date).(($events_item->start_date != $events_item->end_date) ? ' - '.date('d F Y',$events_item->end_date) : "").'<br/><a href="/event/event_detail/'.$events_item->id.'">&laquo;lihat</a></dd>
							</dl>';

						if ($key == 1) break; //limit only max. 2 events
					}
					?>
				<?php else:?>
					<div>Tidak ada event saat ini.</div>
				<?php endif;?>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section id="song">
		<div class="container">
			<div class="row">
				<?php if(!empty($songs)):?>
				<div class="col-sm-6 hidden-xs song-cover-home"
					data-bottom-top="margin-left:-500px; transform:rotate(-90deg);"
					data-center-center="margin-left:-100px; transform:rotate(0deg);">
					<img src="<?php print_r(str_replace('.','_home.',$songs[0]->song_cover_path));?>" alt="<?php print_r($songs[0]->title);?>" width="100%" />
				</div>
				<?php endif;?>
				<div class="col-xs-12 col-sm-6">
					<h2>Lagu</h2>
					<?php if(!empty($songs)):?>
					<ol type="1">
					<?php foreach ($songs as $key => $songs_item) {
						echo '
						<li>
							<dl>
								<dt><a href="/song/lyric/'.$songs_item->id.'">'.$songs_item->title.'</a></dt>
								<dd>'.$songs_item->artist.'</dd>
							</dl>
						</li>';

						if ($key == 4) break; //limit only max. 5 songs
					}
					?>
					</ol>
					<div class="col-xs-12 btn-wrapper" style="text-align: left">
						<a href="/song"><span class="org-btn">Listen More</span></a>
					</div>
					<?php else:?>
						<div>Tidak ada lagu saat ini.</div>
					<?php endif;?>
				</div>
			</div>
		</div>
	</section>

	<section id="video">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<h2 style="margin-bottom: 30px;">Video</h2>
				</div>
				<?php if(!empty($videos)):?>
				<?php foreach ($videos as $key => $videos_item) {
					echo '
					<div class="col-lg-4 col-sm-6 col-xs-12">
						<div class="video-caption">'.character_limiter($videos_item->title,48).'</div>
						<div class="videoWrapper" style="margin-bottom: 30px;">
							<iframe width="100%" src="https://www.youtube.com/embed/'.$videos_item->link.'?showinfo=0" frameborder="0" allowfullscreen></iframe>
						</div>
					</div>';

					if ($key == 2) break; //limit only max. 3 videos
				}
				?>
				<div class="col-xs-12 btn-wrapper">
					<a href="/video"><span class="red-btn">Watch More</span></a>
				</div>
				<?php else:?>
					<div>Tidak ada video saat ini.</div>
				<?php endif;?>
			</div>
		</div>
	</section>

	<section id="gallery">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 gallery-header">
					<h2><a href="/gallery">Galeri</a></h2>
					<?php if(!empty($photos)):?>
					<div>Lihat momen-momen keren dan memalukan yang kami lakukan dalam galeri foto berikut ini.</div>
					<?php endif;?>
				</div>
				<?php if(!empty($photos)):?>
				<div id="gallery-item-cont">
				<?php
				$count_rand = (count($photos) >= 9) ? 9 : count($photos);
				$photo_index = array_rand($photos, $count_rand);
				$photo_index = ($photo_index == 0) ? array(0) : $photo_index;
				
				foreach ($photo_index as $key => $index) {
					$path_section = explode('/',$photos[$index]->photo);
                    $thumb_path = $path_section[0] . '/' . $path_section[1] . '/' . $path_section[2] . '/thumb/thumb_' . $path_section[3];
                ?>
					<div class="gallery-item-slider" style="background-image:url('/<?php print_r($thumb_path);?>');">
					</div>
				<?php }?>

				</div>
				<?php else:?>
					<div style="text-align:center">Tidak ada foto saat ini.</div>
				<?php endif;?>
				<div class="col-xs-12 btn-wrapper">
					<a href="/gallery"><span class="red-btn">See More</span></a>
				</div>
			</div>
		</div>
	</section>

	<section id="merchandise">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<h2>Merchandise</h2>
					<?php if(!empty($merchandise)):?>
					<div class="col-xs-12 col-ms-6 col-sm-6 col-md-4">
						<div id="slideshow" style="margin:auto">
							<?php
							$count_rand = (count($merchandise) >= 3) ? 3 : count($merchandise);
							$merchandise_index = array_rand($merchandise, $count_rand);
							$merchandise_index = ($merchandise_index == 0) ? array(0) : $merchandise_index;
							foreach ($merchandise_index as $key => $index) {?>
						    <div style="background-color:#F1F1F1"><img src="/<?php print_r($merchandise[$index]->image);?>" width="100%" border="0" alt="" /></div>
						    <?php } ?>
						</div>
					</div>
					<div class="col-xs-12 col-ms-6 col-sm-6 col-md-8">
						Kami menjual berbagai merchandise yang menjadi atribut kami. Ini adalah kebanggaan kami untuk memberikan yang terbaik bagi pada fans Kawandasawolu.
						<br/><br/>
						<div class="col-xs-12 btn-wrapper" style="text-align:left">
							<a href="/merchandise"><span class="red-btn">Buy Now</span></a>
						</div>
					</div>
					<?php else:?>
						<div style="text-align:center">Tidak ada merchandise saat ini.</div>
					<?php endif;?>
				</div>
			</div>
		</div>
	</section>

	<section id="member">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<h2>Anggota</h2>
				</div>
				<?php
				if(!empty($members)):
				$count_rand = (count($members) >= 5) ? 5 : count($members);
				$member_index = array_rand($members,$count_rand);
				$member_index = ($member_index == 0) ? array(0) : $member_index;

				foreach ($member_index as $key => $index) {
				 	echo '<div class="member-img-cont">
						<img src="/'.$members[$index]['avatar'].'" class="member-img-home" alt="" width="100%"/><br/>
						'.$members[$index]['name'].'
					</div>
					';
				}
				?>
				<div class="col-xs-12 btn-wrapper">
					<a href="/member"><span class="red-btn">See More</span></a>
				</div>
				<?php else:?>
					<div style="text-align:center">Tidak ada member saat ini.</div>
				<?php endif;?>
			</div>
		</div>
	</section>

	<section id="contact_us">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<h2>Kontak Kami</h2>
					<div class="col-xs-12">
						Ingin mengenal kami lebih jauh? Atau ingin mengundang kami di acara/pagelaran Anda?<br/>Jangan sungkan untuk menghubungi kami <a href="/contact" class="link-mail">di sini</a>.
						<br/><br/>
						<a href="https://www.facebook.com/kawandasawolu.yk/" target="_blank"><img src="/assets/img/icon/fb_inverse.png" width="64" /></a>
						<a href="https://www.twitter.com/kawandasawolu" target="_blank"><img src="/assets/img/icon/twitter_inverse.png" width="64" /></a>
						<a href="http://www.dailymotion.com/kawandasawolu" target="_blank"><img src="/assets/img/icon/dailymotion.png" width="64" /></a>
						<a href="https://www.soundcloud.com/kawandasawolu" target="_blank"><img src="/assets/img/icon/soundcloud_icon.png" width="64" /></a>
						<a href="https://www.youtube.com/user/kawandasawolu" target="_blank"><img src="/assets/img/icon/youtube.png" width="64" /></a>
						<a href="https://www.instagram.com/kawandasawolu/" target="_blank"><img src="/assets/img/icon/instagram.png" width="64" /></a>
						<a href="https://plus.google.com/+kawandasawolu/" target="_blank"><img src="/assets/img/icon/gplus.png" width="64" /></a>
						<br/><br/>
						<img src="/assets/img/logojawa2.png" id="contact-us-img-logo" />
					</div>
				</div>
			</div>
		</div>
	</section>
	<?php include('footer.php');?>
</div>

<script type="text/javascript" src="/assets/js/jquery-2.2.0.min.js"></script>
<script type="text/javascript" src="/assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/assets/js/skrollr.min.js"></script>
<script type="text/javascript" src="/assets/js/jquery.easing.min.js"></script>
<script type="text/javascript" src="/assets/js/scrolling-nav.js"></script>
<script type="text/javascript" src="/assets/js/fadeSlideShow-minified.js"></script>
<script type="text/javascript" src="/assets/slick/slick.min.js"></script>
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

	$(document).scroll(function() {
		var scrollDepth = $(this).scrollTop();
		var windowHeight = $(window).outerHeight();
		if ((scrollDepth+1) > windowHeight) {
		    $('.navbar-fixed-top').fadeIn('fast');
		    $('#up').fadeIn('slow');
		} else {
		    $('.navbar-fixed-top').fadeOut('fast');
		    $('#up').fadeOut('slow');
		}
	});

	$(document).ready(function(){
	    $('#slideshow').fadeSlideShow({
	    	width: 240,
	    	height: 320,
	    	allowKeyboardCtrl: false,
	    	PlayPauseElement: false,
			NextElement: false,
			PrevElement: false,
			ListElement: false
	    });

	    $('#gallery-item-cont').slick({
	    	dots: true,
		    slidesToShow: 3,
		  	slidesToScroll: 3,
		 	autoplay: true,
		  	autoplaySpeed: 2000,
		  	responsive:[
		  		{
		  			breakpoint: 768,
		  			settings: {
		  				slidesToShow: 2,
		  				slidesToScroll: 2
		  			}
		  		},
		  		{
		  			breakpoint: 450,
		  			settings: {
		  				slidesToShow: 1,
		  				slidesToScroll: 1,
		  			}
		  		}
		  	]
		});
	});
</script>
</body>
</html>