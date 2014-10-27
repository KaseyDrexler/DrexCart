<?php


/**
 * 
 * @package apiClasses.apiObjects.create
 */
class CreateCustomerShippingAddressResponse
{

  /**
   * 
   * @var CreateCustomerShippingAddressResponseType $CreateCustomerShippingAddressResult
   * @access public
   */
  public $CreateCustomerShippingAddressResult = null;

  /**
   * 
   * @param CreateCustomerShippingAddressResponseType $CreateCustomerShippingAddressResult
   * @access public
   */
  public function __construct($CreateCustomerShippingAddressResult)
  {
    $this->CreateCustomerShippingAddressResult = $CreateCustomerShippingAddressResult;
  }

}
