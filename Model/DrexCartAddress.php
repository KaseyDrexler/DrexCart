<?php

class DrexCartAddress extends DrexCartAppModel {

	public function getAddresses($userId=null) {
		return $this->find('all', array('conditions'=>array('drex_cart_users_id'=>(int)$userId)));
	}
}