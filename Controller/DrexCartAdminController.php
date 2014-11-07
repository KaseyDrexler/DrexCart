<?php

App::uses('AuthorizePaymentModule', 'DrexCart.DrexCartLib/Modules/Payment');

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
	
	// panel used on index
	public function productStats() {
		
		// total products
		$this->set('all_products', $this->DrexCartProduct->find('count'));
		
		// products with quantity less than 5
		$this->set('low_quantity', $this->DrexCartProduct->find('count', array('conditions'=>array('quantity<5', 'enabled'=>1, 'visible'=>1))));
		
		// active products
		$this->set('active_products', $this->DrexCartProduct->find('count', array('conditions'=>array('quantity>0', 'enabled'=>1, 'visible'=>1))));
		
		
		// disabled products
		$this->set('disabled_products', $this->DrexCartProduct->find('count', array('conditions'=>array('enabled'=>0))));
		
		// not visible products
		$this->set('hidden_products', $this->DrexCartProduct->find('count', array('conditions'=>array('visible'=>0))));
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
	
	public function orderDetails($orderId=null) {
		
		$order = $this->DrexCartOrder->getOrder((int)$orderId);
		
		$this->set('order', $order);
		
		if ($order) {
			$this->DrexCartOrderProduct = ClassRegistry::init('DrexCart.DrexCartOrderProduct');
			$this->DrexCartOrderProduct->create();
			$order_products = $this->DrexCartOrderProduct->getProductsOnOrder($order['DrexCartOrder']['id']);
			$this->set('order_products', $order_products);
				
			$this->DrexCartOrderTotal = ClassRegistry::init('DrexCart.DrexCartOrderTotal');
			$this->DrexCartOrderTotal->create();
			$this->set('order_totals', $this->DrexCartOrderTotal->getOrderTotals($order['DrexCartOrder']['id']));
				
			$this->DrexCartOrderStatusHistory = ClassRegistry::init('DrexCart.DrexCartOrderStatusHistory');
			$this->DrexCartOrderStatusHistory->create();
			$this->set('order_history', $this->DrexCartOrderStatusHistory->getOrderHistory($order['DrexCartOrder']['id']));
		
				
			$this->DrexCartOrderPayment = ClassRegistry::init('DrexCart.DrexCartOrderPayment');
			$this->DrexCartOrderPayment->create();
			$this->set('order_payments', $this->DrexCartOrderPayment->getPaymentsOnOrder($order['DrexCartOrder']['id']));
			
			
		}
	}
	
	public function orderStatusUpdate($orderId=null) {
		if (!empty($this->request->data)) {
			$this->DrexCartOrderStatusHistory = ClassRegistry::init('DrexCart.DrexCartOrderStatusHistory');
			$this->DrexCartOrderStatusHistory->create();
			$this->DrexCartOrderStatusHistory->id = null;
			$this->DrexCartOrderStatusHistory->save(array('DrexCartOrderStatusHistory'=>array('status_date'=>date('Y-m-d H:i:s'),
																							  'note'=>$this->request->data['DrexCartOrderStatusHistory']['note'],
																							  'drex_cart_order_statuses_id'=>$this->request->data['DrexCartOrderStatusHistory']['drex_cart_order_statuses_id'],
																							  'drex_cart_orders_id'=>(int)$orderId)));
			$this->DrexCartOrder->updateAll(array('DrexCartOrder.drex_cart_order_statuses_id'=>$this->request->data['DrexCartOrderStatusHistory']['drex_cart_order_statuses_id']),
											array('DrexCartOrder.id'=>(int)$orderId));
			$this->set('updated', true);
		}
		$this->DrexCartOrderStatus = ClassRegistry::init('DrexCart.DrexCartOrderStatus');
		$this->DrexCartOrderStatus->create();
		$this->set('available_statuses', $this->DrexCartOrderStatus->getAllStatusesForSelect());
		
		

		$order = $this->DrexCartOrder->getOrder((int)$orderId);
		
		$this->set('order', $order);
	}
	
	public function orderPayments($orderId=null) {
		$this->DrexCartOrderPayment = ClassRegistry::init('DrexCart.DrexCartOrderPayment');
		$this->DrexCartOrderPayment->create();
		$this->set('order_payments', $this->DrexCartOrderPayment->getPaymentsOnOrder($orderId));
		
		$this->DrexCartOrder = ClassRegistry::init('DrexCart.DrexCartOrder');
		$this->DrexCartOrder->create();
		$this->set('order', $this->DrexCartOrder->getOrder($orderId));
		
		
	}
	
	public function orderPaymentsCapture($orderPaymentsId=null) {
		$this->DrexCartOrderPayment = ClassRegistry::init('DrexCart.DrexCartOrderPayment');
		$this->DrexCartOrderPayment->create();
		$order_payment = $this->DrexCartOrderPayment->getPaymentsById($orderPaymentsId);
		$this->set('order_payment', $order_payment);
		
		// precaution
		if ($order_payment['DrexCartOrderPayment']['amount']==$order_payment['DrexCartOrderPayment']['captured_amount']) {
			// all captured, nothing to do here
			//$this->redirect('/DrexCartAdmin/orderPayments/'.$order_payment['DrexCartOrderPayment']['drex_cart_orders_id']);
			exit;
		}
		
		
		//pr($order_payment);
		if (!empty($this->request->data)) {
			
			// check amount
			$amount = $this->request->data['DrexCartOrderPayment']['capture_amount'];
			
			// get gateway information
			$this->DrexCartOrderPayment = ClassRegistry::init('DrexCart.DrexCartOrderPayment');
			$this->DrexCartOrderPayment->create();
			$gateway = $this->DrexCartOrderPayment->getGatewayInfo($order_payment['DrexCartOrderPayment']['id']);
			if ($gateway['type']=='authorize') {
				$payment = new AuthorizePaymentModule($gateway['id'], $gateway['wsdl_url'], $gateway['api_login'], $gateway['api_key']);
			} else {
				// TODO other payment methods
			}
			
			$this->DrexCartGatewayProfile = ClassRegistry::init('DrexCart.DrexCartGatewayProfile');
			$this->DrexCartGatewayProfile->create();
			$this->DrexCartGatewayUser = ClassRegistry::init('DrexCart.DrexCartGatewayUser');
			$this->DrexCartGatewayUser->create();
			$profile = $this->DrexCartGatewayProfile->find('first', array('conditions'=>array('id'=>$order_payment['DrexCartOrderPayment']['drex_cart_gateway_profiles_id'])));
			
			$userProfile = $this->DrexCartGatewayUser->find('first', array('conditions'=>array('id'=>$profile['DrexCartGatewayProfile']['drex_cart_gateway_users_id'])));
			
			if ($tranasactionId = $payment->capturePayment($userProfile['DrexCartGatewayUser']['profile_id'], $profile['DrexCartGatewayProfile']['profile_id'], $amount, $order_payment['DrexCartOrderPayment']['transaction_id'])) {
				// capture was good
				$order_payment['DrexCartOrderPayment']['captured_amount'] = $amount;
				$order_payment['DrexCartOrderPayment']['captured_date'] = date('Y-m-d H:i:s');
				$this->DrexCartOrderPayment->id = $order_payment['DrexCartOrderPayment']['id'];
				$this->DrexCartOrderPayment->save($order_payment);
				$this->set('captured', true);
			} else {
				// capture was bad
				$this->set('captured', false);
			}
		}
		
		
		$this->set('order', $this->DrexCartOrder->getOrder($order_payment['DrexCartOrderPayment']['drex_cart_orders_id']));
		
		$this->DrexCartOrderTotal = ClassRegistry::init('DrexCart.DrexCartOrderTotal');
		$this->DrexCartOrderTotal->create();
		$this->set('order_totals', $this->DrexCartOrderTotal->getOrderTotals($order_payment['DrexCartOrderPayment']['drex_cart_orders_id']));
	}
	
	public function orderStatuses() {
		$this->DrexCartOrderStatus = ClassRegistry::init('DrexCart.DrexCartOrderStatus');
		$this->DrexCartOrderStatus->create();
		$this->set('order_statuses', $this->DrexCartOrderStatus->find('all'));
	}
	
	public function orderStatusesEdit($orderStatusesId=null) {
		$this->set('orderStatusesId', $orderStatusesId);
		$this->DrexCartOrderStatus = ClassRegistry::init('DrexCart.DrexCartOrderStatus');
		$this->DrexCartOrderStatus->create();
		$order_status = $this->DrexCartOrderStatus->getOrderStatusById($orderStatusesId);
		$this->set('order_status', $order_status);
		
		if (!empty($this->request->data)) {
			//$this->DrexCartOrderStatus->set($this->request->data);
			$this->DrexCartOrderStatus->save($this->request->data);
			$this->set('updated', true);
		} else if ($order_status) {
		
			$this->request->data['DrexCartOrderStatus'] = $order_status['DrexCartOrderStatus'];
		}
	}
}