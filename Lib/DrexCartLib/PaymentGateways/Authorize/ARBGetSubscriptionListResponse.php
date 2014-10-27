<?php


/**
 * 
 * @package apiClasses.apiObjects.a
 */
class ARBGetSubscriptionListResponse
{

  /**
   * 
   * @var ARBGetSubscriptionListResponseType $ARBGetSubscriptionListResult
   * @access public
   */
  public $ARBGetSubscriptionListResult = null;

  /**
   * 
   * @param ARBGetSubscriptionListResponseType $ARBGetSubscriptionListResult
   * @access public
   */
  public function __construct($ARBGetSubscriptionListResult)
  {
    $this->ARBGetSubscriptionListResult = $ARBGetSubscriptionListResult;
  }

}
