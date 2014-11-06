<?php


interface PaymentModuleBase {
	
	public function __construct($gatewayId, $wsdl_url, $login, $key);
	
	public function createCustomer($customerInformation);
	public function deleteCustomer($customerInformation);

	public function addCard($userProfileId, $cardInfo, $orderInfo);
	public function deleteCard($customerInformation, $cardInformation);

	public function authorizePayment($customerInformation, $profileInformation, $amount);
	public function voidPayment($customerInformation, $profileInformation, $transactionId);
	public function capturePayment($customerInformation, $profileInformation, $amount, $transactionId);
	public function refundPayment($customerInformation, $profileInformation, $amount);
}