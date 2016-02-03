<div <?php  if(empty($setPage) || $setPage['slug'] =='privacy_policy' || $setPage['slug'] =='terms' || $setPage['slug'] =='partners' || $setPage['slug'] =='checkout') {  echo '';} else{ echo 'id="how-it-works"'; } ?> class="header">
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
		
		function createAccount(){
			var jq = jQuery.noConflict();
			first_name = jq('#first_name').val();
			last_name = jq('#last_name').val();
			bussiness_name = jq('#bussiness_name').val();
			email = jq('#email').val();
			mobile = jq('#mobile').val();
			jq.ajax({
				url: '<?php echo $this->Url->build('registration'); ?>',
				type:'post',
				data:'first_name='+first_name+'&last_name='+last_name+'&bussiness_name='+bussiness_name+'&email='+email+'&mobile='+mobile,
				success:function(res){
					var json = jq.parseJSON(res);
					if(json.response==1){	
						var replace = '<div class="t-blue"><p>Registration Successfull.</p></div>';
						jq('.showForm').replaceWith(replace);
						//jq('.contact-form').replaceWith(json.data);
					}
				}
			});
		}
</script>