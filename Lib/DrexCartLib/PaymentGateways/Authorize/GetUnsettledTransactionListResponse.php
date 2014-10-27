<?php


/**
 * 
 * @package apiClasses.apiObjects.get
 */
class GetUnsettledTransactionListResponse
{

  /**
   * 
   * @var GetUnsettledTransactionListResponseType $GetUnsettledTransactionListResult
   * @access public
   */
  public $GetUnsettledTransactionListResult = null;

  /**
   * 
   * @param GetUnsettledTransactionListResponseType $GetUnsettledTransactionListResult
   * @access public
   */
  public function __construct($GetUnsettledTransactionListResult)
  {
    $this->GetUnsettledTransactionListResult = $GetUnsettledTransactionListResult;
  }

}
