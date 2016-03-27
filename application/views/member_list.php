<div class="container content">
	<ol class="breadcrumb" style="margin-bottom: 5px;">
		<li><a href="/">Home</a></li>
		<li class="active">Anggota</li>
	</ol>
	<h1>Anggota Kawandasawolu</h1><br/>
	<?php foreach ($members as $key => $members_item) {
		echo '
		<div class="col-lg-2 col-md-3 col-sm-4 col-xs-6 member-list-item">
			'.img(array('src'=>'/'.$members_item['avatar'],'alt'=>'profile1','width'=>'100%','class'=>'img-profile')).'
			<div class="member-item-info">
				<div>Willi Kristianto Febriana</div>
				<div>
					'.img(array('src'=>'assets/img/fb.png','alt'=>'member social media')).'
					'.img(array('src'=>'assets/img/twitter.png','alt'=>'member social media')).'
				</div>
			</div>
		</div>';
	}
	?>
</div>