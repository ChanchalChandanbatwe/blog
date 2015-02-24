<?php $userId = AuthComponent::user('id'); ?>
<div class="navbar-wrapper">
      <div class="container">
        <nav class="navbar navbar-default navbar-fixed-top">
          <div class="container">
            <div class="navbar-header">
              <a href="#" class="navbar-brand">Blog's</a>
            </div>
            <div class="navbar-collapse collapse" id="navbar">
              <ul class="nav navbar-nav">
                
                <li class="dropdown">
                  <a aria-expanded="false" role="button" data-toggle="dropdown" class="dropdown-toggle" href="#">Post <span class="caret"></span></a>
                  <ul role="menu" class="dropdown-menu">
                    <li><?php echo $this->Html->link('List', array('controller' => 'Posts', 'action' => 'index')); ?></li>
                    <li class="divider"></li>
                    <?php
											if(!empty($userId)) {
												echo "<li>" . $this->Html->link('Add Post', array('controller' => 'posts', 'action' => 'add')) . "</li>"; 
											} 
										?>
                    
                  </ul>
                </li>
              </ul>
              <ul class="nav navbar-nav navbar-right">
		            <?php if(!empty($userId)) { ?>
								<li class="dropdown">
                  <a aria-expanded="false" role="button" data-toggle="dropdown" class="dropdown-toggle" href="#"><?php echo AuthComponent::user('username'); ?> <span class="caret"></span></a>
                  <ul role="menu" class="dropdown-menu">
                    <li><?php echo $this->Html->link('Profile', array('controller' => 'Users', 'action' => 'edit')); ?></li>
                    <li><?php echo $this->Html->link("Logout", array('controller' => 'users', 'action' => 'logout')); ?>
                    </li>
                    
                    
                  </ul>
                </li>
                <?php } else {
                		echo "<li>".$this->Html->link("Login", array('controller' => 'users', 'action' => 'login'))."</li>";
                	}
                ?>

		          </ul>
            </div>
          </div>
        </nav>

      </div>
    </div>