<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */


?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo 'DrexDesign' ?>:
		<?php echo $this->fetch('title'); ?>
	</title>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<?php
		echo $this->Html->meta('icon');

		
		echo $this->Html->css('DrexCart.bootstrap.min');
		echo $this->Html->css('DrexCart.font-awesome.min');
		echo $this->Html->css('DrexCart.main');
		
		echo $this->Html->script('DrexCart.bootstrap.min');
		echo $this->Html->script('DrexCart.drexcart');
		echo $this->Html->script('DrexCart.kaseydrexler');
		
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
	<!-- Google Font -->
	<link href='http://fonts.googleapis.com/css?family=Noto+Sans' rel='stylesheet' type='text/css'>
</head>
<body>
	<div id="container">
		<!-- Header Begin -->
		<div id="header">
			
		</div>
		<!-- Header End -->
		<!-- Content Begin -->
		<div id="content">
			<table cellpadding="0" cellspacing="0" width="100%">
			<tr>
				<td colspan="3"><h1>DrexCart Admin</h1></td>
			</tr>
			<tr>
				<td valign="top" width="150">
					<div id="panel_left_nav">
						<?php echo $this->element('DrexCart.admin_left_nav'); ?>
					</div>
				</td>
				<td valign="top">
					<div id="panel_content">
						<?php 
						if (sizeof($this->Html->getCrumbList())>0) {
							?>
							<div class="breadcrumb">
								<?php echo $this->Html->getCrumbs(' <i class="fa fa-chevron-right"></i> '); ?>
							</div>
							<?php 
						}
						?>
						<?php echo $this->Session->flash(); ?>
					
		
						<?php echo $this->fetch('content'); ?>
					</div>
				</td>
				<td valign="top" width="400">
					<div class="row">
					<div id="panel_right">
						</div>
					</div>
				</td>
			</tr>
			</table>
		</div>
		<!-- Content End -->
		<!-- Footer Begin -->
		<div id="footer">
			
		</div>
		<!-- Footer End -->
	</div>
	<?php //echo $this->element('sql_dump'); ?>

</body>
</html>
