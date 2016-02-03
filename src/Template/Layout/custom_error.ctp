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
		<?php echo $this->Html->meta ( 'favicon.ico','/img/images/favicon.ico', array ('type' => 'icon', 'rel'=>'icon') );?>
		
		<!-- scripts --> 
		<?php echo $this->Html->script('jquery.min.js'); ?>
		<?php echo $this->Html->script('parallax.js'); ?>
		<?php echo $this->Html->script('custom.js'); ?>
		<script type="text/javascript">
			$( document ).ready(function() {
				$(".bacon").click(function() {
				$(".nav-right").slideToggle();
			});
			});
		</script>
		
		<?php echo $this->Html->script('admin/js/jquery.validate.min.js'); ?>
	</head>
	<body>
		<?php echo $this->fetch('content'); ?>
		<?php echo $this->Html->script('morphext.js'); ?>
       <script>
            $("#js-rotating").Morphext({
    // The [in] animation type. Refer to Animate.css for a list of available animations.
    animation: "pulse",
    // An array of phrases to rotate are created based on this separator. Change it if you wish to separate the phrases differently (e.g. So Simple | Very Doge | Much Wow | Such Cool).
    separator: ",",
    // The delay between the changing of each phrase in milliseconds.
    speed: 3000,
    complete: function () {
        // Called after the entrance animation is executed.
    }
});
        </script>
	</body>
</html>