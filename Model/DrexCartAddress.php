<?php

class DrexCartAddress extends DrexCartAppModel {

	public function getAddresses($userId=null) {
		return $this->find('all', array('conditions'=>array('drex_cart_users_id'=>(int)$userId)));
	}
	
	public function getAddressById($addressId=null, $userId=null) {
		return $this->find('first', array('conditions'=>array('id'=>(int)$addressId, 'drex_cart_users_id'=>(int)$userId)));
	}
}