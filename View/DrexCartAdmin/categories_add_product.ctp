<h3>Add Product to Category</h3>
<?php 
if (isset($updated) && $updated) {
?>
	<div class="alert alert-success">Category updated!</div>
	<script type="text/javascript">
	document.location.href = document.location.href;
	</script>
<?php 
}
?>
<?php echo $this->Form->create('DrexCart.DrexCartProductsToCategory'); ?>

<?php echo $this->Form->select('products_id', $products, array('empty'=>false, 'class'=>'form-control')); ?>

<p class="text-right"><?php echo $this->Js->submit('Update', array('url'=>'/DrexCartAdmin/categoriesAddProduct/'.$categoryId, 'update'=>'#panel_right', 'buffer'=>false, 'class'=>'btn btn-primary')); ?></p>
<?php echo $this->Form->end(); ?>