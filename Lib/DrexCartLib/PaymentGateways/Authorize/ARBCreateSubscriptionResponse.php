<?php


/**
 * 
 * @package apiClasses.apiObjects.a
 */
class ARBCreateSubscriptionResponse
{

  /**
   * 
   * @var ARBCreateSubscriptionResponseType $ARBCreateSubscriptionResult
   * @access public
   */
  public $ARBCreateSubscriptionResult = null;

  /**
   * 
   * @param ARBCreateSubscriptionResponseType $ARBCreateSubscriptionResult
   * @access public
   */
  public function __construct($ARBCreateSubscriptionResult)
  {
    $this->ARBCreateSubscriptionResult = $ARBCreateSubscriptionResult;
  }

}
