<h1>Customers</h1>


<table class="table table-condensed table-hover">
	<tr>
		<th>User ID</th>
		<th>Created Date</th>
		<th>Name</th>
	</tr>
	
	<?php 
	foreach($users as $user) {
	?>
		<tr>
			<td><?php echo $user['DrexCartUser']['id']; ?></td>
			<td><?php echo date('m/d/Y h:i a', strtotime($user['DrexCartUser']['created_date'])); ?></td>
			<td><?php echo $user['DrexCartUser']['firstname'] . ' ' . $user['DrexCartUser']['lastname']; ?></td>
			
		</tr>
	<?php 
	}
	?>
</table>

<?php //pr($users); ?>