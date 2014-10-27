<?php


/**
 * 
 * @package apiClasses.apiObjects.profile
 */
class ProfileTransOrderType
{

  /**
   * 
   * @var int $customerProfileId
   * @access public
   */
  public $customerProfileId = null;

  /**
   * 
   * @var int $customerPaymentProfileId
   * @access public
   */
  public $customerPaymentProfileId = null;

  /**
   * 
   * @var int $customerShippingAddressId
   * @access public
   */
  public $customerShippingAddressId = null;

  /**
   * 
   * @var OrderExType $order
   * @access public
   */
  public $order = null;

  /**
   * 
   * @var boolean $taxExempt
   * @access public
   */
  public $taxExempt = null;

  /**
   * 
   * @var boolean $recurringBilling
   * @access public
   */
  public $recurringBilling = null;

  /**
   * 
   * @var string $cardCode
   * @access public
   */
  public $cardCode = null;

  /**
   * 
   * @var int $splitTenderId
   * @access public
   */
  public $splitTenderId = null;

  /**
   * 
   * @param int $customerProfileId
   * @param int $customerPaymentProfileId
   * @param int $customerShippingAddressId
   * @param OrderExType $order
   * @param boolean $taxExempt
   * @param boolean $recurringBilling
   * @param string $cardCode
   * @param int $splitTenderId
   * @access public
   */
  public function __construct($customerProfileId, $customerPaymentProfileId, $customerShippingAddressId, $order, $taxExempt, $recurringBilling, $cardCode, $splitTenderId)
  {
    $this->customerProfileId = $customerProfileId;
    $this->customerPaymentProfileId = $customerPaymentProfileId;
    $this->customerShippingAddressId = $customerShippingAddressId;
    $this->order = $order;
    $this->taxExempt = $taxExempt;
    $this->recurringBilling = $recurringBilling;
    $this->cardCode = $cardCode;
    $this->splitTenderId = $splitTenderId;
  }

}
