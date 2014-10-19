<?php


App::uses('DrexCartInstaller', 'DrexCart.DrexCartLib');
App::uses('DrexCartFunctions', 'DrexCart.DrexCartLib');

class DrexCartAppController extends AppController {
	
	public $components = array('RequestHandler', 'Email', 'Session');
	public $helpers = array(
			'Form',
			'Html',
			'Js' => array('Jquery')
	);
	
	public $uses = array('DrexCart.DrexCartCart', 'DrexCart.DrexCartCartProduct');
	
	public function beforeFilter() {
		parent::beforeFilter();
		
		// check for installed
		$installer = new DrexCartInstaller();
		
		if ($installer->isInstalled()) {
			// software is considered installed
			$this->loadCartInfo();
			$this->set('installed', true);
		} else {
			// software is not considered installed
			if (strtolower($this->params['controller'])!='drexcartinstall') {
				$this->redirect('/DrexCartInstall/index');
				exit;
			}
		}
		
		// global functions
		$this->DCFunctions = new DrexCartFunctions();
		$this->set('DCFunctions', $this->DCFunctions);
		
	}
	
	private function loadCartInfo() {

		// get cart information
		if ($this->Session->check('drexcart_id')) {
			$this->cart = $this->DrexCartCart->getCart($this->Session->read('drexcart_id'));
			if ($this->cart) {
				$this->cart_products = $this->DrexCartCartProduct->getProducts($this->cart['DrexCartCart']['id']);
			} else {
				$this->cart = $this->DrexCartCart->createCart($this->Session->check('drexcart_user_id') ? $this->Session->read('drexcart_user_id') : null);
				$this->Session->write('drexcart_id', $this->cart['DrexCartCart']['id']);
				$this->cart_products = array();
			}
		} else {
			$this->cart = $this->DrexCartCart->createCart($this->Session->check('drexcart_user_id') ? $this->Session->read('drexcart_user_id') : null);
			$this->Session->write('drexcart_id', $this->cart['DrexCartCart']['id']);
			$this->cart_products = array();
		}
		// set variables for views too
		$this->set('cart', $this->cart);
		$this->set('cart_products', $this->cart_products);
	}
	
	
}