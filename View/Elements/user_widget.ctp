<?php 

/* @var $userManager DrexCartUserManager  */
if (isset($userManager) && $userManager->isLoggedIn()) {
	?>
	<div class="widget-user">
		<h3>Welcome, <?php echo $userManager->getUserEmail(); ?></h3>
		<div class="dropdown">
		  <a id="dLabel" role="button" data-toggle="dropdown" data-target="#" href="/DrexCartUsers/account" class="btn btn-default">
		    My Account <span class="caret"></span>
		  </a>
		
		
		  <ul class="dropdown-menu pull-right" role="menu" aria-labelledby="dLabel">
		    <li><?php echo $this->Html->link('My Account', '/DrexCartUsers/account'); ?></li>
		    <li><?php echo $this->Html->link('My Orders', '/DrexCartUsers/orders'); ?></li>
		    <li class="divider"></li>
		    <li><?php echo $this->Html->link('Logout', '/DrexCartUsers/logout'); ?></li>
		  </ul>
		</div>
	</div>
	<?php 
}

?>