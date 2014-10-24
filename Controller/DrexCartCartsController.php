<?php


class DrexCartCartsController extends DrexCartAppController {
	
	var $uses = array('DrexCart.DrexCartCart', 'DrexCart.DrexCartCartProduct', 'DrexCart.DrexCartProduct');
	
	public function addProduct($product_id=null) {
		if ($this->Session->check('shopping_cart')) {
			
			if ($this->cart->addProduct($product_id)) {
				
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
		
		if (!empty($this->request->data)) {
			if (isset($this->request->data['quantity'])) {
				foreach($this->request->data['quantity'] as $cartProductId=>$quantity) {
					$this->cart->updateQuantity($cartProductId, $quantity);
				}
			}
		}
		
		$this->set('cart_total', $this->cart->getCartTotal());
		$this->set('cart_products', $this->cart->getProducts());
	}
	
	public function delete($cartProductId=null) {
		$this->cart->deleteProduct($cartProductId);
		$this->redirect('/DrexCartCarts/cart');
	}
	
	public function cartWidget() {
		$this->set('num_products', $this->DrexCartCartProduct->getNumProducts($this->Session->read('drexcart_id')));
	}
}