<div style="margin:20px;">
<div class="row">
	<div class="col-md-12">
		<h3>Payment History</h3>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
	<table class="table table-hover table-condensed">
		<tr>
			
			<th><span style="font-size:10px;">Transaction ID</span></th>
			<th><span style="font-size:10px;">Amount</span></th>
			<th><span style="font-size:10px;">Authorize Date</span></th>
			<th><span style="font-size:10px;">Account #</span></th>
			<th><span style="font-size:10px;">Captured</span></th>
		</tr>
		
		<?php 
		foreach($order_payments as $payment) {

		?>
			<tr>
			<td><span style="font-size:10px;"><?php echo $payment['DrexCartOrderPayment']['transaction_id']; ?></span></td>
			<td><span style="font-size:10px;"><?php echo number_format($payment['DrexCartOrderPayment']['amount'],2); ?></span></td>
			<td><span style="font-size:10px;"><?php echo date('m/d/Y H:i:s', strtotime($payment['DrexCartOrderPayment']['created_date'])); ?></span></td>
			<td><span style="font-size:10px;"><?php echo substr($payment['DrexCartGatewayProfile']['account_number'], strlen($payment['DrexCartGatewayProfile']['account_number'])-4); ?></span></td>
			<td><span style="font-size:10px;"><?php 
				if ($payment['DrexCartOrderPayment']['captured_date']) {
					echo date('m/d/Y H:i:s', strtotime($payment['DrexCartOrderPayment']['captured_date']));
				} else {
					echo $this->Js->link('Capture <i class="fa fa-dollar"></i>', '/DrexCartAdmin/orderPaymentsCapture/'.$payment['DrexCartOrderPayment']['id'], array('update'=>'#panel_right',
																'class'=>'btn btn-warning btn-xs',
																'escape'=>false,
																'buffer'=>false));
				}
				?></span></td>
		</tr>
		<?php 
		}
	?>
	</table>
	
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		
	</div>
</div>
</div>