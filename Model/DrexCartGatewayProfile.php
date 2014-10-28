<?php
class DrexCartGatewayProfile extends DrexCartAppModel {
	public function getPaymentProfiles($user_id=null) {
		return $this->find('all', array('fields'=>array('DrexCartGatewayProfile.*', 'DrexCartGatewayUser.*'),
										'joins'=>array(array('table'=>'drex_cart_gateway_users', 'alias'=>'DrexCartGatewayUser', 'type'=>'left', 'conditions'=>array('DrexCartGatewayUser.id=DrexCartGatewayProfile.drex_cart_gateway_users_id'))),
										'conditions'=>array('DrexCartGatewayUser.drex_cart_users_id'=>(int)$user_id)));
	}
}