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
		<div>Release: <?php print_r(date('d F Y',$songs[0]->release_date));?></div>
		<div style="margin-bottom: 30px;">
			<span class="glyphicon glyphicon-play"></span>
			<?php print_r(number_format($songs[0]->play_count,0,",","."));?>
			<?php print_r(($songs[0]->play_count > 1) ? "plays" : "play");?>
		</div>
		<audio id="song-audio" src="/<?php print_r($songs[0]->song_path);?>" preload="auto" onplay="playAudio();" onended="clicked=false;" controls></audio>
		<input type="hidden" id="song-id" value="<?php print_r($songs[0]->id);?>"/>
		<input type="hidden" id="song-count" value="<?php print_r($songs[0]->play_count);?>"/>
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
	/*audiojs.events.ready(function() {
    	var as = audiojs.createAll();
  	});*/

  	var song_id = $("#song-id").val();
  	var song_audio = $("#song-audio");
	var count = parseInt($("#song-count").val());
	var clicked = false;

  	function playAudio(){
		if(!clicked){
			count++;
			$.ajax({
				'url': '/song/add_count',
				'type': 'POST',
				'data': {'song_id': song_id, 'count': count},
				'success': function(){
					$("#song-count").val(count);
					clicked = true;
				},
				'error': function(){
					console.log('error');
				}
			})
		}
  	}
</script>