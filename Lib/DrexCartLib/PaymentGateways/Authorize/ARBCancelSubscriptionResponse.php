<?php


/**
 * 
 * @package apiClasses.apiObjects.a
 */
class ARBCancelSubscriptionResponse
{

  /**
   * 
   * @var ARBCancelSubscriptionResponseType $ARBCancelSubscriptionResult
   * @access public
   */
  public $ARBCancelSubscriptionResult = null;

  /**
   * 
   * @param ARBCancelSubscriptionResponseType $ARBCancelSubscriptionResult
   * @access public
   */
  public function __construct($ARBCancelSubscriptionResult)
  {
    $this->ARBCancelSubscriptionResult = $ARBCancelSubscriptionResult;
  }

}
