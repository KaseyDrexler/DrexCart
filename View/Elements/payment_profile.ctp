<?php 
if (isset($profiles)) {
?>
<table class="table table-hover">
	<tr>
		<th></th>
		<th>Card</th>
		<th>Expiration</th>
	</tr>
	<?php 
	foreach($profiles as $payment) {
	?>
		<tr onclick="selectCard(this);" style="cursor: pointer;">
			<td><input type="radio" name="data[DrexCartGatewayProfile][id]" value="<?php echo $payment['DrexCartGatewayProfile']['id']; ?>" /></td>
			<td><?php echo $payment['DrexCartGatewayProfile']['account_number']; ?></td>
			<td><?php echo $payment['DrexCartGatewayProfile']['expiration']; ?></td>
		</tr>
	<?php 
	}
	?>
	<tr>
		<td><input type="radio" name="data[DrexCartGatewayProfile][id]" value="new" /></td>
		<td colspan="2">
			<?php 
			foreach($gateways as $gateway) {
			?>
			<p><b><?php echo $gateway['DrexCartGateway']['name']; ?></b></p>
			
			<div class="row">
				<div class="col-md-12">
					Card number<br /><?php echo $this->Form->hidden('DrexCartGatewayProfile.drex_cart_gateways_id', array('value'=>$gateway['DrexCartGateway']['id'])); ?>
					<?php echo $this->Form->input('DrexCartGatewayProfile.account_number', array('required'=>false, 'label'=>false, 'class'=>'form-control')); ?>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4">
					Expiration<br />
					<?php echo $this->Form->input('DrexCartGatewayProfile.expiration', array('required'=>false, 'label'=>false, 'empty'=>false, 'class'=>'form-control')); ?>
				</div>
				<div class="col-md-4">
					&nbsp;<br />
					<?php //echo $this->Form->year('DrexCartGatewayProfile.exp_year', date('Y'), date('Y')+8, array('label'=>false, 'empty'=>false, 'class'=>'form-control')); ?>
				</div>
				<div class="col-md-4">
					CVC<br />
					<?php echo $this->Form->input('DrexCartGatewayProfile.code', array('required'=>false, 'label'=>false, 'class'=>'form-control')); ?>
				</div>
			</div>
			<?php 
			}
			?>
		</td>
	</tr>
	
</table>
<?php 
} else {
?>
<?php 
foreach($gateways as $gateway) {
?>
<p><b><?php echo $gateway['DrexCartGateway']['name']; ?></b></p>

<div class="row">
	<div class="col-md-12">
		Card number<br /><?php echo $this->Form->hidden('DrexCartGatewayProfile.drex_cart_gateways_id', array('value'=>$gateway['DrexCartGateway']['id'])); ?>
		<?php echo $this->Form->input('DrexCartGatewayProfile.account_number', array('required'=>false, 'label'=>false, 'class'=>'form-control')); ?>
	</div>
</div>
<div class="row">
	<div class="col-md-4">
		Expiration<br />
		<?php echo $this->Form->input('DrexCartGatewayProfile.expiration', array('required'=>false, 'label'=>false, 'empty'=>false, 'class'=>'form-control')); ?>
	</div>
	<div class="col-md-4">
		&nbsp;<br />
		<?php //echo $this->Form->year('DrexCartGatewayProfile.exp_year', date('Y'), date('Y')+8, array('label'=>false, 'empty'=>false, 'class'=>'form-control')); ?>
	</div>
	<div class="col-md-4">
		CVC<br />
		<?php echo $this->Form->input('DrexCartGatewayProfile.code', array('required'=>false, 'label'=>false, 'class'=>'form-control')); ?>
	</div>
</div>
<?php 
}
?>


<?php 
}
?>
<script type="text/javascript">
function selectCard(cell) {
	
	$(cell).find("td input:radio").attr('checked', 'checked');
	
}

</script>