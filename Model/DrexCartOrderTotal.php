<?php

class DrexCartOrderTotal extends DrexCartAppModel {
	
	public function getOrderTotals($orderId=null) {
		return $this->find('all', array('conditions'=>array('drex_cart_orders_id'=>(int)$orderId)));
	}
	
	
	public function getOrderTotalsSumed() {
		return $this->find('all', array('fields'=>array('sum(amount) as amount', 'date(DrexCartOrder.created_date) as thedate'),
										'conditions'=>array('DrexCartOrder.created_date>\''.date('Y-m-d 00:00:00', time()-86400*7).'\'',
															'DrexCartOrderTotal.code'=>'total'),
										'group'=>array('date(DrexCartOrder.created_date)'),
										'joins'=>array(array('table'=>'drex_cart_orders', 'alias'=>'DrexCartOrder', 'type'=>'left', 'conditions'=>array('DrexCartOrder.id=DrexCartOrderTotal.drex_cart_orders_id')))));
	}
	
	
	
	
}