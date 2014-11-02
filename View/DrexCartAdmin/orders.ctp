<h1>Orders</h1>

<table class="table table-condensed table-hover">
	<tr>
		<th>Order ID</th>
		<th>Order Date</th>
		<th>User</th>
		<th>Billing</th>
		<th>Shipping</th>
		<th>Total</th>
	</tr>
	
	<?php 
	foreach($orders as $order) {
	?>
		<tr>
			<td><?php echo $order['DrexCartOrder']['id']; ?></td>
			<td><?php echo date('m/d/Y h:i a', strtotime($order['DrexCartOrder']['created_date'])); ?></td>
			<td><?php echo $order['DrexCartUser']['firstname'] . ' ' . $order['DrexCartUser']['lastname']; ?></td>
			<td><?php echo $order['DrexCartOrder']['billing_firstname'] . ' ' . $order['DrexCartOrder']['billing_lastname']; ?><br />
				<?php echo $order['DrexCartOrder']['billing_address1']; ?><br />
				<?php echo $order['DrexCartOrder']['billing_address2'] ? $order['DrexCartOrder']['billing_address2'].'<br />' : ''; ?>
				<?php echo $order['DrexCartOrder']['billing_city'] . ', ' . $order['DrexCartOrder']['billing_state'] . ' ' . $order['DrexCartOrder']['billing_zip']; ?></td>
			<td><?php echo $order['DrexCartOrder']['shipping_firstname'] . ' ' . $order['DrexCartOrder']['shipping_lastname']; ?><br />
				<?php echo $order['DrexCartOrder']['shipping_address1']; ?><br />
				<?php echo $order['DrexCartOrder']['shipping_address2'] ? $order['DrexCartOrder']['shipping_address2'].'<br />' : ''; ?>
				<?php echo $order['DrexCartOrder']['shipping_city'] . ', ' . $order['DrexCartOrder']['shipping_state'] . ' ' . $order['DrexCartOrder']['shipping_zip']; ?></td>
			<td><?php echo number_format($order['DrexCartOrderTotal']['amount'],2); ?></td>
			
		</tr>
	<?php 
	}
	?>
</table>


<?php //pr($orders); ?>