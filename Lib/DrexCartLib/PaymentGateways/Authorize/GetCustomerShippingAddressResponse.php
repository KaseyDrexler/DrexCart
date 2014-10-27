<?php


/**
 * 
 * @package apiClasses.apiObjects.get
 */
class GetCustomerShippingAddressResponse
{

  /**
   * 
   * @var GetCustomerShippingAddressResponseType $GetCustomerShippingAddressResult
   * @access public
   */
  public $GetCustomerShippingAddressResult = null;

  /**
   * 
   * @param GetCustomerShippingAddressResponseType $GetCustomerShippingAddressResult
   * @access public
   */
  public function __construct($GetCustomerShippingAddressResult)
  {
    $this->GetCustomerShippingAddressResult = $GetCustomerShippingAddressResult;
  }

}
