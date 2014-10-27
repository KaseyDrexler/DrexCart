<?php


/**
 * 
 * @package apiClasses.apiObjects.credit
 */
class CreditCardMaskedType
{

  /**
   * 
   * @var string $cardNumber
   * @access public
   */
  public $cardNumber = null;

  /**
   * 
   * @var string $expirationDate
   * @access public
   */
  public $expirationDate = null;

  /**
   * 
   * @var string $cardType
   * @access public
   */
  public $cardType = null;

  /**
   * 
   * @param string $cardNumber
   * @param string $expirationDate
   * @param string $cardType
   * @access public
   */
  public function __construct($cardNumber, $expirationDate, $cardType)
  {
    $this->cardNumber = $cardNumber;
    $this->expirationDate = $expirationDate;
    $this->cardType = $cardType;
  }

}
