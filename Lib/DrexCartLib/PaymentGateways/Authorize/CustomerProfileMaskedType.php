<?php


/**
 * 
 * @package apiClasses.apiObjects.customer
 */
class CustomerProfileMaskedType
{

  /**
   * 
   * @var CustomerPaymentProfileMaskedType[] $paymentProfiles
   * @access public
   */
  public $paymentProfiles = null;

  /**
   * 
   * @var CustomerAddressExType[] $shipToList
   * @access public
   */
  public $shipToList = null;

  /**
   * 
   * @param CustomerPaymentProfileMaskedType[] $paymentProfiles
   * @param CustomerAddressExType[] $shipToList
   * @access public
   */
  public function __construct($paymentProfiles, $shipToList)
  {
    $this->paymentProfiles = $paymentProfiles;
    $this->shipToList = $shipToList;
  }

}
