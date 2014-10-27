<?php


/**
 * 
 * @package apiClasses.apiObjects.update
 */
class UpdateCustomerProfile
{

  /**
   * 
   * @var MerchantAuthenticationType $merchantAuthentication
   * @access public
   */
  public $merchantAuthentication = null;

  /**
   * 
   * @var CustomerProfileExType $profile
   * @access public
   */
  public $profile = null;

  /**
   * 
   * @param MerchantAuthenticationType $merchantAuthentication
   * @param CustomerProfileExType $profile
   * @access public
   */
  public function __construct($merchantAuthentication, $profile)
  {
    $this->merchantAuthentication = $merchantAuthentication;
    $this->profile = $profile;
  }

}
