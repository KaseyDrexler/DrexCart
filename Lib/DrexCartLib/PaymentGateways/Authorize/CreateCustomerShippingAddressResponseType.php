<?php


/**
 * 
 * @package apiClasses.apiObjects.create
 */
class CreateCustomerShippingAddressResponseType
{

  /**
   * 
   * @var int $customerAddressId
   * @access public
   */
  public $customerAddressId = null;

  /**
   * 
   * @param int $customerAddressId
   * @access public
   */
  public function __construct($customerAddressId)
  {
    $this->customerAddressId = $customerAddressId;
  }

}
