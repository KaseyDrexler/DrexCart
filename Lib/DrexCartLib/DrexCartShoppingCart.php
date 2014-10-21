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
		echo 'create order called';
		$this->DrexCartCartProduct = ClassRegistry::init('DrexCart.DrexCartCartProduct');
		$this->DrexCartCartProduct->create();
		// checks
		
		// check order information
		if (!CakeSession::check('DrexCartOrder')) throw new Exception('There is no order information for checkout!');
		// check customer information
		if (!CakeSession::check('DrexCartUser')) throw new Exception('There is no customer information for checkout!');
		
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
			$user = CakeSession::read('DrexCartUser');
			$user['created_date'] = date('Y-m-d H:i:s');
			$user['last_login'] = date('Y-m-d H:i:s');
			pr($user);
			$this->DrexCartUser->save(array('DrexCartUser'=>$user));
			$user_id = $this->DrexCartUser->id;
			
			$order = CakeSession::read('DrexCartOrder');
			$order['drex_cart_users_id'] = $user_id;
			$order['created_date'] = date('Y-m-d H:i:s');
			$order['drex_cart_order_statuses_id'] = 1;
			pr($order);
			$this->DrexCartOrder->save(array('DrexCartOrder'=>$order));
			$order_id = $this->DrexCartOrder->id;
			
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
																					  'drex_cart_products_id'=>$product['DrexCartCartProduct']['id'],
																					  'rate'=>$product['DrexCartCartProduct']['rate'])));
				// update product stats
				$this->DrexCartProduct->updateAll(array('quantity'=>'quantity-'.$product['DrexCartCartProduct']['quantity']),
												 array('id'=>$product['DrexCartProduct']['id']));
			}
			
		} else {
			throw new Exception('No products in cart!');
		}
	}
	
}