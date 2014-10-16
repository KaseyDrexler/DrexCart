<?php

class DrexCartProduct extends AppModel {
	var $useDbConfig = 'drexCart';
	
	
	public function getAllProducts($conditions=array()) {
		return $this->find('all', array('conditions'=>$conditions));
	}
	
	public function getProductById($product_id=null) {
		return $this->find('first', array('conditions'=>array('DrexCartProduct.id'=>(int)$product_id),
										  'joins'=>array(array('table'=>'drex_cart_product_types', 'alias'=>'DrexCartProductType', 'type'=>'left', 'conditions'=>array('DrexCartProduct.product_types_id=DrexCartProductType.id'))),
										  'fields'=>array('DrexCartProduct.*', 'DrexCartProductType.*')));
	}
	
	public function getProductQuantity($product_id=null) {
		$result = $this->find('first', array('conditions'=>array('id'=>(int)$product_id)));
		if ($result) {
			return $result['DrexCartProduct']['quantity'];
		} else {
			return 0;
		}
	}
}