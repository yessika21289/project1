<div class="container content">
	<ol class="breadcrumb" style="margin-bottom: 5px;">
		<li><a href="/">Home</a></li>
		<li><a href="/gallery">Galeri Album</a></li>
		<li class="active"><?php echo $photos[0]->title;?></li>
	</ol>
	<h1 style='font-family: "Trebuchet MS", Helvetica, sans-serif;'><?php echo $photos[0]->title;?></h1><br/>

	<div class="grid">
	<?php
		foreach ($photos[0]->photos as $key => $photos_item) {
			$path_section = explode('/',$photos_item->photo);
            $thumb_path = $path_section[0] . '/' . $path_section[1] . '/' . $path_section[2] . '/thumb/thumb_' . $path_section[3];
			echo '<div class="grid-photo">
				<a class="album_photo" rel='.str_replace(' ','_','album').' href="/'.$photos_item->photo.'">
					<img src="/'.$thumb_path.'" width="100%" alt=""/>
				</a>
			</div>';
		}
	?>
	</div>
</div>

<!-- Masonry script // gallery thumbnail -->
<script type="text/javascript" src="/assets/js/imagesloaded.pkgd.js"></script>
<script type="text/javascript" src="/assets/js/masonry.pkgd.min.js"></script>
<script type="text/javascript" src="/assets/jquery-fancybox/jquery.fancybox.pack.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	var $grid = $('#grid').imagesLoaded( function() {
		$('.grid').masonry({
		  // options
		  itemSelector: '.grid-photo',
		  columnWidth: 10,
		  percentPosition: true,
		});
	})
	$("a.album_photo").fancybox();
})
</script>
<!-- ==================================== -->