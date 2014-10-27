<?php


/**
 * 
 * @package apiClasses.apiObjects.get
 */
class GetBatchStatisticsResponseType
{

  /**
   * 
   * @var BatchDetailsType $batch
   * @access public
   */
  public $batch = null;

  /**
   * 
   * @param BatchDetailsType $batch
   * @access public
   */
  public function __construct($batch)
  {
    $this->batch = $batch;
  }

}
