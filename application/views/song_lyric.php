<div class="container content">
	<ol class="breadcrumb hidden-xs" style="margin-bottom: 5px;">
		<li><a href="/">Home</a></li>
		<li><a href="/song">Song</a></li>
		<li class="active">Lirik</li>
	</ol>
	<?php if(!empty($songs)):?>
	<h1><?php print_r($songs[0]->title);?></h1>
	<br/>
	<div class="col-xs-12">
		<?php $song_cover = (!empty($songs[0]->song_cover_path)) ? $songs[0]->song_cover_path : 'assets/img/default_cover.png';?>
		<img src="/<?php print_r($song_cover);?>" width="200" height="200" alt="<?php print_r($songs[0]->title);?>" />
		<br/>Release: <?php print_r(date('d F Y',$songs[0]->release_date));?><br/><br/>
		<audio src="/<?php print_r($songs[0]->song_path);?>" preload="auto"></audio>
		
		<div class="lyric">
		<br/>
		<?php
		echo $songs[0]->lyric;
		?>
		</div>
	</div>
	<?php else:?>
		<div>Lirik lagu tidak ditemukan.</div>
	<?php endif;?>
	
</div>

<script src="/assets/js/audiojs/audio.min.js"></script>
<script>
	audiojs.events.ready(function() {
    	var as = audiojs.createAll();
  	});
</script>