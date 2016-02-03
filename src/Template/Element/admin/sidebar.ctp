<div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
					<li>
							
						
						<a onclick="document.getElementById('light').style.display='block';document.getElementById('fade').style.display='block'" href="javascript:void(0)"><?php echo $this->Html->image('settings/admin1.png', ['alt' => 'admin']); ?></a>
						
					</li>
					
					<li class="active">
						<?php
							$div = $this->Html->div(null, '<i class="fa fa-fw fa-dashboard"></i> Dashboard', array('id' => 'Dashboard'));
							echo $this->Html->link($div, array('controller' => 'dashboard', 'action' => 'index'), array('class' => 'light_blue', 'escape' => false));
							?>
							
					</li>
					
					<li>
						<?php
							$div = $this->Html->div(null, '<i class="fa fa-user"></i> Profile', array('id' => 'Profile'));
							echo $this->Html->link($div, array('controller' => 'users', 'action' => 'index'), array('class' => 'light_blue', 'escape' => false));
						?>
					</li>

					<li>
                        <a data-target="#pages" data-toggle="collapse" href="javascript:;">
							<i class="fa fa-fw fa-file"></i> Pages 
							<i class="fa fa-fw fa-caret-down"></i>
						</a>
                        <ul class="collapse" id="pages">
                           <li>
						   <?php
								$div = $this->Html->div(null, '<i class="fa fa-fw fa-file"></i> View Pages', array('id' => 'Profile'));
								echo $this->Html->link($div, array('controller' => 'pages', 'action' => 'index'), array('class' => 'light_blue', 'escape' => false));
							?>
							</li>
                             <li>
						   <?php
								$div = $this->Html->div(null, '<i class="fa fa-fw fa-file"></i> Add Page', array('id' => 'Profile'));
								echo $this->Html->link($div, array('controller' => 'pages', 'action' => 'add'), array('class' => 'light_blue', 'escape' => false));
							?>
							</li>
                        </ul>
                    </li>
					
					<li>
                        <a data-target="#statescity" data-toggle="collapse" href="javascript:;">
							<i class="fa fa-fw fa-desktop"></i> States & City
							<i class="fa fa-fw fa-caret-down"></i>
						</a>
                        <ul class="collapse" id="statescity">
                           <li>
						   <?php
								$div = $this->Html->div(null, '<i class="fa fa-fw fa-file"></i> States', array('id' => 'Profile'));
								echo $this->Html->link($div, array('controller' => 'states', 'action' => 'index'), array('class' => 'light_blue', 'escape' => false));
							?>
							</li>
                             <li>
						   <?php
								$div = $this->Html->div(null, '<i class="fa fa-fw fa-file"></i> Cities', array('id' => 'Profile'));
								echo $this->Html->link($div, array('controller' => 'cities', 'action' => 'index'), array('class' => 'light_blue', 'escape' => false));
							?>
							</li>
                        </ul>
                    </li>
						
						
				</ul>
            </div>
            <!-- /.navbar-collapse -->
    </nav>