<div class="row">
<?php 
foreach($products as $product) {
	//print_r($product);
	?>
	<div class="col-xs-6 col-sm-4 col-md-4">
		<div class="product-thumbnail">
			<?php 
			if (file_exists('drexcart/'.$product['DrexCartProduct']['main_image'])) {
				echo $this->Html->image('drexcart/'.$product['DrexCartProduct']['main_image'], array('alt'=>$product['DrexCartProduct']['name'], 'height'=>'*', 'width'=>'200')); 
			} else {
				echo $this->Html->image('/drex_cart/img/noimage.png');
			}
			?>
			<br />
			<div class="row">
				<div class="col-xs-6">
					<?php echo $this->Html->link($product['DrexCartProduct']['name'], '/DrexCartProducts/productDetails/'.$product['DrexCartProduct']['id'], array('class'=>'')); ?>
				</div>
				<div class="col-xs-6">
					<?php echo $this->Html->link('Add To Cart', '/DrexCartCarts/addProduct/'.$product['DrexCartProduct']['id'], array('class'=>'btn btn-warning btn-xs pull-right')); ?>
				</div>
			</div>
			
		</div>
	</div>
	<?php 
	
}

?>
</div>