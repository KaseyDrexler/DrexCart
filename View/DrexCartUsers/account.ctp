<h1>My Account</h1>

<div class="panel panel-warning">

	<div class="panel-heading">
		<p class="panel-title">My Information</p>
	</div>
	<div class="panel-body">
		<div class="row">
			<div class="col-md-6 text-right">
				Name:
			</div>
			<div class="col-md-6">
				<?php echo $userManager->getFullName(); ?>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6 text-right">
				Email:
			</div>
			<div class="col-md-6">
				<?php echo $userManager->getUserEmail(); ?>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6 text-right">
				Contact Phone:
			</div>
			<div class="col-md-6">
				<?php echo $userManager->getContactPhone(); ?>
			</div>
		</div>
	</div>
</div>


<div class="panel panel-warning">

	<div class="panel-heading">
		<p class="panel-title">My Addresses</p>
	</div>
	<div class="panel-body">
		<div class="row">
			<div class="col-md-6">
				<b>Default Billing Address</b>
				<div class="well">
					<?php 
						$billing_address = $userManager->getBillingAddress();
						echo $DCFunctions->formatAddress($billing_address);
					?>
				</div>
			</div>
			<div class="col-md-6">
				<b>Default Shipping Address</b>
				<div class="well">
					<?php 
						$shipping_address = $userManager->getShippingAddress();
						echo $DCFunctions->formatAddress($shipping_address);
					?>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12 text-right"><?php echo $this->Html->link('Manage Addresses', '/DrexCartUsers/addresses'); ?></div>
		</div>
	</div>
</div>

<div class="row">

	<div class="col-md-6">
		<div class="panel panel-warning">
			<div class="panel-heading">
				<p class="panel-title">Payment Profiles <?php echo $this->Html->link('View All', '/DrexCartUsers/paymentProfiles/', array('class'=>'pull-right btn btn-link')); ?></p>
			</div>
			<div class="panel-body">
				<?php 
				$payment_profiles = $userManager->getPaymentProfiles();
				?>
				<table class="table table-condensed table-hover">
					<tr>
						<th><span style="font-size:10px;">Card</span></th>
						<th><span style="font-size:10px;">Exp Date</span></th>
					</tr>
					<?php 
					foreach($payment_profiles as $payment) {
					?>
					<tr>
						<td><span style="font-size:10px;"><?php echo substr($payment['DrexCartGatewayProfile']['account_number'], strlen($payment['DrexCartGatewayProfile']['account_number'])-4); ?></span></td>
						<td><span style="font-size:10px;"><?php echo date('m/d/Y', strtotime($payment['DrexCartGatewayProfile']['expiration'])); ?></span></td>
					</tr>
					<?php 
					}
					?>
				</table>
				<?php echo $this->Html->link('<i class="fa fa-plus"></i> Add Card', '/DrexCartUsers/paymentProfiles/', array('escape'=>false, 'class'=>'btn btn-link pull-right')); ?>
				<?php echo $this->Html->link('<i class="fa fa-cog"></i> Manage Profiles', '/DrexCartUsers/paymentProfiles/', array('escape'=>false, 'class'=>'btn btn-link pull-right')); ?>
				
			</div>
		</div>
	</div>
	<div class="col-md-6">
		<div class="panel panel-warning">
			<div class="panel-heading">
				<p class="panel-title">Order History <?php echo $this->Html->link('View All', '/DrexCartUsers/orders', array('class'=>'pull-right btn btn-link')); ?></p>
			</div>
			<div class="panel-body">
				<?php 
				$orders = $userManager->getOrders();
				?>
				<table class="table table-condensed table-hover">
					<tr>
						<th><span style="font-size:10px;">Order ID</span></th>
						<th><span style="font-size:10px;">Order Date</span></th>
						<th><span style="font-size:10px;">Status</span></th>
						<th><span style="font-size:10px;">Order Total</span></th>
						
					</tr>
					<?php 
					foreach($orders as $order) {
					?>
					<tr>
						<td><span style="font-size:10px;"><?php echo $order['DrexCartOrder']['id']; ?></span></td>
						<td><span style="font-size:10px;"><?php echo date('m/d/Y', strtotime($order['DrexCartOrder']['created_date'])); ?></span></td>
						<td><span style="font-size:10px;"><?php echo $order['DrexCartOrderStatus']['status_name']; ?></span></td>
						<td><span style="font-size:10px;"><?php echo date('m/d/Y', strtotime($order['DrexCartOrderTotal']['amount'])); ?></span></td>
					</tr>
					<?php 
					}
					?>
				</table>
			</div>
		</div>
	</div>
</div>
<?php 

?>