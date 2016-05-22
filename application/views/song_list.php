<div class="container content">
	<ol class="breadcrumb hidden-xs" style="margin-bottom: 5px;">
		<li><a href="/">Home</a></li>
		<li class="active">Lagu</li>
	</ol>
	<h1>Kumpulan Lagu</h1><br/>
	<?php if(!empty($songs)):?>
	<?php foreach ($songs as $key => $songs_item) {
		$song_cover = (!empty($songs_item->song_cover_path)) ? $songs_item->song_cover_path : 'assets/img/default_cover.png';
		echo '
		<div class="col-lg-4 col-md-6 col-sm-6 col-xs-12" style="margin-bottom:20px">
			<div class="song-cover">
				<img src="/'.$song_cover.'" width="100" height="100" alt="'.$songs_item->title.'" />
			</div>
			<div class="song-desc">';
		if($songs_item->play_count > 0){
			echo '
				<div class="play-count"><span class="glyphicon glyphicon-play"></span>&nbsp;'.number_format($songs_item->play_count,0,",",".").'</div>';
		}
		echo '
				<h4><a href="/song/lyric/'.$songs_item->id.'">'.$songs_item->title.'</a></h4>
				<span>
					<div>Release: '.date('d F Y',$songs_item->release_date).'</div>
					<div>Artist: '.$songs_item->artist.'</div>
				</span>
			</div>
		</div>';
	}
	?>
	<?php else:?>
		<div>Tidak ada lagu saat ini.</div>
	<?php endif;?>
</div>