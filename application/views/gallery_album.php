<div class="container content">
	<ol class="breadcrumb hidden-xs" style="margin-bottom: 5px;">
		<li><a href="/">Home</a></li>
		<li class="active">Galeri Album</li>
	</ol>
	
	<h1>Galeri Album</h1><br/>
	<?php if(!empty($albums)):?>
	<?php
		$album_no = 0;
		foreach ($albums as $key => $albums_item) {
			$count_photos = count($albums_item->photos);

			if($count_photos == 0)
				continue;
			elseif($count_photos == 1){
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

			$album_no++;

			echo '<a href="/gallery/photo/'.$albums_item->id.'">';

			if($album_no == 1)
				echo '<div class="col-md-6 col-sm-4 col-ms-6 col-xs-12 album-cover-first">';
			else
				echo '<div class="col-md-3 col-sm-4 col-ms-6 col-xs-12 album-cover">';

			echo '<div style="border: 5px #999999 solid; height: inherit; width:auto">';
			foreach ($albums_item->photos as $key2 => $photos_item) {
				echo '<div class="album-cover-photo"
					style="width:'.$width.'; height:'.$height.'; float:left;
					background-image:url(\'/'.$photos_item->photo.'\'); background-repeat:no-repeat; background-position:center; background-size:cover">';
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
			</div>
			</a>';

		}
	?>
	<?php else:?>
		<div>Tidak ada foto saat ini.</div>
	<?php endif;?>
</div>

<script>
	$(document).ready(function(){
		var width_cover_first = $('.album-cover-first').width();
		$('.album-cover-first').height(width_cover_first);

		var width_cover = $('.album-cover').width();
		$('.album-cover').height(width_cover);
	})
</script>