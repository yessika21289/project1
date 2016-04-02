<div class="container content">
	<ol class="breadcrumb" style="margin-bottom: 5px;">
		<li><a href="/">Home</a></li>
		<li><a href="/song">Song</a></li>
		<li class="active">Lirik</li>
	</ol>
	<h1><?php print_r($songs[0]->title);?></h1>
	<br/>
	<div class="col-xs-12">
		<img src="/<?php print_r($songs[0]->song_cover_path);?>" width="200" height="200" />
		<br/>Release: <?php print_r($songs[0]->release_date);?><br/><br/>
		<audio src="/<?php print_r($songs[0]->song_path);?>" preload="auto"></audio>
		
		<div class="lyric">
		<?php
		echo $songs[0]->lyric;
		?>
		</div>

	</div>
	
</div>

<script src="/assets/js/audiojs/audio.min.js"></script>
<script>
	audiojs.events.ready(function() {
    	var as = audiojs.createAll();
  	});
</script>