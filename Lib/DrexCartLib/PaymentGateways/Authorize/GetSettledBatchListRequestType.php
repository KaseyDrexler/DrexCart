<?php


/**
 * 
 * @package apiClasses.apiObjects.get
 */
class GetSettledBatchListRequestType
{

  /**
   * 
   * @var boolean $includeStatistics
   * @access public
   */
  public $includeStatistics = null;

  /**
   * 
   * @var dateTime $firstSettlementDate
   * @access public
   */
  public $firstSettlementDate = null;

  /**
   * 
   * @var dateTime $lastSettlementDate
   * @access public
   */
  public $lastSettlementDate = null;

  /**
   * 
   * @param boolean $includeStatistics
   * @param dateTime $firstSettlementDate
   * @param dateTime $lastSettlementDate
   * @access public
   */
  public function __construct($includeStatistics, $firstSettlementDate, $lastSettlementDate)
  {
    $this->includeStatistics = $includeStatistics;
    $this->firstSettlementDate = $firstSettlementDate;
    $this->lastSettlementDate = $lastSettlementDate;
  }

}
