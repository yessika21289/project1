<div class="container content">
	<ol class="breadcrumb" style="margin-bottom: 5px;">
		<li><a href="/">Home</a></li>
		<li><a href="/gallery">Galeri Album</a></li>
		<li class="active">Galeri Foto</li>
	</ol>
	<h1>Galeri Album</h1><br/>

	<div class="grid">
	<?php
		foreach ($photos as $key => $photos_item) {
			echo '<div class="grid-photo"><img src="/'.$photos_item->photo.'" width="100%" alt=""/></div>';
		}
	?>
	</div>
</div>

<!-- Masonry script // gallery thumbnail -->
<script type="text/javascript" src="/assets/js/masonry.pkgd.min.js"></script>
<script type="text/javascript" src="/assets/js/imagesloaded.pkgd.js"></script>
<script type="text/javascript">
var $grid = $('#grid').imagesLoaded( function() {
	$('.grid').masonry({
	  // options
	  itemSelector: '.grid-photo',
	  columnWidth: 10,
	  percentPosition: true,
	});
})
</script>
<!-- ==================================== -->