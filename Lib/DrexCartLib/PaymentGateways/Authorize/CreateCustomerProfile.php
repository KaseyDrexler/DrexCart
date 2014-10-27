<?php


/**
 * 
 * @package apiClasses.apiObjects.create
 */
class CreateCustomerProfile
{

  /**
   * 
   * @var MerchantAuthenticationType $merchantAuthentication
   * @access public
   */
  public $merchantAuthentication = null;

  /**
   * 
   * @var CustomerProfileType $profile
   * @access public
   */
  public $profile = null;

  /**
   * 
   * @var ValidationModeEnum $validationMode
   * @access public
   */
  public $validationMode = null;

  /**
   * 
   * @param MerchantAuthenticationType $merchantAuthentication
   * @param CustomerProfileType $profile
   * @param ValidationModeEnum $validationMode
   * @access public
   */
  public function __construct($merchantAuthentication, $profile, $validationMode)
  {
    $this->merchantAuthentication = $merchantAuthentication;
    $this->profile = $profile;
    $this->validationMode = $validationMode;
  }

}
