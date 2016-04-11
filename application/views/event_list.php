<div class="container content">
	<ol class="breadcrumb" style="margin-bottom: 5px;">
		<li><a href="/">Home</a></li>
		<li class="active">Event</li>
	</ol>
	<h1>Event Kawandasawolu</h1><br/>
	<?php foreach($events as $key=>$event_item){
		echo '
		<div class="col-xs-12 news-list-item">
			<h3><a href="/event/event_detail/'.$event_item->id.'">'.$event_item->title.'</a></h3>
			<div class="event-list-date">'.date('d F Y',$event_item->start_date).(($event_item->start_date != $event_item->end_date) ? ' - '.date('d F Y',$event_item->end_date) : "").'</div>
			<hr class="hr-event"/>
			'.$event_item->content.'
			<a href="/event/event_detail/'.$event_item->id.'">[Selengkapnya]</a>
		</div>';
	}
	?>
</div>