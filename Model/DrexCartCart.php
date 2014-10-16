<?php

class DrexCartCart extends AppModel {
	var $useDbConfig = 'drexCart';
	
	public function createCart($user_id=null) {
		$this->save(array('DrexCartCart'=>array('user_id'=>$user_id, 'created_date'=>date('Y-m-d H:i:s'))));
		return $this->find('first', array('conditions'=>array('id'=>$this->id)));
	}
	
	
	
	public function getCart($drex_cart_id=null) {
		return $this->find('first', array('conditions'=>array('id'=>(int)$drex_cart_id)));
	}
}