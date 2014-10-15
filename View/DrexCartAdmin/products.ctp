<h1>Products</h1>


<p><b>Number of products: </b><?php echo sizeof($products); ?></p>
<table class="table hover">
	<tr>
		<th>
			Name
		</th>
		<th>
			
		</th>
		<th>
			Price
		</th>
		<th>
			
		</th>
	</tr>
	<?php 
	foreach($products as $product) {
		?>
		<tr>
			<td><?php echo $product['DrexCartProduct']['name']; ?></td>
			<td><?php echo ($product['DrexCartProduct']['enabled']==1) ? $this->Js->link('Enabled', '/DrexCartAdmin/productsList/disable:'.$product['DrexCartProduct']['id'], array('update'=>'#panel_content', 'buffer'=>false)) : $this->Js->link('Disabled', '/DrexCartAdmin/productsList/enable:'.$product['DrexCartProduct']['id'], array('update'=>'#panel_content', 'buffer'=>false)); ?></td> 
							 
							
			<td align="right">$ <?php echo number_format($product['DrexCartProduct']['rate']); ?></td>
			<td align="right"><?php echo $this->Js->link('Edit', '/DrexCartAdmin/productsEdit/'.$product['DrexCartProduct']['id'], array('update'=>'#panel_right', 'buffer'=>false)); ?></td>
		</tr>	
		<?php 
	}
	?>
</table>
<p class="text-right"><?php echo $this->Js->link('Add Product', '/DrexCartAdmin/productsEdit/', array('class'=>'btn btn-default', 'update'=>'#panel_right', 'buffer'=>false)); ?></p>