<?php


class DrexCartAdminController extends DrexCartAppController {
	var $uses = array('DrexCart.DrexCartProduct', 'DrexCart.DrexCartProductType', 'DrexCart.DrexCartUser', 'DrexCart.DrexCartOrder', 'DrexCart.DrexCartOrderTotal');
	
	public function beforeFilter() {
		parent::beforeFilter();
		
		$this->layout = 'DrexCart.admin';
	}
	
	public function index() {
		if (sizeof($this->DrexCartProduct->getAllProducts(array('DrexCartProduct.enabled=1', 'DrexCartProduct.visible=1', 'DrexCartProduct.quantity>0')))<5) {
			$this->Session->setFlash('You have less than 5 products available for users to buy!', 'default', array('class'=>'alert alert-warning'));
		}
		
		$this->DrexCartGateway = ClassRegistry::init('DrexCart.DrexCartGateway');
		$this->DrexCartGateway->create();
		$gateways = $this->DrexCartGateway->find('all');
		$this->set('gateways', $gateways);
		
		$this->DrexCartOrder = ClassRegistry::init('DrexCart.DrexCartOrder');
		$this->DrexCartOrder->create();
		$this->DrexCartOrderTotal = ClassRegistry::init('DrexCart.DrexCartOrderTotal');
		$this->DrexCartOrderTotal->create();
		$order_summary = array();
		$order_summary['num_orders'] = $this->DrexCartOrder->find('count');
		$sum_results = $this->DrexCartOrderTotal->find('all', array('fields'=>array('SUM(amount) as total'),
																			    
																				'conditions'=>array('code'=>'total')));
		$order_summary['totals'] = $sum_results[0][0]['total'];
		$this->set('order_summary', $order_summary);
		
		$this->set('order_totals', $this->DrexCartOrderTotal->getOrderTotalsSumed());
		
		$this->set('num_users', $this->DrexCartUser->find('count'));
		$this->set('user_counts', $this->DrexCartUser->getUsersCreatedCount());
	}
	
	public function products() {
		$this->productsList();
		$this->render('productsList');
	}
	
	public function productsEdit($product_id=null) {
		
		if (!empty($this->request->data)) {
			// form submitted
			$this->Session->setFlash('Product saved!', 'default', array('class'=>'alert alert-success'));
			
			if (isset($this->request->data['DrexCartProduct']['main_image'])) {
				// save file information
				echo 'image uploaded';
			}
			if (is_numeric($product_id)) {
				// update
				$this->DrexCartProduct->id = $product_id;
				$this->DrexCartProduct->save($this->request->data);
			} else {
				// insert
				$this->DrexCartProduct->id = null;
				$this->request->data['DrexCartProduct']['created_date'] = date('Y-m-d H:i:s');
				$this->request->data['DrexCartProduct']['enabled'] = 1;
				$this->DrexCartProduct->save($this->request->data);
				$this->redirect('/DrexCartAdmin/productsEdit/');
			}
			
		}
		
		if (is_numeric($product_id) && $product_id>0) {
			$product = $this->DrexCartProduct->getProductById($product_id);
			$this->set('product', $product);
			$this->request->data['DrexCartProduct'] = $product['DrexCartProduct'];
		}
		$this->set('product_types', $this->DrexCartProductType->getOptions());
	}
	
	public function productsList() {
		
		if (isset($this->params['named']['disable'])) {
			$this->DrexCartProduct->updateAll(array('enabled'=>0),
											  array('id'=>$this->params['named']['disable']));
		}
		if (isset($this->params['named']['enable'])) {
			$this->DrexCartProduct->updateAll(array('enabled'=>1),
					array('id'=>$this->params['named']['enable']));
		}
		
		$this->set('products', $this->DrexCartProduct->getAllProducts(array('enabled'=>isset($this->params['named']['showDisabled']) ? 0 : 1, 'visible'=>isset($this->params['named']['showInvisible']) ? 0 : 1)));
	}
	
	public function productsUploadImage($type='main') {

		if (!empty($this->request->data)) {
			//echo "Post Vars: <pre>";
			//print_r($_POST);
			//print_r($this->params);
			//echo '</pre>';
			foreach($this->request->data['photos'] as $photo) {
				if (preg_match('/(\.jpg)|(\.png)|(\.gif)/i', $photo['name'])) {
					move_uploaded_file($photo['tmp_name'], IMAGES.'/drexcart/'.$type.'_'.$photo['name']);
					$this->set('image_url', $type.'_'.$photo['name']);
				}
			}
			$this->layout = 'min';
			$this->set('type', $type);
		}
	}
	
	public function productTypesView() {
		$this->set('product_types', $this->DrexCartProductType->find('all'));
	}
	public function productTypesEdit($product_types_id=null) {
		if (!empty($this->request->data)) {
			if ($product_types_id) {
				$this->DrexCartProductType->id = (int)$product_types_id;
			} else {
				$this->DrexCartProductType->id = null;
				$this->request->data['DrexCartProductType']['product_type'] = $this->request->data['DrexCartProductType']['product_type_name'];
			}
			$this->DrexCartProductType->save($this->request->data);
			$this->Session->setFlash('Product type updated', 'default', array('class'=>'alert alert-success')); 
		} else {
			if ($product_types_id) {
				$this->request->data = $this->DrexCartProductType->find('first', array('conditions'=>array('id'=>$product_types_id)));
			}
		}
	}
	
	public function customers() {
		$this->set('users', $this->DrexCartUser->find('all'));
	}
	
	public function orders() {
		$this->set('orders', $this->DrexCartOrder->find('all', array('fields'=>array('DrexCartOrder.*', 'DrexCartOrderTotal.*', 'DrexCartUser.*'),
																	 'joins'=>array(array('table'=>'drex_cart_order_totals', 'alias'=>'DrexCartOrderTotal', 'type'=>'left', 'conditions'=>array('DrexCartOrderTotal.code'=>'total', 'DrexCartOrderTotal.drex_cart_orders_id=DrexCartOrder.id'))),
																	 'order'=>array('DrexCartOrder.created_date'=>'desc'))));
	}
	
	public function gateways() {
		$this->DrexCartGateway = ClassRegistry::init('DrexCart.DrexCartGateway');
		$this->DrexCartGateway->create();
		
		if (isset($this->params['named']['disable'])) {
			$this->DrexCartGateway->updateAll(array('enabled'=>0),
					array('id'=>$this->params['named']['disable']));
		}
		if (isset($this->params['named']['enable'])) {
			$this->DrexCartGateway->updateAll(array('enabled'=>1),
					array('id'=>$this->params['named']['enable']));
		}
		
		
		$gateways = $this->DrexCartGateway->find('all');
		$this->set('gateways', $gateways);
	}
	
	public function gatewayEdit($gatewayId=null) {
		$this->DrexCartGateway = ClassRegistry::init('DrexCart.DrexCartGateway');
		$this->DrexCartGateway->create();
		if (!empty($this->request->data)) {
			// form submitted
			$this->Session->setFlash('Gateway saved!', 'default', array('class'=>'alert alert-success'));
				
			
			if (is_numeric($gatewayId)) {
				// update
				$this->DrexCartGateway->id = $gatewayId;
				$this->DrexCartGateway->save($this->request->data);
			} else {
				// insert
				$this->DrexCartGateway->id = null;
				$this->request->data['DrexCartGateway']['enabled'] = 1;
				$this->DrexCartGateway->save($this->request->data);
				$this->redirect('/DrexCartAdmin/gatewayEdit/');
			}
				
		}
		
		if (is_numeric($gatewayId) && $gatewayId>0) {
			$gateway = $this->DrexCartGateway->getGatewayById($gatewayId);
			$this->set('gateway', $gateway);
			$this->request->data['DrexCartGateway'] = $gateway['DrexCartGateway'];
		}
	}
	
}