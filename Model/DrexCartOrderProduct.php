<?php

class DrexCartOrderProduct extends DrexCartAppModel {
	
	public function getProductsOnOrder($orderId=null) {
		return $this->find('all', array(
										'joins'=>array(array('table'=>'drex_cart_products', 'alias'=>'DrexCartProduct', 'type'=>'left', 'conditions'=>array('DrexCartOrderProduct.drex_cart_products_id=DrexCartProduct.id'))),
										'fields'=>array('DrexCartOrderProduct.*', 'DrexCartProduct.*'),
										'conditions'=>array('drex_cart_orders_id'=>(int)$orderId)));
	}
}