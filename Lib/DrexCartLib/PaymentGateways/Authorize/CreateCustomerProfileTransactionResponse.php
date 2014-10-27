<?php


/**
 * 
 * @package apiClasses.apiObjects.create
 */
class CreateCustomerProfileTransactionResponse
{

  /**
   * 
   * @var CreateCustomerProfileTransactionResponseType $CreateCustomerProfileTransactionResult
   * @access public
   */
  public $CreateCustomerProfileTransactionResult = null;

  /**
   * 
   * @param CreateCustomerProfileTransactionResponseType $CreateCustomerProfileTransactionResult
   * @access public
   */
  public function __construct($CreateCustomerProfileTransactionResult)
  {
    $this->CreateCustomerProfileTransactionResult = $CreateCustomerProfileTransactionResult;
  }

}
