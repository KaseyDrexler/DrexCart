<?php


/**
 * 
 * @package apiClasses.apiObjects.payment
 */
class PaymentScheduleTypeInterval
{

  /**
   * 
   * @var int $length
   * @access public
   */
  public $length = null;

  /**
   * 
   * @var ARBSubscriptionUnitEnum $unit
   * @access public
   */
  public $unit = null;

  /**
   * 
   * @param int $length
   * @param ARBSubscriptionUnitEnum $unit
   * @access public
   */
  public function __construct($length, $unit)
  {
    $this->length = $length;
    $this->unit = $unit;
  }

}
