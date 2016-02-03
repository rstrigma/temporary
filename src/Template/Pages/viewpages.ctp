<?php 
if( !empty($setPage)  && $setPage['headlayout']){			
	?><div class="green-banner">
		<div class="gren-bnr-cntnt">
			<p>ARE YOU A LAWN CARE PROFESSIONAL? </p>
			<?php echo $this->Html->link('Become A Partner', '/partners');?>
		</div>
		<button class="x-btn"></button>
	</div><?php 
}
?>

<?php echo $this->Element('front/sidebar'); ?>
	<div class="wrapper <?php if($setPage['slug']=='about-us' || $setPage['slug']=='terra-privacy-policy' || $setPage['slug']=='terms-of-service') { echo 'about-res';} ?>" id="bg-color">
			
			<?php 
			if($setPage['slug']=='partner') { 
				echo $this->Element('front/cityheader'); 
			} 
			else if($setPage['slug']=='about-us' || $setPage['slug']=='terms-of-service' || $setPage['slug']=='terra-privacy-policy') { 
				echo $this->Element('front/cityheader'); 
			} 
			else{ 
				echo $this->Element('front/header'); 
			}
			?>
			
			<?php
				if(!empty($setPage)){
					echo $setPage['content'];
				} else {
			?>
				<div class="content-layout">
		 <div class="banner-section page-404">
			 <div class="inner-404">
				<div class="page-header">
					  <h1>LAWN SERVICE APP by<span> Terra</span></h1>
					  <hr>
					  <div class="clear"></div>
				</div> <!-- 404_inner -->

				<div class="error-blank"></div>

				<div class="error-redirections">
					<h2>Visit our website for a look at our on demand services. </h2>
					<p>You can go to</p>
					<a href="/about-us"><i><img src="/img/images/open-book.png" alt="" /></i>ABOUT US</a>
					<span>or</span>
					<a href="/checkout"><i><img src="/img/images/rocket.png" alt="" /></i>BOOK LAWN SERVICE</a>
				</div>

			 </div>
		  </div>
	</div>
			<?php } ?>
		<div class="clear"></div>
		<?php echo $this->Element('front/footer'); ?>
	</div>