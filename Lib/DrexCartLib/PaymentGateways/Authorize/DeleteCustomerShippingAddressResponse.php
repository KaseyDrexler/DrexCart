<?php


/**
 * 
 * @package apiClasses.apiObjects.delete
 */
class DeleteCustomerShippingAddressResponse
{

  /**
   * 
   * @var DeleteCustomerShippingAddressResponseType $DeleteCustomerShippingAddressResult
   * @access public
   */
  public $DeleteCustomerShippingAddressResult = null;

  /**
   * 
   * @param DeleteCustomerShippingAddressResponseType $DeleteCustomerShippingAddressResult
   * @access public
   */
  public function __construct($DeleteCustomerShippingAddressResult)
  {
    $this->DeleteCustomerShippingAddressResult = $DeleteCustomerShippingAddressResult;
  }

}
