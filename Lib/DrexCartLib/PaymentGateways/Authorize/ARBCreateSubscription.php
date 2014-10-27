<?php


/**
 * 
 * @package apiClasses.apiObjects.a
 */
class ARBCreateSubscription
{

  /**
   * 
   * @var MerchantAuthenticationType $merchantAuthentication
   * @access public
   */
  public $merchantAuthentication = null;

  /**
   * 
   * @var ARBSubscriptionType $subscription
   * @access public
   */
  public $subscription = null;

  /**
   * 
   * @param MerchantAuthenticationType $merchantAuthentication
   * @param ARBSubscriptionType $subscription
   * @access public
   */
  public function __construct($merchantAuthentication, $subscription)
  {
    $this->merchantAuthentication = $merchantAuthentication;
    $this->subscription = $subscription;
  }

}
