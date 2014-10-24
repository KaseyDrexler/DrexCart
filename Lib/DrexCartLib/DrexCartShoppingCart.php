<?php

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
	
	public function createOrder() {
		
		$this->DrexCartCartProduct = ClassRegistry::init('DrexCart.DrexCartCartProduct');
		$this->DrexCartCartProduct->create();
		// checks
		
		// check order information
		if (!CakeSession::check('DrexCartOrder')) throw new Exception('There is no order information for checkout!');
		// check customer information
		if (!CakeSession::check('DrexCartUser') && !$this->userManager->isLoggedIn()) throw new Exception('There is no customer information for checkout!');
		
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
			if (!$this->userManager->isLoggedIn()) {
				$user = CakeSession::read('DrexCartUser');
				
				$user['created_date'] = date('Y-m-d H:i:s');
				$user['last_login'] = date('Y-m-d H:i:s');
				$user['firstname'] = ucwords($order['billing_firstname']);
				$user['lastname'] = ucwords($order['billing_lastname']);
				//pr($user);
				
				$this->DrexCartUser->save(array('DrexCartUser'=>$user));
				$user_id = $this->DrexCartUser->id;
			} else {
				$user_id = $this->userManager->getUserId();
			}
			
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
			
			$this->DrexCartUser->updateAll(array('DrexCartUser.password'=>"'".md5($user['password'])."'"),
											array('DrexCartUser.id'=>$user_id));
			
			$order = CakeSession::read('DrexCartOrder');
			$order['drex_cart_users_id'] = $user_id;
			$order['created_date'] = date('Y-m-d H:i:s');
			$order['drex_cart_order_statuses_id'] = 1;
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
																					  'rate'=>$product['DrexCartCartProduct']['rate'])));
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
			throw new Exception('No products in cart!');
		}
	}
	
}