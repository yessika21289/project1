<div class="container content">
	<ol class="breadcrumb hidden-xs" style="margin-bottom: 5px;">
		<li><a href="/">Home</a></li>
		<li class="active">Berita</li>
	</ol>
	<h1>Berita Kawandasawolu</h1><br/>
	<?php if(!empty($news)):?>
	<?php foreach($news as $key=>$news_item){
		echo '
		<div class="col-xs-12 news-list-item">
			<h3><a href="/news/news_detail/'.$news_item->id.'">'.$news_item->title.'</a></h3>
			<div class="news-list-date">'.date('d F Y H:i:s',$news_item->created_at).'</div>
			'.word_limiter($news_item->content,64).'
			<a href="/news/news_detail/'.$news_item->id.'">[Selengkapnya]</a>
		</div>';
	}
	?>
	<?php else:?>
		<div>Tidak ada berita saat ini.</div>
	<?php endif;?>
</div>