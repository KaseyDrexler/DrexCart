<?php

class DrexCartCheckoutController extends DrexCartAppController {
	
	public $uses = array('DrexCart.DrexCartOrder', 'DrexCart.DrexCartUser', 'DrexCart.DrexCartGatewayProfile');
	
	public function beforeFilter() {
		parent::beforeFilter();
		
		if (sizeof($this->cart->getProducts())==0) {
			$this->Session->setFlash('You must have products in your cart to checkout!', 'default', array('class'=>'alert alert-danger'));
			$this->redirect('/DrexCartCarts/cart');
			exit;
		}
	}
	
	public function index() {
		
		if (!empty($this->request->data)) {
			
			$unvalidated = array();
			
			// User validation
			if ($this->request->data['DrexCartOrder']['create_user']==0 || $this->userManager->isLoggedIn()) {
				$this->DrexCartUser->validate['email'] = null;
				$this->DrexCartUser->validate['password'] = null;
			} else {
				$this->DrexCartUser->set($this->request->data);
				if ($this->DrexCartUser->validates()) {
					$this->Session->write('DrexCartUser', $this->request->data['DrexCartUser']);
				} else {
					
					$unvalidated = array_merge($this->DrexCartUser->validationErrors);
				}
			}
			
			// Order validation
			$this->DrexCartOrder->set($this->request->data);
			if ($this->DrexCartOrder->validates()) {
				
				$this->Session->write('DrexCartOrder', $this->request->data['DrexCartOrder']);
			} else {
				
				$unvalidated = array_merge($this->DrexCartUser->validationErrors);
			}
			
			// Payment validation
			$this->DrexCartGatewayProfile->set($this->request->data);
			if ($this->DrexCartGatewayProfile->validates()) {
				$this->Session->write('DrexCartGatewayProfile', $this->request->data['DrexCartGatewayProfile']);
			} else {
				$unvalidated = array_merge($this->DrexCartGatewayProfile->validationErrors);
			}
			
			
			
			if ($unvalidated) {
				$this->set('unvalidated', $unvalidated);
			} else {
				$this->redirect('/DrexCartCheckout/verify');
			}
		
			// validate credit card
			
		}
		
		
		// check for existing order information and populate forms with it
		if ($this->Session->check('DrexCartOrder')) {
			$this->request->data['DrexCartOrder'] = $this->Session->read('DrexCartOrder');
		}
		if ($this->Session->check('DrexCartUser')) {
			$this->request->data['DrexCartUser'] = $this->Session->read('DrexCartUser');
		}
	}
	
	public function checkEmail($email = null) {
		$email_count = $this->DrexCartUser->find('count', array('conditions'=>array('email'=>$email)));
		$this->set('email_count', $email_count);
	}
	
	public function verify () {
		if (!empty($this->request->data)) { 
			
			$orderResponse = $this->cart->createOrder($this->userManager->isLoggedIn() ? $this->userManager->getUserId() : null);
			// attempt charge
			
			// save customer
			
			// save order
			
			// save order totals
			
			// save order products
			
			// update order status
			
			// update product info
			
			$this->userManager->loginById($orderResponse->user_id);
			$this->redirect('/DrexCartUsers/orderDetails/'.$orderResponse->order_id);
		}
	}
	
	public function payment() {
		$this->DrexCartGateway = ClassRegistry::init('DrexCart.DrexCartGateway');
		$this->DrexCartGateway->create();
		$this->set('gateways', $this->DrexCartGateway->find('all', array('conditions'=>array('enabled'=>1))));
	}
	
}