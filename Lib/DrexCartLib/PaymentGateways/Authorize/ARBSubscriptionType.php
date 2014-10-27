<?php


/**
 * 
 * @package apiClasses.apiObjects.a
 */
class ARBSubscriptionType
{

  /**
   * 
   * @var string $name
   * @access public
   */
  public $name = null;

  /**
   * 
   * @var PaymentScheduleType $paymentSchedule
   * @access public
   */
  public $paymentSchedule = null;

  /**
   * 
   * @var float $amount
   * @access public
   */
  public $amount = null;

  /**
   * 
   * @var float $trialAmount
   * @access public
   */
  public $trialAmount = null;

  /**
   * 
   * @var PaymentType $payment
   * @access public
   */
  public $payment = null;

  /**
   * 
   * @var OrderType $order
   * @access public
   */
  public $order = null;

  /**
   * 
   * @var CustomerType $customer
   * @access public
   */
  public $customer = null;

  /**
   * 
   * @var NameAndAddressType $billTo
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
   * @param string $name
   * @param PaymentScheduleType $paymentSchedule
   * @param float $amount
   * @param float $trialAmount
   * @param PaymentType $payment
   * @param OrderType $order
   * @param CustomerType $customer
   * @param NameAndAddressType $billTo
   * @param NameAndAddressType $shipTo
   * @access public
   */
  public function __construct($name, $paymentSchedule, $amount, $trialAmount, $payment, $order, $customer, $billTo, $shipTo)
  {
    $this->name = $name;
    $this->paymentSchedule = $paymentSchedule;
    $this->amount = $amount;
    $this->trialAmount = $trialAmount;
    $this->payment = $payment;
    $this->order = $order;
    $this->customer = $customer;
    $this->billTo = $billTo;
    $this->shipTo = $shipTo;
  }

}
