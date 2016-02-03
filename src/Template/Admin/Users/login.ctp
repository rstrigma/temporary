	<!--div class="logo"><?php //echo $this->Html->image('mee.JPG', ['alt' => 'image	']); ?></div-->
	<div class="login-block">
	   
		<?php echo  $this->Form->create() ?>
		<fieldset>
			<legend><?php echo  __(' Admin Login') ?></legend>
			<?php echo  $this->Form->input('username') ?>
			<?php echo  $this->Form->input('password') ?>
		   <?php 
							$session = $this->request->session();
							if ($session->read('Flash.flash')) {
								echo '<div class="alert alert-danger">';
								echo $this->Flash->render(); 
									echo '</div>';
							}
			?>
	   </fieldset>
	<?php echo  $this->Form->button(__('Submit')); ?>
	<?php echo  $this->Form->end() ?>
	</div> 
 
 
 
 