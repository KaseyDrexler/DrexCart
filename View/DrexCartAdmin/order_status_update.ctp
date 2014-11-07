<?php //pr($order); ?>
<?php echo $this->Form->create('DrexCart.DrexCartOrderStatusHistory'); ?>

<?php 
if (isset($updated) && $updated) {
?>
	<div class="alert alert-success">
		Order status updated!
	</div>
	<script type="text/javascript">
	setTimeout(function () {
		document.location.href = '/DrexCartAdmin/orderDetails/<?php echo $order['DrexCartOrder']['id']; ?>';
				},
				3000); 
	</script>
<?php 
}
?>
<div class="row">
	<div class="col-md-2 text-right">
		<b>Status:</b>
	</div>
	<div class="col-md-4">
		<?php echo $this->Form->select('DrexCartOrderStatusHistory.drex_cart_order_statuses_id', $available_statuses, array('value'=>$order['DrexCartOrder']['drex_cart_order_statuses_id'], 'empty'=>false, 'class'=>'form-control')); ?>
	</div>
	
</div>
<div class="row">
	<div class="col-md-12">
		<b>Notes:</b>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<?php echo $this->Form->textarea('DrexCartOrderStatusHistory.note', array('style'=>'width:100%;', 'class'=>'form-control')); ?>
	</div>
</div>
<div class="row">
	<div class="col-md-12 text-right">
		<?php echo $this->Js->submit('Update Order', array('url'=>'/DrexCartAdmin/orderStatusUpdate/'.$order['DrexCartOrder']['id'],
														   'update'=>'.modal-body',
														   'buffer'=>false,
														   'class'=>'btn btn-warning')); ?>
	</div>
</div>
<?php echo $this->Form->end(); ?>