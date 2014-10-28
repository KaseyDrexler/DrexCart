Admin

<?php 
if (sizeof($gateways)==0) {
	?>
	<div class="alert alert-warning">No payment gateways configured!</div>
	<?php 
}

?>

<div class="row">
	<div class="col-md-6">
		<div class="panel panel-info">
			<div class="panel-heading">
				<p class="panel-title">Order Summary</p>
			</div>
			<div class="panel-body">
				<p><b>Number of Orders:</b> <?php echo $order_summary['num_orders']; ?></p>
				<p><b>Total Revenue:</b> $<?php echo number_format($order_summary['totals'],2); ?></p>
			</div>
		</div>
	</div>
	<div class="col-md-6">
		<div class="panel panel-info">
			<div class="panel-heading">
				<p class="panel-title">Users Summary</p>
			</div>
			<div class="panel-body">
				
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-6">
		<div class="panel panel-info">
			<div class="panel-heading">
				<p class="panel-title"></p>
			</div>
			<div class="panel-body">
				
			</div>
		</div>
	</div>
	<div class="col-md-6">
		<div class="panel panel-info">
			<div class="panel-heading">
				<p class="panel-title"></p>
			</div>
			<div class="panel-body">
				
			</div>
		</div>
	</div>
</div>		