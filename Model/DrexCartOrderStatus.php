<?php


class DrexCartOrderStatus extends DrexCartAppModel {
	
	public function getAllStatuses() {
		return $this->find('all');
	}
	
	/**
	 * getAllStatusesForSelect
	 * 
	 * Same function as getAllStatuses, except the results are formatted to be used in a Form->select
	 * 
	 * @return array
	 */
	public function getAllStatusesForSelect() {
		$statuses = $this->getAllStatuses();
		$new_statuses = array();
		foreach($statuses as $status) {
			$new_statuses[$status['DrexCartOrderStatus']['id']] = $status['DrexCartOrderStatus']['status_name'];
		}
		return $new_statuses;
	}
	
	public function getOrderStatusById($orderStatusesId=null) {
		return $this->find('first', array('conditions'=>array('DrexCartOrderStatus.id'=>(int)$orderStatusesId)));
	}
}