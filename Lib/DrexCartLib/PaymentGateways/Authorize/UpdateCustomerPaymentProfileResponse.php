<?php


/**
 * 
 * @package apiClasses.apiObjects.update
 */
class UpdateCustomerPaymentProfileResponse
{

  /**
   * 
   * @var UpdateCustomerPaymentProfileResponseType $UpdateCustomerPaymentProfileResult
   * @access public
   */
  public $UpdateCustomerPaymentProfileResult = null;

  /**
   * 
   * @param UpdateCustomerPaymentProfileResponseType $UpdateCustomerPaymentProfileResult
   * @access public
   */
  public function __construct($UpdateCustomerPaymentProfileResult)
  {
    $this->UpdateCustomerPaymentProfileResult = $UpdateCustomerPaymentProfileResult;
  }

}
