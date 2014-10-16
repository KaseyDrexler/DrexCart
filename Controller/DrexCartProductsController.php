<?php



class DrexCartProductsController extends DrexCartAppController {
	
	var $uses = array('DrexCart.DrexCartProduct');
	
	public function index() {
		$this->set('products', $this->DrexCartProduct->getAllProducts(array('enabled'=>1, 'visible'=>1)));
	}
	
	public function productDetails($product_id=null) {
		if (is_numeric($product_id)) {
			$this->set('product', $this->DrexCartProduct->getProductById((int)$product_id));
		} else {
			$this->Session->setFlash('Product ID is invalid!', 'default', array('class'=>'alert alert-danger'));
		}
		
	}
	
}