<div class="header">
	<div class="container">
		<?php //echo $this->Html->link('', '/', array('class'=>'logo'));?>
		<a class="logo" href="/">
				Terra, the
				<span id="js-rotating">Lawn Service, Junk Hauling, Home Automation, Property Management</span>
				App
		</a>
		<a class="bacon" href="#"></a>
		<div class="nav-right">
			<nav>
				<ul>
					<li><?php echo $this->Html->link('How It Works', '/how-it-works');?></li>
					<li><?php echo $this->Html->link('Services', '/on-demand-services');?></li>
					<li><?php echo $this->Html->link('Cities', '/cities');?></li>
					<li><?php echo $this->Html->link('Partners', '/partners');?></li> 
					<li><?php  echo $this->Html->link('<i class="fa fa-facebook"></i>',"https://www.facebook.com/TerraLawnServiceApp",['escape' => false]);?></li> 
					<li><?php  echo $this->Html->link('<i class="fa fa-twitter"></i>',"https://twitter.com/terra_app",['escape' => false]);?></li> 
				</ul>
			</nav>
		</div>
	</div>
</div>
<script type="text/javascript">
		$( document ).ready(function() {
			$(".x-btn").click(function() {
				$(".green-banner").hide();
			});
		});
</script>