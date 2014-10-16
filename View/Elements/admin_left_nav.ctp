<?php 
if (isset($installed)) {
?>
<p><b><?php echo $this->Html->link('<i class="fa fa-arrow-left"></i> Go Back To Site', '/DrexCartProducts/index', array('escape'=>false)); ?></b></p>

<h3>Navigation</h3>
<ul>
	
	<li><?php echo $this->Html->link('Product Types', '/DrexCartAdmin/productTypesView'); ?></li>
	<li><?php echo $this->Html->link('Products', '/DrexCartAdmin/products'); ?></li>
	<li><?php echo $this->Html->link('Customers', '/DrexCartAdmin/customers'); ?></li>
	<li><?php echo $this->Html->link('Orders', '/DrexCartAdmin/orders'); ?></li>
	
	
</ul>
<?php 
}
?>