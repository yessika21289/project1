<img src="/assets/img/clouds_grey.png" id="back-clouds" style="position:fixed; bottom:0; z-index:-1; height:40%" />
<img src="/assets/img/becak_tugu_pohon_grey.png" id="back-becak" style="position:fixed; bottom:0; z-index:-1; height:30%; left:10%" />
<?php include('footer.php');?>
<script type="text/javascript" src="/assets/js/jquery-2.2.0.min.js"></script>
<script type="text/javascript" src="/assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/assets/js/skrollr.min.js"></script>
<script type="text/javascript" src="/assets/js/scrolling-nav.js"></script>
<script type="text/javascript">
	/*function stickyScroll(){
		var max = Math.max($(document).height(), $(window).height()) - $(window).innerHeight();
		console.log($(window).scrollTop() + ' - ' + $(window).innerHeight() + ' - ' + Math.max($(document).height(), $(window).height()) + ' - ' + max);
		if($(window).scrollTop() == max){
			$('#back-clouds, #back-becak').animate({
				bottom:52
			},1000);
		}
		else{
			$('#back-clouds, #back-becak').animate({
				bottom:0
			},1000);
		}
	}
	window.addEventListener('scroll', stickyScroll, false);*/
</script>
</body>
</html>