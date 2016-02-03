  <div id="wrapper">
        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

				<?php 
					$getSettingImage = $this->Html->image('settings/settings.png', ['alt' => 'admin']); 
					$div = $this->Html->div(null,  $getSettingImage. 'Admin', array('id' => 'Dashboard'));
					echo $this->Html->link($div, array('controller' => 'dashboard', 'action' => 'index'), array('class' => 'light_blue', 'escape' => false));
				?>
				
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" id="toggle"><i class="fa fa-user"></i> 
						<?php
							$loguser = $this->request->session()->read('Auth.User');
							if($loguser) {
								echo $loguser['username'];
							}
						?>
					<b class="caret"></b></a>
                    <ul class="dropdown-menu" id="list">
                        <li>
							<?php
								$div = $this->Html->div(null, '<i class="fa fa-fw fa-user"></i> Profile', array('id' => 'Profile'));
								echo $this->Html->link($div, array('controller' => 'users', 'action' => 'index'), array('class' => 'light_blue', 'escape' => false));
							?>
                        </li>
						
                        <li>
							<?php
								$div = $this->Html->div(null, '<i class="fa fa-fw fa-gear"></i> Settings', array('id' => 'Settings'));
								echo $this->Html->link($div, array('controller' => 'users', 'action' => 'index'), array('class' => 'light_blue', 'escape' => false));
							?>
                        </li>
						
						
						
                        <li class="divider"></li>
						<li>
						  	<?php
								$div = $this->Html->div(null, '<i class="fa fa-fw fa-dashboard"></i> Home', array('id' => 'Settings'));
								echo $this->Html->link($div, '/', array('target'=>'blank','class' => 'light_blue', 'escape' => false));
							?>
						</li>
						<li>
						  	<?php
								$div = $this->Html->div(null, '<i class="fa fa-fw fa-power-off"></i> Logout', array('id' => 'Settings'));
								echo $this->Html->link($div, array('controller' => 'Users', 'action' => 'logout'), array('class' => 'light_blue', 'escape' => false));
							?>
						</li>
                    </ul>
                </li>
            </ul>