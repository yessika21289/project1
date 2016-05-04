<div class="container content">
	<ol class="breadcrumb hidden-xs" style="margin-bottom: 5px;">
		<li><a href="/">Home</a></li>
		<li class="active">Lagu</li>
	</ol>
	<h1>Kumpulan Lagu</h1><br/>
	<?php if(!empty($songs)):?>
	<?php foreach ($songs as $key => $songs_item) {
		echo '
		<div class="col-lg-4 col-md-6 col-sm-6 col-xs-12" style="margin-bottom:20px">
			<div class="song-cover">
				<img src="/'.$songs_item->song_cover_path.'" width="100" height="100" />
			</div>
			<div class="song-desc">
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