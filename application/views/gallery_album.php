<div class="container content">
	<ol class="breadcrumb" style="margin-bottom: 5px;">
		<li><a href="/">Home</a></li>
		<li class="active">Galeri Album</li>
	</ol>
	
	<h1>Galeri Foto</h1><br/>
	<?php
		foreach ($albums as $key => $albums_item) {
			if($key == 0)
				echo '<div class="col-md-6 col-sm-4 col-ms-6 col-xs-12 album-cover-first">';
			else
				echo '<div class="col-md-3 col-sm-4 col-ms-6 col-xs-12 album-cover">';

			$count_photos = count($albums_item->photos);
			if($count_photos == 1){
				$width = '100%';
				$height = '100%';
				$key_break = 0;
			}
			elseif($count_photos <= 3){
				$width = '50%';
				$height = '100%';
				$key_break = 1;
			}
			else{
				$width = '50%';
				$height = '50%';
				$key_break = 3;
			}
			echo '<div style="border: 5px #999999 solid; height: inherit; width:auto">';
			foreach ($albums_item->photos as $key2 => $photos_item) {
				echo '<div class="album-cover-photo"
					style="width:'.$width.'; height:'.$height.'; float:left;
					background-image:url(\'/'.$photos_item->photo.'\'); background-repeat:no-repeat; background-position:center; background-size:cover">sdffsdfsf';
				echo '</div>';

				if($key2 == $key_break) break;
			}
			echo '
				<div class="col-xs-12 album-cover-desc-cont">
					<div class="album-cover-desc">
						<div>
							'.anchor('/gallery/photo/'.$albums_item->id,$albums_item->title).'
						</div>
					</div>
				</div>
				</div>
			</div>';
		}
	?>
</div>

<script>
	$(document).ready(function(){
		var width_cover_first = $('.album-cover-first').width();
		$('.album-cover-first').height(width_cover_first);

		var width_cover = $('.album-cover').width();
		$('.album-cover').height(width_cover);
	})
</script>