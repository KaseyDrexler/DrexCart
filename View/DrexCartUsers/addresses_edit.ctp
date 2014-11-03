
<?php 
if (isset($saved)) {
	?>
	<script type="text/javascript">
	document.location.href = document.location.href;
	</script>
	<?php 
}
?>


<?php echo $this->Form->create('DrexCartAddress'); ?>

<div class="row" style="margin-top:10px;">
	<div class="col-md-3 text-right">
		First Name:
	</div>
	<div class="col-md-3">
		<?php echo $this->Form->input('firstname', array('label'=>false, 'class'=>'form-control')); ?>
	</div>
	<div class="col-md-3 text-right">
		Last Name:
	</div>
	<div class="col-md-3">
		<?php echo $this->Form->input('lastname', array('label'=>false, 'class'=>'form-control')); ?>
	</div>
</div>

<div class="row" style="margin-top:10px;">
	<div class="col-md-12">
		Address Line 1:
	</div>
</div>
<div class="row" style="margin-top:10px;">
	<div class="col-md-12">
		<?php echo $this->Form->input('address1', array('label'=>false, 'class'=>'form-control')); ?>
	</div>
</div>
<div class="row" style="margin-top:10px;">
	<div class="col-md-12">
		Address Line 2:
	</div>
</div>
<div class="row" style="margin-top:10px;">
	<div class="col-md-12">
		<?php echo $this->Form->input('address2', array('label'=>false, 'class'=>'form-control')); ?>
	</div>
</div>
<div class="row" style="margin-top:10px;">
	<div class="col-md-2 text-right">
		City:
	</div>
	<div class="col-md-2">
		<?php echo $this->Form->input('city', array('label'=>false, 'class'=>'form-control')); ?>
	</div>
	<div class="col-md-2 text-right">
		State:
	</div>
	<div class="col-md-2">
		<?php echo $this->Form->select('state', $DCFunctions->getStatesList(), array('label'=>false, 'class'=>'form-control')); ?>
	</div>
	<div class="col-md-2 text-right">
		Zip:
	</div>
	<div class="col-md-2">
		<?php echo $this->Form->input('zip', array('label'=>false, 'class'=>'form-control')); ?>
	</div>
</div>
<?php echo $this->Form->hidden('id', array('label'=>false)); ?>




<div class="text-right" style="margin-top:10px;">
<?php echo $this->Js->submit('Update', array('url'=>'/DrexCartUsers/addressesEdit/'.(isset($this->request->data['DrexCartAddress']['id']) ? $this->request->data['DrexCartAddress']['id'] : ''),
                                             'update'=>'.modal-body',
											 'buffer'=>false,
											 'class'=>'btn btn-default')); ?></div>

<?php echo $this->Form->end(); ?>