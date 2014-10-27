<?php


/**
 * 
 * @package apiClasses.apiObjects.bank
 */
class BankAccountType
{

  /**
   * 
   * @var string $routingNumber
   * @access public
   */
  public $routingNumber = null;

  /**
   * 
   * @var string $accountNumber
   * @access public
   */
  public $accountNumber = null;

  /**
   * 
   * @param string $routingNumber
   * @param string $accountNumber
   * @access public
   */
  public function __construct($routingNumber, $accountNumber)
  {
    $this->routingNumber = $routingNumber;
    $this->accountNumber = $accountNumber;
  }

}
