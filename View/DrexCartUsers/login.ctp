<h1>Login</h1>

<?php echo $this->Form->create('DrexCartUser'); ?>
<div class="panel panel-warning">
	<div class="panel-heading">
		<p class="panel-title">Login</p>
	</div>
	<div class="panel-body">
		<div class="row">
			<div class="col-md-6">
				Email:
			</div>
			<div class="col-md-6">
				<?php echo $this->Form->input('email', array('label'=>false, 'class'=>'form-control')); ?>
			</div>
			
		</div>
		<div class="row">
			<div class="col-md-6">
				Password:
			</div>
			<div class="col-md-6">
				<?php echo $this->Form->password('password', array('label'=>false, 'class'=>'form-control')); ?>
			</div>
			
		</div>
		<div class="row">
			<div class="col-md-6">
				
			</div>
			<div class="col-md-6">
				<?php echo $this->Form->button('Login', array('class'=>'btn btn-primary')); ?>
			</div>
			
		</div>
	</div>
</div>
<?php echo $this->Form->end(); ?>