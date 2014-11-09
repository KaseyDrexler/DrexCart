<?php

class DrexCartCategory extends DrexCartAppModel {
	
	public function getCategoryById($categoryId=null) {
		return $this->find('first', array('conditions'=>array('id'=>(int)$categoryId)));
	}
	
	public function getCategoriesByNodeId($parentNodeId=0) {
		$results = $this->query("select *, 
							(select count(*) subNodeCount from drex_cart_categories DrexCartCategory2 where DrexCartCategory2.parent_categories_id=DrexCartCategory.id) as subNodeCount
							from drex_cart_categories DrexCartCategory
							where ".($parentNodeId ? "DrexCartCategory.parent_categories_id=".$parentNodeId : "DrexCartCategory.parent_categories_id is null"));
		
		$this->DrexCartProductsToCategory = ClassRegistry::init('DrexCart.DrexCartProductsToCategory');
		$this->DrexCartProductsToCategory->create();
		foreach ($results as &$category) {
			$category['product_count'] = $this->DrexCartProductsToCategory->find('count', array('conditions'=>array('DrexCartProductsToCategory.categories_id='.$category['DrexCartCategory']['id'])));
		}
		return $results;
	}
}