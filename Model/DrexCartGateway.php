<?php

class DrexCartGateway extends DrexCartAppModel {
	public function getGatewayById($gatewayId=null) {
		return $this->find('first', array('conditions'=>array('id'=>(int)$gatewayId)));
	}
}