<?php


/**
 * 
 * @package apiClasses.apiObjects.get
 */
class GetCustomerPaymentProfileResponse
{

  /**
   * 
   * @var GetCustomerPaymentProfileResponseType $GetCustomerPaymentProfileResult
   * @access public
   */
  public $GetCustomerPaymentProfileResult = null;

  /**
   * 
   * @param GetCustomerPaymentProfileResponseType $GetCustomerPaymentProfileResult
   * @access public
   */
  public function __construct($GetCustomerPaymentProfileResult)
  {
    $this->GetCustomerPaymentProfileResult = $GetCustomerPaymentProfileResult;
  }

}
