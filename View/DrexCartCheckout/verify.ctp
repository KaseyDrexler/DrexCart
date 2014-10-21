<h1>Verify Your Order</h1>

<?php $order = $this->Session->read('DrexCartOrder'); ?>
<?php $user = $this->Session->read('DrexCartUser'); ?>



<div class="row">
	<div class="col-md-6">
		<div class="panel panel-default">
			<div class="panel-heading">
				<p class="panel-title">Billing Address</p>
			</div>
			<div class="panel-body">
				<p><?php echo $order['billing_firstname']; ?> <?php echo $order['billing_lastname']; ?><br />
				<?php echo $order['billing_address1']; ?><br />
				<?php echo ($order['billing_address2']) ? $order['billing_address2'].'<br />' : ''; ?>
				<?php echo $order['billing_city']; ?>, <?php echo $order['billing_state']; ?> <?php echo $order['billing_zip']; ?>
				</p>
			</div>
		</div>
	</div>
	<div class="col-md-6">
		<div class="panel panel-default">
			<div class="panel-heading">
				<p class="panel-title">Shipping Address</p>
			</div>
			<div class="panel-body">
				<p><?php echo $order['shipping_firstname']; ?> <?php echo $order['shipping_lastname']; ?><br />
				<?php echo $order['shipping_address1']; ?><br />
				<?php echo ($order['shipping_address2']) ? $order['shipping_address2'].'<br />' : ''; ?>
				<?php echo $order['shipping_city']; ?>, <?php echo $order['shipping_state']; ?> <?php echo $order['shipping_zip']; ?>
				</p>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-11">
	
	</div>
	<div class="col-md-1">
		<?php echo $this->Form->create(); ?>
		<?php echo $this->Form->hidden('test'); ?>
		<?php echo $this->Form->button('Submit Order', array('class'=>'btn btn-warning')); ?>
		<?php echo $this->Form->end(); ?>
	</div>
</div>