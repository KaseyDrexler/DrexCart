<?php


/**
 * 
 * @package apiClasses.apiObjects.a
 */
class ARBGetSubscriptionStatus
{

  /**
   * 
   * @var MerchantAuthenticationType $merchantAuthentication
   * @access public
   */
  public $merchantAuthentication = null;

  /**
   * 
   * @var int $subscriptionId
   * @access public
   */
  public $subscriptionId = null;

  /**
   * 
   * @param MerchantAuthenticationType $merchantAuthentication
   * @param int $subscriptionId
   * @access public
   */
  public function __construct($merchantAuthentication, $subscriptionId)
  {
    $this->merchantAuthentication = $merchantAuthentication;
    $this->subscriptionId = $subscriptionId;
  }

}
