<?php


/**
 * 
 * @package apiClasses.apiObjects.get
 */
class GetSettledBatchListResponseType
{

  /**
   * 
   * @var BatchDetailsType[] $batchList
   * @access public
   */
  public $batchList = null;

  /**
   * 
   * @param BatchDetailsType[] $batchList
   * @access public
   */
  public function __construct($batchList)
  {
    $this->batchList = $batchList;
  }

}
