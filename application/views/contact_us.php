<div class="container content">
	<ol class="breadcrumb" style="margin-bottom: 5px;">
		<li><a href="/">Home</a></li>
		<li class="active">Contact Us</li>
	</ol>
	<h1>Contact Kawandasawolu</h1>
	<div class="col-sm-7 col-xs-12" style="margin-bottom:25px;">
	Kami sangat menantikan Anda. Silakan isi form di bawah ini untuk menghubungi kami.
	<?php echo form_open(base_url().'contact/send');?>
		Nama<br/>
		<?php echo form_input($form_nama);?>
		Email<br/>
		<?php echo form_input($form_email);?>
		Subject<br/>
		<?php echo form_input($form_subject);?>
		Pesan<br/>
		<?php echo form_textarea($form_msg);?>
		<?php echo form_submit($form_submit);?>
	</div>
	<div class="col-sm-5 col-xs-12">
		<div style="margin-bottom:10px; text-align:right">
			<img src="/assets/img/fb_big.png" width="32" />&nbsp;&nbsp;&nbsp;
			<img src="/assets/img/twitter.png" width="32" />&nbsp;&nbsp;&nbsp;
			<img src="/assets/img/instagram.png" width="32" />

		</div>
		<div style="margin-bottom:10px; text-align:right">
			<div>
				<div style="color:#999999; margin-bottom:-10px;">Phone</div>
				+62 1234567578536
			</div>
			<div>
				<div style="color:#999999; margin-bottom:-10px;">Email</div>
				kawandasawolu@gmail.com
			</div>
		</div>
	</div>
</div>