<?php


/**
 * 
 * @package apiClasses.apiObjects.customer
 */
class CustomerProfileType
{

  /**
   * 
   * @var CustomerPaymentProfileType[] $paymentProfiles
   * @access public
   */
  public $paymentProfiles = null;

  /**
   * 
   * @var CustomerAddressType[] $shipToList
   * @access public
   */
  public $shipToList = null;

  /**
   * 
   * @param CustomerPaymentProfileType[] $paymentProfiles
   * @param CustomerAddressType[] $shipToList
   * @access public
   */
  public function __construct($paymentProfiles, $shipToList)
  {
    $this->paymentProfiles = $paymentProfiles;
    $this->shipToList = $shipToList;
  }

}
