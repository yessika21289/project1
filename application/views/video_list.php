<div class="container content">
	<ol class="breadcrumb hidden-xs" style="margin-bottom: 5px;">
		<li><a href="/">Home</a></li>
		<li class="active">Berita</li>
	</ol>
	<h1>Video</h1><br/>
	<?php if(!empty($videos)):?>
	<div class="grid">
	<?php foreach ($videos as $key => $videos_item) {
		echo '
		<div class="grid-video">
			<div>
				<div class="video-caption">'.$videos_item->title.'</div>
				<div class="videoWrapper">
					<iframe width="100%" src="https://www.youtube.com/embed/'.$videos_item->link.'?showinfo=0" frameborder="0" allowfullscreen></iframe>
				</div>
				<div class="video-description">'.$videos_item->description.'</div>
			</div>
		</div>';
	}
	?>
	</div>
	<?php else:?>
		<div>Tidak ada video saat ini.</div>
	<?php endif;?>
</div>

<!-- Masonry script // gallery thumbnail -->
<script type="text/javascript" src="/assets/js/masonry.pkgd.min.js"></script>
<script type="text/javascript" src="/assets/js/imagesloaded.pkgd.js"></script>
<script type="text/javascript">
var $grid = $('#grid').imagesLoaded( function() {
	$('.grid').masonry({
	  // options
	  itemSelector: '.grid-video',
	  columnWidth: 10,
	  percentPosition: true,
	});
})
</script>
<!-- ==================================== -->