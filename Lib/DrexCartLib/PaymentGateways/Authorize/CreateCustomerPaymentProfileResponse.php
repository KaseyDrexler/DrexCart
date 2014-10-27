<?php


/**
 * 
 * @package apiClasses.apiObjects.create
 */
class CreateCustomerPaymentProfileResponse
{

  /**
   * 
   * @var CreateCustomerPaymentProfileResponseType $CreateCustomerPaymentProfileResult
   * @access public
   */
  public $CreateCustomerPaymentProfileResult = null;

  /**
   * 
   * @param CreateCustomerPaymentProfileResponseType $CreateCustomerPaymentProfileResult
   * @access public
   */
  public function __construct($CreateCustomerPaymentProfileResult)
  {
    $this->CreateCustomerPaymentProfileResult = $CreateCustomerPaymentProfileResult;
  }

}
