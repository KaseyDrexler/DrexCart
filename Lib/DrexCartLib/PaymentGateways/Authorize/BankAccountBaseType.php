<?php


/**
 * 
 * @package apiClasses.apiObjects.bank
 */
class BankAccountBaseType
{

  /**
   * 
   * @var BankAccountTypeEnum $accountType
   * @access public
   */
  public $accountType = null;

  /**
   * 
   * @var string $nameOnAccount
   * @access public
   */
  public $nameOnAccount = null;

  /**
   * 
   * @var EcheckTypeEnum $echeckType
   * @access public
   */
  public $echeckType = null;

  /**
   * 
   * @var string $bankName
   * @access public
   */
  public $bankName = null;

  /**
   * 
   * @param BankAccountTypeEnum $accountType
   * @param string $nameOnAccount
   * @param EcheckTypeEnum $echeckType
   * @param string $bankName
   * @access public
   */
  public function __construct($accountType, $nameOnAccount, $echeckType, $bankName)
  {
    $this->accountType = $accountType;
    $this->nameOnAccount = $nameOnAccount;
    $this->echeckType = $echeckType;
    $this->bankName = $bankName;
  }

}
