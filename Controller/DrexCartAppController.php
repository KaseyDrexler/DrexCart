<?php


App::uses('DrexCartInstaller', 'DrexCart.DrexCartLib');
App::uses('DrexCartFunctions', 'DrexCart.DrexCartLib');
App::uses('DrexCartShoppingCart', 'DrexCart.DrexCartLib');
App::uses('DrexCartUserManager', 'DrexCart.DrexCartLib');

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
		
		
		// user manager
		$this->loadUserManager();
		
	}

	private function loadUserManager() {
	
		if ($this->Session->check('user_manager')) {
			$this->userManager = $this->Session->read('user_manager');
		} else {
			$this->userManager = new DrexCartUserManager();
			$this->Session->write('user_manager', $this->userManager);
		}
	
		$this->set('userManager', $this->userManager);
	}
	private function loadCartInfo() {

		if ($this->Session->check('shopping_cart')) {
			$this->cart = $this->Session->read('shopping_cart');
		} else {
			$this->cart = new DrexCartShoppingCart();
			$this->Session->write('shopping_cart', $this->cart);
		}
		
		$this->set('cart', $this->cart);
		$this->set('cart_products', $this->cart->getProducts());
	}
	
	
}