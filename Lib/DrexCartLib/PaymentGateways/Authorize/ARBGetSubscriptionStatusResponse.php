<?php


/**
 * 
 * @package apiClasses.apiObjects.a
 */
class ARBGetSubscriptionStatusResponse
{

  /**
   * 
   * @var ARBGetSubscriptionStatusResponseType $ARBGetSubscriptionStatusResult
   * @access public
   */
  public $ARBGetSubscriptionStatusResult = null;

  /**
   * 
   * @param ARBGetSubscriptionStatusResponseType $ARBGetSubscriptionStatusResult
   * @access public
   */
  public function __construct($ARBGetSubscriptionStatusResult)
  {
    $this->ARBGetSubscriptionStatusResult = $ARBGetSubscriptionStatusResult;
  }

}
