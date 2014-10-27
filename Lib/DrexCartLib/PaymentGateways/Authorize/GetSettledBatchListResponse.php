<?php


/**
 * 
 * @package apiClasses.apiObjects.get
 */
class GetSettledBatchListResponse
{

  /**
   * 
   * @var GetSettledBatchListResponseType $GetSettledBatchListResult
   * @access public
   */
  public $GetSettledBatchListResult = null;

  /**
   * 
   * @param GetSettledBatchListResponseType $GetSettledBatchListResult
   * @access public
   */
  public function __construct($GetSettledBatchListResult)
  {
    $this->GetSettledBatchListResult = $GetSettledBatchListResult;
  }

}
