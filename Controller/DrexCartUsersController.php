<?php

class DrexCartUsersController extends DrexCartAppController {
	public $uses = array('DrexCart.DrexCartUser');
	
	public function beforeFilter() {
		parent::beforeFilter();
		
		if (!$this->userManager->isLoggedIn() && strtolower($this->params['action'])!='login') {
			$this->Session->setFlash('You do not have access to that page, please login first!', 'default', array('class'=>'alert alert-danger'));
			$this->redirect('/DrexCartProducts/index');
		}
	}
	
	public function orderDetails($order_id=null) {
		$this->DrexCartOrder = ClassRegistry::init('DrexCart.DrexCartOrder');
		$this->DrexCartOrder->create();
		$order = $this->DrexCartOrder->getOrder((int)$order_id, $this->userManager->getUserId());
		
		$this->set('order', $order);
	}
	
	public function orders() {
		
	}
	
	public function account() {
		
	}
	
	public function logout() {
		$this->userManager->logout();
		$this->cart->logout();
		$this->redirect('/DrexCartProducts/index');
	}
	
	public function login() {
		if (!empty($this->request->data)) {
			if ($this->userManager->loginByEmail($this->request->data['DrexCartUser']['email'], $this->request->data['DrexCartUser']['password'])) {
				$this->cart->setUserId($this->userManager->getUserId());
				$this->redirect('/DrexCartUsers/account');
				
			} else {
				$this->Session->setFlash('Login failed', 'default', array('class'=>'alert alert-danger')); 
				
			}
		}
	}
}