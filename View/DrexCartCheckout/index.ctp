<h1>Checkout</h1>

<?php echo $this->Form->create('DrexCartOrder'); ?>

<div class="row">
	<!-- account login ad -->
	
	<?php
	 
	if ($this->Session->check('user')) {
		$user = $this->Session->read('user');
		
	} else { // not logged in
		?>
		<p class="text-right">Save my information for quick ordering: <?php echo $this->Form->checkbox('create_user', array('label'=>false, 'id'=>'chk_create_account', 'value'=>1, 'checked'=>'checked')); ?></p>
		<div class="pull-right well" id="panel_create_account">
			<div class="row">
				<div class="col-md-6 text-right"><b>Email Address</b></div>
				<div class="col-md-6<?php echo (isset($unvalidated) && array_key_exists('email', $unvalidated)) ? ' has-error' : ''; ?>"><?php echo $this->Form->input('DrexCartUser.email', array('label'=>false, 'class'=>'form-control', 'placeholder'=>'Email Address'))?></div>
			</div>
			<div class="row">
				<div class="col-md-6 text-right"><b>Password</b></div>
				<div class="col-md-6<?php echo (isset($unvalidated) && array_key_exists('password', $unvalidated)) ? ' has-error' : ''; ?>"><?php echo $this->Form->password('DrexCartUser.password', array('label'=>false, 'class'=>'form-control', 'placeholder'=>'password'))?></div>
			</div>
			<div class="row">
				<div class="col-md-6 text-right"><b>Verify Password</b></div>
				<div class="col-md-6<?php echo (isset($unvalidated) && array_key_exists('vpassword', $unvalidated)) ? ' has-error' : ''; ?>"><?php echo $this->Form->password('DrexCartUser.vpassword', array('label'=>false, 'class'=>'form-control', 'placeholder'=>'password'))?></div>
			</div>
		</div>
		<?php
	}
	?>
</div>
<div class="row">
	<div class="col-md-6">
		<div class="panel panel-warning">
			<div class="panel-heading">
				<p class="panel-title">Billing Information</p>
			</div>
			<div class="panel-body">
				<div class="row" style="margin-top:10px;">
					<div class="col-md-6">
						First Name<br />
						<?php echo $this->Form->input('billing_firstname', array('id'=>'billing_firstname', 'label'=>false, 'class'=>"form-control", 'placeholder'=>'First Name')); ?>
					</div>
					<div class="col-md-6">
						Last Name<br />
						<?php echo $this->Form->input('billing_lastname', array('id'=>'billing_lastname', 'label'=>false, 'class'=>"form-control", 'placeholder'=>'Last Name')); ?>
					</div>
				</div>
				<div class="row" style="margin-top:10px;">
					<div class="col-md-12">
						Address Line 1<br />
						<?php echo $this->Form->input('billing_address1', array('id'=>'billing_address1', 'label'=>false, 'class'=>"form-control", 'placeholder'=>'Address')); ?>
					</div>
				</div>
				<div class="row" style="margin-top:10px;">
					<div class="col-md-12">
						Address Line 2<br />
						<?php echo $this->Form->input('billing_address2', array('id'=>'billing_address2', 'label'=>false, 'class'=>"form-control")); ?>
					</div>
				</div>
				<div class="row" style="margin-top:10px;">
					<div class="col-md-12">
						City<br />
						<?php echo $this->Form->input('billing_city', array('id'=>'billing_city', 'label'=>false, 'class'=>"form-control", 'placeholder'=>'City')); ?>
					</div>
				</div>
				<div class="row" style="margin-top:10px;">
					<div class="col-md-6">
						State<br />
						<?php echo $this->Form->select('billing_state', $DCFunctions->getStatesList(), array('id'=>'billing_state', 'empty'=>false, 'label'=>false, 'class'=>"form-control")); ?>
					</div>
					<div class="col-md-6">
						Zip<br />
						<?php echo $this->Form->input('billing_zip', array('id'=>'billing_zip', 'maxchars'=>10, 'label'=>false, 'class'=>"form-control", 'placeholder'=>'Zip Code')); ?>
					</div>
				</div>
				<div class="row" style="margin-top:10px;">
					<div class="col-md-6 text-right">
						Contact Phone Number
					</div>
					<div class="col-md-6">
						<?php echo $this->Form->input('billing_phone', array('id'=>'billing_phone', 'maxchars'=>14, 'label'=>false, 'class'=>"form-control", 'placeholder'=>'Phone #')); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-6">
		<div class="panel panel-warning">
			<div class="panel-heading">
				<p class="panel-title">Shipping Information</p>
				<span class="pull-right"><?php echo $this->Form->checkbox('copy_address', array('label'=>false, 'id'=>'copy_address')); ?></span>
			</div>
			<div class="panel-body">
				<div class="row" style="margin-top:10px;">
					<div class="col-md-6">
						First Name<br />
						<?php echo $this->Form->input('shipping_firstname', array('id'=>'shipping_firstname', 'label'=>false, 'class'=>"form-control", 'placeholder'=>'First Name')); ?>
					</div>
					<div class="col-md-6">
						Last Name<br />
						<?php echo $this->Form->input('shipping_lastname', array('id'=>'shipping_lastname', 'label'=>false, 'class'=>"form-control", 'placeholder'=>'Last Name')); ?>
					</div>
				</div>
				<div class="row" style="margin-top:10px;">
					<div class="col-md-12">
						Address Line 1<br />
						<?php echo $this->Form->input('shipping_address1', array('id'=>'shipping_address1', 'label'=>false, 'class'=>"form-control", 'placeholder'=>'Address')); ?>
					</div>
				</div>
				<div class="row" style="margin-top:10px;">
					<div class="col-md-12">
						Address Line 2<br />
						<?php echo $this->Form->input('shipping_address2', array('id'=>'shipping_address2', 'label'=>false, 'class'=>"form-control")); ?>
					</div>
				</div>
				<div class="row" style="margin-top:10px;">
					<div class="col-md-12">
						City<br />
						<?php echo $this->Form->input('shipping_city', array('id'=>'shipping_city', 'label'=>false, 'class'=>"form-control", 'placeholder'=>'City')); ?>
					</div>
				</div>
				<div class="row" style="margin-top:10px;">
					<div class="col-md-6">
						State<br />
						<?php echo $this->Form->select('shipping_state', $DCFunctions->getStatesList(), array('id'=>'shipping_state', 'empty'=>false, 'label'=>false, 'class'=>"form-control")); ?>
					</div>
					<div class="col-md-6">
						Zip<br />
						<?php echo $this->Form->input('shipping_zip', array('id'=>'shipping_zip', 'maxchars'=>10, 'label'=>false, 'class'=>"form-control", 'placeholder'=>'Zip Code')); ?>
					</div>
				</div>
				
			</div>
		</div>
	</div>
</div>

<!-- payment area -->

<div class="row">
	<div class="col-md-8">
		<div class="panel panel-warning">
			<div class="panel-heading">
				<p class="panel-title">Payment Information</p>
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-md-12">
						Name on the card<br />
						<?php echo $this->Form->input('DrexCartPaymentProfile.fullname', array('label'=>false, 'class'=>'form-control')); ?>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						Card number<br />
						<?php echo $this->Form->input('DrexCartPaymentProfile.card_number', array('label'=>false, 'class'=>'form-control')); ?>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4">
						Expiration<br />
						<?php echo $this->Form->month('DrexCartPaymentProfile.exp_month', array('label'=>false, 'empty'=>false, 'class'=>'form-control')); ?>
					</div>
					<div class="col-md-4">
						&nbsp;<br />
						<?php echo $this->Form->year('DrexCartPaymentProfile.exp_year', date('Y'), date('Y')+8, array('label'=>false, 'empty'=>false, 'class'=>'form-control')); ?>
					</div>
					<div class="col-md-4">
						CVC<br />
						<?php echo $this->Form->input('DrexCartPaymentProfile.cvc', array('label'=>false, 'class'=>'form-control')); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-4 text-right">
		<?php echo $this->Form->button('Verify Order', array('class'=>'btn btn-warning')); ?>
	</div>
</div>


<?php echo $this->Form->end(); ?>

<script type="text/javascript">
	$(document).ready(function() {
		$('#chk_create_account').on('change', function () {
			if ($(this).is(':checked')) {
				$('#panel_create_account').fadeIn();
			} else {
				$('#panel_create_account').fadeOut();
			}
		});

		$('#copy_address').on('change', function () {
			if ($(this).is(':checked')) {
				$('#shipping_firstname').val($('#billing_firstname').val());
				$('#shipping_lastname').val($('#billing_lastname').val());
				$('#shipping_city').val($('#billing_city').val());
				$('#shipping_state').val($('#billing_state').val());
				$('#shipping_zip').val($('#billing_zip').val());
				$('#shipping_address1').val($('#billing_address1').val());
				$('#shipping_address2').val($('#billing_address2').val());
			} else {
				$('#panel_create_account').fadeOut();
			}
		});
	});
</script>