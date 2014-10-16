<?php echo $image_url.';'.$type; ?><?php 

echo $this->Html->image('drexcart/'.$image_url, array('style'=>'width:200px;height:100px;'));

?>
<script type="text/javascript">

$(document).ready(function () {

	<?php 
	if ($type=='thumb') {
		?>
		parent.document.getElementById('main_image_thumb').value =  '<?php echo $image_url; ?>';
		<?php 
	} else {
	?>
		parent.document.getElementById('main_image').value = '<?php echo $image_url; ?>';
		
	<?php 
	}
	?>
	
});
</script>