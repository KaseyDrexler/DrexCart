<div class="row">
	<div class="col-md-4"><?php echo $this->Html->image('drexcart/'.$product['DrexCartProduct']['main_image'], array('alt'=>$product['DrexCartProduct']['name'])); ?></div>
	<div class="col-md-4"><?php pr($product); ?></div>
	<div class="col-md-4"><?php echo $this->Html->link('Add to Cart', '/DrexCartCarts/addProduct/'.$product['DrexCartProduct']['id'], array('class'=>'btn btn-warning')); ?></div>
</div>