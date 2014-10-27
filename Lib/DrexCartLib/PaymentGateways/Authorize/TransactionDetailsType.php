<?php


/**
 * 
 * @package apiClasses.apiObjects.transaction
 */
class TransactionDetailsType
{

  /**
   * 
   * @var string $transId
   * @access public
   */
  public $transId = null;

  /**
   * 
   * @var string $refTransId
   * @access public
   */
  public $refTransId = null;

  /**
   * 
   * @var int $splitTenderId
   * @access public
   */
  public $splitTenderId = null;

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
   * @var string $transactionType
   * @access public
   */
  public $transactionType = null;

  /**
   * 
   * @var string $transactionStatus
   * @access public
   */
  public $transactionStatus = null;

  /**
   * 
   * @var int $responseCode
   * @access public
   */
  public $responseCode = null;

  /**
   * 
   * @var int $responseReasonCode
   * @access public
   */
  public $responseReasonCode = null;

  /**
   * 
   * @var string $responseReasonDescription
   * @access public
   */
  public $responseReasonDescription = null;

  /**
   * 
   * @var string $authCode
   * @access public
   */
  public $authCode = null;

  /**
   * 
   * @var string $AVSResponse
   * @access public
   */
  public $AVSResponse = null;

  /**
   * 
   * @var string $cardCodeResponse
   * @access public
   */
  public $cardCodeResponse = null;

  /**
   * 
   * @var string $CAVVResponse
   * @access public
   */
  public $CAVVResponse = null;

  /**
   * 
   * @var string $FDSFilterAction
   * @access public
   */
  public $FDSFilterAction = null;

  /**
   * 
   * @var FDSFilterType[] $FDSFilters
   * @access public
   */
  public $FDSFilters = null;

  /**
   * 
   * @var BatchDetailsType $batch
   * @access public
   */
  public $batch = null;

  /**
   * 
   * @var OrderExType $order
   * @access public
   */
  public $order = null;

  /**
   * 
   * @var float $requestedAmount
   * @access public
   */
  public $requestedAmount = null;

  /**
   * 
   * @var float $authAmount
   * @access public
   */
  public $authAmount = null;

  /**
   * 
   * @var float $settleAmount
   * @access public
   */
  public $settleAmount = null;

  /**
   * 
   * @var ExtendedAmountType $tax
   * @access public
   */
  public $tax = null;

  /**
   * 
   * @var ExtendedAmountType $shipping
   * @access public
   */
  public $shipping = null;

  /**
   * 
   * @var ExtendedAmountType $duty
   * @access public
   */
  public $duty = null;

  /**
   * 
   * @var LineItemType[] $lineItems
   * @access public
   */
  public $lineItems = null;

  /**
   * 
   * @var float $prepaidBalanceRemaining
   * @access public
   */
  public $prepaidBalanceRemaining = null;

  /**
   * 
   * @var string $currencyCode
   * @access public
   */
  public $currencyCode = null;

  /**
   * 
   * @var boolean $taxExempt
   * @access public
   */
  public $taxExempt = null;

  /**
   * 
   * @var PaymentMaskedType $payment
   * @access public
   */
  public $payment = null;

  /**
   * 
   * @var CustomerDataType $customer
   * @access public
   */
  public $customer = null;

  /**
   * 
   * @var CustomerAddressType $billTo
   * @access public
   */
  public $billTo = null;

  /**
   * 
   * @var NameAndAddressType $shipTo
   * @access public
   */
  public $shipTo = null;

  /**
   * 
   * @var boolean $recurringBilling
   * @access public
   */
  public $recurringBilling = null;

  /**
   * 
   * @var string $customerIP
   * @access public
   */
  public $customerIP = null;

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
   * @var ReturnedItem[] $returnedItems
   * @access public
   */
  public $returnedItems = null;

  /**
   * 
   * @var solutionInfo $solution
   * @access public
   */
  public $solution = null;

  /**
   * 
   * @param string $transId
   * @param string $refTransId
   * @param int $splitTenderId
   * @param dateTime $submitTimeUTC
   * @param dateTime $submitTimeLocal
   * @param string $transactionType
   * @param string $transactionStatus
   * @param int $responseCode
   * @param int $responseReasonCode
   * @param string $responseReasonDescription
   * @param string $authCode
   * @param string $AVSResponse
   * @param string $cardCodeResponse
   * @param string $CAVVResponse
   * @param string $FDSFilterAction
   * @param FDSFilterType[] $FDSFilters
   * @param BatchDetailsType $batch
   * @param OrderExType $order
   * @param float $requestedAmount
   * @param float $authAmount
   * @param float $settleAmount
   * @param ExtendedAmountType $tax
   * @param ExtendedAmountType $shipping
   * @param ExtendedAmountType $duty
   * @param LineItemType[] $lineItems
   * @param float $prepaidBalanceRemaining
   * @param string $currencyCode
   * @param boolean $taxExempt
   * @param PaymentMaskedType $payment
   * @param CustomerDataType $customer
   * @param CustomerAddressType $billTo
   * @param NameAndAddressType $shipTo
   * @param boolean $recurringBilling
   * @param string $customerIP
   * @param string $marketType
   * @param string $product
   * @param string $mobileDeviceId
   * @param subscriptionPaymentType $subscription
   * @param ReturnedItem[] $returnedItems
   * @param solutionInfo $solution
   * @access public
   */
  public function __construct($transId, $refTransId, $splitTenderId, $submitTimeUTC, $submitTimeLocal, $transactionType, $transactionStatus, $responseCode, $responseReasonCode, $responseReasonDescription, $authCode, $AVSResponse, $cardCodeResponse, $CAVVResponse, $FDSFilterAction, $FDSFilters, $batch, $order, $requestedAmount, $authAmount, $settleAmount, $tax, $shipping, $duty, $lineItems, $prepaidBalanceRemaining, $currencyCode, $taxExempt, $payment, $customer, $billTo, $shipTo, $recurringBilling, $customerIP, $marketType, $product, $mobileDeviceId, $subscription, $returnedItems, $solution)
  {
    $this->transId = $transId;
    $this->refTransId = $refTransId;
    $this->splitTenderId = $splitTenderId;
    $this->submitTimeUTC = $submitTimeUTC;
    $this->submitTimeLocal = $submitTimeLocal;
    $this->transactionType = $transactionType;
    $this->transactionStatus = $transactionStatus;
    $this->responseCode = $responseCode;
    $this->responseReasonCode = $responseReasonCode;
    $this->responseReasonDescription = $responseReasonDescription;
    $this->authCode = $authCode;
    $this->AVSResponse = $AVSResponse;
    $this->cardCodeResponse = $cardCodeResponse;
    $this->CAVVResponse = $CAVVResponse;
    $this->FDSFilterAction = $FDSFilterAction;
    $this->FDSFilters = $FDSFilters;
    $this->batch = $batch;
    $this->order = $order;
    $this->requestedAmount = $requestedAmount;
    $this->authAmount = $authAmount;
    $this->settleAmount = $settleAmount;
    $this->tax = $tax;
    $this->shipping = $shipping;
    $this->duty = $duty;
    $this->lineItems = $lineItems;
    $this->prepaidBalanceRemaining = $prepaidBalanceRemaining;
    $this->currencyCode = $currencyCode;
    $this->taxExempt = $taxExempt;
    $this->payment = $payment;
    $this->customer = $customer;
    $this->billTo = $billTo;
    $this->shipTo = $shipTo;
    $this->recurringBilling = $recurringBilling;
    $this->customerIP = $customerIP;
    $this->marketType = $marketType;
    $this->product = $product;
    $this->mobileDeviceId = $mobileDeviceId;
    $this->subscription = $subscription;
    $this->returnedItems = $returnedItems;
    $this->solution = $solution;
  }

}
