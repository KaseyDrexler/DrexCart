<?php


/**
 * 
 * @package apiClasses.apiObjects.customer
 */
class CustomerPaymentProfileType
{

  /**
   * 
   * @var PaymentType $payment
   * @access public
   */
  public $payment = null;

  /**
   * 
   * @var DriversLicenseType $driversLicense
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
   * @param PaymentType $payment
   * @param DriversLicenseType $driversLicense
   * @param string $taxId
   * @access public
   */
  public function __construct($payment, $driversLicense, $taxId)
  {
    $this->payment = $payment;
    $this->driversLicense = $driversLicense;
    $this->taxId = $taxId;
  }

}
