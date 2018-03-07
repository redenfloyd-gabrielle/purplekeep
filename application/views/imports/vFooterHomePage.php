	<!--
		<footer>
			<div class = "col-sm-12 footer-content">
				<div class = "col-sm-6 footer-left">
				</div>
				<div class = "col-sm-6">
					<div class = "col-sm-6 footer-right">
						<span class = "footer-right1">www.DailyEvents.com</span>
						<span class = "footer-right2">Follow us on our social media pages</span>
					</div>
				</div>
				<div class = "col-sm-12 footer-bottom">
					Copyright © DailyEvents.com - All rights reserved
				</div>
				<div class = "col-sm-12 footer-bottom">
					University of San Carlos - Department of Computer and Information Sciences
				</div>
			</div>
		</footer> -->

	</body>
</html>


<?php echo isset($custom_js) ? $custom_js : '' ?>

<!--   Core JS Files   -->

<!-- <script src="<?php echo base_url('assets/js/jquery.min.js')?>"></script> -->
<script src="<?php echo base_url('assets/js/bootstrap.min.js')?>"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
	<script>
	$(function() {
	    $('a[href*=#]:not([href=#])').click(function() {
	        var target = $(this.hash);
	        target = target.length ? target : $('[name=' + this.hash.substr(1) +']');
	        if (target.length) {
	            $('html,body').animate({
	              scrollTop: target.offset().top
	            }, 1000, 'easeOutExpo');
	            return false;
	        }
	    });
	});
	</script>
	<script>
	$(document).ready(function(){
		$('#audio-welcome').trigger('play');
	});
	</script>
