<?php


/**
 * 
 * @package apiClasses.apiObjects.get
 */
class GetBatchStatisticsResponse
{

  /**
   * 
   * @var GetBatchStatisticsResponseType $GetBatchStatisticsResult
   * @access public
   */
  public $GetBatchStatisticsResult = null;

  /**
   * 
   * @param GetBatchStatisticsResponseType $GetBatchStatisticsResult
   * @access public
   */
  public function __construct($GetBatchStatisticsResult)
  {
    $this->GetBatchStatisticsResult = $GetBatchStatisticsResult;
  }

}
