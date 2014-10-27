<?php


/**
 * 
 * @package apiClasses.apiObjects.subscription
 */
class SubscriptionDetail
{

  /**
   * 
   * @var int $id
   * @access public
   */
  public $id = null;

  /**
   * 
   * @var string $name
   * @access public
   */
  public $name = null;

  /**
   * 
   * @var ARBSubscriptionStatusEnum $status
   * @access public
   */
  public $status = null;

  /**
   * 
   * @var dateTime $createTimeStampUTC
   * @access public
   */
  public $createTimeStampUTC = null;

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
   * @var int $totalOccurrences
   * @access public
   */
  public $totalOccurrences = null;

  /**
   * 
   * @var int $pastOccurrences
   * @access public
   */
  public $pastOccurrences = null;

  /**
   * 
   * @var paymentMethodEnum $paymentMethod
   * @access public
   */
  public $paymentMethod = null;

  /**
   * 
   * @var string $accountNumber
   * @access public
   */
  public $accountNumber = null;

  /**
   * 
   * @var string $invoice
   * @access public
   */
  public $invoice = null;

  /**
   * 
   * @var float $amount
   * @access public
   */
  public $amount = null;

  /**
   * 
   * @var string $currencyCode
   * @access public
   */
  public $currencyCode = null;

  /**
   * 
   * @param int $id
   * @param string $name
   * @param ARBSubscriptionStatusEnum $status
   * @param dateTime $createTimeStampUTC
   * @param string $firstName
   * @param string $lastName
   * @param int $totalOccurrences
   * @param int $pastOccurrences
   * @param paymentMethodEnum $paymentMethod
   * @param string $accountNumber
   * @param string $invoice
   * @param float $amount
   * @param string $currencyCode
   * @access public
   */
  public function __construct($id, $name, $status, $createTimeStampUTC, $firstName, $lastName, $totalOccurrences, $pastOccurrences, $paymentMethod, $accountNumber, $invoice, $amount, $currencyCode)
  {
    $this->id = $id;
    $this->name = $name;
    $this->status = $status;
    $this->createTimeStampUTC = $createTimeStampUTC;
    $this->firstName = $firstName;
    $this->lastName = $lastName;
    $this->totalOccurrences = $totalOccurrences;
    $this->pastOccurrences = $pastOccurrences;
    $this->paymentMethod = $paymentMethod;
    $this->accountNumber = $accountNumber;
    $this->invoice = $invoice;
    $this->amount = $amount;
    $this->currencyCode = $currencyCode;
  }

}
