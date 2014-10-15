<div class="row">
<?php 

foreach($products as $product) {
	//print_r($product);
	?>
	<div class="col-xs-6 col-sm-4 col-md-3">
		<?php echo $this->Html->image('drexcart/'.$product['DrexCartProduct']['main_image'], array('alt'=>$product['DrexCartProduct']['name'], 'height'=>'*', 'width'=>'200')); ?>
		<br />
		<?php echo $product['DrexCartProduct']['name']; ?>
	</div>
	<?php 
	
}

?>
</div>