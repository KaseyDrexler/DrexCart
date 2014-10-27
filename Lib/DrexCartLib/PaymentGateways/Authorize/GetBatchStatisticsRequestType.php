<?php


/**
 * 
 * @package apiClasses.apiObjects.get
 */
class GetBatchStatisticsRequestType
{

  /**
   * 
   * @var string $batchId
   * @access public
   */
  public $batchId = null;

  /**
   * 
   * @param string $batchId
   * @access public
   */
  public function __construct($batchId)
  {
    $this->batchId = $batchId;
  }

}
