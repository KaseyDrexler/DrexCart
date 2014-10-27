<?php 
$this->Html->addCrumb('My Account', '/DrexCartUsers/account');
$this->Html->addCrumb('My Addresses');

?>
<h1>My Addresses</h1>


<table class="table table-hover">
	<tr>
		<th>Name</th>
		<th>Address</th>
		<th></th>
	</tr>
	<?php 
	if (isset($addresses)) {
		foreach($addresses as $address) {

		?>
		<tr>
			<td><?php echo $address['DrexCartAddress']['firstname'] . ' ' . $address['DrexCartAddress']['lastname']; ?></td>
			<td><?php echo $address['DrexCartAddress']['address1']; ?><br />
				<?php echo $address['DrexCartAddress']['address2'] ? $address['DrexCartAddress']['address2'].'<br />' : ''; ?>
				<?php echo $address['DrexCartAddress']['city']; ?>, <?php echo $address['DrexCartAddress']['state']; ?> <?php echo $address['DrexCartAddress']['zip']; ?>
				</td>
			<td><?php 
				if ($userManager->getBillingAddress()['DrexCartAddress']['id']==$address['DrexCartAddress']['id']) {
					echo '<span class="label label-success">Default Billing</span> ';
				}
				if ($userManager->getShippingAddress()['DrexCartAddress']['id']==$address['DrexCartAddress']['id']) {
					echo '<span class="label label-success">Default Shipping</span> ';
				}
			?></td>
		</tr>
		<?php 
		}
	}
	?>
</table>