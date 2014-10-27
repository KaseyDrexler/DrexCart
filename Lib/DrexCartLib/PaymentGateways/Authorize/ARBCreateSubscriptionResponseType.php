<?php


/**
 * 
 * @package apiClasses.apiObjects.a
 */
class ARBCreateSubscriptionResponseType
{

  /**
   * 
   * @var int $subscriptionId
   * @access public
   */
  public $subscriptionId = null;

  /**
   * 
   * @param int $subscriptionId
   * @access public
   */
  public function __construct($subscriptionId)
  {
    $this->subscriptionId = $subscriptionId;
  }

}
