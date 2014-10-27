<?php


/**
 * 
 * @package apiClasses.apiObjects.customer
 */
class CustomerPaymentProfileBaseType
{

  /**
   * 
   * @var CustomerTypeEnum $customerType
   * @access public
   */
  public $customerType = null;

  /**
   * 
   * @var CustomerAddressType $billTo
   * @access public
   */
  public $billTo = null;

  /**
   * 
   * @param CustomerTypeEnum $customerType
   * @param CustomerAddressType $billTo
   * @access public
   */
  public function __construct($customerType, $billTo)
  {
    $this->customerType = $customerType;
    $this->billTo = $billTo;
  }

}
