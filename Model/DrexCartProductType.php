<?php

class DrexCartProductType extends AppModel {
	var $useDbConfig = 'drexCart';
	
	
	public function getOptions() {
		$results = $this->find('all');
		$return_arr = array();
		foreach ($results as $productType) {
			$return_arr[$productType['DrexCartProductType']['id']] = $productType['DrexCartProductType']['product_type_name'];
		}
		//print_r($return_arr);
		return $return_arr;
	}
	
}