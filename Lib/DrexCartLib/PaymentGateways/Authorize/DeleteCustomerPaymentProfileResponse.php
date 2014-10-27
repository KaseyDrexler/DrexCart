<?php


/**
 * 
 * @package apiClasses.apiObjects.delete
 */
class DeleteCustomerPaymentProfileResponse
{

  /**
   * 
   * @var DeleteCustomerPaymentProfileResponseType $DeleteCustomerPaymentProfileResult
   * @access public
   */
  public $DeleteCustomerPaymentProfileResult = null;

  /**
   * 
   * @param DeleteCustomerPaymentProfileResponseType $DeleteCustomerPaymentProfileResult
   * @access public
   */
  public function __construct($DeleteCustomerPaymentProfileResult)
  {
    $this->DeleteCustomerPaymentProfileResult = $DeleteCustomerPaymentProfileResult;
  }

}
