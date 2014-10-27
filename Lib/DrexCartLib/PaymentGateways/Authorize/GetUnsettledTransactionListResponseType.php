<?php


/**
 * 
 * @package apiClasses.apiObjects.get
 */
class GetUnsettledTransactionListResponseType
{

  /**
   * 
   * @var TransactionSummaryType[] $transactions
   * @access public
   */
  public $transactions = null;

  /**
   * 
   * @param TransactionSummaryType[] $transactions
   * @access public
   */
  public function __construct($transactions)
  {
    $this->transactions = $transactions;
  }

}
