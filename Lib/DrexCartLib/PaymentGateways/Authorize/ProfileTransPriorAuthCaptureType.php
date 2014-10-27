<?php


/**
 * 
 * @package apiClasses.apiObjects.profile
 */
class ProfileTransPriorAuthCaptureType
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
   * @var string $transId
   * @access public
   */
  public $transId = null;

  /**
   * 
   * @param int $customerProfileId
   * @param int $customerPaymentProfileId
   * @param int $customerShippingAddressId
   * @param string $transId
   * @access public
   */
  public function __construct($customerProfileId, $customerPaymentProfileId, $customerShippingAddressId, $transId)
  {
    $this->customerProfileId = $customerProfileId;
    $this->customerPaymentProfileId = $customerPaymentProfileId;
    $this->customerShippingAddressId = $customerShippingAddressId;
    $this->transId = $transId;
  }

}
