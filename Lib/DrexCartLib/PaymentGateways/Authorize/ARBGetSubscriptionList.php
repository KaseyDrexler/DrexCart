<?php


/**
 * 
 * @package apiClasses.apiObjects.a
 */
class ARBGetSubscriptionList
{

  /**
   * 
   * @var MerchantAuthenticationType $merchantAuthentication
   * @access public
   */
  public $merchantAuthentication = null;

  /**
   * 
   * @var ARBGetSubscriptionListRequestType $request
   * @access public
   */
  public $request = null;

  /**
   * 
   * @param MerchantAuthenticationType $merchantAuthentication
   * @param ARBGetSubscriptionListRequestType $request
   * @access public
   */
  public function __construct($merchantAuthentication, $request)
  {
    $this->merchantAuthentication = $merchantAuthentication;
    $this->request = $request;
  }

}
