<h1>Order Statuses</h1>

<table class="table table-condensed table-hover">
	<tr>
		<th>ID</th>
		<th>Status Name</th>
		<th></th>
	</tr>
	
	<?php 
	foreach($order_statuses as $order_status) {
	?>
		<tr onclick="document.location.href='/DrexCartAdmin/orderDetails/<?php echo $order_status['DrexCartOrderStatus']['id']; ?>';">
			<td><?php echo $order_status['DrexCartOrderStatus']['id']; ?></td>
			<td><?php echo $order_status['DrexCartOrderStatus']['status_name']; ?></td>
			<td><?php echo $this->Js->link('Edit', 
										   '/DrexCartAdmin/orderStatusesEdit/'.$order_status['DrexCartOrderStatus']['id'],
										   array('buffer'=>false,
												 'update'=>'#panel_right',
												 'class'=>'btn btn-xs btn-default')); ?>
		</tr>
	<?php 
	}
	?>
</table>
<p class="text-right"><?php echo $this->Js->link('Add Status', '/DrexCartAdmin/orderStatusesEdit/', array('class'=>'btn btn-default', 'update'=>'#panel_right', 'buffer'=>false)); ?></p>

<?php //pr($orders); ?>