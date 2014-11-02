<?php

App::uses('PaymentModuleBase', 'DrexCart.DrexCartLib/Modules/Payment');


App::uses('ServiceCustom', 'DrexCart.DrexCartLib/PaymentGateways/Authorize');
App::uses('CreditCardType', 'DrexCart.DrexCartLib/PaymentGateways/Authorize');
App::uses('CustomerProfileType', 'DrexCart.DrexCartLib/PaymentGateways/Authorize');
App::uses('CustomerPaymentProfileType', 'DrexCart.DrexCartLib/PaymentGateways/Authorize');
App::uses('PaymentType', 'DrexCart.DrexCartLib/PaymentGateways/Authorize');
App::uses('CreateCustomerProfile', 'DrexCart.DrexCartLib/PaymentGateways/Authorize');
App::uses('MerchantAuthenticationType', 'DrexCart.DrexCartLib/PaymentGateways/Authorize');
App::uses('ProfileTransAuthOnlyType', 'DrexCart.DrexCartLib/Modules/Payment');
App::uses('ProfileTransactionType', 'DrexCart.DrexCartLib/Modules/Payment');
App::uses('CreateCustomerProfileTransaction', 'DrexCart.DrexCartLib/Modules/Payment');


App::uses('DriversLicenseType', 'DrexCart.DrexCartLib/PaymentGateways/Authorize');

class AuthorizePaymentModule implements PaymentModuleBase {
	
	var $gatewayId;
	var $wsdl_url;
	var $login;
	var $key;
	var $errors;

	public function __construct($gatewayId, $wsdl_url, $login, $key) {
		$this->gatewayId = $gatewayId;
		$this->wsdl_url = $wsdl_url;
		$this->login = $login;
		$this->key = $key;
	}
	
	public function createCustomer($customerInformation) {
		$this->DrexCartGatewayUser = ClassRegistry::init('DrexCart.DrexCartGatewayUser');
		$this->DrexCartGatewayUser->create();
		if ($gwUser = $this->DrexCartGatewayUser->find('first', array('conditions'=>array('drex_cart_gateways_id'=>$this->gatewayId, 'drex_cart_users_id'=>$customerInformation['id'])))) {
			return $gwUser['DrexCartGatewayUser']['profile_id'];
		}

		$soap = new ServiceCustom((Configure::read('debug')>0) ? array('trace'=>1) : array(''), $this->wsdl_url);
		
		$profile = new CustomerProfileType(null, null);
		$profile->merchantCustomerId = 'DC'.$customerInformation['id'];
		$profile->email = $customerInformation['email'];
		$profile->description = 'DrexCartUser';
		
		$cx_profile = new CreateCustomerProfile(new MerchantAuthenticationType($this->login, $this->key), $profile, 'none');
		//pr($cx_profile);
		$soap_response = $soap->CreateCustomerProfile($cx_profile);
		//pr($soap->__getLastRequest());
		//pr($soap->__getLastResponse());
		//pr($soap_response);
		
		if ($soap_response->CreateCustomerProfileResult->customerProfileId && $soap_response->CreateCustomerProfileResult->resultCode=='Ok') {
			$this->DrexCartGatewayUser->id = null;
			$this->DrexCartGatewayUser->save(array('DrexCartGatewayUser'=>array('drex_cart_users_id'=>$customerInformation['id'],
					'created_date'=>date('Y-m-d H:i:s'),
					'type'=>'authorize',
					'drex_cart_gateways_id'=>1,
					'profile_id'=>$soap_response->CreateCustomerProfileResult->customerProfileId)));
			return $soap_response->CreateCustomerProfileResult->customerProfileId;
		} else {
			$errors = array();
			if (!is_array($soap_response->CreateCustomerProfileResult->messages)) $soap_response->CreateCustomerProfileResult->messages = array($soap_response->CreateCustomerProfileResult->messages);
			//pr($soap_response->CreateCustomerProfileResult->messages);
			foreach($soap_response->CreateCustomerProfileResult->messages as $message) {
				$errors[] = $message->MessagesTypeMessage->text;
			}
			$this->errors = $errors;
			return false;
		}
		
	}
	public function deleteCustomer($customerInformation) {
		
	}
	
	public function addCard($userProfileId, $cardInfo, $orderInfo) {
		
		// find gateway user
		$this->DrexCartGatewayUser = ClassRegistry::init('DrexCart.DrexCartGatewayUser');
		$this->DrexCartGatewayUser->create();
		$gwUser = $this->DrexCartGatewayUser->find('first', array('conditions'=>array('profile_id'=>$userProfileId)));
		if (!$gwUser) throw Exception('Gateway User not found!');
		
		$soap = new ServiceCustom((Configure::read('debug')>0) ? array('trace'=>1) : array(''), $this->wsdl_url);
		
		
		
		$credit_card = new CreditCardType($cardInfo['code']);
		$credit_card->cardNumber = $cardInfo['account_number'];
		$credit_card->expirationDate = $cardInfo['expiration'];
		
		$dl = new DriversLicenseType('11111111111', '1979-01-01');
		$dl->state = $orderInfo['billing_state'];
		
		
		$cc_profile_type = new CustomerPaymentProfileType(new PaymentType(null, $credit_card), $dl, null);
		$cc_profile_type->billTo = new stdClass();
		$cc_profile_type->billTo->firstName = $orderInfo['billing_firstname'];
		$cc_profile_type->billTo->lastName = $orderInfo['billing_lastname'];
		$cc_profile_type->billTo->address = $orderInfo['billing_address1'];
		$cc_profile_type->billTo->city = $orderInfo['billing_city'];
		$cc_profile_type->billTo->state = $orderInfo['billing_state'];
		$cc_profile_type->billTo->zip = $orderInfo['billing_zip'];
		
		$cc_profile_type->billTo->country = 'United States';
		$cc_profile_type->billTo->phoneNumber = '9999999999';
		$cc_profile_type->taxId = '';
		
		
		$cc_profile_type->customerType = 'individual';
		
		$profile = new CustomerProfileType(array($cc_profile_type), null);
		
		
		
		$soap_response = $soap->CreateCustomerPaymentProfile(new CreateCustomerPaymentProfile(new MerchantAuthenticationType($this->login, $this->key), 
																							  $userProfileId, 
																							  $cc_profile_type, 
																							  'testMode'));
		//pr($soap->__getLastRequest());
		//pr($soap->__getLastResponse());
		//pr($soap_response);
		
		if ($soap_response->CreateCustomerPaymentProfileResult->customerPaymentProfileId && $soap_response->CreateCustomerPaymentProfileResult->resultCode=='Ok') {
			$this->DrexCartGatewayProfile = ClassRegistry::init('DrexCart.DrexCartGatewayProfile');
			$this->DrexCartGatewayProfile->create();
			$this->DrexCartGatewayProfile->id = null;
			$this->DrexCartGatewayProfile->save(array('DrexCartGatewayProfile'=>array('drex_cart_gateway_users_id'=>$gwUser['DrexCartGatewayUser']['id'],
					'created_date'=>date('Y-m-d H:i:s'),
					'account_number'=>'************'.substr($cardInfo['account_number'],12),
					'expiration'=>$cardInfo['expiration'],
					'code'=>$cardInfo['code'],
					'profile_id'=>$soap_response->CreateCustomerPaymentProfileResult->customerPaymentProfileId)));
			return $soap_response->CreateCustomerPaymentProfileResult->customerPaymentProfileId;
		} else {
			$errors = array();
			if (!is_array($soap_response->CreateCustomerPaymentProfileResult->messages)) $soap_response->CreateCustomerPaymentProfileResult->messages = array($soap_response->CreateCustomerPaymentProfileResult->messages);
			foreach($soap_response->CreateCustomerPaymentProfileResult->messages as $message) {
				$errors[] = $message->messageTypeMessage->text;
			}
			$this->errors = $errors;
			return false;
		}
		
	}
	public function deleteCard($customerInformation, $cardInformation) {
		
	}
	
	public function authorizePayment($customerInformation, $profileInformation, $amount) {
		$soap = new ServiceCustom((Configure::read('debug')>0) ? array('trace'=>1) : array(''), $this->wsdl_url);
		
		$auth = new ProfileTransAuthOnlyType();
		$auth->amount = $amount;
		$auth->customerProfileId = $customerInformation;
		$auth->customerPaymentProfileId = $profileInformation;
		
		$transaction = new ProfileTransactionType(null, 
												  $auth, 
												  null, 
					 							  null, 
												  null, 
												  null);
		
		
		$parameters = new CreateCustomerProfileTransaction(new MerchantAuthenticationType($this->login, $this->key), $transaction, null);
		//pr($parameters);
		//echo '<hr />';
		$soap_result = $soap->CreateCustomerProfileTransaction($parameters);
		//pr($soap->__getLastRequest());
		//pr($soap_result);
		
		if ($soap_result->CreateCustomerProfileTransactionResult->resultCode=='Ok') {
			$directResponse = $soap_result->CreateCustomerProfileTransactionResult->directResponse;
			$directResponse = preg_split('/\,/', $directResponse);
			$this->DrexCartGatewayProfile = ClassRegistry::init('DrexCart.DrexCartGatewayProfile');
			$this->DrexCartGatewayProfile->create();
			$profile = $this->DrexCartGatewayProfile->find('first', array('conditions'=>array('profile_id'=>$profileInformation)));
			$profile['DrexCartGatewayProfile']['transaction_id'] = $directResponse[6];
			return $profile['DrexCartGatewayProfile'];;
		} else {
			return false;
		}
	}
	public function voidPayment($customerInformation, $profileInformation, $transactionId) {
		
	}
	public function capturePayment($customerInformation, $profileInformation, $amount) {
		
	}
	public function refundPayment($customerInformation, $profileInformation, $amount) {
		
	}
	
	
/*

	$soap = new ServiceCustom((Configure::read('debug')>0) ? array('trace'=>1) : array(''), 'https://apitest.authorize.net/soap/v1/Service.asmx?WSDL');
	$credit_card = new CreditCardType($orderInfo['DrexCartGatewayProfile']['code']);
	$credit_card->cardNumber = $orderInfo['DrexCartGatewayProfile']['account_number'];
	$credit_card->expirationDate = $orderInfo['DrexCartGatewayProfile']['expiration'];
	
	$dl = new DriversLicenseType('11111111111', '1979-01-01');
	$dl->state = 'IA';
	
	
	$cc_profile_type = new CustomerPaymentProfileType(new PaymentType(null, $credit_card), $dl, null);
	$cc_profile_type->billTo = new stdClass();
	$cc_profile_type->billTo->firstName = $orderInfo['DrexCartOrder']['billing_firstname'];
	$cc_profile_type->billTo->lastName = $orderInfo['DrexCartOrder']['billing_lastname'];
	$cc_profile_type->billTo->address = $orderInfo['DrexCartOrder']['billing_address1'];
	$cc_profile_type->billTo->city = $orderInfo['DrexCartOrder']['billing_city'];
	$cc_profile_type->billTo->state = $orderInfo['DrexCartOrder']['billing_state'];
	$cc_profile_type->billTo->zip = $orderInfo['DrexCartOrder']['billing_zip'];
	
	$cc_profile_type->billTo->country = 'United States';
	$cc_profile_type->billTo->phoneNumber = '9999999999';
	$cc_profile_type->taxId = '';
	
	
	$cc_profile_type->customerType = 'individual';
	
	$profile = new CustomerProfileType(array($cc_profile_type), null);
	$profile->merchantCustomerId = 'DC'.$user['id'];
	$profile->email = $user['email'];
	$profile->description = 'DrexCartUser';
	
	$cx_profile = new CreateCustomerProfile(new MerchantAuthenticationType('9eFfhH98Uz', '38UAqh26T7U3gc4y'), $profile, 'testMode');
	//pr($cx_profile);
	$soap_response = $soap->CreateCustomerProfile($cx_profile);
	//pr($soap->__getLastRequest());
	//pr($soap->__getLastResponse());
	//pr($soap_response);
	
	if ($soap_response->CreateCustomerProfileResult->customerProfileId && $soap_response->CreateCustomerProfileResult->resultCode=='Ok') {
		$this->DrexCartGatewayUser = ClassRegistry::init('DrexCart.DrexCartGatewayUser');
		$this->DrexCartGatewayUser->create();
		$this->DrexCartGatewayUser->id = null;
		$this->DrexCartGatewayUser->save(array('DrexCartGatewayUser'=>array('drex_cart_users_id'=>$user['id'],
				'created_date'=>date('Y-m-d H:i:s'),
				'type'=>'authorize',
				'drex_cart_gateways_id'=>1,
				'profile_id'=>$soap_response->CreateCustomerProfileResult->customerProfileId)));
		$this->DrexCartGatewayProfile = ClassRegistry::init('DrexCart.DrexCartGatewayProfile');
		$this->DrexCartGatewayProfile->create();
		$this->DrexCartGatewayProfile->id = null;
		$this->DrexCartGatewayProfile->save(array('DrexCartGatewayProfile'=>array('drex_cart_gateway_users_id'=>$this->DrexCartGatewayUser->id,
				'created_date'=>date('Y-m-d H:i:s'),
				'account_number'=>'************'.substr($paymentInfo['card_number'],12),
				'expiration'=>$paymentInfo['card_exp'],
				'code'=>$paymentInfo['card_cvc'],
				'profile_id'=>$soap_response->CreateCustomerProfileResult->customerPaymentProfileIdList->long)));
	
		$acct = new stdClass();
		$acct->drex_cart_gateway_users_id = $this->DrexCartGatewayUser->id;
		$acct->drex_cart_gateway_profiles_id = $this->DrexCartGatewayProfile->id;
		$acct->profile_id = $soap_response->CreateCustomerProfileResult->customerProfileId;
		$acct->payment_profile_id = isset($soap_response->CreateCustomerProfileResult->customerPaymentProfileIdList) &&
		isset($soap_response->CreateCustomerProfileResult->customerPaymentProfileIdList->long) ?
		$soap_response->CreateCustomerProfileResult->customerPaymentProfileIdList->long :
		null;
		return $acct;
	
	}
	return false;
	*/
}