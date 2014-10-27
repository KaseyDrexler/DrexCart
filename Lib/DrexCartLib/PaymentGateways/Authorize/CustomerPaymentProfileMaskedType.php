<?php


/**
 * 
 * @package apiClasses.apiObjects.customer
 */
class CustomerPaymentProfileMaskedType
{

  /**
   * 
   * @var int $customerPaymentProfileId
   * @access public
   */
  public $customerPaymentProfileId = null;

  /**
   * 
   * @var PaymentMaskedType $payment
   * @access public
   */
  public $payment = null;

  /**
   * 
   * @var DriversLicenseMaskedType $driversLicense
   * @access public
   */
  public $driversLicense = null;

  /**
   * 
   * @var string $taxId
   * @access public
   */
  public $taxId = null;

  /**
   * 
   * @param int $customerPaymentProfileId
   * @param PaymentMaskedType $payment
   * @param DriversLicenseMaskedType $driversLicense
   * @param string $taxId
   * @access public
   */
  public function __construct($customerPaymentProfileId, $payment, $driversLicense, $taxId)
  {
    $this->customerPaymentProfileId = $customerPaymentProfileId;
    $this->payment = $payment;
    $this->driversLicense = $driversLicense;
    $this->taxId = $taxId;
  }

}
