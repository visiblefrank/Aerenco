<div class="sns-croll-to-top">
	<a href="#" id="sns-totop" class=""><i class="fa fa-angle-up"></i></a>
	<script type="text/javascript">
		jQuery(function($){
			// back to top
			$("#sns-totop").hide();
			$(function () {
				var wh = $(window).height();
				var whtml =  $(document).height();
				$(window).scroll(function () {
					if ($(this).scrollTop() > whtml/10) {
						$('#sns-totop').fadeIn();
					} else {
						$('#sns-totop').fadeOut();
					}
				});
				$('#sns-totop').click(function () {
					$('body,html').animate({
						scrollTop: 0
					}, 800);
					return false;
				});
			});
			// end back to top
		});
	</script>
</div>