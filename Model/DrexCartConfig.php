<?php


class DrexCartConfig extends AppModel {
	var $useDbConfig = 'drexCart';
	var $useTable = 'drex_cart_config';
	
	public function getValue($code='') {
		$results =  $this->find('first', array('conditions'=>array('config_code'=>$code)));
		if ($results) {
			return $results['DrexCartConfig']['config_value'];
		}
		return null;
	}
	
}