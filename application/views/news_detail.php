<div class="container content">
	<ol class="breadcrumb" style="margin-bottom: 5px;">
		<li><a href="/">Home</a></li>
		<li><a href="/news">Berita</a></li>
		<li class="active"><?php echo $news[0]->title;?></li>
	</ol>
	<h1 style='font-family: "Trebuchet MS", Helvetica, sans-serif;'><?php echo $news[0]->title;?></h1><br/>
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<?php echo $news[0]->content;?>
		<br/><br/>
	</div>
</div>