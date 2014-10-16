<?php


class DrexCartCartsController extends DrexCartAppController {
	
	var $uses = array('DrexCart.DrexCartCart', 'DrexCart.DrexCartCartProduct');
	
	public function addProduct($product_id=null) {
		if ($this->Session->check('drexcart_id')) {
			$this->DrexCartCartProduct->addProduct($this->Session->read('drexcart_id'), (int) $product_id);
		} else {
			$this->Session->setFlash('Error finding your cart session!!!', 'default', array('class'=>'alert alert-danger'));
		}
		$this->redirect('/DrexCartCarts/cart');
	}
	
	public function cart() {
		
	}
}