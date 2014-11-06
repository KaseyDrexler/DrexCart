<h1>Capture Payments</h1>
<?php echo $this->Js->link('< back', '/DrexCartAdmin/orderPayments/'.$order['DrexCartOrder']['id'], array('buffer'=>false, 'update'=>'#panel_right')); ?>
<br />
<?php echo $this->Html->link('notify', 'javascript:void(0);', array('onclick'=>'$().notify(\'Successfully captured payment!\', \'success\');')); ?>
<?php echo $this->Form->create('DrexCart.DrexCartOrderPayment'); ?>

<?php 
if (isset($captured)) {
	if ($captured) {
		?>
		<div class="alert alert-success">Payment captured successfully.</div>
		<?php 
	} else {
		?>
		<div class="alert alert-danger">Payment was not captured.</div>
		<?php 
	}
}
?>

<div class="row">
	<div class="col-md-6 text-right">
		Order Total:
	</div>
	<div class="col-md-6">$
		<?php 
		foreach($order_totals as $order_total) {
			if ($order_total['DrexCartOrderTotal']['code']=='total') {
				echo number_format($order_total['DrexCartOrderTotal']['amount'],2);
			}
		}
		?>
	</div>
</div>
<div class="row">
	<div class="col-md-6 text-right">
		Capture Amount:
	</div>
	<div class="col-md-6 text-right">
		<?php echo $this->Form->input('capture_amount', array('value'=>number_format($order_payment['DrexCartOrderPayment']['amount'],2), 'class'=>'form-control', 'label'=>false)); ?>
	</div>
</div>
<div class="row">
	<div class="col-md-6 text-right">
		
	</div>
	<div class="col-md-6 text-right">
		<?php echo $this->Js->submit('Capture', array('url'=>'/DrexCartAdmin/orderPaymentsCapture/'.$order_payment['DrexCartOrderPayment']['id'],
													  'update'=>'#panel_right',
													  'class'=>'btn btn-warning',
													  'buffer'=>false)); ?>
	</div>
</div>
<div class="row">
	<div class="col-md-6 text-right">
		
	</div>
	<div class="col-md-6">
		
	</div>
</div>

<?php echo $this->Form->end(); ?>

	<?php //echo $this->element('sql_dump'); ?>
<?php 
//pr($order_payment);

//pr($order); 
?>