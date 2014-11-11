<?php 
if (isset($updated)) {
	?>
	<script type="text/javascript">
	document.location.href = document.location.href;
	</script>
	<?php 
}
if (isset($errors)) {

?>
<div class="alert alert-danger">
	<?php 
	foreach($errors as $error) {
		echo $error.'<br />'; 
	}
	?>
</div>
<?php 
}
?>
<?php echo $this->Form->create('DrexCartGatewayProfile'); ?>
<div class="row">
	<div class="col-md-12">
		Card number<br /><?php //echo $this->Form->hidden('DrexCartGatewayProfile.drex_cart_gateways_id', array('value'=>$gateway['DrexCartGateway']['id'])); ?>
		<?php echo $this->Form->input('DrexCartGatewayProfile.account_number', array('required'=>false, 'label'=>false, 'class'=>'form-control')); ?>
	</div>
</div>
<div class="row">
	<div class="col-md-4">
		Expiration<br />
		<?php echo $this->Form->month('DrexCartGatewayProfile.expiration', array('label'=>false, 'empty'=>false, 'class'=>'form-control', 'style'=>'display:inline-block;', 'monthNames'=>array('01'=>'01 - Jan', '02'=>'02 - Feb', '03'=>'03 - Mar', '04'=>'04 - Apr', '05'=>'05 - May', '06'=>'06 - Jun', '07'=>'07 - Jul', '08'=>'08 - Aug', '09'=>'09 - Sep', '10'=>'10 - Oct', '11'=>'11 - Nov', '12'=>'12 - Dec'))); ?>
		
		<?php //echo $this->Form->input('DrexCartGatewayProfile.expiration', array('required'=>false, 'label'=>false, 'empty'=>false, 'class'=>'form-control')); ?>
	</div>
	<div class="col-md-4">
		&nbsp;<br />
		<?php echo $this->Form->year('DrexCartGatewayProfile.expiration', date('Y'), date('Y', time()+(86400*365*10)), array('label'=>false, 'style'=>'display:inline-block;', 'empty'=>false, 'class'=>'form-control')); ?>
		<?php //echo $this->Form->year('DrexCartGatewayProfile.exp_year', date('Y'), date('Y')+8, array('label'=>false, 'empty'=>false, 'class'=>'form-control')); ?>
	</div>
	<div class="col-md-4">
		CVC<br />
		<?php echo $this->Form->input('DrexCartGatewayProfile.code', array('required'=>false, 'label'=>false, 'class'=>'form-control')); ?>
	</div>
</div>
<h3>Default Billing Address</h3>
<div class="well">
	<div id="panel-default-billing">
	<p class="text-danger">This address must match your credit card information.</p>
	<?php 
		$billing_address = $userManager->getBillingAddress();
		echo $DCFunctions->formatAddress($billing_address);
		foreach($billing_address['DrexCartAddress'] as $fieldname=>$fieldvalue) {
			echo $this->Form->hidden('DrexCartAddress.'.'billing_'.$fieldname, array('value'=>$fieldvalue));
		}
	?>
	
	
	<p class="text-right"><?php echo $this->Js->link('<i class="fa fa-cog"></i> Change', '/DrexCartUsers/paymentProfilesEditAddress/'.$gatewayProfileId, array('escape'=>false, 'update'=>'#panel-default-billing', 'buffer'=>false)); ?>
	</div>
</div>


<div class="" style="margin-top:10px;">

<?php echo $this->Js->submit('Update', array('url'=>'/DrexCartUsers/paymentProfilesEdit/'.(isset($this->request->data['DrexCartGatewayProfile']['id']) ? $this->request->data['DrexCartGatewayProfile']['id'] : ''),
                                             'update'=>'#modal-body-md',
											 'buffer'=>false,
											 'style'=>'margin:10px;',
											 'class'=>'btn btn-primary pull-right')); ?>
<?php echo $this->Html->link('Cancel', 'javascript:void(0);', array('class'=>'btn btn-default pull-right', 'style'=>'margin:10px;', 'onclick'=>'$(\'#modal-md\').modal(\'hide\');')); ?>
</div>
<br /><br />
<?php echo $this->Form->end(); ?>