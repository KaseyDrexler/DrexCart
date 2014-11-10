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
		
		if ($order) {
			$this->DrexCartOrderProduct = ClassRegistry::init('DrexCart.DrexCartOrderProduct');
			$this->DrexCartOrderProduct->create();
			$order_products = $this->DrexCartOrderProduct->getProductsOnOrder($order['DrexCartOrder']['id']);
			$this->set('order_products', $order_products);
			
			$this->DrexCartOrderTotal = ClassRegistry::init('DrexCart.DrexCartOrderTotal');
			$this->DrexCartOrderTotal->create();
			$this->set('order_totals', $this->DrexCartOrderTotal->getOrderTotals($order['DrexCartOrder']['id']));
			
			$this->DrexCartOrderStatusHistory = ClassRegistry::init('DrexCart.DrexCartOrderStatusHistory');
			$this->DrexCartOrderStatusHistory->create();
			$this->set('order_history', $this->DrexCartOrderStatusHistory->getOrderHistory($order['DrexCartOrder']['id']));
				
			
			$this->DrexCartOrderPayment = ClassRegistry::init('DrexCart.DrexCartOrderPayment');
			$this->DrexCartOrderPayment->create();
			$this->set('order_payments', $this->DrexCartOrderPayment->getPaymentsOnOrder($order['DrexCartOrder']['id']));
		}
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
	
	public function addresses() {
		$this->DrexCartAddress = ClassRegistry::init('DrexCart.DrexCartAddress');
		$this->DrexCartAddress->create();
		$this->set('addresses', $this->DrexCartAddress->getAddresses($this->userManager->getUserId()));
	}
	
	public function addressesEdit($addressId=null) {
		$this->DrexCartAddress = ClassRegistry::init('DrexCart.DrexCartAddress');
		$this->DrexCartAddress->create();
		if (!empty($this->request->data)) {
			// form submitted
			$this->Session->setFlash('Address saved!', 'default', array('class'=>'alert alert-success'));
				
			$default = false;
			
			if (is_numeric($addressId)) {
				// update
				$this->DrexCartAddress->id = $addressId;
				if ($this->DrexCartAddress->save($this->request->data)) {
					$this->set('saved', true);
				}
			} else {
				// insert
				$this->DrexCartAddress->id = null;
				$this->request->data['DrexCartAddress']['drex_cart_users_id'] = $this->userManager->getUserId();
				
				if ($this->DrexCartAddress->save($this->request->data)) {
					$this->set('saved', true);
				}
			}
			if ($this->request->data['DrexCartAddress']['default_billing_id']==1) {
				$this->DrexCartUser->updateAll(array('billing_address_id'=>$this->DrexCartAddress->id),
											   array('id'=>$this->userManager->getUserId()));
				$default = true;
			}
			if ($this->request->data['DrexCartAddress']['default_shipping_id']==1) {
				$this->DrexCartUser->updateAll(array('shipping_address_id'=>$this->DrexCartAddress->id),
						array('id'=>$this->userManager->getUserId()));
				$default = true;
			}	
			if ($default) {
				$this->userManager->loginById($this->userManager->getUserId());
			}
		}
		
		if (is_numeric($addressId) && $addressId>0) {
			$address = $this->DrexCartAddress->getAddressById($addressId, $this->userManager->getUserId());
			$this->set('address', $address);
			$this->request->data['DrexCartAddress'] = $address['DrexCartAddress'];
		}
	}
	
	public function addressesDelete($addressId=null) {
		$this->DrexCartAddress = ClassRegistry::init('DrexCart.DrexCartAddress');
		$this->DrexCartAddress->create();
		$this->DrexCartAddress->deleteAll(array('id'=>(int)$addressId, 'drex_cart_users_id'=>(int)$this->userManager->getUserId()));
		$this->redirect('/DrexCartUsers/addresses');
	}
	
	public function paymentProfiles() {
		
	}
}