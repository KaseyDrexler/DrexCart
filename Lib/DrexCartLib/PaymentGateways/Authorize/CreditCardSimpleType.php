<?php


/**
 * 
 * @package apiClasses.apiObjects.credit
 */
class CreditCardSimpleType
{

  /**
   * 
   * @var string $cardNumber
   * @access public
   */
  public $cardNumber = null;

  /**
   * 
   * @var gYearMonth $expirationDate
   * @access public
   */
  public $expirationDate = null;

  /**
   * 
   * @param string $cardNumber
   * @param gYearMonth $expirationDate
   * @access public
   */
  public function __construct($cardNumber, $expirationDate)
  {
    $this->cardNumber = $cardNumber;
    $this->expirationDate = $expirationDate;
  }

}
