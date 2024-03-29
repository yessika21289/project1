<div class="container content">
	<ol class="breadcrumb hidden-xs" style="margin-bottom: 5px;">
		<li><a href="/">Home</a></li>
		<li class="active">Merchandise</li>
	</ol>
	<h1>Merchandise</h1><br/>
	<div id="how-to-buy">
	<h3>Cara Beli</h3>
	<div class="how-to-buy-text">
	<?php if(!empty($howtobuy)) echo $howtobuy; ?>
	</div>
	<hr/>
	</div>
	<?php if(!empty($merchandise)):?>
	<div class="grid">
	<?php
		foreach ($merchandise as $key => $merchandise_item) {
			echo '<div class="grid-photo">
					<img src="/'.$merchandise_item->image.'" width="100%" alt="'.$merchandise_item->title.'"/>
					<div class="merchandise-item-info">
						<div class="merchandise-item-title">'.$merchandise_item->title.'</div>
						<span>'.$merchandise_item->description.'</span>
						<hr/>
						<span>IDR '.number_format($merchandise_item->price,2,",",".").'</span>
					</div>
				</div>';
		}
	?>
	</div>
	<?php else:?>
		<div>Tidak ada merchandise saat ini.</div>
	<?php endif;?>
</div>
</div>

<!-- Masonry script // gallery thumbnail -->
<script type="text/javascript" src="/assets/js/masonry.pkgd.min.js"></script>
<script type="text/javascript" src="/assets/js/imagesloaded.pkgd.js"></script>
<script type="text/javascript">
$(window).load(function(){
	var $grid = $('#grid').imagesLoaded( function() {
		$('.grid').masonry({
		  // options
		  itemSelector: '.grid-photo',
		  columnWidth: 10,
		  percentPosition: true,
		});
	})
})
</script>
<!-- ==================================== -->