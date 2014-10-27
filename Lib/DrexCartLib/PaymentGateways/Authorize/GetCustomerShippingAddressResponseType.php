<?php


/**
 * 
 * @package apiClasses.apiObjects.get
 */
class GetCustomerShippingAddressResponseType
{

  /**
   * 
   * @var CustomerAddressExType $address
   * @access public
   */
  public $address = null;

  /**
   * 
   * @param CustomerAddressExType $address
   * @access public
   */
  public function __construct($address)
  {
    $this->address = $address;
  }

}
