<?php
App::uses('FlatRateModule', 'DrexCart.DrexCartLib/Modules/Shipping');


class DrexCartCheckoutController extends DrexCartAppController {
	
	public $uses = array('DrexCart.DrexCartOrder', 'DrexCart.DrexCartUser', 'DrexCart.DrexCartGatewayProfile', 'DrexCart.DrexCartAddress');
	
	public function beforeFilter() {
		parent::beforeFilter();
		
		if (sizeof($this->cart->getProducts())==0) {
			$this->Session->setFlash('You must have products in your cart to checkout!', 'default', array('class'=>'alert alert-danger'));
			$this->redirect('/DrexCartCarts/cart');
			exit;
		}
	}
	
	public function index() {
		
		// shipping prices
		$shipping = new FlatRateModule($this->cart);
		$this->set('shipping', $shipping);
		
		if (!empty($this->request->data)) {
			
			$unvalidated = array();
			$shipping_met = true;
			if ($this->cart->hasShippableProducts()) {
				if (isset($this->request->data['DrexCartOrder']['shipping_option']) && strlen($this->request->data['DrexCartOrder']['shipping_option'])>1) {
					// shipping met
				} else {
					// shipping not met
					$shipping_met = false;
				}
			}
			
			// User validation
			if ((isset($this->request->data['DrexCartOrder']['create_user']) && $this->request->data['DrexCartOrder']['create_user']==0) || $this->userManager->isLoggedIn()) {
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
			if (isset($this->request->data['DrexCartOrder']['default_billing_id']) && is_numeric($this->request->data['DrexCartOrder']['default_billing_id'])) {
				unset($this->DrexCartOrder->validate['billing_firstname']);
				unset($this->DrexCartOrder->validate['billing_lastname']);
				unset($this->DrexCartOrder->validate['billing_address1']);
				unset($this->DrexCartOrder->validate['billing_address2']);
				unset($this->DrexCartOrder->validate['billing_city']);
				unset($this->DrexCartOrder->validate['billing_state']);
				unset($this->DrexCartOrder->validate['billing_zip']);
				unset($this->DrexCartOrder->validate['billing_phone']);
				$billing_address = $this->DrexCartAddress->getAddressById($this->request->data['DrexCartOrder']['default_billing_id']);
				if ($billing_address) {
					$this->request->data['DrexCartOrder']['billing_firstname'] = $billing_address['DrexCartAddress']['firstname'];
					$this->request->data['DrexCartOrder']['billing_lastname'] = $billing_address['DrexCartAddress']['lastname'];
					$this->request->data['DrexCartOrder']['billing_address1'] = $billing_address['DrexCartAddress']['address1'];
					$this->request->data['DrexCartOrder']['billing_address2'] = $billing_address['DrexCartAddress']['address2'];
					$this->request->data['DrexCartOrder']['billing_city'] = $billing_address['DrexCartAddress']['city'];
					$this->request->data['DrexCartOrder']['billing_state'] = $billing_address['DrexCartAddress']['state'];
					$this->request->data['DrexCartOrder']['billing_zip'] = $billing_address['DrexCartAddress']['zip'];
					$this->request->data['DrexCartOrder']['billing_phone'] = $billing_address['DrexCartAddress']['contact_number'];
				}
			}
			if (isset($this->request->data['DrexCartOrder']['default_shipping_id']) && is_numeric($this->request->data['DrexCartOrder']['default_shipping_id'])) {
				unset($this->DrexCartOrder->validate['shipping_firstname']);
				unset($this->DrexCartOrder->validate['shipping_lastname']);
				unset($this->DrexCartOrder->validate['shipping_address1']);
				unset($this->DrexCartOrder->validate['shipping_address2']);
				unset($this->DrexCartOrder->validate['shipping_city']);
				unset($this->DrexCartOrder->validate['shipping_state']);
				unset($this->DrexCartOrder->validate['shipping_zip']);
				$shipping_address = $this->DrexCartAddress->getAddressById($this->request->data['DrexCartOrder']['default_shipping_id']);
				if ($shipping_address) {
					$this->request->data['DrexCartOrder']['shipping_firstname'] = $shipping_address['DrexCartAddress']['firstname'];
					$this->request->data['DrexCartOrder']['shipping_lastname'] = $shipping_address['DrexCartAddress']['lastname'];
					$this->request->data['DrexCartOrder']['shipping_address1'] = $shipping_address['DrexCartAddress']['address1'];
					$this->request->data['DrexCartOrder']['shipping_address2'] = $shipping_address['DrexCartAddress']['address2'];
					$this->request->data['DrexCartOrder']['shipping_city'] = $shipping_address['DrexCartAddress']['city'];
					$this->request->data['DrexCartOrder']['shipping_state'] = $shipping_address['DrexCartAddress']['state'];
					$this->request->data['DrexCartOrder']['shipping_zip'] = $shipping_address['DrexCartAddress']['zip'];
				}
			}
			if ($this->DrexCartOrder->validates() ) {
				
				$this->Session->write('DrexCartOrder', $this->request->data['DrexCartOrder']);
			} else {
				
				$unvalidated = array_merge($this->DrexCartUser->validationErrors);
				echo 'error:<b>Unvalidated!</b>';
				pr($unvalidated);
			}
			
			// Payment validation
			$this->DrexCartGatewayProfile->set($this->request->data);
			if (isset($this->request->data['DrexCartGatewayProfile']['id']) && $this->userManager->isLoggedIn()) {
				$profile = $this->DrexCartGatewayProfile->getPaymentProfile($this->userManager->getUserId(), $this->request->data['DrexCartGatewayProfile']['id']);
				if ($profile) {
					$this->Session->write('DrexCartGatewayProfile', $profile['DrexCartGatewayProfile']);
				}
			} else if ($this->DrexCartGatewayProfile->validates()) {
				$this->Session->write('DrexCartGatewayProfile', $this->request->data['DrexCartGatewayProfile']);
			} else {
				$unvalidated = array_merge($this->DrexCartGatewayProfile->validationErrors);
			}
			
			
			
			if ($unvalidated || !$shipping_met) {
				$this->set('unvalidated', $unvalidated);
				$this->set('shipping_met', $shipping_met);
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
		// shipping prices
		$shipping = new FlatRateModule($this->cart);
		$this->set('shipping', $shipping);
		
		if (!empty($this->request->data)) { 
			
			try {
				$orderResponse = $this->cart->createOrder($this->userManager->isLoggedIn() ? $this->userManager->getUserId() : null);
				$this->userManager->loginById($orderResponse->user_id);
				$this->redirect('/DrexCartUsers/orderDetails/'.$orderResponse->order_id);
			} catch (Exception $e) {
				$this->Session->setFlash('Error: '.$e->getMessage(), 'default', array('class'=>'alert alert-danger'));
			}
			// attempt charge
			
			// save customer
			
			// save order
			
			// save order totals
			
			// save order products
			
			// update order status
			
			// update product info
			
			
		}
	}
	
	public function payment() {
		$this->DrexCartGateway = ClassRegistry::init('DrexCart.DrexCartGateway');
		$this->DrexCartGateway->create();
		$this->set('gateways', $this->DrexCartGateway->find('all', array('conditions'=>array('enabled'=>1))));
		
		if (isset($this->userManager) && $this->userManager->isLoggedIn()) {
			$this->DrexCartGatewayProfile = ClassRegistry::init('DrexCart.DrexCartGatewayProfile');
			$this->DrexCartGatewayProfile->create();
			$this->set('profiles', $this->DrexCartGatewayProfile->getPaymentProfiles($this->userManager->getUserId()));
		}
	}
	
}