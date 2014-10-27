<?php


/**
 * 
 * @package apiClasses.apiObjects.get
 */
class GetCustomerPaymentProfile
{

  /**
   * 
   * @var MerchantAuthenticationType $merchantAuthentication
   * @access public
   */
  public $merchantAuthentication = null;

  /**
   * 
   * @var int $customerProfileId
   * @access public
   */
  public $customerProfileId = null;

  /**
   * 
   * @var int $customerPaymentProfileId
   * @access public
   */
  public $customerPaymentProfileId = null;

  /**
   * 
   * @param MerchantAuthenticationType $merchantAuthentication
   * @param int $customerProfileId
   * @param int $customerPaymentProfileId
   * @access public
   */
  public function __construct($merchantAuthentication, $customerProfileId, $customerPaymentProfileId)
  {
    $this->merchantAuthentication = $merchantAuthentication;
    $this->customerProfileId = $customerProfileId;
    $this->customerPaymentProfileId = $customerPaymentProfileId;
  }

}
