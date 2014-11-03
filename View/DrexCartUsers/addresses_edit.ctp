
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

<?php echo $this->Form->hidden('id'); ?>
<?php echo $this->Form->input('firstname'); ?>
<?php echo $this->Form->input('lastname'); ?>
<?php echo $this->Form->input('address1'); ?>
<?php echo $this->Form->input('address2'); ?>
<?php echo $this->Form->input('city'); ?>
<?php echo $this->Form->select('state', $DCFunctions->getStatesList()); ?>
<?php echo $this->Form->input('zip'); ?>
<?php echo $this->Js->submit('Update', array('url'=>'/DrexCartUsers/addressesEdit/'.(isset($this->request->data['DrexCartAddress']['id']) ? $this->request->data['DrexCartAddress']['id'] : ''),
                                             'update'=>'.modal-body',
											 'buffer'=>false)); ?>

<?php echo $this->Form->end(); ?>