<?php


/**
 * 
 * @package apiClasses.apiObjects.a
 */
class ARBUpdateSubscription
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
   * @var ARBSubscriptionType $subscription
   * @access public
   */
  public $subscription = null;

  /**
   * 
   * @param MerchantAuthenticationType $merchantAuthentication
   * @param int $subscriptionId
   * @param ARBSubscriptionType $subscription
   * @access public
   */
  public function __construct($merchantAuthentication, $subscriptionId, $subscription)
  {
    $this->merchantAuthentication = $merchantAuthentication;
    $this->subscriptionId = $subscriptionId;
    $this->subscription = $subscription;
  }

}
