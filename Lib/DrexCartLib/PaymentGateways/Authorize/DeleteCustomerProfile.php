<?php


/**
 * 
 * @package apiClasses.apiObjects.delete
 */
class DeleteCustomerProfile
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
   * @param MerchantAuthenticationType $merchantAuthentication
   * @param int $customerProfileId
   * @access public
   */
  public function __construct($merchantAuthentication, $customerProfileId)
  {
    $this->merchantAuthentication = $merchantAuthentication;
    $this->customerProfileId = $customerProfileId;
  }

}
