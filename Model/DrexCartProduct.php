<?php

class DrexCartProduct extends AppModel {
	var $useDbConfig = 'drexCart';
	
	
	public function getAllProducts($conditions=array()) {
		return $this->find('all', array('conditions'=>$conditions));
	}
	
	public function getProductById($product_id=null) {
		return $this->find('first', array('conditions'=>array('id'=>(int)$product_id)));
	}
}