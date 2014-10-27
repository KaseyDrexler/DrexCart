<?php


/**
 * 
 * @package apiClasses.apiObjects.update
 */
class UpdateCustomerShippingAddress
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
   * @var CustomerAddressExType $address
   * @access public
   */
  public $address = null;

  /**
   * 
   * @param MerchantAuthenticationType $merchantAuthentication
   * @param int $customerProfileId
   * @param CustomerAddressExType $address
   * @access public
   */
  public function __construct($merchantAuthentication, $customerProfileId, $address)
  {
    $this->merchantAuthentication = $merchantAuthentication;
    $this->customerProfileId = $customerProfileId;
    $this->address = $address;
  }

}
