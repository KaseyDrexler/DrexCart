<?php


/**
 * 
 * @package apiClasses.apiObjects.get
 */
class GetTransactionDetailsResponse
{

  /**
   * 
   * @var GetTransactionDetailsResponseType $GetTransactionDetailsResult
   * @access public
   */
  public $GetTransactionDetailsResult = null;

  /**
   * 
   * @param GetTransactionDetailsResponseType $GetTransactionDetailsResult
   * @access public
   */
  public function __construct($GetTransactionDetailsResult)
  {
    $this->GetTransactionDetailsResult = $GetTransactionDetailsResult;
  }

}
