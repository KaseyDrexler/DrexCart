<?php 
if (isset($installed)) {
?>
Consumer left nav

<br />
<?php echo $this->Html->link('Products', '/DrexCartProducts/index'); ?>
<br />
<?php 
$num_of_products = 0;
foreach($cart_products as $product) {
	$num_of_products += $product['DrexCartCartProduct']['quantity'];
}
?>
<?php echo $this->Html->link('Shopping Cart'.($num_of_products>0 ? ' ('.$num_of_products.')' : ''), '/DrexCartCarts/cart'); ?>
<br />
<?php echo $this->Html->link('Checkout', '/DrexCartCheckout/index'); ?>
<br />


<br />
<br />
<br />
<?php echo $this->Html->link('Admin', '/DrexCartAdmin/index'); ?>
<?php 
}
?>