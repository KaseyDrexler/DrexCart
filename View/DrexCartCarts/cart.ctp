<h1>My Cart</h1>

<p class="text-muted">Cart Created: <?php echo date('m/d/Y H:i:s', strtotime($cart->getCreatedDate())); ?></p>

<table cellpadding="0" cellspacing="0" width="100%" class="table table-hover">
	<tr>
		<th>Image</th>
		<th>Product Name</th>
		<th class="text-center">Quantity</th>
		<th class="text-right">Item Price</th>
		<th class="text-right">Total</th>
		<th class="text-right">Edit</th>
	</tr>
	<?php 
	foreach($cart_products as $cart_product) {
		?>
		<tr>
			<td><?php echo $this->Html->image('drexcart/'.$cart_product['DrexCartProduct']['main_thumb_image']); ?></td>
			<td><?php echo $this->Html->link($cart_product['DrexCartProduct']['name'], '/DrexCartProducts/productDetails/'.$cart_product['DrexCartProduct']['id']); ?></td>
			<td class="text-center"><?php echo $cart_product['DrexCartCartProduct']['quantity']; ?></td>
			<td class="text-right">$<?php echo number_format($cart_product['DrexCartProduct']['rate'], 2); ?></td>
			<td class="text-right">$<?php echo number_format($cart_product['DrexCartCartProduct']['quantity']*$cart_product['DrexCartCartProduct']['rate'], 2); ?></td>
			<td class="text-right"><?php echo $this->Html->link('Edit', '#', array('class'=>'btn btn-default')); ?></td>
		</tr>
		<?php
	}
	?>
	<tr>
		<th></th>
		<th></th>
		<th></th>
		<th class="text-right">Total:</th>
		<th class="text-right">$<?php echo number_format($cart_total, 2); ?></th>
		<th></th>
	</tr>
</table>

<p class="text-right"><?php echo $this->Html->link('Checkout', '/DrexCartCheckout/index', array('class'=>'btn btn-warning')); ?></p>
<?php 
//echo 'Cart:';
//pr($cart);
//echo 'Cart Products:';
//pr($cart_products);
?>