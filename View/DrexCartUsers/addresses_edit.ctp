
<?php 
if (isset($saved)) {
	?>
	<script type="text/javascript">
	document.location.href = document.location.href;
	</script>
	<?php 
}
?>


<?php echo $this->Form->create('DrexCartAddress'); ?>
<table width="100%" class="table">
	<tr>
		<th class="text-right" width="36%">Name:</th>
		<td>
		
				<?php echo $this->Form->input('firstname', array('label'=>false, 'class'=>'form-control', 'placeholder'=>'First')); ?>
				
		
		</td>
		<td><?php echo $this->Form->input('lastname', array('label'=>false, 'class'=>'form-control', 'placeholder'=>'Last')); ?></td>
	</tr>
	<tr>
		<th class="text-right" valign="top" rowspan="2">Address:</th>
		<td colspan="2">
		<?php echo $this->Form->input('address1', array('label'=>false, 'class'=>'form-control', 'placeholder'=>'Street Address')); ?>
		</td>
		
	</tr>
	<tr>
		<td colspan="2">
		<?php echo $this->Form->input('address2', array('label'=>false, 'class'=>'form-control')); ?>
		</td>
		
	</tr>
	<tr>
		<th class="text-right" valign="top">City:</th>
		<td colspan="2">
		<?php echo $this->Form->input('city', array('label'=>false, 'class'=>'form-control', 'placeholder'=>'City')); ?>
		</td>
		
	</tr>
	<tr>
		<th class="text-right" valign="top">State:</th>
		<td colspan="2">
		<?php echo $this->Form->select('state', $DCFunctions->getStatesList(), array('label'=>false, 'class'=>'form-control')); ?>
		</td>
		
	</tr>
	<tr>
		<th class="text-right" valign="top">Zip:</th>
		<td colspan="2">
		<?php echo $this->Form->input('zip', array('label'=>false, 'class'=>'form-control', 'placeholder'=>'Zip')); ?>
		</td>
		
	</tr>
	<tr>
		<th class="text-right" valign="top">Default Billing Address:</th>
		<td colspan="2">
		<?php echo $this->Form->checkbox('default_billing_id', array('label'=>false, 'class'=>'form-control', 'value'=>1,
																	 'checked'=>(isset($address) && $userManager->getBillingAddress()['DrexCartAddress']['id']==$address['DrexCartAddress']['id'] ? 'checked' : ''))); ?>
		</td>
		
	</tr>
	<tr>
		<th class="text-right" valign="top">Default Shipping Address:</th>
		<td colspan="2">
		<?php echo $this->Form->checkbox('default_shipping_id', array('label'=>false, 'class'=>'form-control', 'value'=>1, 'checked'=>(isset($address) && $userManager->getShippingAddress()['DrexCartAddress']['id']==$address['DrexCartAddress']['id'] ? 'checked' : ''))); ?>
		</td>
		
	</tr>
</table>

<?php echo $this->Form->hidden('id', array('label'=>false)); ?>




<div class="" style="margin-top:10px;">

<?php echo $this->Js->submit('Update', array('url'=>'/DrexCartUsers/addressesEdit/'.(isset($this->request->data['DrexCartAddress']['id']) ? $this->request->data['DrexCartAddress']['id'] : ''),
                                             'update'=>'#modal-body-md',
											 'buffer'=>false,
											 'style'=>'margin:10px;',
											 'class'=>'btn btn-primary pull-right')); ?>
<?php echo $this->Html->link('Cancel', 'javascript:void(0);', array('class'=>'btn btn-default pull-right', 'style'=>'margin:10px;', 'onclick'=>'$(\'#modal-md\').modal(\'hide\');')); ?>
</div>
<br /><br />
<?php echo $this->Form->end(); ?>