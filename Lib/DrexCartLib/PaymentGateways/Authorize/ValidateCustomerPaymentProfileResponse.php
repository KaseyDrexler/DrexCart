<?php


/**
 * 
 * @package apiClasses.apiObjects.validate
 */
class ValidateCustomerPaymentProfileResponse
{

  /**
   * 
   * @var ValidateCustomerPaymentProfileResponseType $ValidateCustomerPaymentProfileResult
   * @access public
   */
  public $ValidateCustomerPaymentProfileResult = null;

  /**
   * 
   * @param ValidateCustomerPaymentProfileResponseType $ValidateCustomerPaymentProfileResult
   * @access public
   */
  public function __construct($ValidateCustomerPaymentProfileResult)
  {
    $this->ValidateCustomerPaymentProfileResult = $ValidateCustomerPaymentProfileResult;
  }

}
