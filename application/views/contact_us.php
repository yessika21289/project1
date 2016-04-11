<div class="container content">
	<ol class="breadcrumb" style="margin-bottom: 5px;">
		<li><a href="/">Home</a></li>
		<li class="active">Kontak Kami</li>
	</ol>
	<h1>Kontak Kawandasawolu</h1>
	<div class="col-sm-7 col-xs-12" style="margin-bottom:25px;">
	Kami sangat menantikan Anda. Silakan isi form di bawah ini untuk menghubungi kami.
	<br/><br/>
	<?php 
		if($send_mail == 'success')
			echo '<div class="mail-notif-success">Pesan terkirim.</div>';
		elseif($send_mail == 'failed')
			echo '<div class="mail-notif-failed">Gagal mengirim pesan. Silakan coba kembali.</div>';
	?>
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
			<div>
				<span style="color:#999999; margin-bottom:-10px;">Email</span><br/>
				management@kawandasawolu.com
			</div>
		</div>
	</div>
</div>