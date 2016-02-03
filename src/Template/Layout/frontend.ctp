<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0" />
		<meta charset="utf-8">
		
			<?php
				if(isset($pagesTitle) && !empty($pagesTitle)){
					echo '<title>'.$pagesTitle.'</title>';
				}
				else{  
					echo '<title>Page</title>'; 
				}; 
			?> 
		
		<?php echo $this->Html->css('front/css/style.css'); ?>
		<?php echo $this->Html->css('front/fonts/helveticaneue.css'); ?>
		<?php echo $this->Html->css('front/css/custom.css'); ?>
		<?php echo $this->Html->css('front/css/media.css'); ?>
		<?php echo $this->Html->css('front/css/font-awesome.min.css'); ?>
		<?php echo $this->Html->css('front/css/jquery.bxslider.css'); ?>
		<?php echo $this->Html->meta ( 'favicon.ico','/img/images/favicon.ico', array ('type' => 'icon', 'rel'=>'icon') );?>
		
		<!-- scripts --> 
		<?php echo $this->Html->script('jquery.min.js'); ?>
		<?php echo $this->Html->script('parallax.js'); ?>
		<?php echo $this->Html->script('custom.js'); ?>
		
		<script>
			  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
			  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
			  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
			  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

			  ga('create', 'UA-53938201-1', 'auto');
			  ga('send', 'pageview');
		</script>
		
		<?php echo $this->Html->script('admin/js/jquery.validate.min.js'); ?>
	</head>
	<body>
		<?php echo $this->fetch('content'); ?>
		<?php echo $this->Html->script('morphext.js'); ?>
       <script>
				$(document).on("click touchstart", ".mobile-slider", function () {
						$( "a.spinner" ).hide();
				});
				
				/*$( ".mobile-slider" ).click(function() {
				  $( "a.spinner" ).hide();
				});*/
				
				$("#js-rotating").Morphext({
						animation: "pulse",
						separator: ",",
						speed: 3000,
						complete: function () {
						}
				});
        </script>
		<?php echo $this->Html->script('jquery.bxslider.js'); ?>
		<script type="text/javascript">
				$( document ).ready(function() {
					$(".bacon").click(function() {
					$(".nav-right").slideToggle();
				});

				$('.bxslider').bxSlider({
						auto: false,
						autoControls: false,
						easing: 'easeOutElastic',
						speed: 1000,
						infiniteLoop: true,
						});
				});		
		</script>
	</body>
</html>