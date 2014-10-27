<?php


/**
 * 
 * @package apiClasses.apiObjects.get
 */
class GetTransactionDetailsResponseType
{

  /**
   * 
   * @var TransactionDetailsType $transaction
   * @access public
   */
  public $transaction = null;

  /**
   * 
   * @param TransactionDetailsType $transaction
   * @access public
   */
  public function __construct($transaction)
  {
    $this->transaction = $transaction;
  }

}
