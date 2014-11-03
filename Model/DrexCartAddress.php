<?php

class DrexCartAddress extends DrexCartAppModel {

	public function getAddresses($userId=null) {
		return $this->find('all', array('conditions'=>array('drex_cart_users_id'=>(int)$userId)));
	}
	
	public function getAddressById($addressId=null) {
		return $this->find('first', array('condition'=>array('id'=>(int)$addressId)));
	}
}