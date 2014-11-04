
<h1>Checkout</h1>


<?php 
if (isset($shipping_met) && !$shipping_met) {
?>
	<div class="alert alert-danger"><p class="text-right"><a href="javascript:void(0);" onclick="$(this).closest('div').hide();">x</a><p>Please select a shipping option.</div>
<?php 
}
?>

<?php echo $this->Form->create('DrexCartOrder'); ?>
<?php //pr($unvalidated); ?>
<div class="row">
	<!-- account login ad -->
	
	<?php
	 /* @var $userManager DrexCartUserManager */
	if (isset($userManager) && $userManager->isLoggedIn()) {
		//$user = $this->Session->read('user');
		echo $userManager->getFullName();
	} else { // not logged in
		?>
		<p class="text-right">Save my information for quick ordering: <?php echo $this->Form->checkbox('create_user', array('label'=>false, 'id'=>'chk_create_account', 'value'=>1, 'checked'=>'checked')); ?></p>
		<div class="pull-right well" id="panel_create_account">
			<div class="row">
				<div class="col-md-6 text-right"><b>Email Address</b></div>
				<div class="col-md-6<?php echo (isset($unvalidated) && array_key_exists('email', $unvalidated)) ? ' has-error' : ''; ?>"><?php echo $this->Form->input('DrexCartUser.email', array('id'=>'email', 'label'=>false, 'class'=>'form-control', 'placeholder'=>'Email Address'))?> <div style="display:inline-block;" id="checkout_email_check">
					
				</div></div>
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
				<?php 
				if ($userManager->isLoggedIn()) {
					$addresses = $userManager->getAddresses();
					$defaultBillingAddress = $userManager->getBillingAddress();
					$defaultShippingAddress = $userManager->getShippingAddress();
					
					
					?>
					
					<table class="table table-hover">
						<tr>
							<th></th>
							<th>Name</th>
							<th>Address</th>
						</tr>
						<?php 
						if (isset($addresses)) {
							foreach($addresses as $address) {
					
							?>
							<tr>
								<td><input type="radio" name="data[DrexCartOrder][default_billing_id]" value="<?php echo $address['DrexCartAddress']['id']; ?>" onclick="$('#panel_new_billing').fadeOut();" <?php 
								if ($address['DrexCartAddress']['id']==$defaultBillingAddress['DrexCartAddress']['id']) {
									echo ' checked="checked"';
								}
								?> /></td>
								<td><?php echo $address['DrexCartAddress']['firstname'] . ' ' . $address['DrexCartAddress']['lastname']; ?></td>
								<td><?php echo $address['DrexCartAddress']['address1']; ?><br />
									<?php echo $address['DrexCartAddress']['address2'] ? $address['DrexCartAddress']['address2'].'<br />' : ''; ?>
									<?php echo $address['DrexCartAddress']['city']; ?>, <?php echo $address['DrexCartAddress']['state']; ?> <?php echo $address['DrexCartAddress']['zip']; ?>
									</td>
								
								
							</tr>
							<?php 
							}
							?>
							<tr>
								<td><input type="radio" id="billing_address" value="new" name="data[DrexCartOrder][default_billing_id]" /></td>
								<td colspan="2">
									<p class="text-success">New Billing Address</p>
									<div id="panel_new_billing">
										<div class="row" style="margin-top:10px;">
											<div class="col-md-6">
												First Name<br />
												<?php echo $this->Form->input('billing_firstname', array('div'=>false, 'required'=>false, 'id'=>'billing_firstname', 'label'=>false, 'class'=>"form-control", 'placeholder'=>'First Name')); ?>
											</div>
											<div class="col-md-6">
												Last Name<br />
												<?php echo $this->Form->input('billing_lastname', array('div'=>false, 'required'=>false, 'id'=>'billing_lastname', 'label'=>false, 'class'=>"form-control", 'placeholder'=>'Last Name')); ?>
											</div>
										</div>
										<div class="row" style="margin-top:10px;">
											<div class="col-md-12">
												Address Line 1<br />
												<?php echo $this->Form->input('billing_address1', array('div'=>false, 'required'=>false, 'id'=>'billing_address1', 'label'=>false, 'class'=>"form-control", 'placeholder'=>'Address')); ?>
											</div>
										</div>
										<div class="row" style="margin-top:10px;">
											<div class="col-md-12">
												Address Line 2<br />
												<?php echo $this->Form->input('billing_address2', array('div'=>false, 'required'=>false, 'id'=>'billing_address2', 'label'=>false, 'class'=>"form-control")); ?>
											</div>
										</div>
										<div class="row" style="margin-top:10px;">
											<div class="col-md-12">
												City<br />
												<?php echo $this->Form->input('billing_city', array('div'=>false, 'required'=>false, 'id'=>'billing_city', 'label'=>false, 'class'=>"form-control", 'placeholder'=>'City')); ?>
											</div>
										</div>
										<div class="row" style="margin-top:10px;">
											<div class="col-md-6">
												State<br />
												<?php echo $this->Form->select('billing_state', $DCFunctions->getStatesList(), array('div'=>false, 'required'=>false, 'id'=>'billing_state', 'empty'=>false, 'label'=>false, 'class'=>"form-control")); ?>
											</div>
											<div class="col-md-6">
												Zip<br />
												<?php echo $this->Form->input('billing_zip', array('div'=>false, 'required'=>false, 'id'=>'billing_zip', 'maxchars'=>10, 'label'=>false, 'class'=>"form-control", 'placeholder'=>'Zip Code')); ?>
											</div>
										</div>
										<div class="row" style="margin-top:10px;">
											<div class="col-md-6 text-right">
												Contact Phone Number
											</div>
											<div class="col-md-6">
												<?php echo $this->Form->input('billing_phone', array('div'=>false, 'required'=>false, 'id'=>'billing_phone', 'maxchars'=>14, 'label'=>false, 'class'=>"form-control", 'placeholder'=>'Phone #')); ?>
											</div>
										</div>
									</div>
								</td>
							</tr>
							<?php 
						}
						?>
					</table>
					
					<?php
				} else {
				?>
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
						<?php echo $this->Form->input('billing_phone', array('div'=>false, 'required'=>false, 'id'=>'billing_phone', 'maxchars'=>14, 'label'=>false, 'class'=>"form-control", 'placeholder'=>'Phone #')); ?>
					</div>
				</div>
				<?php 
				}
				?>
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
				
				<?php 
				if ($userManager->isLoggedIn()) {
					?>
					<table class="table table-hover">
						<tr>
							<th></th>
							<th>Name</th>
							<th>Address</th>
						</tr>
						<?php 
						if (isset($addresses)) {
							foreach($addresses as $address) {
					
							?>
							<tr>
								<td><input type="radio" name="data[DrexCartOrder][default_shipping_id]" value="<?php echo $address['DrexCartAddress']['id']; ?>" onclick="$('#panel_new_shipping').fadeOut();" <?php 
								if ($address['DrexCartAddress']['id']==$defaultShippingAddress['DrexCartAddress']['id']) {
									echo ' checked="checked"';
								}
								?> /></td>
								<td><?php echo $address['DrexCartAddress']['firstname'] . ' ' . $address['DrexCartAddress']['lastname']; ?></td>
								<td><?php echo $address['DrexCartAddress']['address1']; ?><br />
									<?php echo $address['DrexCartAddress']['address2'] ? $address['DrexCartAddress']['address2'].'<br />' : ''; ?>
									<?php echo $address['DrexCartAddress']['city']; ?>, <?php echo $address['DrexCartAddress']['state']; ?> <?php echo $address['DrexCartAddress']['zip']; ?>
									</td>
								
								
							</tr>
							<?php 
							}
							?>
							<tr>
								<td><input type="radio" id="shipping_address" value="new" name="data[DrexCartOrder][default_shipping_id]" /></td>
								<td colspan="2">
									<p class="text-success">New Shipping Address</p>
									<div id="panel_new_shipping">
										<div class="row" style="margin-top:10px;">
											<div class="col-md-6">
												First Name<br />
												<?php echo $this->Form->input('shipping_firstname', array('div'=>false, 'required'=>false, 'id'=>'shipping_firstname', 'label'=>false, 'class'=>"form-control", 'placeholder'=>'First Name')); ?>
											</div>
											<div class="col-md-6">
												Last Name<br />
												<?php echo $this->Form->input('shipping_lastname', array('div'=>false, 'required'=>false, 'id'=>'shipping_lastname', 'label'=>false, 'class'=>"form-control", 'placeholder'=>'Last Name')); ?>
											</div>
										</div>
										<div class="row" style="margin-top:10px;">
											<div class="col-md-12">
												Address Line 1<br />
												<?php echo $this->Form->input('shipping_address1', array('div'=>false, 'required'=>false, 'id'=>'shipping_address1', 'label'=>false, 'class'=>"form-control", 'placeholder'=>'Address')); ?>
											</div>
										</div>
										<div class="row" style="margin-top:10px;">
											<div class="col-md-12">
												Address Line 2<br />
												<?php echo $this->Form->input('shipping_address2', array('div'=>false, 'required'=>false, 'id'=>'shipping_address2', 'label'=>false, 'class'=>"form-control")); ?>
											</div>
										</div>
										<div class="row" style="margin-top:10px;">
											<div class="col-md-12">
												City<br />
												<?php echo $this->Form->input('shipping_city', array('div'=>false, 'required'=>false, 'id'=>'shipping_city', 'label'=>false, 'class'=>"form-control", 'placeholder'=>'City')); ?>
											</div>
										</div>
										<div class="row" style="margin-top:10px;">
											<div class="col-md-6">
												State<br />
												<?php echo $this->Form->select('shipping_state', $DCFunctions->getStatesList(), array('div'=>false, 'required'=>false, 'id'=>'shipping_state', 'empty'=>false, 'label'=>false, 'class'=>"form-control")); ?>
											</div>
											<div class="col-md-6">
												Zip<br />
												<?php echo $this->Form->input('shipping_zip', array('div'=>false, 'required'=>false, 'id'=>'shipping_zip', 'maxchars'=>10, 'label'=>false, 'class'=>"form-control", 'placeholder'=>'Zip Code')); ?>
											</div>
										</div>
									</div>
								</td>
							</tr>
							<?php 
						}
						?>
					</table>
					<?php 

				} else {
				?>
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
				<?php 
				}
				?>
			</div>
		</div>
	</div>
</div>

<!-- Shipping Area -->

<div class="row">
	<div class="col-md-8">
		<div class="panel panel-warning">
			<div class="panel-heading">
				<p class="panel-title">Shipping Information</p>
			</div>
			<div class="panel-body" id="panel_shipping">
				<table class="table table-condensed table-hover">
				<tr>
					<th></th>
					<th>Shipping Option</th>
					<th class="text-right">Cost</th>
				</tr>
				<?php 
				$shipping_options = $shipping->getShippingOptions();
				foreach($shipping_options as $option) {
					?>
					<tr>
						<td><input type="radio" name="data[DrexCartOrder][shipping_option]" value="<?php echo $option['code']; ?>" /></td>
						<td><?php echo $option['name']; ?></td>
						<td class="text-right">$<?php echo number_format($option['cost'],2); ?></td>
					</tr>
					<?php
				}
				?>
				</table>
			</div>
		</div>
	</div>
	<div class="col-md-4 text-right">
		<?php //echo $this->Form->button('Verify Order', array('class'=>'btn btn-warning')); ?>
	</div>
</div>

<!-- End of Shipping Area -->

<!-- payment area -->

<div class="row">
	<div class="col-md-8">
		<div class="panel panel-warning">
			<div class="panel-heading">
				<p class="panel-title">Payment Information</p>
			</div>
			<div class="panel-body" id="panel_payment">
				<script type="text/javascript">
				<?php echo $this->Js->request('/DrexCartCheckout/payment', array('update'=>'#panel_payment', 'async'=>false, 'buffer'=>false)); ?>
				</script>
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
		<?php
		if (isset($userManager) && $userManager->isLoggedIn()) {
			?>
			$('#chk_create_account').on('change', function () {
				if ($(this).is(':checked')) {
					$('#panel_create_account').fadeIn();
				} else {
					$('#panel_create_account').fadeOut();
				}
			});
			




			$('#billing_address').each(function () { $(this).on('change', function () {
				//alert($(this).val());
				if ($(this).val()=='new') {
					$('#panel_new_billing').fadeIn();
				} else {
					$('#panel_new_billing').fadeOut();
				}
			})});

			<?php 
			if (isset($defaultBillingAddress) && $defaultBillingAddress) {
				// hide the new billing panel
				?>
				$('#panel_new_billing').hide();
				<?php
			}
			?>

			$('#shipping_address').each(function () { $(this).on('change', function () {
				//alert($(this).val());
				if ($(this).val()=='new') {
					$('#panel_new_shipping').fadeIn();
				} else {
					$('#panel_new_shipping').fadeOut();
				}
			})});

			<?php 
			if (isset($defaultShippingAddress) && $defaultShippingAddress) {
				// hide the new billing panel
				?>
				$('#panel_new_shipping').hide();
				<?php
			}
			?>
			
			<?php 
		}
		?>
		$('#email').on('keyup', function () {
			if ($(this).val().length>5 && $(this).val().indexOf('@')>0) {
				//alert('/DrexCartCarts/checkEmail/'+encodeURI($(this).val()));
				$.ajax('/DrexCartCheckout/checkEmail/'+encodeURI($(this).val()), {
						success: function (data) {
							$('#checkout_email_check').html(data);
							//alert(data);
							
						}});
						
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
				//$('#panel_create_account').fadeOut();
			}
		});

		
		
	});

</script>