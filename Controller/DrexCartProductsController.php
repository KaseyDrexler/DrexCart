<?php



class DrexCartProductsController extends DrexCartAppController {
	
	
	
	public function index() {
		$this->set('products', $this->DrexCartProduct->getAllProducts(array('enabled'=>1, 'visible'=>1)));
	}
	
}