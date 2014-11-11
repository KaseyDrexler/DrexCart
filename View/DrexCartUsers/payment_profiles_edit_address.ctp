<?php echo $this->Form->create('DrexCartAddress'); ?>
<table width="100%" class="table table-condensed" style="font-size: 10px;">
	<tr>
		<th class="text-right" width="36%">Name:</th>
		<td>
		
				<?php echo $this->Form->input('billing_firstname', array('label'=>false, 'class'=>'form-control input-sm', 'placeholder'=>'First')); ?>
				
		
		</td>
		<td><?php echo $this->Form->input('billing_lastname', array('label'=>false, 'class'=>'form-control input-sm', 'placeholder'=>'Last')); ?></td>
	</tr>
	<tr>
		<th class="text-right" valign="top" rowspan="2">Address:</th>
		<td colspan="2">
		<?php echo $this->Form->input('billing_address1', array('label'=>false, 'class'=>'form-control input-sm', 'placeholder'=>'Street Address')); ?>
		</td>
		
	</tr>
	<tr>
		<td colspan="2">
		<?php echo $this->Form->input('billing_address2', array('label'=>false, 'class'=>'form-control input-sm')); ?>
		</td>
		
	</tr>
	<tr>
		<th class="text-right" valign="top">City:</th>
		<td colspan="2">
		<?php echo $this->Form->input('billing_city', array('label'=>false, 'class'=>'form-control input-sm', 'placeholder'=>'City')); ?>
		</td>
		
	</tr>
	<tr>
		<th class="text-right" valign="top">State:</th>
		<td colspan="2">
		<?php echo $this->Form->select('billing_state', $DCFunctions->getStatesList(), array('label'=>false, 'class'=>'form-control input-sm')); ?>
		</td>
		
	</tr>
	<tr>
		<th class="text-right" valign="top">Zip:</th>
		<td colspan="2">
		<?php echo $this->Form->input('billing_zip', array('label'=>false, 'class'=>'form-control input-sm', 'placeholder'=>'Zip')); ?>
		</td>
		
	</tr>

</table>