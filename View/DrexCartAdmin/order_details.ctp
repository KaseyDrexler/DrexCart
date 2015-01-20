<?php 
$this->Html->addCrumb('Admin Home', '/DrexCartAdmin/index');
$this->Html->addCrumb('Orders', '/DrexCartAdmin/orders');
$this->Html->addCrumb('Order Details');
?>

<h1>Order #<?php echo $order['DrexCartOrder']['id']; ?></h1>

<div class="row">
	<div class="col-md-6">
		<h3>Billing Address</h3>
		<?php 
		if ($order['DrexCartOrder']['billing_address1']) {
			$billing_address = array('DrexCartAddress'=>array('firstname'=>$order['DrexCartOrder']['billing_firstname'],
													'lastname'=>$order['DrexCartOrder']['billing_lastname'],
													'address1'=>$order['DrexCartOrder']['billing_address1'],
													'address2'=>$order['DrexCartOrder']['billing_address2'],
													'city'=>$order['DrexCartOrder']['billing_city'],
													'state'=>$order['DrexCartOrder']['billing_state'],
													'zip'=>$order['DrexCartOrder']['billing_zip']));
			echo $DCFunctions->formatAddress($billing_address);
		}
		?>
	</div>
	<div class="col-md-6">
		<h3>Shipping Address</h3>
		<?php 
		if ($order['DrexCartOrder']['shipping_address1']) {
			$shipping_address = array('DrexCartAddress'=>array('firstname'=>$order['DrexCartOrder']['shipping_firstname'],
					'lastname'=>$order['DrexCartOrder']['shipping_lastname'],
					'address1'=>$order['DrexCartOrder']['shipping_address1'],
					'address2'=>$order['DrexCartOrder']['shipping_address2'],
					'city'=>$order['DrexCartOrder']['shipping_city'],
					'state'=>$order['DrexCartOrder']['shipping_state'],
					'zip'=>$order['DrexCartOrder']['shipping_zip']));
			echo $DCFunctions->formatAddress($shipping_address);
		}
		?>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<table class="table table-hover">
			<tr>
				<th>Product</th>
				<th>Price</th>
				<th>Quantity</th>
				<th>Total</th>
			</tr>
			<?php 
			if (isset($order_products)) {
				foreach($order_products as $product) {
					?>
					<tr>
						<td><?php echo $product['DrexCartProduct']['name']; ?></td>
						<td align="right"><?php echo number_format($product['DrexCartOrderProduct']['rate'],2); ?></td>
						<td align="center"><?php echo $product['DrexCartOrderProduct']['quantity']; ?></td>
						<td align="right"><?php echo number_format($product['DrexCartOrderProduct']['rate']*$product['DrexCartOrderProduct']['quantity'], 2); ?></td>
					</tr>
					<?php 
				}
			}
			?>
			<tr>
				<td colspan="4" style="border-top:2px solid #000000;"></td>
			</tr>
			<?php 
			// subtotal
			if (isset($order_totals)) {
				foreach($order_totals as $ot) {
					if ($ot['DrexCartOrderTotal']['code']=='subtotal') {
					?>
					<tr>
						<td></td>
						<td></td>
						<td align="right"><b>Sub Total:</b></td>
						<td align="right"><?php echo number_format($ot['DrexCartOrderTotal']['amount'], 2); ?></td>
					</tr>
					<?php 
					}
				}
			}
			
			?>
			<?php 
			// total
			if (isset($order_totals)) {
				foreach($order_totals as $ot) {
					if ($ot['DrexCartOrderTotal']['code']=='tax') {
					?>
					<tr>
						<td></td>
						<td></td>
						<td align="right"><b>Taxes:</b></td>
						<td align="right"><?php echo number_format($ot['DrexCartOrderTotal']['amount'], 2); ?></td>
					</tr>
					<?php 
					}
				}
			}
			?>
			<?php
			// total
			if (isset($order_totals)) {
				foreach($order_totals as $ot) {
					if ($ot['DrexCartOrderTotal']['code']=='shipping') {
						?>
						<tr>
							<td></td>
							<td></td>
							<td align="right"><b>Shipping:</b></td>
							<td align="right"><?php echo number_format($ot['DrexCartOrderTotal']['amount'], 2); ?></td>
						</tr>
						<?php 
						}
					}
				}
			?>
			<?php 
			// total
			if (isset($order_totals)) {
				foreach($order_totals as $ot) {
					if ($ot['DrexCartOrderTotal']['code']=='total') {
					?>
					<tr>
						<td></td>
						<td></td>
						<td align="right"><b>Total:</b></td>
						<td align="right"><?php echo number_format($ot['DrexCartOrderTotal']['amount'], 2); ?></td>
					</tr>
					<?php 
					}
				}
			}
			
			?>
		</table>
	</div>
</div>
<div class="row">
	<div class="col-md-6">
		<div class="panel panel-info">
			<div class="panel-heading">
				<h1 class="panel-title">Payment Information</h1>
			</div>
			<div class="panel-body">
				<table class="table table-condensed table-hover">
					<tr>
						<th><span style="font-size:10px;">Card</span></th>
						<th><span style="font-size:10px;">Payment Date</span></th>
						<th><span style="font-size:10px;">Amount</span></th>
						<th><span style="font-size:10px;">Transaction ID</span></th>
						<th><span style="font-size:10px;">Funds Applied</span></th>
					</tr>
					<?php 
					foreach($order_payments as $payment) {
					?>
					<tr>
						<td><span style="font-size:10px;"><?php echo substr($payment['DrexCartGatewayProfile']['account_number'], strlen($payment['DrexCartGatewayProfile']['account_number'])-4); ?></span></td>
						<td><span style="font-size:10px;"><?php echo date('m/d/Y', strtotime($payment['DrexCartOrderPayment']['created_date'])); ?></span></td>
						<td align="right"><span style="font-size:10px;">$<?php echo number_format($payment['DrexCartOrderPayment']['amount'],2); ?></span></td>
						<td><span style="font-size:10px;"><?php echo $payment['DrexCartOrderPayment']['transaction_id']; ?></span></td>
						<td><span style="font-size:10px;"><?php echo ($payment['DrexCartOrderPayment']['captured_date']) ? date('m/d/Y H:i:s', strtotime($payment['DrexCartOrderPayment']['captured_date'])) : ''; ?></span></td>
					</tr>
					<?php 
					}
					?>
				</table>
				<?php //pr($order_payments); ?>
			</div>
		</div>
		
	</div>
	<div class="col-md-6">
		<div class="panel panel-info">
			<div class="panel-heading">
				<h1 class="panel-title">Status History <?php echo $this->Js->link('Change Status', 
																				  '/DrexCartAdmin/orderStatusUpdate/'.$order['DrexCartOrder']['id'],
																				  array('class'=>'btn btn-xs btn-warning pull-right',
																				  		'buffer'=>false,
																						'complete'=>'$(\'.drexcart-modal-lg\').modal(\'show\');$(\'.modal-title\').html(\'Order Status Update\');',
																						'update'=>'#modal-body-lg')); ?></h1>
			</div>
			<div class="panel-body">
				
				<table class="table table-condensed table-hover">
					<tr>
						<th><span style="font-size:10px;">Status</span></th>
						<th><span style="font-size:10px;">Date</th>
						<th><span style="font-size:10px;">Note</th>
					</tr>
					<?php 
					foreach($order_history as $history) {
					?>
					<tr>
						<td><span style="font-size:10px;"><?php echo $history['DrexCartOrderStatus']['status_name']; ?></span></td>
						<td><span style="font-size:10px;"><?php echo $history['DrexCartOrderStatusHistory']['status_date']; ?></span></td>
						<td><span style="font-size:10px;"><?php echo $history['DrexCartOrderStatusHistory']['note']; ?></span></td>
					</tr>
					<?php 
					}
					?>
				</table>
				<?php //pr($order_history); ?>
			</div>
		</div>
		
	</div>
</div>

<script type="text/javascript">
					
<!--
$(document).ready(function () {
	<?php echo $this->Js->request('/DrexCartAdmin/orderPayments/'.$order['DrexCartOrder']['id'], array('update'=>'#panel_right', 'buffer'=>false)); ?>
});
//-->
</script>

<?php //pr($order); ?>