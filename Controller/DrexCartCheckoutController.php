<?php

class DrexCartCheckoutController extends DrexCartAppController {
	
	public function beforeFilter() {
		parent::beforeFilter();
		
		if (sizeof($this->cart_products)==0) {
			$this->Session->setFlash('You must have products in your cart to checkout!', 'default', array('class'=>'alert alert-danger'));
			$this->redirect('/DrexCartCarts/cart');
			exit;
		}
	}
	
	public function index() {
		
	}
	
}