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
<?php 
pr($userManager->getPaymentProfiles());
?>