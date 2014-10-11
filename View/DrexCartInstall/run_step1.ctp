<?php 
if (isset($ran)) {
	?>
	<div class="alert alert-success">Database Installed</div>
	<?php
} else {
	?>
	<div class="alert alert-danger">Database failed to install</div>
	<?php 
}
?>