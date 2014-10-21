<?php

class DrexCartCheckoutController extends DrexCartAppController {
	
	public $uses = array('DrexCart.DrexCartOrder', 'DrexCart.DrexCartUser');
	
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
			
			if ($this->request->data['DrexCartOrder']['create_user']==0) {
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
			
			$this->DrexCartOrder->set($this->request->data);
			if ($this->DrexCartOrder->validates()) {
				
				$this->Session->write('DrexCartOrder', $this->request->data['DrexCartOrder']);
			} else {
				
				$unvalidated = array_merge($this->DrexCartUser->validationErrors);
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
	
	public function verify () {
		if (!empty($this->request->data)) { 
			
			$this->cart->createOrder();
			// attempt charge
			
			// save customer
			
			// save order
			
			// save order totals
			
			// save order products
			
			// update order status
			
			// update product info
			
		}
	}
	
}