<?php


/**
 * 
 * @package apiClasses.apiObjects.get
 */
class GetCustomerShippingAddress
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
   * @var int $customerAddressId
   * @access public
   */
  public $customerAddressId = null;

  /**
   * 
   * @param MerchantAuthenticationType $merchantAuthentication
   * @param int $customerProfileId
   * @param int $customerAddressId
   * @access public
   */
  public function __construct($merchantAuthentication, $customerProfileId, $customerAddressId)
  {
    $this->merchantAuthentication = $merchantAuthentication;
    $this->customerProfileId = $customerProfileId;
    $this->customerAddressId = $customerAddressId;
  }

}
