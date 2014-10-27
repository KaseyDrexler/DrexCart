<?php


/**
 * 
 * @package apiClasses.apiObjects.transaction
 */
class TransactionSummaryType
{

  /**
   * 
   * @var string $transId
   * @access public
   */
  public $transId = null;

  /**
   * 
   * @var dateTime $submitTimeUTC
   * @access public
   */
  public $submitTimeUTC = null;

  /**
   * 
   * @var dateTime $submitTimeLocal
   * @access public
   */
  public $submitTimeLocal = null;

  /**
   * 
   * @var string $transactionStatus
   * @access public
   */
  public $transactionStatus = null;

  /**
   * 
   * @var string $invoiceNumber
   * @access public
   */
  public $invoiceNumber = null;

  /**
   * 
   * @var string $firstName
   * @access public
   */
  public $firstName = null;

  /**
   * 
   * @var string $lastName
   * @access public
   */
  public $lastName = null;

  /**
   * 
   * @var string $accountType
   * @access public
   */
  public $accountType = null;

  /**
   * 
   * @var string $accountNumber
   * @access public
   */
  public $accountNumber = null;

  /**
   * 
   * @var float $settleAmount
   * @access public
   */
  public $settleAmount = null;

  /**
   * 
   * @var string $marketType
   * @access public
   */
  public $marketType = null;

  /**
   * 
   * @var string $product
   * @access public
   */
  public $product = null;

  /**
   * 
   * @var string $mobileDeviceId
   * @access public
   */
  public $mobileDeviceId = null;

  /**
   * 
   * @var subscriptionPaymentType $subscription
   * @access public
   */
  public $subscription = null;

  /**
   * 
   * @var boolean $hasReturnedItems
   * @access public
   */
  public $hasReturnedItems = null;

  /**
   * 
   * @param string $transId
   * @param dateTime $submitTimeUTC
   * @param dateTime $submitTimeLocal
   * @param string $transactionStatus
   * @param string $invoiceNumber
   * @param string $firstName
   * @param string $lastName
   * @param string $accountType
   * @param string $accountNumber
   * @param float $settleAmount
   * @param string $marketType
   * @param string $product
   * @param string $mobileDeviceId
   * @param subscriptionPaymentType $subscription
   * @param boolean $hasReturnedItems
   * @access public
   */
  public function __construct($transId, $submitTimeUTC, $submitTimeLocal, $transactionStatus, $invoiceNumber, $firstName, $lastName, $accountType, $accountNumber, $settleAmount, $marketType, $product, $mobileDeviceId, $subscription, $hasReturnedItems)
  {
    $this->transId = $transId;
    $this->submitTimeUTC = $submitTimeUTC;
    $this->submitTimeLocal = $submitTimeLocal;
    $this->transactionStatus = $transactionStatus;
    $this->invoiceNumber = $invoiceNumber;
    $this->firstName = $firstName;
    $this->lastName = $lastName;
    $this->accountType = $accountType;
    $this->accountNumber = $accountNumber;
    $this->settleAmount = $settleAmount;
    $this->marketType = $marketType;
    $this->product = $product;
    $this->mobileDeviceId = $mobileDeviceId;
    $this->subscription = $subscription;
    $this->hasReturnedItems = $hasReturnedItems;
  }

}
