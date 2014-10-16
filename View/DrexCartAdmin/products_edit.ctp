
<div class="sub-panel" style="margin:40px;">
<?php echo $this->Session->flash(); ?>
<?php //print_r($product); ?>


<div class="padding-10">

<?php echo $this->Form->create('DrexCartProduct', array('method'=>'post', 'enctype'=>'multipart/form-data')); ?>
	<table class="well well-light" width="100%">
	<tr>
		<th>Product Name:</th>
		<td style="width:20px;"></td>
		<td><?php echo $this->Form->input('name', array('label'=>false, 'class'=>'form-control')); ?></td>
	</tr>
	<tr>
		<td colspan="3" style="height:10px;"></td>
	</tr>
	<tr>
		<th>Product Price:</th>
		<td style="width:20px;"></td>
		<td><?php echo $this->Form->input('rate', array('label'=>false, 'class'=>'form-control')); ?></td>
	</tr>
	<tr>
		<td colspan="3" style="height:10px;"></td>
	</tr>
	<tr>
		<th>Product Weight:</th>
		<td style="width:20px;"></td>
		<td><?php echo $this->Form->input('product_weight', array('label'=>false, 'class'=>'form-control')); ?></td>
	</tr>
	<tr>
		<td colspan="3" style="height:10px;"></td>
	</tr>
	<tr>
		<th>Product Type</th>
		<td style="width:20px;"></td>
		<td><?php echo $this->Form->select('product_types_id', $product_types, array('empty'=>false, 'label'=>false, 'class'=>'form-control')); ?>
		
		</td>
	</tr>
	<tr>
		<td colspan="3" style="height:10px;"></td>
	</tr>
	<tr>
		<th>Status</th>
		<td style="width:20px;"></td>
		<td>Visible <?php echo $this->Form->checkbox('visible', array('checked'=>(!empty($this->request->data) && $this->request->data['DrexCartProduct']['visible']==1) ? 'checked' : '', 'label'=>true, 'class'=>'form-control')); ?>
		Enabled <?php echo $this->Form->checkbox('enabled', array('checked'=>(!empty($this->request->data) && $this->request->data['DrexCartProduct']['enabled']==1) ? 'checked' : '', 'label'=>true, 'class'=>'form-control')); ?>
		</td>
	</tr>
	
	</table>
	<?php echo $this->Form->hidden('main_image', array('id'=>'main_image')); ?>
	<?php echo $this->Form->hidden('main_thumb_image', array('id'=>'main_image_thumb')); ?>
	<?php echo $this->Js->submit('Save', array('url'=>'/DrexCartAdmin/productsEdit/'.(isset($product) ? $product['DrexCartProduct']['id'] : ''),
										   'update'=>'#panel_right',
										   'class'=>'btn btn-primary',
										   'buffer'=>false,
										   'complete'=>$this->Js->request('/DrexCartAdmin/productsList', array('update'=>'#panel_content', 'async'=>false, 'buffer'=>false)))); ?>

		
	<?php echo $this->Form->end(); ?>
	<table class="well well-light" width="100%">
	<tr>
		<td colspan="3" style="height:10px;"></td>
	</tr>
	<tr>
		<th>Product Main Image</th>
		<td style="width:20px;"></td>
		<td>
		<form id="file-form" target="frame_main_image" action="/DrexCartAdmin/productsUploadImage/main" method="POST" enctype="multipart/form-data">
		  <input type="file" id="file-select" name="data[photos][]" multiple/>
		  <button type="submit" id="upload-button">Upload</button>
		  <div id="response_text" style="border:1px solid black;"></div>
		</form>
		
		<iframe id="frame_main_image" name="frame_main_image" style="width:250px;height:120px;border:0px;"></iframe>
		<?php 
			//if (isset($product) && $product['DrexCartProduct']['main_image']) {
			//	echo $this->Html->image('drexcart/'.$product['DrexCartProduct']['main_image']);
			//} else {
			//	echo $this->Form->file('main_image', array('label'=>false, 'class'=>'form-control'));
			//}
			?>
		</td>
	</tr>
	<tr>
		<td colspan="3" style="height:10px;"></td>
	</tr>
	<tr>
		<th>Product Thumb Image</th>
		<td style="width:20px;"></td>
		<td><form id="file-form_thumb" target="frame_main_image_thumb" action="/DrexCartAdmin/productsUploadImage/thumb" method="POST" enctype="multipart/form-data">
		  <input type="file" id="file-select" name="data[photos][]" multiple/>
		  <button type="submit" id="upload-button">Upload</button>
		  <div id="response_text" style="border:1px solid black;"></div>
		</form>
		
		<iframe id="frame_main_image_thumb" name="frame_main_image_thumb" style="width:250px;height:120px;border:0px;"></iframe></td>
	</tr>
	<tr>
		<td colspan="3" style="height:10px;"></td>
	</tr>
</table>
</div>


</div>

<script type="text/javascript">
jQuery('document').ready(function(){
	

	
});
var form = document.getElementById('file-form');
var fileSelect = document.getElementById('file-select');
var uploadButton = document.getElementById('upload-button');
/*

function formSubmit(event) {
	event.preventDefault();
	$('#response_text').html('<i class="fa fa-cog fa-spin"></i>');
    // Update button text.
    //uploadButton.innerHTML = 'Uploading...';

    // The rest of the code will go here...
    
	// Get the selected files from the input.
	var files = fileSelect.files;

	// Create a new FormData object.
	var formData = new FormData();

	// Loop through each of the selected files.
	for (var i = 0; i < files.length; i++) {
	  var file = files[i];

	  // Check the file type.
	  if (!file.type.match('image.*')) {
	    continue;
	  }
alert('appending:'+file.name+"::"+file.toString());
	  // Add the file to the request.
	  formData.append('photos[]', file, file.name);
	}

	// Files
	//formData.append('name', file, file.name);

	// Blobs
	//formData.append(name, blob, filename);

	// Strings
	formData.append('mystring', 'myvalue');    

	// Set up the request.
	var xhr = new XMLHttpRequest();

	// Open the connection.
	xhr.open('POST', '/DrexCartAdmin/productsUploadImage', true);

	// Set up a handler for when the request finishes.
	xhr.onload = function () {
	  if (xhr.status === 200) {
	    // File(s) uploaded.
	    $('#response_text').html(xhr.responseText);
	    //uploadButton.innerHTML = 'Upload';
	  } else {
	    alert('An error occurred!');
	  }
	};


	// Send the Data.
	xhr.send(formData);
	return false;
}
*/
</script>