<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Kawandasawolu</title>

	<?php
	echo link_tag('assets/css/front.css');
	echo link_tag('assets/css/bootstrap.min.css');
	echo link_tag('assets/css/scrolling-nav.css');
	?>
</head>
<body style="background-image:url(/assets/img/batik_grad.jpg); background-position:top right; background-size:cover">
<?php include('header_fixed.php');?>
<div class="container news-list" style="height:1000px;padding-top:120px;">
	<ol class="breadcrumb" style="margin-bottom: 5px;">
		<li><a href="/">Home</a></li>
		<li><a href="/song">Song</a></li>
		<li class="active">Lirik</li>
	</ol>
	<h1>Judul</h1>
	<br/>
	<div class="col-xs-12">
		<img src="/assets/img/scene.jpeg" width="200" height="200" />
		<br/><br/>Tahun:<br/><br/>
		<div style="width:500px; height:50px; border:1px black solid;"></div>
		
		<div class="lyric">
		<?php
		echo nl2br("
		All I hear is raindrops 
Falling on the rooftop 
Oh baby tell me why'd you have to go 
Cause this pain I feel 
It won't go away 
And today I'm officially missing you 
I thought that from this heartache 
I could escape 
But I fronted long enough to know 
There ain't no way 
And today 
I'm officially missing you 

Oh can't nobody do it like you 
Said every little thing you do 
Hey baby say it stays on my mind 
And I, I'm officially 

All I do is lay around 
Two ears full tears 
From looking at your face on the wall 
Just a week ago you were my baby 
Now I don't even know you at all 
I don't know you at all 
Well I wish that you would call me right now 
So that I could get through to you somehow 
But I guess it's safe to say baby safe to say 
That I'm officially missing you 

Oh can't nobody do it like you 
Said every little thing you do 
Hey baby say it stays on my mind 
And I, I'm officially 

Well I thought I could just get over you baby 
But I see that's something I just can't do 
From the way you would hold me 
To the sweet things you told me 
I just can't find a way 
To let go of you 

It's official 
You know that I'm missing you 
Yeah yes 
All I hear is raindrops 
And I'm officially missing you
");?>
		</div>

	</div>
	
</div>
<script type="text/javascript" src="/assets/js/jquery-2.2.0.min.js"></script>
<script type="text/javascript" src="/assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/assets/js/skrollr.min.js"></script>
<script type="text/javascript" src="/assets/js/scrolling-nav.js"></script>
</body>
</html>