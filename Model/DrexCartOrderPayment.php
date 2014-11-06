<?php

class DrexCartOrderPayment extends DrexCartAppModel {
	
	public function getPaymentsOnOrder($order_id=null) {
		return $this->find('all', array('fields'=>array('DrexCartOrderPayment.*', 'DrexCartGatewayProfile.*'),
										'joins'=>array(array('table'=>'drex_cart_gateway_profiles', 'alias'=>'DrexCartGatewayProfile', 'type'=>'left', 'conditions'=>array('DrexCartGatewayProfile.id=DrexCartOrderPayment.drex_cart_gateway_profiles_id'))),
										'conditions'=>array('DrexCartOrderPayment.drex_cart_orders_id'=>(int)$order_id)));
	}
	
	
	public function getPaymentsById($orderPaymentsId=null) {
		return $this->find('first', array('fields'=>array('DrexCartOrderPayment.*', 'DrexCartGatewayProfile.*'),
										'joins'=>array(array('table'=>'drex_cart_gateway_profiles', 'alias'=>'DrexCartGatewayProfile', 'type'=>'left', 'conditions'=>array('DrexCartGatewayProfile.id=DrexCartOrderPayment.drex_cart_gateway_profiles_id'))),
										'conditions'=>array('DrexCartOrderPayment.id'=>(int)$orderPaymentsId)));
	}
	
	public function getGatewayInfo($orderPaymentId=null) {
		$gateway_check = $this->find('first', array('fields'=>array('DrexCartGateway.*'),
													'joins'=>array(array('table'=>'drex_cart_gateway_profiles', 'alias'=>'DrexCartGatewayProfile', 'type'=>'left', 'conditions'=>array('DrexCartOrderPayment.drex_cart_gateway_profiles_id=DrexCartGatewayProfile.id')),
															  	   array('table'=>'drex_cart_gateway_users', 'alias'=>'DrexCartGatewayUser', 'type'=>'left', 'conditions'=>array('DrexCartGatewayProfile.drex_cart_gateway_users_id=DrexCartGatewayUser.id')),
																   array('table'=>'drex_cart_gateways', 'alias'=>'DrexCartGateway', 'type'=>'left', 'conditions'=>array('DrexCartGatewayUser.drex_cart_gateways_id=DrexCartGateway.id'))),
													'conditions'=>array('DrexCartOrderPayment.id'=>(int)$orderPaymentId)));
		if ($gateway_check) {
			// return gateway id
			return $gateway_check['DrexCartGateway'];
		}
		// return false
		return false;
	}
	
	
}