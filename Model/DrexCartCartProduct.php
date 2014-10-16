<?php


class DrexCartCartProduct extends AppModel {
	var $useDbConfig = 'drexCart';
	
	

	public function addProduct($cart_id=null, $product_id=null, $quantity=1) {
		if (!$cart_id || !$product_id) throw new Exception('Must enter a cart_id and product_id!');
		
		$product = $this->find('first', array('conditions'=>array('drex_cart_carts_id'=>(int)$cart_id, 'drex_cart_products_id'=>(int)$product_id)));
		if ($product) {
			$product['DrexCartCartProduct']['quantity'] += $quantity;
			$this->id = $product['DrexCartCartProduct']['id'];
		} else {
			$this->id = null;
			$product = array('DrexCartCartProduct'=>array('quantity'=>$quantity, 'drex_cart_carts_id'=>(int)$cart_id, 'drex_cart_products_id'=>(int)$product_id));
		}
		$this->save($product);
	}
	public function getProducts($drexcart_id=null) {
		return $this->find('all', array('conditions'=>array('drex_cart_carts_id'=>$drexcart_id),
										'joins'=>array(array('table'=>'drex_cart_products', 'alias'=>'DrexCartProduct', 'type'=>'left', 'conditions'=>array('DrexCartCartProduct.drex_cart_products_id=DrexCartProduct.id'))),
										'fields'=>array('DrexCartCartProduct.*', 'DrexCartProduct.*')));
	}
}