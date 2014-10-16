
<div class="sub-panel" style="margin:40px;">
<?php echo $this->Session->flash(); ?>
<?php //print_r($product); ?>


<div class="padding-10">

<?php echo $this->Form->create('DrexCartProductType', array('method'=>'post', 'enctype'=>'multipart/form-data')); ?>
	<table class="well well-light" width="100%">
	<tr>
		<th>Product Type Name:</th>
		<td style="width:20px;"></td>
		<td><?php echo $this->Form->input('product_type_name', array('label'=>false, 'class'=>'form-control')); ?></td>
	</tr>
	<tr>
		<td colspan="3" style="height:10px;"></td>
	</tr>
	
	<tr>
		<th>Status</th>
		<td style="width:20px;"></td>
		<td>Shippable <?php echo $this->Form->checkbox('shippable', array('checked'=>(!empty($this->request->data) && $this->request->data['DrexCartProductType']['shippable']==1) ? 'checked' : '', 'label'=>true, 'class'=>'form-control')); ?>
		
		</td>
	</tr>
	
	</table>
	
	<?php echo $this->Js->submit('Save', array('url'=>'/DrexCartAdmin/productTypesEdit/'.(isset($product_type) ? $product_type['DrexCartProductType']['id'] : ''),
										   'update'=>'#panel_right',
										   'class'=>'btn btn-primary',
										   'buffer'=>false,
										   'complete'=>$this->Js->request('/DrexCartAdmin/productTypesView', array('update'=>'#panel_content', 'async'=>false, 'buffer'=>false)))); ?>

		
	<?php echo $this->Form->end(); ?>
	
</div>


</div>
