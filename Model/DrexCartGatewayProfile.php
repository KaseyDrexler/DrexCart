<?php
class DrexCartGatewayProfile extends DrexCartAppModel {
	
	public $validate = array(
			'account_number' => array(
					'rule' => 'notEmpty',
					'message' => 'You must enter an account number'
			),
			'expiration' => array(
					'rule'    => 'notEmpty',
					'message' => 'You must enter an expiration'
			),
			'code' => array(
					'rule' => 'notEmpty',
					'message' => 'You must enter a code'
			),
			
	);
	
	
	public function getPaymentProfiles($user_id=null) {
		return $this->find('all', array('fields'=>array('DrexCartGatewayProfile.*', 'DrexCartGatewayUser.*'),
										'joins'=>array(array('table'=>'drex_cart_gateway_users', 'alias'=>'DrexCartGatewayUser', 'type'=>'left', 'conditions'=>array('DrexCartGatewayUser.id=DrexCartGatewayProfile.drex_cart_gateway_users_id'))),
										'conditions'=>array('DrexCartGatewayUser.drex_cart_users_id'=>(int)$user_id)));
	}
	
	public function getPaymentProfile($user_id=null, $profile_id=null) {
		return $this->find('first', array('fields'=>array('DrexCartGatewayProfile.*', 'DrexCartGatewayUser.*'),
				'joins'=>array(array('table'=>'drex_cart_gateway_users', 'alias'=>'DrexCartGatewayUser', 'type'=>'left', 'conditions'=>array('DrexCartGatewayUser.id=DrexCartGatewayProfile.drex_cart_gateway_users_id'))),
				'conditions'=>array('DrexCartGatewayProfile.id'=>(int)$profile_id, 'DrexCartGatewayUser.drex_cart_users_id'=>(int)$user_id)));
	}
}