<?php


/**
 * 
 * @package apiClasses.apiObjects.payment
 */
class PaymentType
{

  /**
   * 
   * @var BankAccountType $bankAccount
   * @access public
   */
  public $bankAccount = null;

  /**
   * 
   * @var CreditCardType $creditCard
   * @access public
   */
  public $creditCard = null;

  /**
   * 
   * @param BankAccountType $bankAccount
   * @param CreditCardType $creditCard
   * @access public
   */
  public function __construct($bankAccount, $creditCard)
  {
    $this->bankAccount = $bankAccount;
    $this->creditCard = $creditCard;
  }

}
