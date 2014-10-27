<?php


/**
 * 
 * @package apiClasses.apiObjects.update
 */
class UpdateCustomerShippingAddressResponse
{

  /**
   * 
   * @var UpdateCustomerShippingAddressResponseType $UpdateCustomerShippingAddressResult
   * @access public
   */
  public $UpdateCustomerShippingAddressResult = null;

  /**
   * 
   * @param UpdateCustomerShippingAddressResponseType $UpdateCustomerShippingAddressResult
   * @access public
   */
  public function __construct($UpdateCustomerShippingAddressResult)
  {
    $this->UpdateCustomerShippingAddressResult = $UpdateCustomerShippingAddressResult;
  }

}
