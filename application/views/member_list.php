<div class="container content">
	<ol class="breadcrumb hidden-xs" style="margin-bottom: 5px;">
		<li><a href="/">Home</a></li>
		<li class="active">Anggota</li>
	</ol>
	<h1>Anggota Kawandasawolu</h1><br/>
	<?php if(!empty($members)):?>
	<?php foreach ($members as $key => $members_item) {
		echo '
		<div class="col-lg-2 col-md-3 col-sm-4 col-ms-4 col-xs-6 member-list-item">
			'.img(array('src'=>'/'.$members_item['avatar'],'alt'=>$members_item['name'].' Kawandasawolu','width'=>'100%','class'=>'img-profile')).'
			<div class="member-item-info">
				<div><strong>'.$members_item['name'].'</strong></div>
				<div>';
				if(isset($members_item['socmed']['facebook']))
					echo anchor('http://www.facebook.com/'.$members_item['socmed']['facebook'],img(array('src'=>'assets/img/facebook-flat.png','alt'=>'facebook' .$members_item['name'],'width'=>'24')), array('target'=>'_blank'));
				if(isset($members_item['socmed']['twitter']))
					echo anchor('http://www.twitter.com/'.$members_item['socmed']['twitter'],img(array('src'=>'assets/img/twitter-flat.png','alt'=>'twitter '.$members_item['name'],'width'=>'24')), array('target'=>'_blank'));
				if(isset($members_item['socmed']['instagram']))
					echo anchor('http://www.instagram.com/'.$members_item['socmed']['instagram'],img(array('src'=>'assets/img/instagram-flat.png','alt'=>'instagram '.$members_item['name'],'width'=>'24')), array('target'=>'_blank'));
				if(isset($members_item['socmed']['web']))
					echo anchor('http://'.$members_item['socmed']['web'],img(array('src'=>'assets/img/web-flat.png','alt'=>'website '.$members_item['name'],'width'=>'24')), array('target'=>'_blank'));
		echo '
				</div>
			</div>
		</div>';
	}
	?>
	<?php else:?>
		<div>Tidak ada anggota saat ini.</div>
	<?php endif;?>
</div>
</div>