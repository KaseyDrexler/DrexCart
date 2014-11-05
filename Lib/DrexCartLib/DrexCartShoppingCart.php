<?php

App::uses('AuthorizePaymentModule', 'DrexCart.DrexCartLib/Modules/Payment');

class DrexCartShoppingCart {
	
	private $drexcart_id;
	
	
	public function __construct() {
		// get cart information
		$this->DrexCartCart = ClassRegistry::init('DrexCart.DrexCartCart');
		$this->DrexCartCart->create();
		$this->DrexCartCartProduct = ClassRegistry::init('DrexCart.DrexCartCartProduct');
		$this->DrexCartCartProduct->create();
		
		if (CakeSession::check('drexcart_id')) {
			$this->drexcart_id = CakeSession::read('drexcart_id');
		} else {
			$this->cart = $this->DrexCartCart->createCart(CakeSession::check('drexcart_user_id') ? CakeSession::read('drexcart_user_id') : null);
			$this->drexcart_id = $this->cart['DrexCartCart']['id'];
			CakeSession::write('drexcart_id', $this->drexcart_id);
		}
		
	}
	
	public function getProducts() {
		$this->DrexCartCartProduct = ClassRegistry::init('DrexCart.DrexCartCartProduct');
		$this->DrexCartCartProduct->create();
		return $this->DrexCartCartProduct->getProducts($this->drexcart_id);
	}
	
	public function hasShippableProducts() {
		$products = $this->getProducts();
		foreach($products as $product) {
			if ($product['DrexCartProductType']['shippable']==1) {
				return true;
			}
		}
		return false;
	}
	
	public function getCreatedDate() {
		$this->DrexCartCart = ClassRegistry::init('DrexCart.DrexCartCart');
		$this->DrexCartCart->create();
		$cart_row = $this->DrexCartCart->find('first', array('conditions'=>array('id'=>$this->drexcart_id)));
		if ($cart_row) {
			return $cart_row['DrexCartCart']['created_date'];
		}
		return date('Y-m-d H:i:s');
	}
	
	public function getCartTotal() {
		$this->DrexCartCartProduct = ClassRegistry::init('DrexCart.DrexCartCartProduct');
		$this->DrexCartCartProduct->create();
		return $this->DrexCartCartProduct->getCartTotal($this->drexcart_id);
	}
	
	public function addProduct($product_id=null) {
		$this->DrexCartProduct = ClassRegistry::init('DrexCart.DrexCartProduct');
		$this->DrexCartProduct->create();
		$this->DrexCartCartProduct = ClassRegistry::init('DrexCart.DrexCartCartProduct');
		$this->DrexCartCartProduct->create();
		if ($this->DrexCartProduct->getProductQuantity($product_id)>0) {
			$this->DrexCartCartProduct->addProduct($this->drexcart_id, (int) $product_id);
			return true;
		} else {
			return false;
		}
	}
	
	public function updateQuantity($cartProductId=null, $quantity=null) {
		$this->DrexCartCartProduct = ClassRegistry::init('DrexCart.DrexCartCartProduct');
		$this->DrexCartCartProduct->create();
		if (!$quantity) { 
			$this->DrexCartCartProduct->deleteAll(array('id'=>$cartProductId,
														'drex_cart_carts_id'=>$this->drexcart_id));
		} else {
			$this->DrexCartCartProduct->updateAll(array('quantity'=>(int)$quantity),
												  array('id'=>$cartProductId, 
												  		'drex_cart_carts_id'=>$this->drexcart_id));
		}
	}
	
	public function deleteProduct($cartProductId=null) {
		$this->updateQuantity($cartProductId, 0);
	}
	
	public function createOrder($user_id=null) {
		
		$this->DrexCartCartProduct = ClassRegistry::init('DrexCart.DrexCartCartProduct');
		$this->DrexCartCartProduct->create();
		// checks
		
		// check order information
		if (!CakeSession::check('DrexCartOrder')) throw new Exception('There is no order information for checkout!');
		// check customer information
		if (!CakeSession::check('DrexCartUser') && !$user_id) throw new Exception('There is no customer information for checkout!');
		
		$products = $this->getProducts();
		if (sizeof($products)>0) {
			// TODO good place to check quantities
			
			$this->DrexCartUser = ClassRegistry::init('DrexCart.DrexCartUser');
			$this->DrexCartUser->create();
			$this->DrexCartOrder = ClassRegistry::init('DrexCart.DrexCartOrder');
			$this->DrexCartOrder->create();
			$this->DrexCartProduct = ClassRegistry::init('DrexCart.DrexCartProduct');
			$this->DrexCartProduct->create();
			$this->DrexCartOrderProduct = ClassRegistry::init('DrexCart.DrexCartOrderProduct');
			$this->DrexCartOrderProduct->create();
			$this->DrexCartAddress = ClassRegistry::init('DrexCart.DrexCartAddress');
			$this->DrexCartAddress->create();

			$order = CakeSession::read('DrexCartOrder');
			$this->userManager = CakeSession::read('user_manager');
			$payment_ok = false;
			if (!$user_id) {
				$user = CakeSession::read('DrexCartUser');
				
				$user['created_date'] = date('Y-m-d H:i:s');
				$user['last_login'] = date('Y-m-d H:i:s');
				$user['firstname'] = ucwords($order['billing_firstname']);
				$user['lastname'] = ucwords($order['billing_lastname']);
				//pr($user);
				
				$this->DrexCartUser->save(array('DrexCartUser'=>$user));
				$user_id = $this->DrexCartUser->id;
				$user['id'] = $user_id;
				$was_logged_in = false;
				if ($transaction = $this->createGatewayCustomer($user, $order)) {
					// todo save customer info
					
					$payment_ok = true;
				} else {
					// TODO remove customer if they need to be 
					$this->DrexCartUser->deleteAll(array('id'=>$user_id));
				}
				
			} else {
				$user = $this->DrexCartUser->find('first', array('conditions'=>array('id'=>(int)$user_id)));
				$user = $user['DrexCartUser'];
				$was_logged_in = true;
				if ($transaction = $this->createOrderPayment($user, $order)) {
					$payment_ok = true;
				}
			} 
			if ($payment_ok) {
				// save addresses
				if (isset($order['default_billing_id'])) {
					$this->DrexCartAddress->id = $order['default_billing_id'];	
					
				} else if ($order['billing_address1']) {
				
					$billing_address = array('DrexCartAddress'=>array('firstname'     =>ucwords($order['billing_firstname']),
																		  'lastname'      =>ucwords($order['billing_lastname']),
																		  'address1'      =>ucwords($order['billing_address1']),
																		  'address2'      =>ucwords($order['billing_address2']),
																		  'city'          =>ucwords($order['billing_city']),
																		  'state'         =>$order['billing_state'],
																		  'zip'           =>$order['billing_zip'],
																		  'contact_number'=>$order['billing_phone'],
																		  'drex_cart_users_id'=>$user_id));
					$this->DrexCartAddress->id = null;
					$this->DrexCartAddress->save($billing_address);
					$this->DrexCartUser->updateAll(array('DrexCartUser.billing_address_id'=>$this->DrexCartAddress->id),
												   array('DrexCartUser.id'=>$user_id));
				}
				if (isset($order['default_shipping_id'])) {
					
				} else if ($order['shipping_address1']) {
					if ($order['shipping_address1']==$order['billing_address1'] &&
						$order['shipping_address2']==$order['billing_address2'] &&
						$order['shipping_city']==$order['billing_city'] &&
						$order['shipping_state']==$order['billing_state'] &&
						$order['shipping_zip']==$order['billing_zip'] &&
						$order['shipping_firstname']==$order['billing_firstname'] &&
						$order['shipping_lastname']==$order['billing_lastname']) {
							
						// copy of billing address
						$this->DrexCartUser->updateAll(array('DrexCartUser.shipping_address_id'=>$this->DrexCartAddress->id),
								array('DrexCartUser.id'=>$user_id));
					} else {
						// shipping address is different than billing address
						$shipping_address = array('DrexCartAddress'=>array('firstname'     =>ucwords($order['shipping_firstname']),
																			'lastname'      =>ucwords($order['shipping_lastname']),
																			'address1'      =>ucwords($order['shipping_address1']),
																			'address2'      =>ucwords($order['shipping_address2']),
																			'city'          =>ucwords($order['shipping_city']),
																			'state'         =>$order['shipping_state'],
																			'zip'           =>$order['shipping_zip'],
																			'drex_cart_users_id'=>$user_id));
						$this->DrexCartAddress->id = null;
						$this->DrexCartAddress->save($shipping_address);
						$this->DrexCartUser->updateAll(array('DrexCartUser.shipping_address_id'=>$this->DrexCartAddress->id),
													   array('DrexCartUser.id'=>$user_id));
					}
				}
				
				if (!$was_logged_in) {
					$this->DrexCartUser->updateAll(array('DrexCartUser.password'=>"'".md5($user['password'])."'"),
													array('DrexCartUser.id'=>$user_id));
				}
				
				$order['drex_cart_users_id'] = $user_id;
				$order['created_date'] = date('Y-m-d H:i:s');
				$order['drex_cart_order_statuses_id'] = 1;
				//$order['drex_cart_gateway_profiles_id'] = $acct->drex_cart_gateway_profiles_id;
				//pr($order);
				$this->DrexCartOrder->save(array('DrexCartOrder'=>$order));
				$order_id = $this->DrexCartOrder->id;
				
				// stamp order to payments
				$this->DrexCartOrderPayment = ClassRegistry::init('DrexCart.DrexCartOrderPayment');
				$this->DrexCartOrderPayment->create();
				$this->DrexCartOrderPayment->id = null;
				$this->DrexCartOrderPayment->save(array('DrexCartOrderPayment'=>array('drex_cart_orders_id'=>$order_id,
						'drex_cart_gateway_profiles_id'=>$transaction['id'],
						'created_date'=>date('Y-m-d H:i:s'),
						'amount'=>$this->getCartTotal(),
						'transaction_id'=>$transaction['transaction_id'])));
				
				// order totals
				$order_amount = $this->getCartTotal();
				$this->DrexCartOrderTotal = ClassRegistry::init('DrexCart.DrexCartOrderTotal');
				$this->DrexCartOrderTotal->create();
				$this->DrexCartOrderTotal->id = null;
				$this->DrexCartOrderTotal->save(array('DrexCartOrderTotal'=>array('drex_cart_orders_id'=>$order_id,
																				  'code'=>'subtotal',
																				  'amount'=>$order_amount)));
				$this->DrexCartOrderTotal->id = null;
				$this->DrexCartOrderTotal->save(array('DrexCartOrderTotal'=>array('drex_cart_orders_id'=>$order_id,
						'code'=>'tax',
						'amount'=>$this->getTaxesTotal())));
				$this->DrexCartOrderTotal->id = null;
				$this->DrexCartOrderTotal->save(array('DrexCartOrderTotal'=>array('drex_cart_orders_id'=>$order_id,
						'code'=>'shipping',
						'amount'=>$this->getShippingTotal())));
				$this->DrexCartOrderTotal->id = null;
				$this->DrexCartOrderTotal->save(array('DrexCartOrderTotal'=>array('drex_cart_orders_id'=>$order_id,
																				  'code'=>'total',
																				  'amount'=>$this->getCheckoutTotal())));
				
				// make history entry
				$this->DrexCartOrderStatusHistory = ClassRegistry::init('DrexCart.DrexCartOrderStatusHistory');
				$this->DrexCartOrderStatusHistory->create();
				$this->DrexCartOrderStatusHistory->save(array('DrexCartOrderStatusHistory'=>array('status_date'=>date('Y-m-d H:i:s'),
																								  'drex_cart_order_statuses_id'=>1,
																								  'drex_cart_orders_id'=>$order_id)));
				
				foreach($products as $product) {
					// save order product
					$this->DrexCartOrderProduct->id = null;
					$this->DrexCartOrderProduct->save(array('DrexCartOrderProduct'=>array('drex_cart_orders_id'=>$order_id,
																						  'drex_cart_products_id'=>$product['DrexCartProduct']['id'],
																						  'rate'=>$product['DrexCartCartProduct']['rate'],
																						  'quantity'=>$product['DrexCartCartProduct']['quantity'])));
					// update product stats
					$this->DrexCartProduct->updateAll(array('quantity'=>'quantity-'.$product['DrexCartCartProduct']['quantity']),
													 array('id'=>$product['DrexCartProduct']['id']));
				}
				
				$this->DrexCartCartProduct->deleteAll(array('drex_cart_carts_id'=>$this->drexcart_id));
				CakeSession::delete('DrexCartUser');
				CakeSession::delete('DrexCartOrder');
				CakeSession::delete('DrexCartGatewayProfile');
				$orderResponse = new stdClass();
				$orderResponse->user_id = $user_id;
				$orderResponse->order_id = $order_id;
				return $orderResponse;
			} else {
				throw new Exception('Payment was bad!');
			}
		} else {
			throw new Exception('No products in cart!');
		}
	}
	
	public function setUserId($user_id=null) {
		$this->DrexCartCart = ClassRegistry::init('DrexCart.DrexCartCart');
		$this->DrexCartCart->create();
		$this->DrexCartCartProduct = ClassRegistry::init('DrexCart.DrexCartCartProduct');
		$this->DrexCartCartProduct->create();
		
		// find any other carts and merge them
		$carts = $this->DrexCartCart->find('all', array('conditions'=>array('users_id'=>(int)$user_id)));
		foreach($carts as $cart) {
			$this->DrexCartCartProduct->updateAll(array('drex_cart_carts_id'=>$this->drexcart_id), 
												  array('drex_cart_carts_id'=>$cart['DrexCartCart']['id']));
		}
		
		$this->DrexCartCart->updateAll(array('users_id'=>(int)$user_id),
									   array('id'=>$this->drexcart_id));
		
		
	}
	
	public function logout() {
		$this->DrexCartCart = ClassRegistry::init('DrexCart.DrexCartCart');
		$this->DrexCartCart->create();
		$this->cart = $this->DrexCartCart->createCart(CakeSession::check('drexcart_user_id') ? CakeSession::read('drexcart_user_id') : null);
			$this->drexcart_id = $this->cart['DrexCartCart']['id'];
			CakeSession::write('drexcart_id', $this->drexcart_id);
	}
	
	public function createGatewayCustomer($user=null, $orderInfo=null) {
		
		// figure out what payment method was used
		$paymentInfo = CakeSession::read('DrexCartGatewayProfile');
		$gatewayId = $paymentInfo['drex_cart_gateways_id'];
		$this->DrexCartGateway = ClassRegistry::init('DrexCart.DrexCartGateway');
		$this->DrexCartGateway->create();
		$gateway = $this->DrexCartGateway->getGatewayById($gatewayId);
		if ($gateway) {
			if ($gateway['DrexCartGateway']['type']=='authorize') {
				// authorize.net for credit cards
				$paymentModule = new AuthorizePaymentModule($gatewayId, $gateway['DrexCartGateway']['wsdl_url'], $gateway['DrexCartGateway']['api_login'], $gateway['DrexCartGateway']['api_key']);
			} else if ($gateway['DrexCartGateway']['type']=='paypal') {
				// paypal
			}
		}
		
		
		
		if ($userProfileId = $paymentModule->createCustomer($user)) {
			//echo 'userProfileId: '.$userProfileId;
		} else {
			$errorMessage = '';
			foreach ($paymentModule->errors as $error) {
				$errorMessage .= $error.'<br />';
			}
			throw new Exception($errorMessage);
		}
		
		
		if ($userCardProfileId = $paymentModule->addCard($userProfileId, $paymentInfo, $orderInfo)) {
			//echo '<br /> userCartProfileId: '.$userCardProfileId;
		} else {
			$errorMessage = '';
			foreach ($paymentModule->errors as $error) {
				$errorMessage .= $error.'<br />';
			}
			throw new Exception($errorMessage);
		}
		
		
		//exit;

		$transactionId = $paymentModule->authorizePayment($userProfileId, $userCardProfileId, $this->getCheckoutTotal());
		
		
		return $transactionId;

		/*
		$soap->CreateCustomerProfile(new CreateCustomerPaymentProfile(new MerchantAuthenticationType('9eFfhH98Uz', '38UAqh26T7U3gc4y'), 
																	  null, 
																	  new CustomerPaymentProfileType(new PaymentType($bankAccount, $creditCard), 
																	  								 $driversLicense, 
																	  								 $taxId), 
									 $validationMode));
		*/
		
	}
	public function createOrderPayment($user=null, $orderInfo=null) {
	
		$total = $this->getCheckoutTotal();
		
		// figure out what payment method was used
		$paymentInfo = CakeSession::read('DrexCartGatewayProfile');
		
		if (isset($paymentInfo['id']) && is_numeric($paymentInfo['id'])) {
			// already have a payment profile
			$this->DrexCartGatewayProfile = ClassRegistry::init('DrexCart.DrexCartGatewayProfile');
			$this->DrexCartGatewayProfile->create();
			$gwCard = $this->DrexCartGatewayProfile->find('first', array('fields'=>array('DrexCartGatewayProfile.*', 'DrexCartGatewayUser.*'),
														  'joins'=>array(array('table'=>'drex_cart_gateway_users', 'alias'=>'DrexCartGatewayUser', 'type'=>'left', 'conditions'=>array('DrexCartGatewayUser.id=DrexCartGatewayProfile.drex_cart_gateway_users_id'))),
														  'conditions'=>array('DrexCartGatewayProfile.id'=>$paymentInfo['id'], 'DrexCartGatewayUser.drex_cart_users_id'=>$user['id'])));
			if ($gwCard) {
				$this->DrexCartGateway = ClassRegistry::init('DrexCart.DrexCartGateway');
				$this->DrexCartGateway->create();
				$gateway = $this->DrexCartGateway->getGatewayById($gwCard['DrexCartGatewayUser']['drex_cart_gateways_id']);
				if ($gateway) {
					if ($gateway['DrexCartGateway']['type']=='authorize') {
						// authorize.net for credit cards
						$paymentModule = new AuthorizePaymentModule($gateway['DrexCartGateway']['id'], $gateway['DrexCartGateway']['wsdl_url'], $gateway['DrexCartGateway']['api_login'], $gateway['DrexCartGateway']['api_key']);
					} else if ($gateway['DrexCartGateway']['type']=='paypal') {
						// paypal
					}
				}
				$transactionId = $paymentModule->authorizePayment($gwCard['DrexCartGatewayUser']['profile_id'], $gwCard['DrexCartGatewayProfile']['profile_id'], $total);	
				return $transactionId;
			} else throw new Exception('Payment profile does not exist!');
		} else {
			// check for user gateway profile
			$gatewayId = $paymentInfo['drex_cart_gateways_id'];
			$this->DrexCartGateway = ClassRegistry::init('DrexCart.DrexCartGateway');
			$this->DrexCartGateway->create();
			$this->DrexCartGatewayUser = ClassRegistry::init('DrexCart.DrexCartGatewayUser');
			$this->DrexCartGatewayUser->create();
			
			$gateway = $this->DrexCartGateway->getGatewayById($gatewayId);
			if ($gateway) {
				if ($gateway['DrexCartGateway']['type']=='authorize') {
					// authorize.net for credit cards
					$paymentModule = new AuthorizePaymentModule($gatewayId, $gateway['DrexCartGateway']['wsdl_url'], $gateway['DrexCartGateway']['api_login'], $gateway['DrexCartGateway']['api_key']);
				} else if ($gateway['DrexCartGateway']['type']=='paypal') {
					// paypal
				}
			}
			
			if ($gwUser = $this->DrexCartGatewayUser->find('first', array('conditions'=>array('drex_cart_users_id'=>$user['id'], 'drex_cart_gateways_id'=>$gatewayId)))) {
				// gateway user account profile exists
				$userProfileId = $gwUser['DrexCartGatewayUser']['profile_id'];
			} else if ($userProfileId = $paymentModule->createCustomer($user)) {
				//echo 'userProfileId: '.$userProfileId;
			} else {
				$errorMessage = '';
				foreach ($paymentModule->errors as $error) {
					$errorMessage .= $error.'<br />';
				}
				throw new Exception($errorMessage);
			}
			
			
			if ($userCardProfileId = $paymentModule->addCard($userProfileId, $paymentInfo, $orderInfo)) {
				//echo '<br /> userCartProfileId: '.$userCardProfileId;
			} else {
				$errorMessage = '';
				foreach ($paymentModule->errors as $error) {
					$errorMessage .= $error.'<br />';
				}
				throw new Exception($errorMessage);
			}
			
			
			//exit;
			
			$transactionId = $paymentModule->authorizePayment($userProfileId, $userCardProfileId, $total);
			
			
			return $transactionId;
		}
		
		
	
		/*
			$soap->CreateCustomerProfile(new CreateCustomerPaymentProfile(new MerchantAuthenticationType('9eFfhH98Uz', '38UAqh26T7U3gc4y'),
					null,
					new CustomerPaymentProfileType(new PaymentType($bankAccount, $creditCard),
							$driversLicense,
							$taxId),
					$validationMode));
		*/
	
	}
	
	public function getCheckoutTotal() {
		$total = $this->getCartTotal();
		
		$shipping_cost = $this->getShippingTotal(); 
		$tax_cost = $this->getTaxesTotal();
		
		return $total + $tax_cost + $shipping_cost;
	}
	
	public function getTaxesTotal() {
		$tax_amount = 0;
		$tax_rate = .07;
		$products = $this->getProducts();
		foreach($products as $product) {
			$tax_amount += $product['DrexCartCartProduct']['rate'] * $product['DrexCartCartProduct']['quantity'] * $tax_rate;
		}
		return $tax_amount;
	}
	
	public function getShippingTotal() {
		$shipping_amount = 0;
		if ($this->hasShippableProducts()) {
			if (CakeSession::check('DrexCartOrder')) {
				$order = CakeSession::read('DrexCartOrder');
				if (isset($order['shipping_option'])) {
					//echo $order['shipping_option'];
					$option_parts = preg_split('/\_/', $order['shipping_option']);
					eval('$shipping = new '.$option_parts[0].'($this);');
					return $shipping->getShippingCosts($order['shipping_option']);
				} else {
					// problem
				}
			}
		}
		return $shipping_amount;
	}
}