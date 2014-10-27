<?php


/**
 * 
 * @package apiClasses.apiObjects.payment
 */
class PaymentScheduleType
{

  /**
   * 
   * @var PaymentScheduleTypeInterval $interval
   * @access public
   */
  public $interval = null;

  /**
   * 
   * @var date $startDate
   * @access public
   */
  public $startDate = null;

  /**
   * 
   * @var int $totalOccurrences
   * @access public
   */
  public $totalOccurrences = null;

  /**
   * 
   * @var int $trialOccurrences
   * @access public
   */
  public $trialOccurrences = null;

  /**
   * 
   * @param PaymentScheduleTypeInterval $interval
   * @param date $startDate
   * @param int $totalOccurrences
   * @param int $trialOccurrences
   * @access public
   */
  public function __construct($interval, $startDate, $totalOccurrences, $trialOccurrences)
  {
    $this->interval = $interval;
    $this->startDate = $startDate;
    $this->totalOccurrences = $totalOccurrences;
    $this->trialOccurrences = $trialOccurrences;
  }

}
