<?php


/**
 * 
 * @package apiClasses.apiObjects.a
 */
class ARBGetSubscriptionListResponseType
{

  /**
   * 
   * @var int $totalNumInResultSet
   * @access public
   */
  public $totalNumInResultSet = null;

  /**
   * 
   * @var SubscriptionDetail[] $subscriptionDetails
   * @access public
   */
  public $subscriptionDetails = null;

  /**
   * 
   * @param int $totalNumInResultSet
   * @param SubscriptionDetail[] $subscriptionDetails
   * @access public
   */
  public function __construct($totalNumInResultSet, $subscriptionDetails)
  {
    $this->totalNumInResultSet = $totalNumInResultSet;
    $this->subscriptionDetails = $subscriptionDetails;
  }

}
