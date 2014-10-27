<?php


/**
 * 
 * @package apiClasses.apiObjects.update
 */
class UpdateCustomerPaymentProfile
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
   * @var CustomerPaymentProfileExType $paymentProfile
   * @access public
   */
  public $paymentProfile = null;

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
   * @param CustomerPaymentProfileExType $paymentProfile
   * @param ValidationModeEnum $validationMode
   * @access public
   */
  public function __construct($merchantAuthentication, $customerProfileId, $paymentProfile, $validationMode)
  {
    $this->merchantAuthentication = $merchantAuthentication;
    $this->customerProfileId = $customerProfileId;
    $this->paymentProfile = $paymentProfile;
    $this->validationMode = $validationMode;
  }

}
