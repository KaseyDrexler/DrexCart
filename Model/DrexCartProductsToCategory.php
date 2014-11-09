<?php

class DrexCartProductsToCategory extends DrexCartAppModel {
	
	public function getProductsInCategory($categoryId=null) {
		return $this->find('all', array('fields'=>array('DrexCartProduct.*'),
										'joins'=>array(array('table'=>'drex_cart_products', 'alias'=>'DrexCartProduct', 'type'=>'left', 'conditions'=>array('DrexCartProduct.id=DrexCartProductsToCategory.products_id'))),
										'conditions'=>array('DrexCartProductsToCategory.categories_id'=>$categoryId)));
	}
	
}