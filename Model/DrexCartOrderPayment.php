<?php

class DrexCartOrderPayment extends DrexCartAppModel {
	
	public function getPaymentsOnOrder($order_id=null) {
		return $this->find('all', array('fields'=>array('DrexCartOrderPayment.*', 'DrexCartGatewayProfile.*'),
										'joins'=>array(array('table'=>'drex_cart_gateway_profiles', 'alias'=>'DrexCartGatewayProfile', 'type'=>'left', 'conditions'=>array('DrexCartGatewayProfile.id=DrexCartOrderPayment.drex_cart_gateway_profiles_id'))),
										'conditions'=>array('DrexCartOrderPayment.drex_cart_orders_id'=>(int)$order_id)));
	}
	
}