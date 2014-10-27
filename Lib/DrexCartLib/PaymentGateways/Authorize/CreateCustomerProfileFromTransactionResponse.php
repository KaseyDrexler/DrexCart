<?php


/**
 * 
 * @package apiClasses.apiObjects.create
 */
class CreateCustomerProfileFromTransactionResponse
{

  /**
   * 
   * @var CreateCustomerProfileResponseType $CreateCustomerProfileFromTransactionResult
   * @access public
   */
  public $CreateCustomerProfileFromTransactionResult = null;

  /**
   * 
   * @param CreateCustomerProfileResponseType $CreateCustomerProfileFromTransactionResult
   * @access public
   */
  public function __construct($CreateCustomerProfileFromTransactionResult)
  {
    $this->CreateCustomerProfileFromTransactionResult = $CreateCustomerProfileFromTransactionResult;
  }

}
