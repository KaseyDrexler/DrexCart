<?php


/**
 * 
 * @package apiClasses.apiObjects.a
 */
class ARBUpdateSubscriptionResponse
{

  /**
   * 
   * @var ARBUpdateSubscriptionResponseType $ARBUpdateSubscriptionResult
   * @access public
   */
  public $ARBUpdateSubscriptionResult = null;

  /**
   * 
   * @param ARBUpdateSubscriptionResponseType $ARBUpdateSubscriptionResult
   * @access public
   */
  public function __construct($ARBUpdateSubscriptionResult)
  {
    $this->ARBUpdateSubscriptionResult = $ARBUpdateSubscriptionResult;
  }

}
