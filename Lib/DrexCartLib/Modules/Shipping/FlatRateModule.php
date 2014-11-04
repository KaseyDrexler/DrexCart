<?php
App::uses('ShippingModuleBase', 'DrexCart.DrexCartLib/Modules/Shipping');

class FlatRateModule extends ShippingModuleBase {
	
	private $cart;
	private $rates;
	public function __construct(DrexCartShoppingCart $cart) {
		$this->cart = $cart;
		$this->rates = array(array('name'=>'$5.00/product',
						   'code'=>'FlatRateModule_flat5',
						   'cost'=>$this->getShippingCosts('FlatRateModule_flat5')));
	
	}
	
	public function getShippingCosts($option_code=null) {
		$products = $this->cart->getProducts();
		$shipping_total = 0;
		foreach($products as $product) {
			if ($product['DrexCartProductType']['shippable']==1) {
				$shipping_total += 5.00 * $product['DrexCartCartProduct']['quantity'];
			}
		}
		return $shipping_total;
	}
	
	public function getShippingMethodName() {
		return 'Flat Rate Shipping';
	}
	
	public function getShippingOptions() {
		return $this->rates;
	}
	
	public function getSelectedRate() {
		if (CakeSession::check('DrexCartOrder')) {
			$order = CakeSession::read('DrexCartOrder');
			if (isset($order['shipping_option'])) {
				foreach ($this->rates as $rate) {
					if ($rate['code']==$order['shipping_option']) {
						return $rate;
					}
				}
			}
		}
		return false;
	}

}