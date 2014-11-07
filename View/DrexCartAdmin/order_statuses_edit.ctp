<h3>Edit Order Statuses</h3>
<?php 
if (isset($updated) && $updated) {
?>
	<div class="alert alert-success">
		Order status updated!
	</div>
	<script type="text/javascript">
	setTimeout(function () {
		document.location.href = '/DrexCartAdmin/orderStatuses/';
				},
				3000); 
	</script>
<?php 
}
?>
<?php echo $this->Form->create('DrexCart.DrexCartOrderStatus'); ?>
<?php echo $this->Form->input('id'); ?>
<?php echo $this->Form->input('status_name'); ?>
<?php echo $this->Js->submit('Update', array('url'=>'/DrexCartAdmin/orderStatusesEdit/'.$orderStatusesId,
											  					   'update'=>'#panel_right',
																   'class'=>'pull-right btn btn-warning',
											 					   'buffer'=>false)); ?>
<?php echo $this->Form->end(); ?>