<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Kawandasawolu</title>
	<link rel="icon" href="/assets/img/faviconkw.ico?" type="image/x-icon">
	<?php
	echo link_tag('/assets/css/front.css');
	echo link_tag('/assets/css/bootstrap.min.v3.6.6.css');
	echo link_tag('/assets/css/bootstrap-ms.css');
	echo link_tag('/assets/css/font-awesome.min.css');
	echo link_tag('https://fonts.googleapis.com/css?family=Alex+Brush');
	?>
</head>
<body>

<!-- <div class="navbar hidden-xs" style="background-image:url('/assets/img/batik_back2.jpg'); background-size:contain;position:fixed; right:0; top:0; z-index:1; opacity:0.7; width: 55px; height:100%"> -->

<div class="navbar hidden-xs" style="background-image:url('/assets/img/batik_back2.jpg'); background-size:contain;position:fixed; right:0; top:20%; z-index:1; opacity:0.7">
	<a class="page-scroll right-menu" href="#banner"><img src="/assets/img/icon/home.png"/></a>
	<a class="page-scroll right-menu" href="#about_us"><img src="/assets/img/icon/about.png"/></a>
	<a class="page-scroll right-menu" href="#news"><img src="/assets/img/icon/news.png"/></a>
	<a class="page-scroll right-menu" href="#song"><img src="/assets/img/icon/song.png"/></a>
	<a class="page-scroll right-menu" href="#video"><img src="/assets/img/icon/video.png"/></a>
	<a class="page-scroll right-menu" href="#gallery"><img src="/assets/img/icon/album.png"/></a>
	<a class="page-scroll right-menu" href="#merchandise"><img src="/assets/img/icon/hat.png"/></a>
	<a class="page-scroll right-menu" href="#member"><img src="/assets/img/icon/member.png"/></a>
	<a class="page-scroll right-menu" href="#contact_us"><img src="/assets/img/icon/contact.png"/></a>
</div>
<!-- </div> -->
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
		<div class="bcg skrollable skrollable-between about-us-bg-home" 
		data-top-top="background-position: center 0px;"
		data-top-bottom="background-position: center 200px;"
		data-anchor-target="#about_us">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-sm-12">
						<h2><a href='/about'>Tentang Kami</a></h2>
						<br/>
						<?php if(!empty($tagline)):?>
						<div class="col-lg-3 col-md-3 col-sm-4 col-xs-12" style="text-align:left; font-size:1.7em; margin-bottom:25px; border-right: 3px solid #555555; z-index:0">
							<i class="fa fa-quote-left" style="font-size:1.5em"></i>
							<?php echo $tagline;?>
						</div>
						<?php endif;?>
						<?php if(!empty($about_us)):?>						
						<div class="col-lg-9 col-md-9 col-sm-8 col-xs-12" style="text-align:left">
							<?php echo word_limiter($about_us,64);?> [<a href="/about">Read more</a>]
						</div>
						<?php endif;?>
					</div>
				</div>
				<div class="col-xs-12">
					<!-- <hr class="hr-home" /> -->
				</div>
			</div>
		</div>
	</section>

	<section id="news">
		<div class="bcg skrollable skrollable-between news-bg-home" 
		data-bottom-top="background-position: center 0px;"
		data-top-bottom="background-position: center 0px;"
		data-anchor-target="#news">
			
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-sm-8">
						<h2><a href="/news">Berita</a></h2>
					<?php if(!empty($news)):?>
						<ol type="1">
						<?php foreach ($news as $key => $news_item) {
							echo '
							<li>
								<dl>
									<dt><a href="/news/news_detail/'.$news_item->id.'">'.$news_item->title.'</a></dt>
									<dd>'.nl2br(word_limiter($news_item->content,32)).' <a href="/news/news_detail/'.$news_item->id.'">[baca]</a></dd>
								</dl>
							</li>';

							if ($key == 1) break; //limit only max. 2 news
						}
						?>
						</ol>
					<?php else:?>
						<div>Tidak ada berita saat ini.</div>
					<?php endif;?>
						<h2><a href="/event">Event</a></h2>
					<?php if(!empty($events)):?>
						<ol type="1">
						<?php foreach ($events as $key => $events_item) {
							echo '
							<li>
								<dl>
									<dt><a href="/event/event_detail/'.$events_item->id.'">'.$events_item->title.'</a></dt>
									<dd>'.date('d F Y',$events_item->start_date).(($events_item->start_date != $events_item->end_date) ? ' - '.date('d F Y',$events_item->end_date) : "").'<br/><a href="/event/event_detail/'.$events_item->id.'">[lihat]</a></dd>
								</dl>
							</li>';

							if ($key == 1) break; //limit only max. 2 events
						}
						?>
						</ol>
					<?php else:?>
						<div>Tidak ada event saat ini.</div>
					<?php endif;?>
					</div>
				</div>
			</div>
		</div>
		<div class="col-xs-12">
			<!-- <hr class="hr-home" /> -->
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
					<h2><a href="/song">Lagu</a></h2>
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
					<div class="col-xs-12">
						<a href="/song">[Dengarkan]</a>
					</div>
					<?php else:?>
						<div>Tidak ada lagu saat ini.</div>
					<?php endif;?>
				</div>
			</div>
		</div>
		<div class="col-xs-12">
			<!-- <hr class="hr-home" /> -->
		</div>
	</section>

	<section id="video">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<h2><a href="/video">Video</a></h2>
				</div>
				<?php if(!empty($videos)):?>
				<?php foreach ($videos as $key => $videos_item) {
					echo '
					<div class="col-lg-4 col-sm-6 col-xs-12">
						'.character_limiter($videos_item->title,48).'
						<div class="videoWrapper">
							<iframe width="100%" src="https://www.youtube.com/embed/'.$videos_item->link.'?showinfo=0" frameborder="0" allowfullscreen></iframe>
						</div>
					</div>';

					if ($key == 2) break; //limit only max. 3 videos
				}
				?>
				<div class="col-xs-12" style="text-align:center">
					<a href="/video">[Tonton yang lain]</a>
				</div>
				<?php else:?>
					<div>Tidak ada video saat ini.</div>
				<?php endif;?>
			</div>
		</div>
		<div class="col-xs-12">
			<!-- <hr class="hr-home" /> -->
		</div>
	</section>

	<section id="gallery">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 gallery-header">
					<h2><a href="/gallery">Galeri</a></h2>
					<?php if(!empty($photos)):?>
					Setiap momen spesial bersama Kawandasawolu.<br/>
					<a href="/gallery">[Lihat selebihnya]</a>
					<?php endif;?>
				</div>
				<?php if(!empty($photos)):?>
				<div id="gallery-item-cont">
				<?php
				$count_rand = (count($photos) >= 5) ? 5 : count($photos);
				$photo_index = array_rand($photos, $count_rand);
				$photo_index = ($photo_index == 0) ? array(0) : $photo_index;
				?>
					<div 
					data-bottom-top="right: 200px;"
					data-center-center="right: 550px;"
					class="gallery-item-home"
					style="right: 0px; top: 40px; width: 100px; height: 100px; background-image:url('/<?php print_r($photos[$photo_index[4]]->photo);?>');">
					</div>
					<div 
					data-bottom-top="right: 150px;"
					data-center-center="right: 450px;"
					class="gallery-item-home"
					style="right: 0px; top: 30px; width: 150px; height: 150px; background-image:url('/<?php print_r($photos[$photo_index[3]]->photo);?>');">
					</div>
					<div 
					data-bottom-top="right: 100px;"
					data-center-center="right: 325px;"
					class="gallery-item-home"
					style="right: 0px; top: 20px; width: 200px; height: 200px; background-image:url('/<?php print_r($photos[$photo_index[2]]->photo);?>');">
					</div>
					<div 
					data-bottom-top="right: 50px;"
					data-center-center="right: 175px;"
					class="gallery-item-home"
					style="right: 0px; top: 10px; width: 250px; height: 250px; background-image:url('/<?php print_r($photos[$photo_index[1]]->photo);?>');">
					</div>
					<div 
					class="gallery-item-home" 
					style="right: 0px; width: 300px; height: 300px; background-image:url('/<?php print_r($photos[$photo_index[0]]->photo);?>');">
					</div>
				</div>
				<?php else:?>
					<div style="text-align:center">Tidak ada foto saat ini.</div>
				<?php endif;?>
				<div style="clear:both"></div>
			</div>
		</div>
		<div class="col-xs-12">
			<!-- <hr class="hr-home" /> -->
		</div>
	</section>

	<section id="merchandise">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<h2><a href="/merchandise">Merchandise</a></h2>
					<?php if(!empty($merchandise)):?>
					<br/>
					<div class="col-xs-12 col-ms-6 col-sm-6 col-md-4">
						<div id="slideshow" style="margin:auto">
							<?php
							$count_rand = (count($merchandise) >= 3) ? 3 : count($merchandise);
							$merchandise_index = array_rand($merchandise, $count_rand);
							$merchandise_index = ($merchandise_index == 0) ? array(0) : $merchandise_index;
							foreach ($merchandise_index as $key => $index) {?>
						    <div style="background-color:white"><img src="/<?php print_r($merchandise[$index]->image);?>" width="100%" border="0" alt="" /></div>
						    <?php } ?>
						</div>
					</div>
					<div class="col-xs-12 col-ms-6 col-sm-6 col-md-8">
					Kami menjual berbagai merchandise yang menjadi atribut kami. Ini adalah kebanggaan kami untuk memberikan yang terbaik bagi pada fans Kawandasawolu.
					<br/><br/>
					<a href="/merchandise">[Beli sekarang]</a>
					</div>
					<?php else:?>
						<div style="text-align:center">Tidak ada merchandise saat ini.</div>
					<?php endif;?>
				</div>
				<div class="col-xs-12">
					<!-- <hr class="hr-home" /> -->
				</div>
			</div>
		</div>
	</section>

	<section id="member">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<h2><a href="/member">Anggota</a></h2>
				</div>
				<?php
				if(!empty($members)):
				$count_rand = (count($members) >= 6) ? 6 : count($members);
				$member_index = array_rand($members,$count_rand);
				$member_index = ($member_index == 0) ? array(0) : $member_index;

				foreach ($member_index as $key => $index) {
				 	echo '<div class="col-xs-6 col-ms-3 col-sm-2">
						<img src="/'.$members[$index]['avatar'].'" class="member-img-home" alt="" width="100%"/><br/>
						'.$members[$index]['name'].'
					</div>
					';
				}
				?>
				<div class="col-xs-12">
					<a href="/member">[Kenal kami]</a><br/><br/>
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
					<h2><a href="/contact">Kontak Kami</a></h2>
					<br/>
					<div class="col-xs-12">
						<a href="https://www.facebook.com/kawandasawolu.yk/" target="_blank"><img src="/assets/img/icon/fb_inverse.png" width="64" /></a>
						<a href="https://www.twitter.com/kawandasawolu" target="_blank"><img src="/assets/img/icon/twitter_inverse.png" width="64" /></a>
						<a href="http://www.dailymotion.com/kawandasawolu" target="_blank"><img src="/assets/img/icon/dailymotion.png" width="64" /></a>
						<a href="https://www.soundcloud.com/kawandasawolu" target="_blank"><img src="/assets/img/icon/soundcloud_icon.png" width="64" /></a>
						<a href="https://www.youtube.com/user/kawandasawolu" target="_blank"><img src="/assets/img/icon/youtube.png" width="64" /></a>
						<a href="https://www.instagram.com/kawandasawolu/" target="_blank"><img src="/assets/img/icon/instagram.png" width="64" /></a>
						<br/><br/>
						Ingin mengenal Kawandasawolu lebih jauh, jangan sungkan untuk <a href="/contact" class="link-mail">menghubungi kami</a>.<br/><br/><br/>
						<img src="/assets/img/logojawa2.png" height="100%" />
						<br/><br/><br/>
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
	});
</script>
</body>
</html>