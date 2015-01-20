
<div class="sub-panel" style="margin:40px;">
<?php echo $this->Session->flash(); ?>
<?php //print_r($product); ?>


<div class="padding-10">

<h3>Edit Payment Gateway</h3>
<?php echo $this->Form->create('DrexCartGateway', array('method'=>'post', 'enctype'=>'multipart/form-data')); ?>
	<table class="well well-light" width="100%">
	<tr>
		<th>Name:</th>
		<td style="width:20px;"></td>
		<td><?php echo $this->Form->input('name', array('label'=>false, 'class'=>'form-control')); ?></td>
	</tr>
	<tr>
		<td colspan="3" style="height:10px;"></td>
	</tr>
	<tr>
		<th>Gateway Type:</th>
		<td style="width:20px;"></td>
		<td><?php echo $this->Form->select('type', array('authorize'=>'Authorize.net', 'paypal'=>'PayPal'), array('label'=>false, 'class'=>'form-control')); ?></td>
	</tr>
	<tr>
		<td colspan="3" style="height:10px;"></td>
	</tr>
	<tr>
		<th>Gateway URL:</th>
		<td style="width:20px;"></td>
		<td><?php echo $this->Form->input('wsdl_url', array('label'=>false, 'class'=>'form-control')); ?></td>
	</tr>
	<tr>
		<td colspan="3" style="height:10px;"></td>
	</tr>
	<tr>
		<th>API Login:</th>
		<td style="width:20px;"></td>
		<td><?php echo $this->Form->input('api_login', array('label'=>false, 'class'=>'form-control')); ?></td>
	</tr>
	<tr>
		<td colspan="3" style="height:10px;"></td>
	</tr>
	<tr>
		<th>API Key</th>
		<td style="width:20px;"></td>
		<td><?php echo $this->Form->input('api_key', array('empty'=>false, 'label'=>false, 'class'=>'form-control')); ?>
		
		</td>
	</tr>
	<tr>
		<td colspan="3" style="height:10px;"></td>
	</tr>
	<tr>
		<th>Status</th>
		<td style="width:20px;"></td>
		<td>
		Enabled <?php echo $this->Form->checkbox('enabled', array('checked'=>(!empty($this->request->data) && $this->request->data['DrexCartGateway']['enabled']==1) ? 'checked' : '', 'label'=>true, 'class'=>'form-control')); ?>
		</td>
	</tr>
	
	</table>
	<?php echo $this->Js->submit('Save', array('url'=>'/DrexCartAdmin/gatewayEdit/'.(isset($gateway) ? $gateway['DrexCartGateway']['id'] : ''),
										   'update'=>'#panel_right',
										   'class'=>'btn btn-primary',
										   'buffer'=>false,
										   'complete'=>$this->Js->request('/DrexCartAdmin/gatewayList', array('update'=>'#panel_content', 'async'=>false, 'buffer'=>false)))); ?>

		
	<?php echo $this->Form->end(); ?>
	
</div>


</div>

