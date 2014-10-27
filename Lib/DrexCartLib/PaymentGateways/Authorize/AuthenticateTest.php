<?php


/**
 * 
 * @package apiClasses.apiObjects.authenticate
 */
class AuthenticateTest
{

  /**
   * 
   * @var MerchantAuthenticationType $merchantAuthentication
   * @access public
   */
  public $merchantAuthentication = null;

  /**
   * 
   * @param MerchantAuthenticationType $merchantAuthentication
   * @access public
   */
  public function __construct($merchantAuthentication)
  {
    $this->merchantAuthentication = $merchantAuthentication;
  }

}
