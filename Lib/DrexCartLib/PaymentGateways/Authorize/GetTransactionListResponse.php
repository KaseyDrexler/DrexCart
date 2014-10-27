<?php


/**
 * 
 * @package apiClasses.apiObjects.get
 */
class GetTransactionListResponse
{

  /**
   * 
   * @var GetTransactionListResponseType $GetTransactionListResult
   * @access public
   */
  public $GetTransactionListResult = null;

  /**
   * 
   * @param GetTransactionListResponseType $GetTransactionListResult
   * @access public
   */
  public function __construct($GetTransactionListResult)
  {
    $this->GetTransactionListResult = $GetTransactionListResult;
  }

}
