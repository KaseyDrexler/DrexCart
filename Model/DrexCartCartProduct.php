<?php


class DrexCartCartProduct extends AppModel {
	var $useDbConfig = 'drexCart';
	
	

	public function addProduct($cart_id=null, $product_id=null, $quantity=1) {
		if (!$cart_id || !$product_id) throw new Exception('Must enter a cart_id and product_id!');
		
		$product_check = $this->find('first', array('conditions'=>array('drex_cart_carts_id'=>(int)$cart_id, 'drex_cart_products_id'=>(int)$product_id)));
		if ($product_check) {
			$product_check['DrexCartCartProduct']['quantity'] += $quantity;
			$this->id = $product['DrexCartCartProduct']['id'];
		} else {
			$this->id = null;
			// lookup product
			$product = $this->query('select * from drex_cart_products DrexCartProduct where enabled=1 and visible=1 and id='.((int)$product_id));
			$rate = 0;
			if ($product) {
				$rate = $product['0']['DrexCartProduct']['rate'];
			}
			$product_check = array('DrexCartCartProduct'=>array('quantity'=>$quantity, 'drex_cart_carts_id'=>(int)$cart_id, 'drex_cart_products_id'=>(int)$product_id, 'rate'=>$rate));
		}
		$this->save($product_check);
	}
	public function getProducts($drexcart_id=null) {
		return $this->find('all', array('conditions'=>array('drex_cart_carts_id'=>$drexcart_id),
										'joins'=>array(array('table'=>'drex_cart_products', 'alias'=>'DrexCartProduct', 'type'=>'left', 'conditions'=>array('DrexCartCartProduct.drex_cart_products_id=DrexCartProduct.id'))),
										'fields'=>array('DrexCartCartProduct.*', 'DrexCartProduct.*')));
	}
	
	/**
	 * getNumProducts
	 * 
	 * Gets the number of products in the cart. All of the quantities for each product in the cart are counted up.
	 * 
	 * @param int $drexcart_id
	 */
	public function getNumProducts($drexcart_id=null) {
		$sum = $this->find('all', array('fields'=>array('sum(DrexCartCartProduct.quantity) as num_products'),
										'conditions'=>array('DrexCartCartProduct.drex_cart_carts_id'=>(int)$drexcart_id)));
		
		if ($sum) {
			return $sum['0']['0']['num_products'];
		} else {
			return 0;
		}
	}
	
	public function getCartTotal($drexcart_id=null) {
		$sum = $this->find('all', array('fields'=>array('sum(DrexCartCartProduct.quantity*DrexCartCartProduct.rate) as num_products'),
				'conditions'=>array('DrexCartCartProduct.drex_cart_carts_id'=>(int)$drexcart_id)));
		
		if ($sum) {
			return $sum['0']['0']['num_products'];
		} else {
			return 0;
		}
	}
}