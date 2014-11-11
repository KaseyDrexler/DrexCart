<?php 

$this->Html->addCrumb('My Account', '/DrexCartUsers/account');
$this->Html->addCrumb('Payment Profiles');

?>

<h1>My Payment Profiles</h1>
<?php 
$payment_profiles = $userManager->getPaymentProfiles();
?>
<p><b>Number of Payment Profiles:</b> <?php echo sizeof($payment_profiles); ?></p>
<table class="table table-condensed table-hover">
	<tr>
		<th><span style="font-size:10px;">Card</span></th>
		<th><span style="font-size:10px;">Exp Date</span></th>
		<th></th>
	</tr>
	<?php 
	foreach($payment_profiles as $payment) {
	?>
	<tr>
		<td><span style="font-size:10px;"><?php echo substr($payment['DrexCartGatewayProfile']['account_number'], strlen($payment['DrexCartGatewayProfile']['account_number'])-4); ?></span></td>
		<td><span style="font-size:10px;"><?php echo date('m/d/Y', strtotime($payment['DrexCartGatewayProfile']['expiration'])); ?></span></td>
		<td><?php echo $this->Html->link('Delete', '/DrexCartUsers/paymentProfiles/delete:'.$payment['DrexCartGatewayProfile']['id'], array('class'=>'btn btn-xs btn-danger', 'confirm'=>'Are you sure?')); ?></td>
	</tr>
	<?php 
	}
	?>
</table>
<?php echo $this->Html->link('<i class="fa fa-plus"></i> Add Card', 'javascript:loadGatewayProfileDetails();', array('escape'=>false, 'class'=>'btn btn-link pull-right')); ?>

