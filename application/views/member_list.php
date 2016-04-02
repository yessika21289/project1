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
				<div>'.$members_item['name'].'</div>
				<div>';
				if($members_item['socmed']['facebook'] != "")
					echo anchor('http://www.facebook.com/'.$members_item['socmed']['facebook'],img(array('src'=>'assets/img/fb-icon.png','alt'=>'member social media','width'=>'16')), array('target'=>'_blank'));
				if($members_item['socmed']['twitter'] != "")
					echo anchor('http://www.twitter.com/'.$members_item['socmed']['twitter'],img(array('src'=>'assets/img/twitter-icon.png','alt'=>'member social media','width'=>'16')), array('target'=>'_blank'));
				if($members_item['socmed']['instagram'] != "")
					echo anchor('http://www.instagram.com/'.$members_item['socmed']['instagram'],img(array('src'=>'assets/img/instagram-icon.png','alt'=>'member social media','width'=>'16')), array('target'=>'_blank'));
				if($members_item['socmed']['web'] != "")
					echo anchor('http://'.$members_item['socmed']['web'],img(array('src'=>'assets/img/web-icon.png','alt'=>'member social media','width'=>'16')), array('target'=>'_blank'));
		echo '
				</div>
			</div>
		</div>';
	}
	?>
</div>