<?php

App::uses('ServiceCustom', 'DrexCart.DrexCartLib/PaymentGateways/Authorize');
App::uses('CreditCardType', 'DrexCart.DrexCartLib/PaymentGateways/Authorize');
App::uses('CustomerProfileType', 'DrexCart.DrexCartLib/PaymentGateways/Authorize');
App::uses('CustomerPaymentProfileType', 'DrexCart.DrexCartLib/PaymentGateways/Authorize');
App::uses('PaymentType', 'DrexCart.DrexCartLib/PaymentGateways/Authorize');
App::uses('CreateCustomerProfile', 'DrexCart.DrexCartLib/PaymentGateways/Authorize');
App::uses('MerchantAuthenticationType', 'DrexCart.DrexCartLib/PaymentGateways/Authorize');

App::uses('DriversLicenseType', 'DrexCart.DrexCartLib/PaymentGateways/Authorize');

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
				if ($acct = $this->createGatewayCustomer($user, array('card_number'=>'4111111111111111', 'card_cvc'=>'123', 'card_exp'=>'2017-09'))) {
					// todo save customer info
					$payment_ok = true;
				} else {
					$this->DrexCartUser->deleteAll(array('id'=>$user_id));
				}
				
			} else {
				$user = $this->DrexCartUser->find('first', array('conditions'=>array('id'=>(int)$user_id)));
				$user = $user['DrexCartUser'];
				$was_logged_in = true;
			} 
			if ($payment_ok) {
				// save addresses
				if ($order['billing_address1']) {
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
				if ($order['shipping_address1']) {
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
				
				$order = CakeSession::read('DrexCartOrder');
				$order['drex_cart_users_id'] = $user_id;
				$order['created_date'] = date('Y-m-d H:i:s');
				$order['drex_cart_order_statuses_id'] = 1;
				$order['drex_cart_gateway_profiles_id'] = $acct->drex_cart_gateway_profiles_id;
				//pr($order);
				$this->DrexCartOrder->save(array('DrexCartOrder'=>$order));
				$order_id = $this->DrexCartOrder->id;
				
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
																				  'code'=>'total',
																				  'amount'=>$order_amount)));
				
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
	
	public function createGatewayCustomer($user=null, $paymentInfo=null) {
		$soap = new ServiceCustom((Configure::read('debug')>0) ? array('trace'=>1) : array(''), 'https://apitest.authorize.net/soap/v1/Service.asmx?WSDL');
		$credit_card = new CreditCardType($paymentInfo['card_cvc']);
		$credit_card->cardNumber = $paymentInfo['card_number'];
		$credit_card->expirationDate = $paymentInfo['card_exp'];
		
		$dl = new DriversLicenseType('11111111111', '1979-01-01');
		$dl->state = 'IA';
		
		
		$cc_profile_type = new CustomerPaymentProfileType(new PaymentType(null, $credit_card), $dl, null);
		$cc_profile_type->billTo = new stdClass();
		$cc_profile_type->billTo->firstName = $user['firstname'];
		$cc_profile_type->billTo->lastName = $user['lastname'];
		$cc_profile_type->billTo->address = '1908 Probst CT SW';
		$cc_profile_type->billTo->city = 'Cedar Rapids';
		$cc_profile_type->billTo->state = 'IA';
		$cc_profile_type->billTo->zip = '52404';

		$cc_profile_type->billTo->country = 'United States';
		$cc_profile_type->billTo->phoneNumber = '9999999999';
		$cc_profile_type->taxId = '';

		
		$cc_profile_type->customerType = 'individual';
		
		$profile = new CustomerProfileType(array($cc_profile_type), null);
		$profile->merchantCustomerId = 'DC'.$user['id'];
		$profile->email = $user['email'];
		$profile->description = 'DrexCartUser';
		
		$cx_profile = new CreateCustomerProfile(new MerchantAuthenticationType('9eFfhH98Uz', '38UAqh26T7U3gc4y'), $profile, 'testMode');
		//pr($cx_profile);
		$soap_response = $soap->CreateCustomerProfile($cx_profile);
		//pr($soap->__getLastRequest());
		//pr($soap->__getLastResponse());
		//pr($soap_response);
		
		if ($soap_response->CreateCustomerProfileResult->customerProfileId && $soap_response->CreateCustomerProfileResult->resultCode=='Ok') {
			$this->DrexCartGatewayUser = ClassRegistry::init('DrexCart.DrexCartGatewayUser');
			$this->DrexCartGatewayUser->create();
			$this->DrexCartGatewayUser->id = null;
			$this->DrexCartGatewayUser->save(array('DrexCartGatewayUser'=>array('drex_cart_users_id'=>$user['id'],
																				'created_date'=>date('Y-m-d H:i:s'),
																				'type'=>'authorize',
																				'drex_cart_gateways_id'=>1,
																				'profile_id'=>$soap_response->CreateCustomerProfileResult->customerProfileId)));
			$this->DrexCartGatewayProfile = ClassRegistry::init('DrexCart.DrexCartGatewayProfile');
			$this->DrexCartGatewayProfile->create();
			$this->DrexCartGatewayProfile->id = null;
			$this->DrexCartGatewayProfile->save(array('DrexCartGatewayProfile'=>array('drex_cart_gateway_users_id'=>$this->DrexCartGatewayUser->id,
					'created_date'=>date('Y-m-d H:i:s'),
					'account_number'=>'************'.substr($paymentInfo['card_number'],12),
					'expiration'=>$paymentInfo['card_exp'],
					'code'=>$paymentInfo['card_cvc'],
					'profile_id'=>$soap_response->CreateCustomerProfileResult->customerPaymentProfileIdList->long)));
				
			$acct = new stdClass();
			$acct->drex_cart_gateway_users_id = $this->DrexCartGatewayUser->id;
			$acct->drex_cart_gateway_profiles_id = $this->DrexCartGatewayProfile->id;
			$acct->profile_id = $soap_response->CreateCustomerProfileResult->customerProfileId;
			$acct->payment_profile_id = isset($soap_response->CreateCustomerProfileResult->customerPaymentProfileIdList) &&
										isset($soap_response->CreateCustomerProfileResult->customerPaymentProfileIdList->long) ? 
										$soap_response->CreateCustomerProfileResult->customerPaymentProfileIdList->long :
										null;
			return $acct;
		
		}
		return false;
		/*
		$soap->CreateCustomerProfile(new CreateCustomerPaymentProfile(new MerchantAuthenticationType('9eFfhH98Uz', '38UAqh26T7U3gc4y'), 
																	  null, 
																	  new CustomerPaymentProfileType(new PaymentType($bankAccount, $creditCard), 
																	  								 $driversLicense, 
																	  								 $taxId), 
									 $validationMode));
		*/
		
	}
}