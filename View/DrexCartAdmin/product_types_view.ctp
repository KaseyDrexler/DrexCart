<h1>Product Types</h1>


<p><b>Number of products: </b><?php echo sizeof($product_types); ?></p>
<?php //pr($product_types); ?>
 
<table class="table hover">
	<tr>
		<th>
			Name
		</th>
		<th>
			
		</th>
		<th>
			Shippable
		</th>
		<th>
			
		</th>
	</tr>
	<?php 
	foreach($product_types as $product_type) {
		?>
		<tr>
			<td><?php echo $product_type['DrexCartProductType']['product_type_name']; ?></td>
			<td><?php //echo ($product_type['DrexCartProductType']['enabled']==1) ? $this->Js->link('Enabled', '/DrexCartAdmin/productsList/disable:'.$product['DrexCartProduct']['id'], array('update'=>'#panel_content', 'buffer'=>false)) : $this->Js->link('Disabled', '/DrexCartAdmin/productsList/enable:'.$product['DrexCartProduct']['id'], array('update'=>'#panel_content', 'buffer'=>false)); ?></td> 
							 
							
			<td align="right"><?php echo $product_type['DrexCartProductType']['shippable']==1 ? 'Shippable' : 'Not Shippable'; ?></td>
			<td align="right"><?php echo $this->Js->link('Edit', '/DrexCartAdmin/productTypesEdit/'.$product_type['DrexCartProductType']['id'], array('update'=>'#panel_right', 'buffer'=>false)); ?></td>
		</tr>	
		<?php 
	}
	?>
</table>

<p class="text-right"><?php echo $this->Js->link('Add Product Type', '/DrexCartAdmin/productTypesEdit/', array('class'=>'btn btn-default', 'update'=>'#panel_right', 'buffer'=>false)); ?></p>