<div class="container content">
	<ol class="breadcrumb hidden-xs" style="margin-bottom: 5px;">
		<li><a href="/">Home</a></li>
		<li><a href="/event">Event</a></li>
		<li class="active"><?php echo $event[0]->title;?></li>
	</ol>
	<h1 style='font-family: "Trebuchet MS", Helvetica, sans-serif;'><?php echo $event[0]->title;?></h1>
	<div class="event-list-date" style="font-size:1.3em;"><?php echo date('d F Y',$event[0]->start_date).(($event[0]->start_date != $event[0]->end_date) ? ' - '.date('d F Y',$event[0]->end_date) : "")?></div><br/>
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<?php echo $event[0]->content;?>
		<br/><br/>
	</div>
</div>