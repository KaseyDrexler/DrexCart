<?php


class DrexCartCartsController extends DrexCartAppController {
	
	var $uses = array('DrexCart.DrexCartCart', 'DrexCart.DrexCartCartProduct', 'DrexCart.DrexCartProduct');
	
	public function addProduct($product_id=null) {
		if ($this->Session->check('drexcart_id')) {
			
			if ($this->DrexCartProduct->getProductQuantity($product_id)>0) {
				$this->DrexCartCartProduct->addProduct($this->Session->read('drexcart_id'), (int) $product_id);
			} else {
				$this->Session->setFlash('Not enough products in stock!!! Could not add your product to your shopping cart!', 'default', array('class'=>'alert alert-danger'));
				$this->redirect($this->referer());
			}
		} else {
			$this->Session->setFlash('Error finding your cart session!!!', 'default', array('class'=>'alert alert-danger'));
		}
		$this->redirect('/DrexCartCarts/cart');
	}
	
	public function cart() {
		
	}
}