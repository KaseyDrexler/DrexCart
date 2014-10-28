<?php 
foreach($gateways as $gateway) {
?>
<p><b><?php echo $gateway['DrexCartGateway']['name']; ?></b></p>
<?php echo $this->Form->hidden('gateway_id', array('value'=>$gateway['DrexCartGateway']['id'])); ?>
<div class="row">
	<div class="col-md-12">
		Name on the card<br />
		<?php echo $this->Form->input('DrexCartGatewaytProfile.fullname', array('label'=>false, 'class'=>'form-control')); ?>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		Card number<br />
		<?php echo $this->Form->input('DrexCartGatewaytProfile.card_number', array('label'=>false, 'class'=>'form-control')); ?>
	</div>
</div>
<div class="row">
	<div class="col-md-4">
		Expiration<br />
		<?php echo $this->Form->input('DrexCartGatewaytProfile.expiration', array('label'=>false, 'empty'=>false, 'class'=>'form-control')); ?>
	</div>
	<div class="col-md-4">
		&nbsp;<br />
		<?php //echo $this->Form->year('DrexCartGatewaytProfile.exp_year', date('Y'), date('Y')+8, array('label'=>false, 'empty'=>false, 'class'=>'form-control')); ?>
	</div>
	<div class="col-md-4">
		CVC<br />
		<?php echo $this->Form->input('DrexCartGatewaytProfile.code', array('label'=>false, 'class'=>'form-control')); ?>
	</div>
</div>
<?php 
}
?>