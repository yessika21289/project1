<div class="container content">
	<ol class="breadcrumb" style="margin-bottom: 5px;">
		<li><a href="/">Home</a></li>
		<li class="active">Berita</li>
	</ol>
	<h1>Video</h1><br/>
	<?php foreach ($videos as $key => $videos_item) {
		echo '
		<div style="margin-bottom:50px;">
			<div class="col-sm-4 xs-12">
				<div class="videoWrapper">
					<iframe width="100%" src="https://www.youtube.com/embed/'.$videos_item->link.'?showinfo=0" frameborder="0" allowfullscreen></iframe>
				</div>
			</div>
			<div class="col-sm-8 xs-12 video-desc">
				<h3>'.$videos_item->title.'</h3>
				'.$videos_item->description.'
				</p>
			</div>
		</div>';
	}
	?>
</div>