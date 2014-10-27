<?php


/**
 * 
 * @package apiClasses.apiObjects.get
 */
class GetCustomerPaymentProfileResponseType
{

  /**
   * 
   * @var CustomerPaymentProfileMaskedType $paymentProfile
   * @access public
   */
  public $paymentProfile = null;

  /**
   * 
   * @param CustomerPaymentProfileMaskedType $paymentProfile
   * @access public
   */
  public function __construct($paymentProfile)
  {
    $this->paymentProfile = $paymentProfile;
  }

}
