<?php


/**
 * 
 * @package apiClasses.apiObjects.a
 */
class ARBGetSubscriptionStatusResponseType
{

  /**
   * 
   * @var ARBSubscriptionStatusEnum $status
   * @access public
   */
  public $status = null;

  /**
   * 
   * @param ARBSubscriptionStatusEnum $status
   * @access public
   */
  public function __construct($status)
  {
    $this->status = $status;
  }

}
