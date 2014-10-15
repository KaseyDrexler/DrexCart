<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	
	<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<?php
		echo $this->Html->meta('icon');

		
		echo $this->Html->css('bootstrap.min');
		echo $this->Html->css('font-awesome.min');
		echo $this->Html->css('DrexCart.main');
		
		echo $this->Html->script('bootstrap.min');
		
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
	<!-- Google Font -->
	<link href='http://fonts.googleapis.com/css?family=Noto+Sans' rel='stylesheet' type='text/css'>
</head>
<body>

<?php echo $this->fetch('content'); ?>


</body>
</html>