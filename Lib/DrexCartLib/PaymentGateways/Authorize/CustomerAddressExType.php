<?php


/**
 * 
 * @package apiClasses.apiObjects.customer
 */
class CustomerAddressExType
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
