<?php


/**
 * 
 * @package apiClasses.apiObjects.validate
 */
class ValidateCustomerPaymentProfile
{

  /**
   * 
   * @var MerchantAuthenticationType $merchantAuthentication
   * @access public
   */
  public $merchantAuthentication = null;

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
   * @var string $cardCode
   * @access public
   */
  public $cardCode = null;

  /**
   * 
   * @var ValidationModeEnum $validationMode
   * @access public
   */
  public $validationMode = null;

  /**
   * 
   * @param MerchantAuthenticationType $merchantAuthentication
   * @param int $customerProfileId
   * @param int $customerPaymentProfileId
   * @param int $customerShippingAddressId
   * @param string $cardCode
   * @param ValidationModeEnum $validationMode
   * @access public
   */
  public function __construct($merchantAuthentication, $customerProfileId, $customerPaymentProfileId, $customerShippingAddressId, $cardCode, $validationMode)
  {
    $this->merchantAuthentication = $merchantAuthentication;
    $this->customerProfileId = $customerProfileId;
    $this->customerPaymentProfileId = $customerPaymentProfileId;
    $this->customerShippingAddressId = $customerShippingAddressId;
    $this->cardCode = $cardCode;
    $this->validationMode = $validationMode;
  }

}
