<?php 
$this->Html->addCrumb('Admin Home', '/DrexCartAdmin/index');
$this->Html->addCrumb('Product Categories');
?>
<h1>Product Categories</h1>

<?php 

if ($currentCategory) {
	?>
	
	<h3>Current Category: <?php echo $currentCategory['DrexCartCategory']['name']; ?></h3>
	<?php 
	//if ($currentCategory['DrexCartCategory']['parent_categories_id']) {
		echo $this->Html->link('Up A Level', '/DrexCartAdmin/categories/'.$currentCategory['DrexCartCategory']['parent_categories_id'], array('class'=>'btn btn-default'));
	//}
	
} else {
?>
<h3>Current Category: Top Level</h3>
<?php 
}
?>
<p class="text-right"><?php echo $this->Js->link('<i class="fa fa-plus"></i> Add Category', '/DrexCartAdmin/categoriesEdit/', array('escape'=>false, 'buffer'=>false, 'update'=>'#panel_right')); ?></p>
<table class="table table-hover">
	<tr>
		<th colspan="3"><b>Sub Categories</b> (<?php echo sizeof($categories); ?>)</th>
	</tr>
	<?php 
	if (sizeof($categories)>0) {
		foreach($categories as $category) {
		?>
		<tr>
			<td onclick="document.location.href='/DrexCartAdmin/categories/<?php echo $category['DrexCartCategory']['id']; ?>';"><?php echo $category['DrexCartCategory']['name']?></td>
			<td onclick="document.location.href='/DrexCartAdmin/categories/<?php echo $category['DrexCartCategory']['id']; ?>';"><?php echo $category[0]['subNodeCount']; ?> Subcategories</td>
			<td><?php echo $this->Js->link('Edit', '/DrexCartAdmin/categoriesEdit/'.$category['DrexCartCategory']['id'], array('buffer'=>false, 'update'=>'#panel_right')); ?></td>
		</tr>
		<?php 
		}
	} else {
	?>
		<tr>
			<td colspan="3" class="text-danger">No sub categories</td>
		</tr>
	<?php 
	}
	?>
	<tr>
		<th colspan="3"><b>Products</b> (<?php echo sizeof($products); ?>)</th>
	</tr>
	<?php 
	if (sizeof($products)>0) {
		foreach($products as $product) {
		?>
		<tr>
			<td><?php echo $product['DrexCartProduct']['name']; ?></td>
			<td></td>
			<td></td>
		</tr>
		<?php 
		}
	} else {
	?>
		<tr>
			<td colspan="3" class="text-danger">No products in this category</td>
		</tr>
	<?php 
	}
	?>
</table>
<?php //pr($categories); ?>
<?php //pr($products); ?>