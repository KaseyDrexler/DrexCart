<?php

class DrexCartOrderStatusHistory extends DrexCartAppModel {
	
	public function getOrderHistory($order_id=null) {
		return $this->find('all', array('fields'=>array('DrexCartOrderStatusHistory.*', 'DrexCartOrderStatus.*'),
										'joins'=>array(array('table'=>'drex_cart_order_statuses', 'alias'=>'DrexCartOrderStatus', 'type'=>'left', 'conditions'=>array('DrexCartOrderStatusHistory.drex_cart_order_statuses_id=DrexCartOrderStatus.id'))),
										'order'=>array('status_date'=>'desc'),
										'conditions'=>array('DrexCartOrderStatusHistory.drex_cart_orders_id'=>(int)$order_id)));
	}
}