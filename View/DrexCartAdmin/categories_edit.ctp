<h3>Edit Category</h3>

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

<?php echo $this->Form->Create('DrexCart.DrexCartCategory'); ?>

<?php echo $this->Form->input('name'); ?>

<b>Parent Category:</b> <?php echo $this->Form->select('parent_categories_id', $categories); ?>

<p class="text-right"><?php echo $this->Js->submit('Update', array('url'=>'/DrexCartAdmin/categoriesEdit/'.$categoryId, 'update'=>'#panel_right', 'buffer'=>false, 'class'=>'btn btn-primary')); ?></p>

<?php echo $this->Form->end(); ?>