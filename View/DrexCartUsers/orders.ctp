<?php 
$this->Html->addCrumb('My Account', '/DrexCartUsers/account');
$this->Html->addCrumb('Orders');
?>

<h1>My Orders</h1>

<?php 

if ($orders = $userManager->getOrders()) {
	?>
	<table class="table table-hover">
		<thead>
			<tr>
				<th>Order ID</th>
				<th>Order Date</th>
				<th>Status</th>
				<th>Order Total</th>
			</tr>
		</thead>
	<?php
	foreach($orders as $order) {
		?>
		<tr onclick="loadOrderDetails(<?php echo $order['DrexCartOrder']['id'].",".$userManager->getUserId(); ?>)" style="cursor: pointer;">
			<td><?php echo $order['DrexCartOrder']['id']; ?></td>
			<td><?php echo date('m/d/Y H:i:s', strtotime($order['DrexCartOrder']['created_date'])); ?></td>
			<td>Status</td>
			<td>Order Total</td>
		</tr>
		<?php 
	}
	?>
	</table>
	<?php
}

?>