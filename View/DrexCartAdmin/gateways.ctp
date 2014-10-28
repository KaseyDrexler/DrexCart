<h1>Payment Gateways</h1>



<p><b>Number of gateways: </b><?php echo sizeof($gateways); ?></p>
<p><?php echo $this->Js->link('Show Disabled', '/DrexCartAdmin/gateway/showDisabled:true', array('update'=>'#panel_content', 'buffer'=>false)); ?>
&nbsp;&nbsp;&nbsp;&nbsp;
<?php echo $this->Js->link('Show Deleted', '/DrexCartAdmin/gateway/showDeleted:true', array('update'=>'#panel_content', 'buffer'=>false)); ?></p>

<table class="table hover">
	<tr>
		<th>
			Name
		</th>
		<th>
			
		</th>
		<th>
			Price
		</th>
		<th>
			
		</th>
	</tr>
	<?php 
	foreach($gateways as $gateway) {
		?>
		<tr>
			<td><?php echo $gateway['DrexCartGateway']['name']; ?></td>
			<td><?php echo ($gateway['DrexCartGateway']['enabled']==1) ? $this->Js->link('Enabled', '/DrexCartAdmin/gateway/disable:'.$gateway['DrexCartGateway']['id'], array('update'=>'#panel_content', 'buffer'=>false)) : $this->Js->link('Disabled', '/DrexCartAdmin/gateway/enable:'.$gateway['DrexCartGateway']['id'], array('update'=>'#panel_content', 'buffer'=>false)); ?></td> 
							 
							
			<td align="right"><?php echo $gateway['DrexCartGateway']['type']; ?></td>
			<td align="right"><?php echo $this->Js->link('Edit', '/DrexCartAdmin/gatewayEdit/'.$gateway['DrexCartGateway']['id'], array('update'=>'#panel_right', 'buffer'=>false)); ?></td>
		</tr>	
		<?php 
	}
	?>
</table>
<p class="text-right"><?php echo $this->Js->link('Add Gateway', '/DrexCartAdmin/gatewayEdit/', array('class'=>'btn btn-default', 'update'=>'#panel_right', 'buffer'=>false)); ?></p>