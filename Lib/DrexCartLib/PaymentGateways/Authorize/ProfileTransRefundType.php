<?php


/**
 * 
 * @package apiClasses.apiObjects.profile
 */
class ProfileTransRefundType
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
   * @var string $creditCardNumberMasked
   * @access public
   */
  public $creditCardNumberMasked = null;

  /**
   * 
   * @var string $bankRoutingNumberMasked
   * @access public
   */
  public $bankRoutingNumberMasked = null;

  /**
   * 
   * @var string $bankAccountNumberMasked
   * @access public
   */
  public $bankAccountNumberMasked = null;

  /**
   * 
   * @var OrderExType $order
   * @access public
   */
  public $order = null;

  /**
   * 
   * @var string $transId
   * @access public
   */
  public $transId = null;

  /**
   * 
   * @param int $customerProfileId
   * @param int $customerPaymentProfileId
   * @param int $customerShippingAddressId
   * @param string $creditCardNumberMasked
   * @param string $bankRoutingNumberMasked
   * @param string $bankAccountNumberMasked
   * @param OrderExType $order
   * @param string $transId
   * @access public
   */
  public function __construct($customerProfileId, $customerPaymentProfileId, $customerShippingAddressId, $creditCardNumberMasked, $bankRoutingNumberMasked, $bankAccountNumberMasked, $order, $transId)
  {
    $this->customerProfileId = $customerProfileId;
    $this->customerPaymentProfileId = $customerPaymentProfileId;
    $this->customerShippingAddressId = $customerShippingAddressId;
    $this->creditCardNumberMasked = $creditCardNumberMasked;
    $this->bankRoutingNumberMasked = $bankRoutingNumberMasked;
    $this->bankAccountNumberMasked = $bankAccountNumberMasked;
    $this->order = $order;
    $this->transId = $transId;
  }

}
