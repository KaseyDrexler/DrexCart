<?php


/**
 * 
 * @package apiClasses.apiObjects.payment
 */
class PaymentMaskedType
{

  /**
   * 
   * @var BankAccountMaskedType $bankAccount
   * @access public
   */
  public $bankAccount = null;

  /**
   * 
   * @var CreditCardMaskedType $creditCard
   * @access public
   */
  public $creditCard = null;

  /**
   * 
   * @var TokenMaskedType $tokenInformation
   * @access public
   */
  public $tokenInformation = null;

  /**
   * 
   * @param BankAccountMaskedType $bankAccount
   * @param CreditCardMaskedType $creditCard
   * @param TokenMaskedType $tokenInformation
   * @access public
   */
  public function __construct($bankAccount, $creditCard, $tokenInformation)
  {
    $this->bankAccount = $bankAccount;
    $this->creditCard = $creditCard;
    $this->tokenInformation = $tokenInformation;
  }

}
