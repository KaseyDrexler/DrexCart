<?php 
$this->Html->addCrumb('My Account', '/DrexCartUsers/account');
$this->Html->addCrumb('My Addresses');

?>
<h1>My Addresses</h1>


<p class="text-right"><?php echo $this->Html->link('<i class="fa fa-plus"></i> Add Address', 'javascript:loadAddressDetails();', array('class'=>'btn btn-link', 'escape'=>false)); ?></p>

<table class="table table-hover">
	<tr>
		<th>Name</th>
		<th>Address</th>
		<th></th>
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
			<td>
				<?php echo $this->Html->link('Edit', 'javascript:loadAddressDetails('.$address['DrexCartAddress']['id'].');', array('class'=>'btn btn-default btn-xs')); ?>
				<?php echo $this->Html->link('Delete', '/DrexCartUsers/addressesDelete/'.$address['DrexCartAddress']['id'], array('class'=>'btn btn-danger btn-xs')); ?>
			</td>
		</tr>
		<?php 
		}
	}
	?>
</table>
<p class="text-right"><?php echo $this->Html->link('<i class="fa fa-plus"></i> Add Address', 'javascript:loadAddressDetails();', array('class'=>'btn btn-link', 'escape'=>false)); ?></p>