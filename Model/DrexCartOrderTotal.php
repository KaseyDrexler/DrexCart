<?php

class DrexCartOrderTotal extends DrexCartAppModel {
	
	public function getOrderTotals($orderId=null) {
		return $this->find('all', array('conditions'=>array('drex_cart_orders_id'=>(int)$orderId)));
	}
}